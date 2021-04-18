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
        /*return 'oa';
        die();*/

        $to = "keiner-2017@hotmail.com";
        $from = "keiner-2017@hotmail.com";
        $name = $_REQUEST['name'];
        $subject = $_REQUEST['subject'];
        $number = $_REQUEST['number'];
        $cmessage = $_REQUEST['message'];

        /*$headers = "From: $from";*/
        $headers = "From: " . $from . "\r\n";
        $headers .= "Reply-To: ". $from . "\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

        $csubject = "PQRS para el equipo ágapeDesign.";

        $logo = "{{asset('img/ÁGAPE_logo1.png')}}";
        $link = 'HTTP://agape.test';

        $body = "<!DOCTYPE html><html lang='en'><head><meta charset='UTF-8'><title>PQRS para el equipo ágapeDesign</title></head><body>";
        $body .= "<table style='width: 100%;'>";
        $body .= "<thead style='text-align: center;'><tr><td style='border:none;' colspan='2'>";
        $body .= "<a href='{$link}'><img src='{$logo}' alt=''></a><br><br>";
        $body .= "</td></tr></thead><tbody><tr>";
        $body .= "<td style='border:none;'><strong>Nombre:</strong> {$name}</td>";
        $body .= "<td style='border:none;'><strong>Email:</strong> {$from}</td>";
        $body .= "</tr>";
        $body .= "<tr><td style='border:none;'><strong>Asunto:</strong> {$subject}</td></tr>";
        $body .= "<tr><td></td></tr>";
        $body .= "<tr><td colspan='2' style='border:none;'>{$cmessage}</td></tr>";
        $body .= "</tbody></table>";
        $body .= "</body></html>";

        /*$send = mail($to, $body, );*/
        /*$receivers = Receiver::pluck('email');*/
       /* Mail::to($to)->send(new TestMail($body) );*/

        /*Mail::send('email',$request->all(), function($msj) use($subject,$to) {
            $msj->from($from);
            $msj->subject($subject);
            $msj->to($to);
        });*/
        return redirect('/contact');
    }
}
