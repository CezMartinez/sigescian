<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class AdministrativeProcedure extends Model implements ProcedureInterface
{
    protected $fillable = ['code','name','acronym','state','politic'];

    public $prefix = 'Procedimiento De Gestión ';

    public function procedureFile()
    {
        return $this->belongsTo(ProcedureDocument::class);
    }

    public function annexedFiles()
    {
        return $this->belongsToMany(AnnexedFile::class,'administrative_procedure_annexed_files');
    }

    public function flowChartFile()
    {
        return $this->belongsTo(FlowChartFile::class);
    }
    public function formatFiles()
    {
        return $this->belongsToMany(FormatFile::class);
    }

    public function section(){
        return $this->belongsTo(Section::class);
    }

    public function subSections()
    {
        return $this->belongsToMany(SubSection::class);
    }

    public static function fetchAllProceduresByState($state)
    {
        $administrativeProcedure = new static;
        
        return $administrativeProcedure->where('state',$state)->paginate(5);
    }

    protected function setNameAttribute($name){
        $this->attributes['name'] = ucwords($this->prefix.trim($name));
    }

    protected function setAcronymAttribute($acronym){
        $this->attributes['acronym'] = strtoupper(trim($acronym));
    }

    public static function createAdministrative($data,$section){
        $administrativeProcedure = new static;
        $administrativeProcedure->fill($data);
        $administrativeProcedure->code = $administrativeProcedure->generateCodeAtCreate();
        $administrativeProcedure->section()->associate($section);
        $administrativeProcedure->save();

        return $administrativeProcedure;
    }

    public static function exists($name)
    {
        $administrativeProcedure = new static;

        $administrativeProcedure = $administrativeProcedure->where('name',$name)->first();

        if($administrativeProcedure != null){

            return true;

        }

        return false;
    }

    private function generateCodeAtCreate()
    {

        $ultimo = $this->latest();

        return $this->attributes['code'] = 'PG-'.$this->attributes['acronym'].'-CIAN'.($ultimo->id+1);
    }

    public function updateCodeWithAcronym($acronym,$procedure)
    {

        $originalCode = $procedure->code;

        $originalAcronym = $procedure->getOriginal('acronym');

        return (str_replace($originalAcronym,strtoupper(trim($acronym)),$originalCode));
    }



    public function getStateAttribute(){

        return $this->attributes['state'] == 1 ? true : false;

    }
    public function getStatusAttribute(){

        return $this->attributes['state'] == 1 ? 'Activo' : 'Inactivo';

    }

    private function latest()
    {
        return $this->orderBy('created_at', 'desc')->first();
    }

    public function attachFiles(Request $request)
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
                'archivos/procedimientos/administrativos/formatos', $clientName,'public'
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
               if($this->flowChartFile()->get()->count()){
                   return false;
               };
            }
            $this->flowChartFile()->dissociate();
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
                if($this->procedureFile()->get()->count() >= 1){
                    return false;
                };
            }
            $this->procedureFile()->dissociate();

            $this->procedureFile()->associate($document);

            $this->save();
            
            return $this;
        }
    }

    public function getFormatFilesDirPath()
    {
        return '/archivos/procedimientos/administrativos/formatos/';
    }

    public function getAnnexedFilesDirPath()
    {
        return '/archivos/procedimientos/administrativos/anexos/';
    }
    
    public function getProcedureFileDirPath()
    {
        return '/archivos/procedimientos/administrativos/procedimiento/';
    }
    
}
