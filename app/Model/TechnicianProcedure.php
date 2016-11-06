<?php

namespace App\Model;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;


class TechnicianProcedure extends Model implements ProcedureInterface
{
    use AddFilesTrait;
    
    protected $fillable = ['code', 'name', 'acronym', 'state'];

    public $prefix = 'Procedimiento Técnico De ';
    

    public function steps()
    {
        return $this->belongsToMany(Step::class);
    }
    
    public function laboratory()
    {
        return $this->belongsTo(Laboratory::class);
    }

    public static function fetchAllProceduresByState($state)
    {
        $technicianProcedure = new static;

        return $technicianProcedure->with('laboratory')->where('state', $state)->paginate(5);
    }
    
    public static function fetchAllProcedures($state)
    {
        $technicianProcedure = new static;

        return $technicianProcedure->with(['procedureDocument', 'laboratory', 'formatFiles', 'section'])->where('state', $state)->get();
    }
    

    

    private function generateCodeAtCreate()
    {
        return $this->attributes['code'] = 'PT-' . $this->attributes['acronym'] . '-CIAN' . ($this->countAllProcedures() + 1);
    }

    
    
    public static function createTechnician($data, $section, $laboratory)
    {
        $technicianProcedure = new static;
        $technicianProcedure->fill($data);
        $technicianProcedure->correlative = $technicianProcedure->generateCorrelativeOfProcedure();
        $technicianProcedure->code = $technicianProcedure->generateCodeAtCreate();
        $technicianProcedure->section()->associate($section);
        $technicianProcedure->laboratory()->associate($laboratory);
        $technicianProcedure->save();

        return $technicianProcedure;
    }

    public function updateProcedure($request, $instructions)
    {
        $this->fill($request->all());

        $newAcronym = $request->input('acronym');

        if (!$request->has('state')) {
            $this->state = '0';
        } else {
            $this->state = '1';
        }

        if ($this->nameChanged()) {
            if ($this->exists($request->input('name'))) {
                return ['hasError' => true, 'message' => "El nombre {$request->input('name')} ya existe"];
            }
        }

        $this->code = $this->updateCodeWithAcronym($newAcronym, $this);

        //Agregar Seccion

        $section = Section::find($request->input('section'));

        $this->addSection($section);

        if($request->has('subsection')){
            $this->subSections()->detach();
            $this->addSubSections($request->input('subsection'));
        }


        $this->save();

        $this->updateInstructions($instructions);


        return [
            'hasError' => false,
            'message' => "El procedimiento fue actualizado correctamente"
        ];
    }

    public function generateInstructions($instructions, $id_instructions = null)
    {
        if (is_array($instructions)) {
            foreach ($instructions as $instruction) {
                Step::create([
                    'step' => $instruction
                ]);
            }

            foreach ($instructions as $instruction) {
                $id = Step::where('step', $instruction)->first()->id;
                if (is_null($id_instructions)) {
                    $id_instructions = [];
                    array_push($id_instructions, $id);
                } else {
                    array_push($id_instructions, $id);
                }
            }

            return $id_instructions;
        }

        Step::create([
            'step' => $instructions
        ]);

        $id = Step::where('step', $instructions)->first()->id;

        if (is_null($id_instructions)) {
            $id_instructions = [];
            array_push($id_instructions, $id);
        } else {
            array_push($id_instructions, $id);
        }

        return $id_instructions;

    }

    public function addInstructions($ids)
    {
        $this->steps()->attach($ids);
    }
    

   

    /**
     * Get The Dir of the Format files
     *
     * @return string
     */
    public function getFormatFilesDirPath()
    {
        return '/archivos/procedimientos/tecnicos/formatos/';
    }

    /**
     * Get The Dir of the Annexed Files
     *
     * @return string
     */
    public function getAnnexedFilesDirPath()
    {
        return '/archivos/procedimientos/tecnicos/formatos/';
    }

    public function getProcedureFileDirPath()
    {
        return '/archivos/procedimientos/tecnicos/procedimiento/';
    }

    
    private function updateInstructions($instructions)
    {
        $ids = [];
        foreach ($instructions as $name) {
            $instruction = Step::where('step', $name)->first();
            if (is_null($instruction)) {
                $instruction = Step::create([
                    'step' => $name,
                ]);
            }
            array_push($ids, $instruction->id);

        }

        $this->steps()->sync($ids);
    }
    

}
