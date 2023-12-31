<?php

namespace App\Http\Controllers;

use App\Events\FileDownloaded;
use Illuminate\Http\Request;
use App\Models\Files;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Response;

class FileController extends Controller
{
    public function index()
    {
        $files = Files::all();
        return view('AllFileToImport', compact('files'));
    }

    public function showUploadPage()
    {
        return view('uploadPage');
    }

    public function uploadFile(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:jpg,png,pdf,txt,docx,doc,pptx,ppt|max:2048',
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

    public function generateImportUrl(Request $request)
    {
        $fileName = $request->input('file_name');
        $checkFile = Files::query()
            ->where('filename', $fileName)
            ->first();

        if ($checkFile) {
            $filePath = public_path('uploads/' . $checkFile->filename);
            if (file_exists($filePath)) {
                // استخدم دالة route لإنشاء الروابط بدلاً من دالة url
                $downloadUrl = route('download.file', ['filename' => $checkFile->filename]);
                return $downloadUrl;
            }
        }
        return ['url' => null];
    }

    public function downloadFile($filename)
    {
        $filePath = public_path('uploads/' . $filename);
        if (file_exists($filePath)) {
            return response()->download($filePath, $filename);
        }
        event(new FileDownloaded($filename->id));
        // يمكنك تحديد رسالة أخرى هنا إذا لم يتم العثور على الملف
        return redirect()->route('welcome')->with('error', 'File not found or unable to download.');
    }

}
