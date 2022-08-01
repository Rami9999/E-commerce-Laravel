<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;
class UserController extends Controller
{
    function login(Request $req){
        $user=User::where('email',$req->email)->first();
        if($user == null)
        {
            return view('login');
        }
        if(Crypt::decrypt($user->password)==$req->password)
        {
            $req->session()->put('user',$user);
            return redirect('profile');
             
    }

}
    function logout() {
        Session::flush();
        Session::put('logout','logout');
        return redirect('/');
    }
    function register(Request $req)
    {
        $user= new User;
        $user->name=$req->name;
        $user->email=$req->email;
        $user->password=Crypt::encrypt($req->password);
        $user->save();
        $req->session()->put('user',$user);
        return redirect('profile');

    }
}
