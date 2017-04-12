<?php
namespace App\Model;

use Storage;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;


trait AddFilesTrait
{
    /**
     * Return a relationship for the file
     * @return File
     */
    public function versionate(){
        return $this->belongsToMany(ProcedureDocument::class,'procedure_document_version','procedure_id','document_id')
                    ->withPivot(['version','user_id'])->withTimeStamps();
    }

    /**
     * @return mixed
     */
    public function documentProcedure()
    {
        return $this->procedureDocument()->get();
    }

    public function hasDocumentProcedure()
    {
        return ($this->procedureDocument()->get()->count() > 0) ? true : false;
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function subSections()
    {
        return $this->belongsToMany(SubSection::class);
    }

    public function procedureDocument()
    {
        return $this->belongsTo(ProcedureDocument::class);
    }

    public function annexedFiles()
    {
        return $this->belongsToMany(AnnexedFile::class)->withPivot('owner');
    }

    public function formatFiles()
    {
        return $this->belongsToMany(FormatFile::class)->withPivot(['owner','active']);
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
        return $this->subSections()->dettach($subsectionIds);
    }

    // Setters

    protected function setNameAttribute($name)
    {
        $name = $this->prefix . trim($name);
        $this->attributes['name'] = ucwords($name);
    }

    protected function setAcronymAttribute($acronym)
    {
        $this->attributes['acronym'] = strtoupper(trim($acronym));
    }

    private function generateCorrelativeOfProcedure()
    {
        return $this->attributes['correlative'] = ($this->countAllProcedures() + 1);
    }

    protected function onlyOne($fileType)
    {
        return $this->$fileType()->get()->count() >= 1 ? true : false;
    }

    public function countAllProcedures()
    {
        return $proceduresCount = count(AdministrativeProcedure::all()) + count(TechnicianProcedure::all());
    }

    public function getStateAttribute()
    {

        return $this->attributes['state'] == 1 ? true : false;

    }

    public function getStatusAttribute()
    {

        return $this->attributes['state'] == 1 ? 'Activo' : 'Inactivo';
    }


    public function updateCodeWithAcronym($acronym, $procedure)
    {

        $originalCode = $procedure->code;

        $originalAcronym = $procedure->getOriginal('acronym');

        return (str_replace($originalAcronym, strtoupper(trim($acronym)), $originalCode));
    }

    public function addFilesToProcedure(Request $request,$typeFile=null)
    {
        ini_set('upload_max_filesize', '10M');

        $procedure_type = $this->procedureType($request->url());
        if($typeFile == null){
            $typeFile = $request->input('type');
        }
        $file = $request->file('file');

        $extension = $file->getClientOriginalExtension();
        $clientName = time() . $file->getClientOriginalName();
        $nameWithoutExtension = preg_replace('(.\w+$)', '', $file->getClientOriginalName()); //quita la extension de nombre [.jpe,.pdf, etc]
        $title = ucwords(preg_replace('([^A-Za-z0-9ñóáéíú́́́])', ' ', $nameWithoutExtension)); //quita cualquier caracter raro para formar un nombre mas formal
        $mime = $file->getClientMimeType();
        $size = $file->getClientSize();

        if ($typeFile == 1) { //Formatos
            $code = $this->generateCodeFormatFile($title, $this);
            $path = $file->storeAs(
                "archivos/procedimientos/$procedure_type/formatos", $clientName, 'public'
            );


            $answer = $this->addFormatFile($code, $path, $clientName, $nameWithoutExtension, $title, $extension, $size, $mime);

            if ($answer["status"] != "200") {
                Storage::delete("archivos/procedimientos/$procedure_type/formatos/$clientName");
            }

            return $answer;

        } elseif ($typeFile == 3) {//anexo
            $path = $file->storeAs(
                "archivos/procedimientos/$procedure_type/anexos", $clientName, 'public'
            );

            $answer = $this->addAnnexedFile($path, $clientName, $nameWithoutExtension, $title, $extension, $size, $mime);

            if ($answer["status"] != "200") {
                Storage::delete("archivos/procedimientos/$procedure_type/anexos/$clientName");
            }

            return $answer;

        } elseif ($typeFile == 4) {
            $path = $file->storeAs(
                "archivos/procedimientos/$procedure_type/procedimientos", $clientName, 'public'
            );

            $answer = $this->addProcedureDocument($path, $clientName, $nameWithoutExtension, $title, $extension, $size, $mime);


            if ($answer["status"] != "200") {
                Storage::delete("archivos/procedimientos/$procedure_type/procedimientos/$clientName");
                return $answer;
            }

            return $answer;
        } else {
            return $this->answer("No ha seleccionado el tipo de archivo que desea subir", "404");
        }
    }

    private function addFormatFile($code, $path, $clientName, $nameWithoutExtension, $title, $extension, $size, $mime)
    {
        $answer = $this->verifyForDuplicatedFile($title, 'formato');

        if (!is_null($answer)) {
            return $answer;
        }

        $formato = FormatFile::create([
            'code' => $code,
            'path' => $path,
            'originalName' => $clientName,
            'nameWithoutExtension' => $nameWithoutExtension,
            'title' => $title,
            'extension' => $extension,
            'size' => $size,
            'mime' => $mime,
        ]);

        $this->formatFiles()->attach($formato, ['owner' => true,'active' => true]);

        $answer = $this->answer("El formato \"$formato->name\" fue agregado correctamente", "200");

        return $answer;
    }

    private function answer($message, $status, $file=null)
    {
        return ["message" => $message, "status" => $status, "file" => $file];
    }

    public function nameChanged()
    {
        return (count($this->getDirty()) > 0 && array_key_exists('name', $this->getDirty())) ? true : false;
    }

    public static function exists($name)
    {
        $administrativeProcedure = new static;
        $administrativeProcedure = $administrativeProcedure->where('name', 'like', "%{$name}")->first();
        if ($administrativeProcedure != null) {
            return true;
        }
        return false;
    }

    private function searchForExistingFiles($title)
    {
        $formato = FormatFile::with(['technicianProcedure' => function ($query) {
            $query->where('owner', true);
        }, 'administrativeProcedure' => function ($query) {
            $query->where('owner', true);
        }])->where('title', $title)->first();

        $anexo = AnnexedFile::with(['technicianProcedure' => function ($query) {
            $query->where('owner', true);
        }, 'administrativeProcedure' => function ($query) {
            $query->where('owner', true);
        }])->where('title', $title)->first();

        $procedure = ProcedureDocument::with('technicianProcedure','administrativeProcedure')->where('title',$title)->first();

        if (!is_null($formato)) {
            return $formato;
        } elseif ($anexo) {
            return $anexo;
        }elseif ($procedure){
            return $procedure;
        }
    }

    public function addProcedureDocument($path, $clientName, $nameWithoutExtension, $title, $extension, $size, $mime){

        $answer = $this->verifyForDuplicatedFile($title, 'archivo de procedimiento');

        if($answer){
            return $answer;
        }

        if ($this->onlyOne('procedureDocument')) {
            return $this->answer("Error los procedimientos solo aceptan 1 archivo del tipo seleccionado", "500");
        };

        $document = ProcedureDocument::create([
            'path' => $path,
            'originalName' => $clientName,
            'nameWithoutExtension' => $nameWithoutExtension,
            'title' => $title,
            'extension' => $extension,
            'size' => $size,
            'mime' => $mime,
        ]);

        $this->procedureDocument()->dissociate();

        $this->procedureDocument()->associate($document);

        if($this->version == null){
            $this->version = 1;
        }else{
            $this->version = $this->version + 1;
        }
        
        $this->save();
        
        $procoedure_type = get_class($this);
        
        $this->versionate()->attach($document,['user_id'=> auth()->id(),'version'=> $this->version,'procedure_type' => $procoedure_type]);

        $this->save();

        return $this->answer("El procedimiento se creo correctamente", "200");

    }


    private function addAnnexedFile($path, $clientName, $nameWithoutExtension, $title, $extension, $size, $mime)
    {
        $answer = $this->verifyForDuplicatedFile($title, 'anexo');

        if (!is_null($answer)) {
            return $answer;
        }

        $anexo = AnnexedFile::create([
            'path' => $path,
            'originalName' => $clientName,
            'nameWithoutExtension' => $nameWithoutExtension,
            'title' => $title,
            'extension' => $extension,
            'size' => $size,
            'mime' => $mime,
        ]);

        $this->annexedFiles()->attach($anexo, ['owner' => true]);

        $answer = $this->answer("El anexo \"$anexo->name\" fue agregado correctamente", "200");

        return $answer;
    }

    private function generateCodeFormatFile($title, $procedure)
    {
        $numberOfFiles = count($procedure->formatFiles()->where('owner',true)->get()) + 1;
        $exclude = "/[^A-Z]/";
        $acronym = preg_replace($exclude,"",$title);
        return $code = "F-{$acronym}-PG{$procedure->correlative}.{$numberOfFiles}";
    }

    public function procedureType($url)
    {
        return (strpos($url, 'administrativo') !== false) ? 'administrativos' : 'tecnicos';
    }

    public function verifyForDuplicatedFile($title, $file_type)
    {
        if ($archivo = $this->searchForExistingFiles($title)) {
            if (count($archivo->administrativeProcedure) == 1) {
                if(is_a( $archivo->administrativeProcedure, "Illuminate\\Database\\Eloquent\\Collection")){
                    foreach ($archivo->administrativeProcedure as $procedure) {
                        return $this->answer("Este $file_type ya existe y esta asociado con  " . "\"" . $procedure->name . "\"" . "", "501",$archivo->first());
                    }
                }else{
                    return $this->answer("Este $file_type ya existe y esta asociado con  " . "\"" . $archivo->administrativeProcedure->name . "\"" . "", "501",$archivo->first());
                }
            } elseif (count($archivo->technicianProcedure) == 1) {
                if(is_a($archivo->technicianProcedure, "Illuminate\\Database\\Eloquent\\Collection")){
                    foreach ($archivo->technicianProcedure as $procedure) {
                        return $this->answer("Este $file_type ya existe y esta asociado con  " . "\"" . $procedure->name . "\"" . "", "501",$archivo->first());
                    }
                }else{
                    return $this->answer("Este $file_type ya existe y esta asociado con  " . "\"" . $archivo->technicianProcedure->name . "\"" . "", "501",$archivo->first());
                }
            }
            else {
                return $this->answer("Este $file_type ya existe y puede que este obsoleto", "501");
            }
        }
        return null;
    }


}

