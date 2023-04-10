<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;

/**
 * Write static login information to the session.
 * Use for test purposes.
 */
class AuthController extends Controller
{
    public function login(Request $request)
    {
        $user = User::query()->select('ab_user.id')->where('ab_mail','=','visitor@abalo.example.com')->get();
        $request->session()->put('abalo_user', 'visitor');
        $request->session()->put('abalo_mail', 'visitor@abalo.example.com');
        $request->session()->put('abalo_time', time());
        $request->session()->put('abalo_id',$user[0]->id);
        return redirect()->action([HomeController::class, 'index']);
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect()->action([HomeController::class, 'index']);
    }


    public function isLoggedIn(Request $request)
    {
        if ($request->session()->has('abalo_user')) {
            $r["user"] = $request->session()->get('abalo_user');
            $r["time"] = $request->session()->get('abalo_time');
            $r["mail"] = $request->session()->get('abalo_mail');
            $r["auth"] = "true";
        } else $r["auth"] = "false";
        return response()->json($r);
    }
}
