<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\FileUploadService;
use App\Http\Requests\UploadJsonFileRequest;
use App\Services\JsonFileService;
use Illuminate\Support\Facades\Storage;
use App\Jobs\ExportToExcelJob;

class FileController extends Controller
{
    protected $fileUploadService;
    protected $jsonFileService;

    public function __construct(FileUploadService $fileUploadService, JsonFileService $jsonFileService)
    {
        $this->fileUploadService = $fileUploadService;
        $this->jsonFileService = $jsonFileService;
    }

    public function uploadJsonFile(UploadJsonFileRequest $request)
    {

        $file = $request->file('file');
        $fileName = $this->fileUploadService->upload($file);
        return redirect()->route('dashboard')->with('success', 'File uploaded successfully.');
    }

    public function exportJsonFileToExcel(Request $request)
    {
    
        $fileName = $request->filename;
        $jsonData = $this->jsonFileService->getData($fileName);

        ExportToExcelJob::dispatch($jsonData)->onQueue('exports');
        return redirect()->route('dashboard')->with('success', 'File exported successfully.');
    }

    public function deleteFile(Request $request)
    {
        $fileToDelete = $request->filename;
        if (Storage::exists($fileToDelete)) {
            Storage::delete($fileToDelete);
            return redirect()->route('dashboard')->with('success', 'File deleted successfully.');
        } else {
            return redirect()->route('dashboard')->with('success', 'File not found.');
        }
    }
}
