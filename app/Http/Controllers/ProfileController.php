<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use Image;
use App\Lowker;
use App\Lamaran;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
      $this->middleware('auth');
    }

    public function index()
    {
        $user = User::find(Auth::user()->id);
        $bagians = Lowker::latest()->groupBy('bagian')->get();
        return view('front.content.profile-index', compact('user', 'bagians'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $lowkers = Lowker::where('user_id', $user->id)->latest()->get();
        return view('front.content.profile-show', compact('user', 'lowkers'));
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

    public function ubahProfil(Request $request)
    {
      $user = User::find(Auth::user()->id);

      $minatfix = '';

      if ($request->semua == "semua") {
          $minats = Lowker::latest()->groupBy('bagian')->get();
          foreach ($minats as $minat) {
              $minatall[] = $minat->bagian.",";
          }
          $minatfix = implode("", $minatall);
      } else {
         $loop = $request->get('interest');
         if ($loop != '') {
             foreach ($loop as $value){
                $minatloop[] = $value;
             }
             $minatfix = implode("", $minatloop);
         }
      }

      if ($request->hasFile('avatar')) {
        $foto = $request->file('avatar');
        $filename = time().'.'.$foto->getClientOriginalExtension();
        Image::make($foto)->save( public_path('/uploads/avatar/'.$filename));

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->no_ktp = $request->no_ktp;
        $user->no_hp = $request->no_hp;
        $user->alamat = $request->alamat;
        $user->foto = $filename;
        $user->interest = $minatfix;
        $user->update();
      } else {
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->no_ktp = $request->no_ktp;
        $user->no_hp = $request->no_hp;
        $user->alamat = $request->alamat;
        $user->interest = $minatfix;
        $user->update();
      }
      return back();
    }

    public function lamaranSaya()
    {
      $lamarans = Lamaran::latest()->where('user_id', Auth::user()->id)->get();
      return view('front.content.profile-lamaransaya', compact('lamarans'));
    }

    public function lowkerSaya()
    {
      $lowkers = Lowker::latest()->where('user_id', Auth::user()->id)->get();
      return view('front.content.profile-lowkersaya', compact('lowkers'));
    }

    public function lamaranDiLowkerSaya($id)
    {
      $lowker = Lowker::find($id);
      if (Auth::user()->id != $lowker->user_id) {
        return back();
      }
      $lamarans = Lamaran::latest()->where('lowker_id', $id)->get();
      return view('front.content.profile-lamarandilowkersaya', compact('lowker', 'lamarans'));
    }

    public function lamaranDetail($id, $user_id)
    {
      $lowker = Lowker::find($id);
      $lamaran = Lamaran::where('lowker_id', $lowker->id)->where('user_id', $user_id)->latest()->first();
      return view('front.content.profile-lamarandetail', compact('lowker', 'lamaran'));
    }
}
