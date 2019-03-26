<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Hash;

class usercontroller extends Controller
{

     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('api');


    }


    //
    public function index(){

            return User::latest()->paginate(10);


    }
    public function store(Request $request){

        $this->validate ($request,[
            'name'  => 'required|string|max:191',
            'email' => 'required|string|email|max:191|unique:users',
            'password' => 'required|string|min:6'
        ]);

        return User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'type' => $request['type'],
            'bio' => $request['bio'],
            'photo' => $request['photo'],
            'password' => Hash::make ($request['password']),
        ]);
    }

    public function update(Request $Request, $id)

    {

        $user = user::findOrFail($id); 


         $this->validate ($Request,[
            'name'  => 'required|string|max:191',
            'email' => 'required|string|email|max:191|unique:users,email,'.$user->id,
            'password' => 'sometimes|min:6'
        ]);

        $user->update($Request-> all());

        return  ['message' => 'prueba update'];
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return ['message'=> 'User Deleted'];
    }
}


