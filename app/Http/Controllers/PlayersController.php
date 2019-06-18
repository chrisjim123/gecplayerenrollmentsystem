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

class PlayersController extends Controller
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
 
 public function index()
    {
        $result = DB::table('passport')
                    ->select('passport.*', 'players.*')
                    ->join('players', 'passport.players_id', '=', 'players.id')->paginate(6);
        return view('players.players', ["data"=>$result]);
    }


 public function search(Request $request)
  {
 
      $search = $request->input('isearch');
    /*  $search = Input::get('search');*/
        if($search != ''){

          $data = DB::table('passport')
                  ->select('passport.*', 'players.*')
                  ->join('players', 'passport.players_id', '=', 'players.id')
                  ->where('players.fname', 'LIKE', '%'.$search.'%')
                  ->orWhere('players.lname', 'LIKE', '%'.$search.'%')
                  ->paginate(6)
                  ->setpath('');
            $data->appends(array('search' => $request->input('isearch'),));
          if(count($data)>0){
          return view('players.players')->withData($data);
          } 
          return view('players.players')->withMessage("-----------------------No Results Found! Please try again-----------------------");
        }
        else{
            $result = DB::table('passport')
                    ->select('passport.*', 'players.*')
                    ->join('players', 'passport.players_id', '=', 'players.id')->paginate(6);
          return view('players.players', ["data"=>$result]);
        }
  }

 public function registrationform()
    {
        return view('players.registrationform');
    }

 public function uploadlist()
    {
        return view('players.uploadlist');
    }

  public function addrecord(Request $request, $id)
  {
    if(isset($_POST['save']))
    {
        $idd = rand();
        date_default_timezone_set("Asia/Manila");
        $time = date("Y-m-d h:i");

        /*Enrollment*/
        $regdate = $request->input('regdate');
        $regdata = array("id"=>$idd, "players_id"=>$idd, "agents_id"=>$idd, "users_id"=>$id, "enrollment_date"=>$regdate, "created_at"=>$time, "updated_at"=>$time);
        DB::table('enrollment')->insert($regdata);

        /*Players data*/
        if($request->file('pf') != "")
        {
          $file1 = $request->file('pf');
          $destinationPath1 = 'uploads/playerspf';
          $originalFile1 = $file1->getClientOriginalName();
          $file1->move($destinationPath1, $originalFile1);
          $fname = $request->input('fname');
          $lname = $request->input('lname');
          $bday = $request->input('bday');
          $age = $request->input('age');
          $sex = $request->input('sex');
          $nationality = $request->input('nationality');
          $playersdata = array("id"=>$idd, "fname"=>$fname, "lname"=>$lname, "bday"=>$bday, "age"=>$age, "sex"=>$sex, "nationality"=>$nationality, "profilepic"=>$originalFile1, "created_at"=>$time, "updated_at"=>$time);
          DB::table('players')->insert($playersdata);
        }else{
          $defaultimage = 'defaultimage.png';
          $fname = $request->input('fname');
          $lname = $request->input('lname');
          $bday = $request->input('bday');
          $age = $request->input('age');
          $sex = $request->input('sex');
          $nationality = $request->input('nationality');
          $playersdata = array("id"=>$idd, "fname"=>$fname, "lname"=>$lname, "bday"=>$bday, "age"=>$age, "sex"=>$sex, "nationality"=>$nationality, "profilepic"=>$defaultimage, "created_at"=>$time, "updated_at"=>$time);
          DB::table('players')->insert($playersdata);
        }

        /*Players Passport data*/
        $arrival = $request->input('arrival');
        $expiry = $request->input('expiry');
        $file2 = $request->file('passport');
        $destinationPath2 = 'uploads/playerspassport';
        $originalFile2 = $file2->getClientOriginalName();
        $file2->move($destinationPath2, $originalFile2);
        $playerspass = array("id"=>$idd, "players_id"=>$idd, "date_expiry"=>$expiry, "date_arrival"=>$arrival, "image"=>$originalFile2, "created_at"=>$time, "updated_at"=>$time);
        DB::table('passport')->insert($playerspass);

        /*Agents data*/
        if($request->input('afname') != "" and $request->input('alname') != "" and $request->input('apf') != "" and $request->input('apassport') != "")
        {
          $afname = $request->input('afname');
          $alname = $request->input('alname');
          $file3 = $request->file('apf');
          $destinationPath3 = 'uploads/agentspf';
          $originalFile3 = $file3->getClientOriginalName();
          $file3->move($destinationPath3, $originalFile3);
          $file4 = $request->file('apassport');
          $destinationPath4 = 'uploads/agentspassport';
          $originalFile4 = $file4->getClientOriginalName();
          $file4->move($destinationPath4, $originalFile4);

          $agentsdata = array("id"=>$idd, "fname"=>$afname, "lname"=>$alname, "pf"=>$originalFile3, "passport"=>$originalFile4, "created_at"=>$time, "updated_at"=>$time);
          DB::table('agent')->insert($agentsdata);

        }elseif($request->input('afname') != "" and $request->input('alname') != "")
        {
          $afname = $request->input('afname');
          $alname = $request->input('alname');
          $defimg = 'defaultimage.png';

          $agentsdata = array("id"=>$idd, "fname"=>$afname, "lname"=>$alname, "pf"=>$defimg, "created_at"=>$time, "updated_at"=>$time);
          DB::table('agent')->insert($agentsdata);

        }elseif($request->input('afname') != "" and $request->input('alname') != "" and $request->input('apf') != "")
        {
          $afname = $request->input('afname');
          $alname = $request->input('alname');
          $file3 = $request->file('apf');
          $destinationPath3 = 'uploads/agentspf';
          $originalFile3 = $file3->getClientOriginalName();
          $file3->move($destinationPath3, $originalFile3);

          $agentsdata = array("id"=>$idd, "fname"=>$afname, "lname"=>$alname, "pf"=>$originalFile3, "created_at"=>$time, "updated_at"=>$time);
          DB::table('agent')->insert($agentsdata);

        }elseif($request->input('afname') != "" and $request->input('alname') != "" and $request->input('apassport') != "")
        {
          $afname = $request->input('afname');
          $alname = $request->input('alname');
          $defimg = 'defaultimage.png';
          $file4 = $request->file('apassport');
          $destinationPath4 = 'uploads/agentspassport';
          $originalFile4 = $file4->getClientOriginalName();
          $file4->move($destinationPath4, $originalFile4);

          $agentsdata = array("id"=>$idd, "fname"=>$afname, "lname"=>$alname, "pf"=>$defimg, "passport"=>$originalFile4, "created_at"=>$time, "updated_at"=>$time);
          DB::table('agent')->insert($agentsdata);

        }else{
          $agentsdata = array("id"=>$idd, "created_at"=>$time, "updated_at"=>$time);
          DB::table('agent')->insert($agentsdata);
        }

        session()->flash('status', 'New Record has been Successfully Added.');
        return redirect()->back(); 

    }else{
      return redirect()->back(); 
    }
  }

  public function playerpf($id)
  {
    $player = DB::table('passport')
    ->select('passport.*', 'players.*')
    ->join('players', 'passport.players_id', '=', 'players.id')
    ->where('passport.players_id', '=', $id)->first();

    return view('players.profile', compact('player'));
  }

}
