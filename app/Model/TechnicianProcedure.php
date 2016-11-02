<?php

namespace App\Model;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class TechnicianProcedure extends Model implements ProcedureInterface
{
    protected $fillable = ['code','name','acronym','state'];

    public $prefix = 'Procedimiento Técnico De ';

    public function section(){
        return $this->belongsTo(Section::class);
    }

    public function laboratory(){
        return $this->belongsTo(Laboratory::class);
    }

    public function subSections()
    {
        return $this->belongsToMany(SubSection::class);
    }

    public function steps()
    {
        return $this->belongsToMany(Step::class);
    }

    public function annexedFiles()
    {
        return $this->belongsToMany(AnnexedFile::class);
    }

    public function formatFiles()
    {
        return $this->belongsToMany(FormatFile::class);
    }

    public function procedureDocument()
    {
        return $this->belongsTo(ProcedureDocument::class);
    }

    public static function fetchAllProcedureByState($state)
    {
        $technicianProcedure = new static;

        return $technicianProcedure->where('state',$state)->paginate(5);
    }

    public static function fetchAllProceduresByState($state)
    {
        $technicianProcedure = new static;

        return $technicianProcedure->where('state',$state)->paginate(5);
    }

    public static function fetchAllProcedures($state){
        $technicianProcedure = new static;

        return $technicianProcedure->with(['procedureDocument','laboratory','formatFiles','section'])->where('state',$state)->get();
    }

    protected function setNameAttribute($name){
        $this->attributes['name'] = ucwords($this->prefix.trim($name));
    }

    protected function setAcronymAttribute($acronym){
        $this->attributes['acronym'] = strtoupper(trim($acronym));
    }

    private function generateCodeAtCreate()
    {
        return $this->attributes['code'] = 'PT-'.$this->attributes['acronym'].'-CIAN'.($this->countAllProcedures()+1);
    }

    private function generateCorrelativeOfProcedure()
    {
        return $this->attributes['correlative'] = ($this->countAllProcedures() + 1);
    }

    public function getStateAttribute(){

        return $this->attributes['state'] == 1 ? true : false;

    }
    public function getStatusAttribute(){

        return $this->attributes['state'] == 1 ? 'Activo' : 'Inactivo';
    }

    public static function createTechnician($data,$section, $laboratory){
        $technicianProcedure = new static;
        $technicianProcedure->fill($data);
        $technicianProcedure->correlative = $technicianProcedure->generateCorrelativeOfProcedure();
        $technicianProcedure->code = $technicianProcedure->generateCodeAtCreate();
        $technicianProcedure->section()->associate($section);
        $technicianProcedure->laboratory()->associate($laboratory);
        $technicianProcedure->save();

        return $technicianProcedure;
    }

    public function updateProcedure($request)
    {
        $this->fill($request->all());

        $newAcronym = $request->input('acronym');

        if (!$request->has('state')) {
            $this->state= '0';
        }
        else{
            $this->state= '1';
        }

        if($this->nameChanged()){
            if ($this->exists($request->input('name'))) {
                return ['hasError' => true , 'message' => "El nombre {$request->input('name')} ya existe"];
            }
        }

        $this->code = $this->updateCodeWithAcronym($newAcronym,$this);

        $this->save();

        return [
            'hasError' => false,
            'message' => "El procedimiento fue actualizado correctamente"
        ];
    }

    public static function exists($name)
    {
        $technicianProcedure = new static;

        $technicianProcedure = $technicianProcedure->where('name',$name)->first();

        if($technicianProcedure != null){

            return true;

        }

        return false;
    }

    public function updateCodeWithAcronym($acronym,$procedure)
    {

        $originalCode = $procedure->code;

        $originalAcronym = $procedure->getOriginal('acronym');

        return (str_replace($originalAcronym,strtoupper(trim($acronym)),$originalCode));
    }

    public function addFilesToProcedure(Request $request)
    {
        $typeFile = $request->input('type');
        $file = $request->file('file');
        $extension = $file->getClientOriginalExtension();
        $clientName = time().$file->getClientOriginalName();
        $nameWithoutExtension = preg_replace('(.\w+$)','',$file->getClientOriginalName());
        $title = ucwords(preg_replace('([^A-Za-z0-9])',' ',$nameWithoutExtension));
        $mime = $file->getClientMimeType();
        $size = $file->getClientSize();
        
        if($typeFile == 1){//Formatos
            $code = $this->generateCodeFormatFile($title,$this);
            $path = $file->storeAs(
                'archivos/procedimientos/tecnicos/formatos', $clientName,'public'
            );
            $answer = $this->addFormatFile($code, $path, $clientName, $nameWithoutExtension, $title, $extension, $size, $mime);

            return $answer;
        }elseif($typeFile == 3){//anexo
            $path = $file->storeAs(
                'archivos/procedimientos/tecnicos/anexos', $clientName,'public'
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
                'archivos/procedimientos/tecnicos/procedimientos', $clientName,'public'
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
                if($this->onlyOne('procedureDocument')){
                    return $this->answer("Error los procedimientos solo aceptan 1 archivo del tipo seleccionado","500");
                };
            }
            $this->procedureDocument()->dissociate();

            $this->procedureDocument()->associate($document);

            $this->save();

            return $this->answer("El documentos de procedimiento fue agregado correctamente","200");
        }else{
            return $this->answer("No ha seleccionado el tipo de archivo que desea subir","404");
        }
    }

    protected function onlyOne($fileType)
    {
        return $this->$fileType()->get()->count() >= 1 ? true : false;
    }

    /**
     * Get The Dir of the Format files
     *
     * @return string
     */
    public function getFormatFilesDirPath()
    {
        return '/archivos/procedimientos/tecnicos/formatos/';
    }

    /**
     * Get The Dir of the Annexed Files
     *
     * @return string
     */
    public function getAnnexedFilesDirPath()
    {
        return '/archivos/procedimientos/tecnicos/formatos/';
    }

    public function getProcedureFileDirPath()
    {
        return '/archivos/procedimientos/tecnicos/procedimiento/';
    }

    public function countAllProcedures()
    {
        return $proceduresCount = count(AdministrativeProcedure::all()) + count(TechnicianProcedure::all());
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

    private function generateCodeFormatFile($title, $procedure)
    {
        $numberOfFiles = count($procedure->formatFiles()->get())+1;
        $exclude = "/ ?en | ?el | ?para | ?(F|f)?ormulario | ?(F|f)ormato | ?se | ?que | ?con | ?la | ?del | ?de | ?no | ?les | a | ?y |[0-9] /i";
        $textCode = trim(preg_replace($exclude," ",$title));
        $acronym = "";
        $words = preg_split("/\s+/", $textCode);
        foreach ($words as $word){
            $acronym .= $word[0];
        }
        return $code = "F-{$acronym}-PG{$procedure->correlative}.{$numberOfFiles}";
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
