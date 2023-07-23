<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Files;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Response;

class FileController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function showUploadPage()
    {
        return view('uploadPage');
    }

    public function uploadFile(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:jpg,png,pdf|max:2048',
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '_' . Str::random(10) . '-' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $fileName);

            // استخدم متغير لتخزين المسار الصحيح للملف
            $filePath = public_path('uploads/' . $fileName);

            // استخدم 'pathinfo' للحصول على الامتداد من اسم الملف المرفوع
            $extension = pathinfo($fileName, PATHINFO_EXTENSION);

            Files::query()
                ->create([
                    'filename' => $fileName,
                    'extension' => $extension,
                    'path' => $filePath, // استخدام المسار الصحيح للملف
                ]);

            return redirect()->back()->with('success', 'File uploaded successfully. File Name: ' . $fileName);
        }
        return redirect()->back()->with('error', 'File upload failed.');
    }

    public function showImportPage()
    {

        return view('importPage');
    }
    public function importFile(Request $request)
    {
        $request->validate([
            'filename' => 'required|exists:files,filename',
        ]);

        $nameFile = $request->input('filename');
        $checkFile = Files::query()
            ->where('filename', $nameFile)
            ->first();

        if ($checkFile) {
            $filePath = public_path('uploads/' . $checkFile->filename);

            if (file_exists($filePath)) {
                return Response::download($filePath);
            }
            return redirect()->back()->with('success', 'File imported successfully.');
        }
        return redirect()->back()->with('error', 'File not found.');

    }

}
