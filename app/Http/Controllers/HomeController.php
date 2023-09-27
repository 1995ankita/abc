<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

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
       
        $users = User::all();
        return view('home',compact('users'));
    }
    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password'=>'required|min:8'
        ]);

        // $data =$request->all();
        // $data['created_by'] = Auth::user()->id;
       

        User::create($request->all());
        return redirect()->route('home')
                        ->with('success','User created successfully.');
    }

    public function edit(string $id)
    {
        $user = User::find($id);
        return view('user',compact('user'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
        ]);
        
        $user = User::find($id);
        $user->update($request->all());
        
       
        return redirect()->route('home')
        ->with('success', 'User Updated successfully');
       
            
    }

    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();
       // return redirect("home");
        return redirect()->route('home')
        ->with('success', 'User deleted successfully');
    }
   
}
