<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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

        $csubject = "PQRSC equipo ÁgapeDesign";

        $logo = "img/ÁGAPE_logo1.png";
        $link = 'HTTP://agape.test';

        $body = "<!DOCTYPE html><html lang='es'><head><meta charset='UTF-8'><title>PQRSC ÁgapeDesign</title></head><body>";
        $body .= "<table style='width: 100%;'>";
        $body .= "<thead style='text-align: center;'><tr><td style='border:none;' colspan='2'>";
        $body .= "<a href='{$link}'><img src='{$logo}' alt=''><h3>ÁgapeDesign</h3></a><br><br>";
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

    public function forgotPassword(Request $request)
    {
        $user = DB::table("users")->select('id')->where("email", $request->email)->get();

        if (isset($user[0]) and $user[0]->id > 0 ){
            $to = $request->email;
            $csubject = "ÁgapeDesign";
            $codigo = mt_rand(111111,999999);
            $headers = "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

            $body = "<!DOCTYPE html><html lang='es'><head><meta charset='utf-8'><title>ÁgapeDesign</title></head><body>";
            $body .= "<h3 class='text-center'>Restablecimiento de contraseña</h3><br>";
            $body .= "<p>Codigo de Seguridad: ".$codigo."</p>";

            mail($to, $csubject, $body, $headers);

            $modal = 'codeForgotPassword';

            return view('welcome', compact('codigo', 'to', 'modal'));

        }else{
            $modal = 'noForgotPassword';
            return view('welcome', compact( 'modal'));
        }
    }

    public function validateCode(Request $request)
    {
        $users = DB::table("users")->where("email", $request->email)->get();

        if ($request->code2 == $request->code){
            $modal = 'updateInformation';

            return view('welcome', compact('modal', 'users'));
        }else{
            $modal = 'noCodeForgotPassword';
            $code = $request->code;
            $to = $request->email;

            return view('welcome', compact('modal', 'code', 'to'));
        }
    }

    public function updateInfo(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'email' => 'required',
        ]);

        $user = User::find($request->id);
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->email = $request->email;

        if (!empty($request->password) or !is_null($request->password) or $request->password != '') {
            $user->password = Hash::make($request->name);
        }
        $user->save();

        $modal = 'updateInformationSuccess';

        return view('welcome', compact('modal'));
    }
}
