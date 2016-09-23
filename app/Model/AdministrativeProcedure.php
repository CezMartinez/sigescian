<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class AdministrativeProcedure extends Model
{
    protected $fillable = ['code','name','acronym','state','politic'];

    public $prefix = 'Procedimiento De Gestión ';

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

    public static function fetchAll()
    {
        $administrativeProcedure = new static;
        return $administrativeProcedure->paginate(5);
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
}
