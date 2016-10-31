<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class AdministrativeProcedure extends Model implements ProcedureInterface
{
    protected $fillable = ['code','name','acronym','state','politic'];

    public $prefix = 'Procedimiento De Gestión ';

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

    public static function fetchAll()
    {
        $adminProcedure = new static;
        return $adminProcedure->paginate(5);
    }

    public static function fetchAllProcedures($state)
    {
        $administrativeProcedure = new static;
        $administrativeProcedure->formatFiles()->get();

        return $administrativeProcedure->where('state',$state)->paginate(5);
    }
    /**
     * Set the name attribute
     * 
     * @param $name
     */
    protected function setNameAttribute($name){
        $this->attributes['name'] = ucwords($this->prefix.trim($name));
    }

    /**
     * Set the name attribute
     *
     * @param $acronym
     */
    protected function setAcronymAttribute($acronym){
        $this->attributes['acronym'] = strtoupper(trim($acronym));
    }

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

    public function addSection($section)
    {
        return $this->section()->associate($section);
    }

    public function addSubSections($subsectionIds)
    {
        return $this->subSections()->attach($subsectionIds);
    }

    public static function exists($name)
    {
        $administrativeProcedure = new static;
        $administrativeProcedure = $administrativeProcedure->where('name','like',"%{$name}")->first();

        if($administrativeProcedure != null){

            return true;

        }

        return false;
    }

    private function generateCodeAtCreateProcedure()
    {
        return $this->attributes['code'] = 'PG-'.$this->attributes['acronym'].'-CIAN'.($this->countAllProcedures()+1);
    }

    public function updateCodeWithAcronym($acronym,$procedure)
    {

        $originalCode = $procedure->code;

        $originalAcronym = $procedure->getOriginal('acronym');

        return (str_replace($originalAcronym,strtoupper(trim($acronym)),$originalCode));
    }

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

        return ['hasError' => false , 'message' => "El procedimiento fue actualizado correctamente"];;
    }

    /**
     * Verify if the given name has change from the original name
     *
     * @return bool
     */
    public function nameChanged()
    {
       return (count($this->getDirty())>0 && array_key_exists('name',$this->getDirty())) ? true : false;
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

    /**
     * return the las procedure in the DB
     *
     * @return mixed
     */
    private function latest()
    {
        return $this->orderBy('created_at', 'desc')->first();
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
        $title = ucwords(preg_replace('([^A-Za-z0-9])',' ',$nameWithoutExtension)); //quita cualquier caracter raro para formar un nombre mas formal
        $code = $this->generateCodeFormatFile($title,$this);
        $mime = $file->getClientMimeType();
        $size = $file->getClientSize();
        
        if($typeFile == 1){//Formatos
            $path = $file->storeAs(
                'archivos/procedimientos/administrativos/formatos', $clientName,'public'
            );
            return $this->formatFiles()->create([
                'code'                  =>$code,
                'path'                  =>$path,
                'originalName'          =>$clientName,
                'nameWithoutExtension'  =>$nameWithoutExtension,
                'title'                 =>$title,
                'extension'             =>$extension,
                'size'                  =>$size,
                'mime'                  =>$mime,
            ]);
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
                   return false;
               };
            }
            $this->flowChartFile()->associate($flowchartNew);
            $this->save();
            return $this;
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

            return $this;
        }elseif ($typeFile == 4){
            $path = $file->storeAs(
                'archivos/procedimientos/administrativos/flujograma', $clientName,'public'
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
                        return false;
                };
            }
            $this->procedureFile()->dissociate();

            $this->procedureFile()->associate($document);

            $this->save();
            
            return $this;
        }
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
        $exclude = "/ ?en | ?el | ?para | ?(F|f)?ormulario | ?(F|f)ormato | ?se | ?que | ?con | ?la | ?del | ?no | ?les | ?a | ?y |/i";
        $textCode = trim(preg_replace($exclude," ",$title));
        $acronym = "";
        foreach (explode(' ',$textCode) as $word){
            $acronym .= $word[0];
        }
        $code = "F-{$acronym}-PG{$procedure->id}.{$numberOfFiles}";
        dd($code);
    }

}
