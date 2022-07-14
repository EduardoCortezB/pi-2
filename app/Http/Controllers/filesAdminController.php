<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;


class filesAdminController extends Controller
{
    // only an administrator can see the pdf files
    public static function viewPdf($path){
        abort_if(
            ! Storage::disk('pdfPayments') ->exists($path),
            404,
            "The file doesn't exist. Check the path."
        );

        return Storage::disk('pdfPayments')->response($path);
    }

    public static function getPdfPath($path){
        abort_if(
            ! Storage::disk('pdfPayments') ->exists($path),
            404,
            "The file doesn't exist. Check the path."
        );

        return Storage::disk('pdfPayments')->url($path);
    }

    public function store(Request $request){
        // validar si esta autenticado
        dd($request);
    }
}
