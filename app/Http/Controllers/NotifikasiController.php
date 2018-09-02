<?php

namespace App\Http\Controllers;

use App\Notifikasi;
use Illuminate\Http\Request;
use App\Lowker;
use App\Lamaran;
use Auth;

class NotifikasiController extends Controller
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
        $notifikasis = Notifikasi::latest()->where('receiver_id', Auth::user()->id)->get();
        return view('front.content.notifikasi-index', compact('notifikasis'));
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
     * @param  \App\Notifikasi  $notifikasi
     * @return \Illuminate\Http\Response
     */
    public function show(Notifikasi $notifikasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Notifikasi  $notifikasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Notifikasi $notifikasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Notifikasi  $notifikasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Notifikasi $notifikasi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Notifikasi  $notifikasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notifikasi $notifikasi)
    {
        //
    }

    public function lamaranDiterima($id, $user_id)
    {
      $lowker = Lowker::find($id);
      $lamaran = Lamaran::where('lowker_id', $lowker->id)->where('user_id', $user_id)->latest()->first();
      return view('front.content.profile-lamaranditerima', compact('lowker', 'lamaran'));
    }

    public function lamaranDiterimaPost($id, $user_id, Request $request)
    {
      $lowker = Lowker::find($id);
      $lamaran = Lamaran::where('lowker_id', $lowker->id)->where('user_id', $user_id)->latest()->first();

      $notifikasi = new Notifikasi;
      $notifikasi->sender_id = Auth::user()->id;
      $notifikasi->receiver_id = $lamaran->user_id;
      $notifikasi->lowker_id = $lamaran->lowker_id;
      $notifikasi->judul = $request->judul;
      $notifikasi->isi= $request->isi;
      $notifikasi->save();

      return redirect()->route('front.lowkerSaya');
    }

    public function lamaranDitolakPost($id, $user_id, Request $request)
    {
      $lowker = Lowker::find($id);
      $lamaran = Lamaran::where('lowker_id', $lowker->id)->where('user_id', $user_id)->latest()->first();

      $notifikasi = new Notifikasi;
      $notifikasi->sender_id = Auth::user()->id;
      $notifikasi->receiver_id = $lamaran->user_id;
      $notifikasi->lowker_id = $lamaran->lowker_id;
      $notifikasi->judul = "Lamaran Anda Ditolak";
      $notifikasi->isi= "Sayang sekali, lamaran anda telah ditolak. Coba lagi di lowongan pekerjaan lainnya.";
      $notifikasi->save();

      return redirect()->route('front.lowkerSaya');
    }

    public function done()
    {
      $notifikasis = Notifikasi::where('receiver_id', Auth::user()->id)->get();
      foreach ($notifikasis as $notif) {
        $notif = Notifikasi::find($notif->id);
        $notif->status = 1;
        $notif->update();
      }
      return redirect()->route('notifikasi.index');
    }

    public function adminDone()
    {
      $notifikasis = Notifikasi::where('receiver_id', Auth::user()->id)->get();
      foreach ($notifikasis as $notif) {
        $notif = Notifikasi::find($notif->id);
        $notif->status = 1;
        $notif->update();
      }
      return back();
    }
}
