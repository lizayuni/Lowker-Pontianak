<?php

namespace App\Http\Controllers;

use App\Pesan;
use Illuminate\Http\Request;
use Auth;
use App\User;

class PesanController extends Controller
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

    public function index($id)
    {
        $penerima = User::find($id);
        $pesandarisaya = Pesan::where('sender_id', Auth::user()->id)->where('receiver_id', $penerima->id)->get();
        $pesanutksaya = Pesan::where('receiver_id', Auth::user()->id)->where('sender_id', $penerima->id)->get();
        $pesans = $pesandarisaya->merge($pesanutksaya);
        $pesans = $pesans->sortBy('created_at');
        return view('front.content.pesan-index', compact('penerima', 'pesandarisaya', 'pesanutksaya', 'pesans'));
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
    public function store(Request $request, $id)
    {
        $pesan = new Pesan;
        $pesan->sender_id = Auth::user()->id;
        $pesan->receiver_id = $id;
        $pesan->isi = $request->isi;
        $pesan->save();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pesan  $pesan
     * @return \Illuminate\Http\Response
     */
    public function show(Pesan $pesan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pesan  $pesan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pesan $pesan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pesan  $pesan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pesan $pesan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pesan  $pesan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pesan $pesan)
    {
        //
    }

    public function pesanSaya()
    {
      $pesans = Pesan::latest()->where('receiver_id', Auth::user()->id)->groupBy('sender_id')->get();
      return view('front.content.pesan-saya', compact('pesans'));
    }
}
