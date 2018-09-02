<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Lowker;
use App\Lamaran;

class AdminPagesController extends Controller
{
  public function __construct()
  {
    $this->middleware('admin');
  }

  public function index()
  {
    $jlhusers = User::all()->count();
    $jlhlowkers = Lowker::where('status', 1)->get()->count();
    $jlhlamarans = Lamaran::all()->count();
    return view('back.content.beranda', compact('jlhusers', 'jlhlowkers', 'jlhlamarans'));
  }
  
  public function kelolaUser()
  {
      $users = User::all();
      return view('back.content.user-index', compact('users'));
  }
  
  public function userDestroy($id)
  {
      $user = User::find($id);
      $user->delete();
      return back();
  }
}
