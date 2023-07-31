<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Support\Facades\View; 

use Illuminate\Support\Facades\Auth;

class certificateController extends Controller
{

    
    public function download(Request $request, Subject $subject)
    {
        $score = $request->query('score', 0);
        $totalQuestions = $request->query('totalQuestions', 0);
        $certificateHtml = View::make('certificate', compact('subject', 'score', 'totalQuestions'))->render();

       
        // Set Dompdf options and create a PDF instance
        $pdfOptions = new Options();
        $pdfOptions->set('isHtml5ParserEnabled', true);
        $pdfOptions->set('isRemoteEnabled', true);
       $pdfOptions->set('defaultPaperOrientation', 'landscape'); // Corrected typo

        $dompdf = new Dompdf($pdfOptions);
    
        // Load the certificate HTML and render it
        $dompdf->loadHtml($certificateHtml);
        $dompdf->render();
    
        // Generate the PDF content and provide it as a download response
        return $dompdf->stream('certificate_' . $subject->id . '.pdf', ['Attachment' => true]);
    }
      // public function download(Subject $subject)
    // {
    //     // Get the user's score and total questions from the session
    //     $score = session('score', 0);
    //     $totalQuestions = session('totalQuestions', 0);

    //     // Generate the certificate content (you can customize this)
    //     $certificateContent = "Certificate of Completion\n";
    //     $certificateContent .= "Subject: " . $subject->name . "\n";
    //     $certificateContent .= "Score: " . $score . "/" . $totalQuestions . "\n";

    //     // Save the certificate content to a file (you can customize the file name)
    //     $filename = 'certificate_' . $subject->id . '.txt';
    //     Storage::put($filename, $certificateContent);

    //     // Provide the file download response
    //     return response()->download(storage_path('app/' . $filename))->deleteFileAfterSend();
    // }
}
