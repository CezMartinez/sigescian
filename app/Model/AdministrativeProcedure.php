<?php

namespace App\Model;

use App\AnnexedFile;
use Illuminate\Database\Eloquent\Model;

class AdministrativeProcedure extends Model
{
    protected $fillable = ['code','name','acronym'];

    public function annexedFiles()
    {
        return $this->belongsToMany(AnnexedFile::class);
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
        $procedimiento = $this->first();

        if(!$procedimiento){
            $this->attributes['code'] = 'PG-'.$this->attributes['acronym'].'-CIAN1';

        }else{
            $ultimo = $this->orderBy('created_at', 'desc')->first();
            $this->attributes['code'] = 'PG-'.$this->attributes['acronym'].'-CIAN'.($ultimo->id+1);
        }
    }
}
