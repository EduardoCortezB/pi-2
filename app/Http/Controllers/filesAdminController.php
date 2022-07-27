<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Session\SessionManager;
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

        return Storage::disk('pdfPayments')->response($path);
    }

    // This method make a score into table_payments with the id corresponding to the preinscription
    public function store(Request $request,$id,SessionManager $sessionManager){
        $validated = $request->validate([
            'pdfFile' => 'required|mimes:pdf'
        ]);

        $filename = $request->file('pdfFile')->store('/', 'pdfPayments');

        $data=[
            'is_valid'=>false,
            'id_candidat'=>$id,
            'path'=>$filename
        ];

        Payment::create($data);
        $sessionManager->flash('message','Se ha subido el comprobante de pago correctamente');
        return back();
    }
}
