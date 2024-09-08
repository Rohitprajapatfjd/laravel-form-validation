<?php

namespace App\Http\Controllers;

use App\Http\Requests\adminRequest;
use App\Models\admin;
use DB;
use Hash;
use Illuminate\Http\Request;

class adminController extends Controller
{
    public function showData(){
        // $data = DB::table('admins')
        //             ->paginate('5',['*'],'no');

        $data = admin::paginate(5);
         return view('main',['data'=>$data]);
    }

    public function showForm(){
        return view('welcome');
    }

    public function addUser(adminRequest $req){
        
       $user = admin::insertOrIgnore([
             'name'=> $req->fullname,
             'email'=> $req->email,
             'city'=> $req->city,
             'age'=> $req->age,
             'password'=>Hash::make($req->password) 
       ]);

       if($user){
        return redirect()->route('home');
       }else{
        echo "<h1> Email already Exist </h1>";
       }
    }
}
