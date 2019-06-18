<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Session;
use App\Agent;
use App\Buyin;
use App\Enrollment;
use App\Passport;
use App\Players;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        date_default_timezone_set("Asia/Manila");
        $datetoday = date("Y-m-d");
        $countplayers = Players::count();
        $enroll = Enrollment::count();

        return view('home',compact('countplayers','enroll'));
    }

    public function logout(Request $request){
        Session::flush();
   /*     Auth::guard($this->getGuard())->logout();*/
    return redirect(property_exists($this, 'redirectAfterLogout') ? $this->redirectAfterLogout : '/');
  }

/*    public function lockscreen()
    {
        return view('lockscreen');
    }*/


    public function lockscreen($id)
    {

    $lockscreen = false;
    DB::update('update users set lockscreen = ? where id = ?' ,[$lockscreen,$id]);
    $users = DB::table('users')->select('users.*')->where('id', '=', $id)->first();

      if ($users == true) {
        return view('lockscreen', compact('users'));
      }else{
         return redirect('/home');
      }
        
    }

}
