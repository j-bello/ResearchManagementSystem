<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Title;
use App\Models\User;
use App\Models\Theme;

use Barryvdh\DomPDF\Facade\Pdf as PDF;
//use Barryvdh\DomPDF\Facade\Pdf;

class PDFController extends Controller
{
    //
    public function showTitles(){
        $titles = Title::all();
        return view('pdfrecords.titleindex', compact('titles'));
      }
      // Generate PDF
      public function titlePDF() {
        $titles = Title::all();
        $pdf = PDF::loadView('pdfrecords.titleindex', compact('titles'))->setPaper('legal', 'landscape');
        return $pdf->download('titles.pdf');
      }

      public function showUsers(){
        $users = User::all();
        return view('pdfrecords.userindex', compact('users'));
      }
      // Generate PDF
      public function userPDF() {
        $users = User::all();
        $pdf = PDF::loadView('pdfrecords.userindex', compact('users'))->setPaper('legal', 'landscape');
        return $pdf->download('users.pdf');
      }

      public function showThemes(){
        $themes = Theme::all();
        return view('pdfrecords.themeindex', compact('themes'));
      }
      // Generate PDF
      public function themePDF() {
        $themes = Theme::all();
        $pdf = PDF::loadView('pdfrecords.themeindex', compact('themes'))->setPaper('legal', 'landscape');
        return $pdf->download('research-themes.pdf');
      }
}
