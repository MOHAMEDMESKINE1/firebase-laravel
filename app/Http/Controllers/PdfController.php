<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\LaravelPdf\Enums\Orientation;
use Spatie\LaravelPdf\Facades\Pdf;

use function Spatie\LaravelPdf\Support\pdf;

class PdfController extends Controller
{
    

    public function  index(){

        return view('session');
    }
    
    public function  exportPdf(){

        return Pdf::view('session')
        ->name('session-pdf')
        ->download();
        
    }
}
