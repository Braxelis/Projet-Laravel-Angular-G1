<?php

namespace App\Http\Controllers;

use App\Models\Courrier;
use App\Services\FileService;
use Illuminate\Http\Request;

class CourrierController extends Controller
{
    protected $fileService;

    public function __construct(FileService $fileService)
    {
        $this->fileService = $fileService;
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'reference' => 'required|unique:courriers',
            'type' => 'required|in:entrant,sortant',
            'objet' => 'required',
            'fichier' => 'required|file|mimes:pdf,doc,docx|max:10240'
        ]);

        if ($request->hasFile('fichier')) {
            $filePath = $this->fileService->storeCourrier(
                $request->file('fichier'),
                $validatedData['reference']
            );
            $validatedData['fichier_path'] = $filePath;
        }

        $courrier = Courrier::create($validatedData);
        return response()->json(['message' => 'Courrier créé avec succès', 'courrier' => $courrier]);
    }

    public function archive(Courrier $courrier)
    {
        if ($this->fileService->moveToArchive($courrier->fichier_path)) {
            $courrier->update(['statut' => 'archive']);
            return response()->json(['message' => 'Courrier archivé avec succès']);
        }
        return response()->json(['message' => 'Erreur lors de l\'archivage'], 500);
    }

    public function download(Courrier $courrier)
    {
        $file = $this->fileService->getFile(
            $courrier->fichier_path,
            $courrier->statut === 'archive' ? 'archives' : 'courriers'
        );

        if (!$file) {
            return response()->json(['message' => 'Fichier non trouvé'], 404);
        }

        return response($file)
            ->header('Content-Type', 'application/octet-stream')
            ->header('Content-Disposition', 'attachment; filename="' . basename($courrier->fichier_path) . '"');
    }
}
