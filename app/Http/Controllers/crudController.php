<?php

namespace App\Http\Controllers;

use App\Http\Requests\adminRequest;
use App\Models\admin;
use Hash;
use Illuminate\Http\Request;

class crudController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = admin::paginate(5);
        return view('main', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('welcome');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(adminRequest $req)
    {

        $user = admin::create([
            'name' => $req->fullname,
            'email' => $req->email,
            'city' => $req->city,
            'age' => $req->age,
            'password' => Hash::make($req->password)
        ]);
        if ($user) {
            return redirect()->route('crud.index')->with('status', 'Save Successfully');
        } else {
            echo "<h1> Email already Exist </h1>";
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $user = admin::findOrFail($id);

        return view('edit', ['data' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $req, string $id)
    {
        $req->validate([
            'fullname' => 'required|string',
            'email' => 'required|email',
            'city' => 'required|alpha',
             'age' => 'required|between:18,60|numeric',
        ]);

        $user = admin::where('id', $id)
            ->update([
                'name' => $req->fullname,
                'email' => $req->email,
                'city' => $req->city,
                'age' => $req->age,
            ]);
        if ($user) {
            return redirect()->route('crud.index')->with('status', 'Update Successfully');
        } else {
            echo "<h1> Email already Exist </h1>";
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = admin::destroy($id);
        if ($user) {
            return redirect()->route('crud.index')->with('delete', 'Delete Successfully');
        }
    }
}
