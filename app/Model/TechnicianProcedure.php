<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TechnicianProcedure extends Model
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

    public static function fetchAll()
    {
        $technicianProcedure = new static;
        return $technicianProcedure->paginate(5);
    }

    protected function setNameAttribute($name){
        $this->attributes['name'] = ucwords($this->prefix.trim($name));
    }

    protected function setAcronymAttribute($acronym){
        $this->attributes['acronym'] = strtoupper(trim($acronym));
    }

    private function generateCodeAtCreate()
    {
        $ultimo = $this->latest();

        return $this->attributes['code'] = 'PT-'.$this->attributes['acronym'].'-CIAN'.($ultimo->id+1);
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
}
