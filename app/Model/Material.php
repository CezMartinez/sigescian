<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $fillable=['name','description','slug','laboratory_id'];

    public function setNameAttribute($nameMaterial)
    {
        $this->attributes['name']=ucwords($nameMaterial);
        $this->attributes['slug']=str_slug($nameMaterial);
       /* if(Material::exists( $this->attributes['slug'])){
            abort(404,'Este material ya esta registrado');
        }*/
    }

    public function laboratory(){
        return $this->belongsTo(Laboratory::class);
    }
    public static function fetchAll()
    {
        $material = new static;

        return $material->paginate(5);
    }

    public static function createMaterial($request, Laboratory $lab)
    {
        $material = new static;

        $material->fill($request);

        $material->laboratory()->associate($lab);

        $material->save();

        return $material;
    }

    public static function exists($name)
    {
        $material = new static;

        $material = $material->where('slug',str_slug($name))->first();

        if($material != null){
            return true;
        }

        return false;
    }
}