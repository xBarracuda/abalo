<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Symfony\Component\Mailer\Transport;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mime\Email;

class ContactController extends Controller
{
    public function show(Request $request)
    {
        $errMsgContact = session()->pull('errMsgContact') ?? NULL;
        $successMsgContact = session()->pull('successMsgContact') ?? NULL;
        return view('contact',[
            'errMsgContact' => $errMsgContact,
            'successMsgContact' => $successMsgContact,
        ]);
    }

    public function checkContactData(Request $request)
    {
        $name = $request->input('name');
        $useremail = $request->input('email');
        $text = $request->input('text');
        $checkbox = $request->input('checkbox');

        if (empty($name) || empty($useremail) || empty($checkbox))
        {
            $errMsgContact = "Bei der Verarbeitung Ihrer Anfrage ist ein Fehler aufgetreten.";
            session()->put('errMsgContact',$errMsgContact);
            return redirect()->action([ContactController::class,'show']);
        }
        if (!filter_var($useremail,FILTER_VALIDATE_EMAIL))
        {
            $errMsgContact = "Bitte geben Sie eine gueltige E-Mail-Adresse ein.";
            session()->put('errMsgContact',$errMsgContact);
            return redirect()->action([ContactController::class,'show']);
        }
        if (strlen($name) > 60 || strlen($useremail) > 60)
        {
            $errMsgContact = "Ihr Name und E-Mail-Adresse darf nur 60 Zeichen lang sein.";
            session()->put('errMsgContact',$errMsgContact);
            return redirect()->action([ContactController::class,'show']);
        }
        if (strlen($text) > 1000)
        {
            $errMsgContact = "Ihr Text darf nur 1000 Zeichen lang sein.";
            session()->put('errMsgContact',$errMsgContact);
            return redirect()->action([ContactController::class,'show']);
        }

        $transport = Transport::fromDsn('null://localhost');
        $mailer = new Mailer($transport);
        $email = (new Email())
            ->from($useremail)
            ->to('help@abalo.com')
            ->subject('Contact Request! ' . date(DATE_RFC2822))
            ->text($text);
        $mailer->send($email);

        $contact = new Contact();
        $contact->ab_name = $name;
        $contact->ab_mail = $useremail;
        $contact->ab_text = $text;
        $contact->save();

        $successMsgContact = "Vielen Dank. Wir werden Ihre Anfrage schnellstmöglich bearbeiten.";
        session()->put('successMsgContact',$successMsgContact);
        return redirect()->action([ContactController::class,'show']);
    }
}
