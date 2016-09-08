<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $fillable=['materialName','materialDescription','slug'];

    public function setNameAttribute($nameMaterial)
    {
        $this->attributes['materialName']=ucwords($nameMaterial);
        $this->attributes['slug']=str_slug($nameMaterial);
    }

    public function scopeGetMaterials()
    {
        $Materials=Material::select('id','materialName','materialDescription','slug')->orderBy ('id','asc')->paginate();
        return $Materials;
    }

    public static function createMaterial($request)
    {
        $name=$request->input('materialName');
        $description=$request->input('materialDescription');
$slug='aaaaaaaaaaaaaaaaaaaaaaa';
        Material::create(['materialName'=>$name,'materialDescription'=>$description,'slug'=>$slug,]);
    }
}
