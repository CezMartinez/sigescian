<?php

namespace App\Model;

use App\ProcedureDocument;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class TechnicianProcedure extends Model implements ProcedureInterface
{
    protected $fillable = ['code','name','acronym','state'];

    public $prefix = 'Procedimiento Técnico de ';

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

    public function procedureFile()
    {
        return $this->belongsTo(ProcedureDocument::class);
    }

    public static function fetchAll()
    {
        $technicianProcedure = new static;
        return $technicianProcedure->paginate(5);
    }

    public static function fetchAllProceduresByState($state)
    {
        $technicianProcedure = new static;

        return $technicianProcedure->where('state',$state)->paginate(5);
    }

    public static function fetchAllProcedures($state){
        $technicianProcedure = new static;

        return $technicianProcedure->with(['laboratory','formatFiles'])->where('state',$state)->get();
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

    public function getStateAttribute(){

        return $this->attributes['state'] == 1 ? true : false;

    }
    public function getStatusAttribute(){

        return $this->attributes['state'] == 1 ? 'Activo' : 'Inactivo';
    }

    public static function createTechnician($data,$section, $laboratory){
        $technicianProcedure = new static;
        $technicianProcedure->fill($data);
        $technicianProcedure->code = $technicianProcedure->generateCodeAtCreate();
        $technicianProcedure->section()->associate($section);
        $technicianProcedure->laboratory()->associate($laboratory);
        $technicianProcedure->save();

        return $technicianProcedure;
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

    private function latest()
    {
        return $this->orderBy('created_at', 'desc')->first();
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
            $path = $file->storeAs(
                'archivos/procedimientos/tecnicos/formatos', $clientName,'public'
            );
            return $this->formatFiles()->create([
                'path'                  =>$path,
                'originalName'          =>$clientName,
                'nameWithoutExtension'  =>$nameWithoutExtension,
                'title'                 =>$title,
                'extension'             =>$extension,
                'size'                  =>$size,
                'mime'                  =>$mime,
            ]);
        }else{//anexo
            $path = $file->storeAs(
                'archivos/procedimientos/tecnicoss/anexos', $clientName,'public'
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
        }
    }

    /**
     * Get The Dir of the Format files
     *
     * @return string
     */
    public function getFormatFilesDirPath()
    {
        return '/archivos/procedimientos/tecnicoss/formatos/';
    }

    /**
     * Get The Dir of the Annexed Files
     *
     * @return string
     */
    public function getAnnexedFilesDirPath()
    {
        return '/archivos/procedimientos/tecnicoss/formatos/';
    }

    public function getProcedureFileDirPath()
    {
        return '/archivos/procedimientos/tecnicoss/procedimiento/';
    }

    public function countAllProcedures()
    {
        return $proceduresCount = count(AdministrativeProcedure::all()) + count(TechnicianProcedure::all());
    }
}
