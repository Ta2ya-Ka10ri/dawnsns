<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ValiController extends Controller
{
    public function index()
    {
      return view('profile_vali');
    }

public function receiveData(Request $request)
    {
      $request->validate([
       'UserName' => 'required|string|min:4,max:12',
        'MailAddress' => 'required|string|min:4,max:12|unique:users,mail',
        'Password' => 'required|string|min:4,max:12|unique:users,password',
        'Bio' => 'max:200',
        'Icon Image' => 'file|image',
      ]);

      return view('profile_vali', ['status' => true]);
    }
}