<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class AdministrativeProcedure extends Model implements ProcedureInterface
{
    protected $fillable = ['code','name','acronym','state','politic'];

    public $prefix = 'Procedimiento De Gestión ';


    /*******************        Relaciones         *******************/

    /**
     * A procedure may have one official document
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function procedureFile()
    {
        return $this->belongsTo(ProcedureDocument::class);
    }

    /**
     * A procedure may have many annexed files
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function annexedFiles()
    {
        return $this->belongsToMany(AnnexedFile::class,'administrative_procedure_annexed_files');
    }

    /**
     * A procedure may have one flow chart file
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function flowChartFile()
    {
        return $this->belongsTo(FlowChartFile::class);
    }

    /**
     * A procedure may have many format files
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function formatFiles()
    {
        return $this->belongsToMany(FormatFile::class);
    }

    /**
     * A procedure may have one section associated with it.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function section(){
        return $this->belongsTo(Section::class);
    }

    /**
     * A procedure may have many sub sections associated with it
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function subSections()
    {
        return $this->belongsToMany(SubSection::class);
    }

    /*******************        Queries         *******************/
    /**
     * Fetch all procedures by the state "Activo" or "Inactivo"
     * 
     * @param $state
     * @return mixed
     */
    public static function fetchAllProceduresByState($state)
    {
        $administrativeProcedure = new static;
        
        return $administrativeProcedure->where('state',$state)->paginate(5);
    }

    public static function fetchAllProcedures($state)
    {
        $administrativeProcedure = new static;

        $administrativeProcedure->formatFiles()->get();

        return $administrativeProcedure->where('state',$state)->get();
    }

    /*******************        Setters         *******************/

    /**
     * Set the name attribute
     * 
     * @param $name
     */
    protected function setNameAttribute($name){
        $name = $this->prefix.trim($name) ;
        $this->attributes['name'] = ucwords($name);
    }

    /**
     * Set the name attribute
     *
     * @param $acronym
     */
    protected function setAcronymAttribute($acronym){
        $this->attributes['acronym'] = strtoupper(trim($acronym));
    }

    /*******************        Logic         *******************/

    /**
     * Create a new Procedure with the data and the section given
     *
     * @param $data
     * @return static
     */
    public static function createNewProcedure(Request $data){
        $administrativeProcedure = new static;
        $administrativeProcedure->fill($data->all());
        $section = Section::find($data->input('section'));
        $administrativeProcedure->code = $administrativeProcedure->generateCodeAtCreateProcedure();
        $administrativeProcedure->addSection($section);
        $administrativeProcedure->save();

        return $administrativeProcedure;
    }

    /**
     * Update the data of the procedure
     *
     * @param Request $request
     * @return array
     */
    public function updateProcedure(Request $request)
    {
        $this->fill($request->all());

        if (!$request->has('state')) {

            $this->state = '0';
        }
        else{

            $this->state = '1';
        }
        if($this->nameChanged()){
            if ($this->exists($request->input('name'))) {
                return ['hasError' => true , 'message' => "El nombre {$request->input('name')} ya existe"];
            }
        }

        $this->code = $this->updateCodeWithAcronym($request->input('acronym'),$this);

        $this->save();

        return [
            'hasError' => false ,
            'message' => "El procedimiento fue actualizado correctamente"
        ];
    }

    /**
     *
     * @param Request $request
     * @return $this|bool|Model
     */
    public function addFilesToProcedure(Request $request)
    {
        $typeFile = $request->input('type');
        $file = $request->file('file');

        $extension = $file->getClientOriginalExtension();
        $clientName = time().$file->getClientOriginalName();
        $nameWithoutExtension = preg_replace('(.\w+$)','',$file->getClientOriginalName()); //quita la extension de nombre [.jpe,.pdf, etc]
        $title = ucwords(preg_replace('([^A-Za-z0-9ñóáéíú́́́])',' ',$nameWithoutExtension)); //quita cualquier caracter raro para formar un nombre mas formal
        $mime = $file->getClientMimeType();
        $size = $file->getClientSize();

        if($typeFile == 1){ //Formatos
            $code = $this->generateCodeFormatFile($title,$this);
            $path = $file->storeAs(
                'archivos/procedimientos/administrativos/formatos', $clientName,'public'
            );


            $answer = $this->addFormatFile($code, $path, $clientName, $nameWithoutExtension, $title, $extension, $size, $mime);

            return $answer;

        }elseif ($typeFile == 2){//Flujograma
            $path = $file->storeAs(
                'archivos/procedimientos/administrativos/flujograma', $clientName,'public'
            );
            $flowchartNew = FlowChartFile::create([
                'path'                  =>$path,
                'originalName'          =>$clientName,
                'nameWithoutExtension'  =>$nameWithoutExtension,
                'title'                 =>$title,
                'extension'             =>$extension,
                'size'                  =>$size,
                'mime'                  =>$mime,
            ]);
            if($request->ajax()){
                if($this->onlyOne('flowChartFile')){
                    return $this->answer("Error, los procedimientos solo aceptan 1 archivo del tipo seleccionado","500");
                };
            }
            $this->flowChartFile()->associate($flowchartNew);
            $this->save();

            return $this->answer("Flujograma agregado con exito","200");

        }elseif ($typeFile == 3){//anexo
            $path = $file->storeAs(
                'archivos/procedimientos/administrativos/anexos', $clientName,'public'
            );
            $this->annexedFiles()->create([
                'path'                  =>$path,
                'originalName'          =>$clientName,
                'nameWithoutExtension'  =>$nameWithoutExtension,
                'title'                 =>$title,
                'extension'             =>$extension,
                'size'                  =>$size,
                'mime'                  =>$mime,
            ]);

            return $this->answer("Anexo agregado con exito","200");
        }elseif ($typeFile == 4){
            $path = $file->storeAs(
                'archivos/procedimientos/administrativos/procedimientos', $clientName,'public'
            );
            $document = ProcedureDocument::create([
                'path'                  =>$path,
                'originalName'          =>$clientName,
                'nameWithoutExtension'  =>$nameWithoutExtension,
                'title'                 =>$title,
                'extension'             =>$extension,
                'size'                  =>$size,
                'mime'                  =>$mime,
            ]);

            if($request->ajax()){
                if($this->onlyOne('procedureFile')){
                    return $this->answer("Error los procedimientos solo aceptan 1 archivo del tipo seleccionado","500");
                };
            }
            $this->procedureFile()->dissociate();

            $this->procedureFile()->associate($document);

            $this->save();

            return $this->answer("El documentos de procedimiento fue agregado correctamente","200");
        }else{
            return $this->answer("No ha seleccionado el tipo de archivo que desea subir","404");
        }
    }

    /**
     * associate a section to the procedure
     *
     * @param $section
     * @return Model
     */
    public function addSection($section)
    {
        return $this->section()->associate($section);
    }

    /**
     * Attach a several subsection to the procedure
     *
     * @param $subsectionIds
     */
    public function addSubSections($subsectionIds)
    {
        return $this->subSections()->attach($subsectionIds);
    }

    /**
     * Verifies if the procedure exists
     *
     * @param $name
     * @return bool
     */
    public static function exists($name)
    {
        $administrativeProcedure = new static;
        $administrativeProcedure = $administrativeProcedure->where('name','like',"%{$name}")->first();
        if($administrativeProcedure != null){
            return true;
        }
        return false;
    }

    /**
     * Generate The code of the procedure when its created
     *
     * @return string
     */
    private function generateCodeAtCreateProcedure()
    {
        return $this->attributes['code'] = 'PG-'.$this->attributes['acronym'].'-CIAN'.($this->countAllProcedures()+1);
    }

    /**
     * upadate the code of the procedure
     *
     * @param $acronym
     * @param $procedure
     * @return mixed
     */
    public function updateCodeWithAcronym($acronym,$procedure)
    {

        $originalCode = $procedure->code;

        $originalAcronym = $procedure->getOriginal('acronym');

        return (str_replace($originalAcronym,strtoupper(trim($acronym)),$originalCode));
    }



    /**
     * Verify if the given name has change from the original name
     *
     * @return bool
     */
    public function nameChanged()
    {
        return (count($this->getDirty()) > 0 && array_key_exists('name',$this->getDirty())) ? true : false;
    }

    /**
     * @return bool
     */
    public function getStateAttribute(){

        return $this->attributes['state'] == 1 ? true : false;

    }

    /**
     * @return string
     */
    public function getStatusAttribute(){

        return $this->attributes['state'] == 1 ? 'Activo' : 'Inactivo';

    }



    protected function onlyOne($fileType)
    {
        return $this->$fileType()->get()->count() >= 1 ? true : false;
    }

    /**
     * Get the path where the files are store
     *
     * @return string
     */
    public function getFormatFilesDirPath()
    {
        return '/archivos/procedimientos/administrativos/formatos/';
    }

    /**
     * Get the path where the files are store
     *
     * @return string
     */
    public function getAnnexedFilesDirPath()
    {
        return '/archivos/procedimientos/administrativos/anexos/';
    }

    /**
     * Get the path where the files are store
     *
     * @return string
     */
    public function getProcedureFileDirPath()
    {
        return '/archivos/procedimientos/administrativos/procedimiento/';
    }

    public function countAllProcedures()
    {
        return $proceduresCount = count(AdministrativeProcedure::all()) + count(TechnicianProcedure::all());
    }

    public function generateCodeFormatFile($title,$procedure)
    {
        $numberOfFiles = count($procedure->formatFiles()->get())+1;
        $exclude = "/ ?en | ?el | ?para | ?(F|f)?ormulario | ?(F|f)ormato | ?se | ?que | ?con | ?la | ?del | ?de | ?no | ?les | a | ?y |[0-9] /i";
        $textCode = trim(preg_replace($exclude," ",$title));
        $acronym = "";
        $words = preg_split("/\s+/", $textCode);
        foreach ($words as $word){
            $acronym .= $word[0];
        }
        return $code = "F-{$acronym}-PG{$procedure->id}.{$numberOfFiles}";

    }

    private function addFormatFile($code, $path, $clientName, $nameWithoutExtension, $title, $extension, $size, $mime)
    {

        if($this->itHasAlreadyAdded($title)){
            return $this->answer('Este Formato ya existe no puede ser agregado, revise los archivos obsoletos',"501");
        }


        $this->formatFiles()->create([
            'code'                  =>$code,
            'path'                  =>$path,
            'originalName'          =>$clientName,
            'nameWithoutExtension'  =>$nameWithoutExtension,
            'title'                 =>$title,
            'extension'             =>$extension,
            'size'                  =>$size,
            'mime'                  =>$mime,
        ]);

        return $this->answer('Formato agregado y asociado correctamente',"200");
    }

    private function answer($message, $status)
    {
        return [ "message" => $message ,"status" => $status];
    }

    /**
     * Check if the format exist 
     * @param $title
     * @return bool
     */
    private function itHasAlreadyAdded($title)
    {
        $formato = FormatFile::where('title',$title)->get();

        return (count($formato) == 1) ? true : false;
    }

    public function documentProcedure()
    {
        return $this->procedureFile()->get();
    }

    public function hasDocumentProcedure(){
        return ($this->procedureFile()->get()->count() > 0) ? true : false;
    }

    

}
