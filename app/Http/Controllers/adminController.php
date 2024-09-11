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
       
        // $user = admin::chunk(3 ,function($data){
        //         foreach ($data as $value) {
        //             return $value;
        //         }
        // });
            
        $user =  admin::lazy();

        return $user;

      
    }

    public function showForm(){
      
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
