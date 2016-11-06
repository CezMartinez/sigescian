<?php

namespace App\Model;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Storage;

class TechnicianProcedure extends Model implements ProcedureInterface
{
    protected $fillable = ['code', 'name', 'acronym', 'state'];

    public $prefix = 'Procedimiento Técnico De ';

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function laboratory()
    {
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

    public function annexedFiles()
    {
        return $this->belongsToMany(AnnexedFile::class);
    }

    public function formatFiles()
    {
        return $this->belongsToMany(FormatFile::class)->withPivot('owner');
    }

    public function procedureDocument()
    {
        return $this->belongsTo(ProcedureDocument::class);
    }

    public static function fetchAllProcedureByState($state)
    {
        $technicianProcedure = new static;

        return $technicianProcedure->with('laboratory')->where('state', $state)->paginate(5);
    }

    

    public static function fetchAllProcedures($state)
    {
        $technicianProcedure = new static;

        return $technicianProcedure->with(['procedureDocument', 'laboratory', 'formatFiles', 'section'])->where('state', $state)->get();
    }

    protected function setNameAttribute($name)
    {
        $this->attributes['name'] = ucwords($this->prefix . trim($name));
    }

    protected function setAcronymAttribute($acronym)
    {
        $this->attributes['acronym'] = strtoupper(trim($acronym));
    }

    private function generateCodeAtCreate()
    {
        return $this->attributes['code'] = 'PT-' . $this->attributes['acronym'] . '-CIAN' . ($this->countAllProcedures() + 1);
    }

    private function generateCorrelativeOfProcedure()
    {
        return $this->attributes['correlative'] = ($this->countAllProcedures() + 1);
    }

    public function getStateAttribute()
    {

        return $this->attributes['state'] == 1 ? true : false;

    }

    public function getStatusAttribute()
    {

        return $this->attributes['state'] == 1 ? 'Activo' : 'Inactivo';
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

    public static function exists($name)
    {
        $technicianProcedure = new static;

        $technicianProcedure = $technicianProcedure->where('name', $name)->first();

        if ($technicianProcedure != null) {

            return true;

        }

        return false;
    }

    public function updateCodeWithAcronym($acronym, $procedure)
    {

        $originalCode = $procedure->code;

        $originalAcronym = $procedure->getOriginal('acronym');

        return (str_replace($originalAcronym, strtoupper(trim($acronym)), $originalCode));
    }

    public function addFilesToProcedure(Request $request)
    {
        $typeFile = $request->input('type');
        $file = $request->file('file');
        $extension = $file->getClientOriginalExtension();
        $clientName = time() . $file->getClientOriginalName();
        $nameWithoutExtension = preg_replace('(.\w+$)', '', $file->getClientOriginalName());
        $title = ucwords(preg_replace('([^A-Za-z0-9])', ' ', $nameWithoutExtension));
        $mime = $file->getClientMimeType();
        $size = $file->getClientSize();

        if ($typeFile == 1) {//Formatos
            $code = $this->generateCodeFormatFile($title, $this);
            $path = $file->storeAs(
                'archivos/procedimientos/tecnicos/formatos', $clientName, 'public'
            );
            $answer = $this->addFormatFile($code, $path, $clientName, $nameWithoutExtension, $title, $extension, $size, $mime);

            if($answer["status"] != "200"){
                Storage::delete("archivos/procedimientos/tecnicos/formatos/$clientName");
            }
            return $answer;
        } elseif ($typeFile == 3) {//anexo
            $path = $file->storeAs(
                'archivos/procedimientos/tecnicos/anexos', $clientName, 'public'
            );
            $this->annexedFiles()->create([
                'path' => $path,
                'originalName' => $clientName,
                'nameWithoutExtension' => $nameWithoutExtension,
                'title' => $title,
                'extension' => $extension,
                'size' => $size,
                'mime' => $mime,
            ]);

            return $this->answer("Anexo agregado con exito", "200");
        } elseif ($typeFile == 4) {
            $path = $file->storeAs(
                'archivos/procedimientos/tecnicos/procedimientos', $clientName, 'public'
            );
            $document = ProcedureDocument::create([
                'path' => $path,
                'originalName' => $clientName,
                'nameWithoutExtension' => $nameWithoutExtension,
                'title' => $title,
                'extension' => $extension,
                'size' => $size,
                'mime' => $mime,
            ]);

            if ($request->ajax()) {
                if ($this->onlyOne('procedureDocument')) {
                    return $this->answer("Error los procedimientos solo aceptan 1 archivo del tipo seleccionado", "500");
                };
            }
            $this->procedureDocument()->dissociate();

            $this->procedureDocument()->associate($document);

            $this->save();

            return $this->answer("El documentos de procedimiento fue agregado correctamente", "200");
        } else {
            return $this->answer("No ha seleccionado el tipo de archivo que desea subir", "404");
        }
    }

    /**
     * associate a section to the procedure
     *
     * @param $section
     * @return Model
     */
    public function addSection($section)
    {
        return $this->section()->associate($section);
    }

    /**
     * Attach a several subsection to the procedure
     *
     * @param $subsectionIds
     */
    public function addSubSections($subsectionIds)
    {
        return $this->subSections()->attach($subsectionIds);
    }
    public function deleteSubSections($subsectionIds)
    {
        return $this->subSections()->detach($subsectionIds);
    }

    protected function onlyOne($fileType)
    {
        return $this->$fileType()->get()->count() >= 1 ? true : false;
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

    public function countAllProcedures()
    {
        return $proceduresCount = count(AdministrativeProcedure::all()) + count(TechnicianProcedure::all());
    }

    /**
     * Verify if the given name has change from the original name
     *
     * @return bool
     */
    public function nameChanged()
    {
        return (count($this->getDirty()) > 0 && array_key_exists('name', $this->getDirty())) ? true : false;
    }

    private function generateCodeFormatFile($title, $procedure)
    {
        $numberOfFiles = count($procedure->formatFiles()->get()) + 1;
        $exclude = "/ ?en | ?el | ?para | ?(F|f)?ormulario | ?(F|f)ormato | ?se | ?que | ?con | ?la | ?del | ?de | ?no | ?les | a | ?y |[0-9] /i";
        $textCode = trim(preg_replace($exclude, " ", $title));
        $acronym = "";
        $words = preg_split("/\s+/", $textCode);
        foreach ($words as $word) {
            $acronym .= $word[0];
        }
        return $code = "F-{$acronym}-PG{$procedure->correlative}.{$numberOfFiles}";
    }

    private function addFormatFile($code, $path, $clientName, $nameWithoutExtension, $title, $extension, $size, $mime)
    {
        if ($formato = $this->itHasAlreadyAdded($title)) {
            if(count($formato->administrativeProcedure)==1){
                foreach ($formato->administrativeProcedure as $fomato){
                    return $this->answer("Este Formato ya existe y esta asociado con  "."\"".$fomato->name."\""."", "501");
                }
            }elseif(count($formato->technicianProcedure)==1){
                foreach ($formato->technicianProcedure as $fomato){
                    return $this->answer("Este Formato ya existe y esta asociado con  "."\"".$fomato->name."\""."", "501");
                }
            }else{
                return $this->answer("Este Formato ya existe y puede que este obsoleto", "501");
            }
        }


        $formatFile = FormatFile::create([
            'code' => $code,
            'path' => $path,
            'originalName' => $clientName,
            'nameWithoutExtension' => $nameWithoutExtension,
            'title' => $title,
            'extension' => $extension,
            'size' => $size,
            'mime' => $mime,
        ]);
        $this->formatFiles()->attach($formatFile, ['owner' => true]);

        return $this->answer('Formato agregado y asociado correctamente', "200");
    }

    private function answer($message, $status)
    {
        return ["message" => $message, "status" => $status];
    }

    private function itHasAlreadyAdded($title)
    {
        $formato = FormatFile::with(['technicianProcedure' => function ($query) {
            $query->where('owner', true);
        }, 'administrativeProcedure' => function ($query) {
            $query->where('owner', true);
        }])->where('title', $title)->first();
        return $formato;
    }

    public function documentProcedure()
    {
        return $this->procedureDocument()->get();
    }

    public function hasDocumentProcedure()
    {
        return ($this->procedureFile()->get()->count() > 0) ? true : false;
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
