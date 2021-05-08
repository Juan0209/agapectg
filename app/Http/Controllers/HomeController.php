<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{

    public function welcome()
    {
        return view('welcome');
    }

    public function contact()
    {
        return view('user.contact');
    }

    public function sendMessage(Request $request)
    {
        $to = "juanixpro0209@gmail.com";
        $from = $_REQUEST['email'];
        $name = $_REQUEST['name'];
        $subject = $_REQUEST['subject'];
        $number = $_REQUEST['number'];
        $cmessage = $_REQUEST['message'];

        $headers = "From: " . $from . "\r\n";
        $headers .= "Cc: " . $from . "\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

        $csubject = "PQRSC equipo ágapeDesign";

        $logo = "img/ÁGAPE_logo1.png";
        $link = 'HTTP://agape.test';

        $body = "<!DOCTYPE html><html lang='en'><head><meta charset='UTF-8'><title>PQRSC ágapeDesign</title></head><body>";
        $body .= "<table style='width: 100%;'>";
        $body .= "<thead style='text-align: center;'><tr><td style='border:none;' colspan='2'>";
        $body .= "<a href='{$link}'><img src='{$logo}' alt=''><h3>ágapeDesign</h3></a><br><br>";
        $body .= "</td></tr></thead><tbody><tr>";
        $body .= "<td style='border:none;'><strong>Nombre:</strong> {$name}</td>";
        $body .= "<td style='border:none;'><strong>Email:</strong> {$from}</td>";
        $body .= "<td style='border:none;'><strong>Celular:</strong> {$number}</td>";
        $body .= "</tr>";
        $body .= "<tr><td style='border:none;'><strong>Asunto:</strong> {$subject}</td></tr>";
        $body .= "<tr><td></td></tr>";
        $body .= "<tr><td colspan='2' style='border:none;'>{$cmessage}</td></tr>";
        $body .= "</tbody></table>";
        $body .= "</body></html>";

        mail($to, $csubject, $body, $headers);
    }
    public function about()
    {
        return view('user.about');
    }
}
