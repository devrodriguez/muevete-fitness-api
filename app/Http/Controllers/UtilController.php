<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class UtilController extends Controller
{
    
    public function uploadFile(Request $request) {
        
        if ($request->hasFile('image'))
        {
            $file      = $request->file('image');
            $filename  = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $picture   = date('His').'-'.$filename;
            //$file->move(public_path('img'), $picture);
            Storage::putFileAs('products/', $file, $picture);
            return response()->json(["message" => "Image Uploaded Succesfully"]);
        } 
        else
        {
            return response()->json(["message" => "Select image first."]);
        }
    }

    public function downloadFile() {

        $filePath = storage_path('app').'/products/050139-IMG-0014.jpg';
        //dd($filePath);
        $mimeType = File::mimeType($filePath);
        $fileContent = File::get($filePath);
        //dd($ext);        
        return response($fileContent, 200)->header('Content-Type', $mimeType);
    }
}
