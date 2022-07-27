<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if ($user = Auth::user()) {
            if ($user->ceklevel == 'admin') {
                return redirect()->intended('admin');
            } elseif ($user->ceklevel == 'user') {
                return redirect()->intended('user');
            } elseif ($user->ceklevel == 'subsidi') {
                return redirect()->intended('user');
            }
        }

        return view(
            'login',
            [
                "title" => "Login"
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {
        // dd($request->all());

        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // if (Auth::attempt($credentials)) {
        //     $request->session()->regenerate();
        //     return redirect()->intended('user/home');
        // }

        // return back()->with('loginError', 'Login Gagal');

        // $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->ceklevel == 'admin') {
                return redirect()->intended('admin/home');
            } elseif ($user->ceklevel == 'user') {
                return redirect()->intended('user/home');
            } elseif ($user->ceklevel == 'subsidi') {
                return redirect()->intended('user/home');
            }
        }
        return back()->with('loginError', 'Login Gagal');


        // if (Auth::attempt($request->only('email', 'password'))) {
        //     return redirect('admin/dashboard');
        // }
        // return redirect('login');

        // if (Auth::user()->level === 'admin') {
        //     return redirect('admin/dashboard');
        // } else if (Auth::user()->level === 'user') {
        //     return redirect('user/home');
        // }
        // return redirect('login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {

        $request->session()->flush();
        Auth::logout();
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
