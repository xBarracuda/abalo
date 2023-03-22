<?php

namespace App\Http\Controllers;

use App\Models\Newsletter;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use function PHPUnit\Framework\isEmpty;

class HomeController extends BaseController
{
    public function index(Request $request)
    {
        $errMsg = session()->pull('errMsg') ?? NULL;
        $successMsg = session()->pull('successMsg') ?? NULL;

        return view('home',[
            'errMsg' => $errMsg,
            'successMsg' => $successMsg
        ]);
    }

    public function subscribe(Request $request)
    {
        $email = $request->input('email') ?? NULL;
        if (!$email || !filter_var($email,FILTER_VALIDATE_EMAIL) || strlen($email) > 60)
        {
            $errMsg = "Bitte geben Sie eine gueltige E-Mail mit max. 60 Zeichen an.";
            session()->put('errMsg',$errMsg);
            return redirect()->action([HomeController::class,'index']);
        }
        try
        {
            Newsletter::query()->where('email',$email)->firstOrFail();
            $errMsg = "Diese E-Mail ist bereits bei uns registriert.";
            session()->put('errMsg',$errMsg);
            return redirect()->action([HomeController::class,'index']);

        }
        catch (ModelNotFoundException $exception)
        {
            $newsletter = new Newsletter();
            $newsletter->email = $email;
            $newsletter->save();

            $successMsg = "Vielen Dank. Wir benarichtigen Sie, wenn es Neuigkeiten gibt!";
            session()->put('successMsg',$successMsg);
            return redirect()->action([HomeController::class,'index']);
        }
    }
}
