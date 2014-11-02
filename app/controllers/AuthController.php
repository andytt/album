<?php

class AuthController extends \BaseController {
    public function login()
    {
        if ('GET' === Request::getMethod()) {
            return View::make('layouts.guest');
        }

        $validation = Validator::make(Input::all(), [
            'email' => ['required'],
            'password' => ['required']
        ]);

        if ($validation->fails()) {
            return Redirect::back()->withInput(Input::except('password'))->withErrors($validation);
        }

        if (Auth::attempt([
            'email' => Input::get('email', null),
            'password' => Input::get('password', null)
        ])) {
            return Redirect::to('/');
        }

        return Redirect::back()->withInput(Input::except('password'));
    }

    public function logout()
    {
        Auth::logout();

        return Redirect::action('users.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('layouts.guest');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $validation = Validator::make(Input::all(), [
            'email' => ['required', 'unique:users'],
            'password' => ['required', 'confirmed']
        ]);

        if ($validation->fails()) {
            return Redirect::back()->withInput(Input::except('password'))->withErrors($validation);
        }

        $user = User::create([
            'email' => Input::get('email', null),
            'password' => Hash::make(Input::get('password', null))
        ]);

        if (Auth::attempt([
            'email' => Input::get('email', null),
            'password' => Input::get('password', null)
        ])) {
            return Redirect::to('/');
        }

        return Redirect::back()->withInput(Input::except('password'));
    }
}
