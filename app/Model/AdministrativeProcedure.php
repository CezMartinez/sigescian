<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Storage;

class AdministrativeProcedure extends Model implements ProcedureInterface
{
    Use AddFilesTrait;
    
    protected $fillable = ['code','name','acronym','state','politic'];

    public $prefix = 'Procedimiento De Gestión ';


    /*******************        Relaciones         *******************/

    /**
     * A procedure may have one flow chart file
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function flowChartFile()
    {
        return $this->belongsTo(FlowChartFile::class);
    }


    /*******************        Queries         *******************/
    /**
     * Fetch all procedures by the state "Activo" or "Inactivo"
     * 
     * @param $state
     * @return mixed
     */
    public static function fetchAllProceduresByState($state)
    {
        $administrativeProcedure = new static;
        
        return $administrativeProcedure->where('state',$state)->paginate(5);
    }

    public static function fetchAllProcedures($state)
    {
        $administrativeProcedure = new static;

        $administrativeProcedure->formatFiles()->get();

        return $administrativeProcedure->where('state',$state)->get();
    }
    

    /**
     * Create a new Procedure with the data and the section given
     *
     * @param $data
     * @return static
     */
    public static function createNewProcedure(Request $data){
        $administrativeProcedure = new static;
        $administrativeProcedure->fill($data->all());
        $administrativeProcedure->version = 1;
        $administrativeProcedure->correlative = $administrativeProcedure->generateCorrelativeOfProcedure();
        $section = Section::find($data->input('section'));
        $administrativeProcedure->code = $administrativeProcedure->generateCodeAtCreateProcedure();
        $administrativeProcedure->addSection($section);
        $administrativeProcedure->save();

        return $administrativeProcedure;
    }

    
    public function updateProcedure(Request $request)
    {
        $this->fill($request->all());
        $version = $this->getOriginal('version');


        if (!$request->has('state')) {

            $this->state = '0';
        }
        else{

            $this->state = '1';
        }
        if($this->nameChanged()){
            if ($this->exists($request->input('name'))) {
                return $this->answer('Ya existe un procedimiento con este nombre',404);
            }
        }

        $this->code = $this->updateCodeWithAcronym($request->input('acronym'),$this);

        //Agregar Seccion

        $section = Section::find($request->input('section'));

        $this->addSection($section);

        if($request->has('subsection')){
            $this->subSections()->detach();
            $this->addSubSections($request->input('subsection'));
        }

        if($request->exists('file')){
            $answer = $this->addFilesToProcedure($request,4);
            if($answer['status'] != "200"){
                $this->version = $version+1;
            }
        }

        $this->save();

        if(is_null($answer)){
            return $answer = $this->answer("Se guardo el procedimiento correctamente",200);
        }

        return $answer;
    }

    
    /**
     * Generate The code of the procedure when its created
     *
     * @return string
     */
    private function generateCodeAtCreateProcedure()
    {
        return $this->attributes['code'] = 'PG-'.$this->attributes['acronym'].'-CIAN'.($this->countAllProcedures()+1);
    }

    /**
     * Get the path where the files are store
     *
     * @return string
     */
    public function getFormatFilesDirPath()
    {
        return '/archivos/procedimientos/administrativos/formatos/';
    }

    /**
     * Get the path where the files are store
     *
     * @return string
     */
    public function getAnnexedFilesDirPath()
    {
        return '/archivos/procedimientos/administrativos/anexos/';
    }

    /**
     * Get the path where the files are store
     *
     * @return string
     */
    public function getProcedureFileDirPath()
    {
        return '/archivos/procedimientos/administrativos/procedimiento/';
    }



}
