<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TechnicianProcedure extends Model
{
    protected $fillable = ['code','name','acronym','state','politic'];

    public $prefix = 'Procedimiento Técnico';

    public function flowChartFile()
    {
        return $this->belongsTo(FlowChartFile::class);
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

}
