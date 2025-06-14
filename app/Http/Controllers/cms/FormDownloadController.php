<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use App\Models\FormDownload;
use Illuminate\Http\Request;

class FormDownloadController extends Controller
{
 public function index(Request $request){
    $form_downloads = FormDownload::latest()->paginate(10);
    return view('backend.formdownload.index',compact('form_downloads'));
 }

 public function show(Request $request, $id){
    $form_download = FormDownload::findOrFail($id);
    return view('backend.formdownload.show',compact('form_download'));
 }
}
