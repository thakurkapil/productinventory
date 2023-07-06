<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users =User::get();
        return view('user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone_number' => ['required', 'string', 'max:10',],
            'password' => ['required', 'string', 'min:8' ],
            'gender' => ['required', 'string', 'max:255'],
            'age' => ['required', 'numeric'],
            'birth_date' => ['required', 'date'],
            'bio' => ['required', 'string'],
        ]);
        $data=$request->all();
        User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'age' => $data['age'],
            'gender' => $data['gender'],
            'birth_date' => $data['birth_date'],
            'bio' => $data['bio'],
            'phone_number' => $data['phone_number']

        ]);

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('user.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
    // dd($request);

    $request->validate([
        'first_name' => ['required', 'string', 'max:255'],
        'last_name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255'],
        'phone_number' => ['required', 'string', 'max:10',],
        'password' => ['required', 'string', 'min:8' ],
        'gender' => ['required', 'string', 'max:255'],
        'age' => ['required', 'numeric'],
        'birth_date' => ['required', 'date'],
        'bio' => ['required', 'string'],
    ]);
    $data =$request->all();
    $user->update([
        'first_name' => $data['first_name'],
        'last_name' => $data['last_name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password']),
        'age' => $data['age'],
        'gender' => $data['gender'],
        'birth_date' => $data['birth_date'],
        'bio' => $data['bio'],
        'phone_number' => $data['phone_number']

    ]);

    return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index');
    }
}
