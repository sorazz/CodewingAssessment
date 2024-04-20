<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index(){
        $files = Storage::allFiles('uploads');
        return view('admin.dashboard', compact('files'));

    }

   
}
