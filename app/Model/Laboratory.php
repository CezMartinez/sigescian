<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Laboratory extends Model
{
 	protected $fillable = ['name','description','slug'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
 	public function department(){
 		return $this->belongsTo(Department::class);
 	}

 	public function procedures(){
 	    return $this->hasMany(TechnicianProcedure::class);
    }

    /**
     * @return mixed
     */
 	public static function fetchAll()
 	{
 		$laboratory = new static;

 		return $laboratory->with('department')->paginate(5);
 	}

    public static function fetchAllWithProcedures()
    {
        $laboratory = new static;

        return $laboratory->with('procedures')->get();
    }



 	protected function setNameAttribute($name)
 	{
 		$this->attributes['name'] = ucwords($name);
 		$this->attributes['slug'] = str_slug($name);
 	}

 	public static function createLaboratory($data,Department $departamento){
 		$laboratory = new static;

        $laboratory->fill($data);

        $laboratory->department()->associate($departamento);

 		$laboratory->save();

        return $laboratory;
 	}

    public static function exists($name)
    {
        $laboratory = new static;

        $laboratory = $laboratory->where('slug',str_slug($name))->first();

        if($laboratory != null){
            return true;
        }

        return false;
    }


}


