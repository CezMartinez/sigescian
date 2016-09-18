<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AdministrativeProcedure extends Model
{
    protected $fillable = ['code','name','acronym','state'];

    public function annexedFiles()
    {
        return $this->belongsToMany(AnnexedFile::class,'administrative_procedure_annexed_files');
    }

    public static function fetchAll()
    {
        $administrativeProcedure = new static;
        return $administrativeProcedure->paginate(5);
    }

    protected function setNameAttribute($name){
        $this->attributes['name'] = ucwords('Procedimiento Administrativo de '.trim($name));
    }

    protected function setAcronymAttribute($acronym){
        $this->attributes['acronym'] = strtoupper(trim($acronym));

        $this->generateCode();
    }

    public static function createAdministrative($data){

        $administrativeProcedure = new static;

        return $administrativeProcedure->create($data);
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

    private function generateCode()
    {
        //todo arreglar bug de codigo
        $procedimiento = $this->first();

        if(!$procedimiento){
            $this->attributes['code'] = 'PG-'.$this->attributes['acronym'].'-CIAN1';

        }else{
            $ultimo = $this->orderBy('created_at', 'desc')->first();
            $this->attributes['code'] = 'PG-'.$this->attributes['acronym'].'-CIAN'.($ultimo->id+1);
        }
    }

    public function getStateAttribute(){
        return $this->attributes['state'] == 1 ? true : false;
    }
    public function getStatusAttribute(){
        return $this->attributes['state'] == 1 ? 'Activo' : 'Inactivo';

    }
}
