<?php

namespace App\Http\Controllers;
use App\User;
use Auth;
use App\Lowker;
use App\Lamaran;
use App\Notifikasi;

use Illuminate\Http\Request;

class LamaranController extends Controller
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
        $lowker = Lowker::find($id);
        return view('front.content.lamaran-index', compact('lowker'));
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
        // Inisiasi Variabel
        $suratlamarannew = "";
        $cvnew = "";
        $ktpnew = "";
        $ijazahnew = "";
        $transkripnilainew = "";
        $pasfotonew = "";
        $skcknew = "";
        $suratketerangandokternew = "";

        // Proses Upload File
        if ($request->hasFile('suratlamaran')) {
            $suratlamaran = $request->file('suratlamaran');
            $suratlamaranext = $suratlamaran->getClientOriginalExtension();
            $suratlamarannew = Auth::user()->name."_".rand(10000,1001238).".".$suratlamaranext;
            $suratlamaran->move('uploads/lamaran',$suratlamarannew);
        }
        if ($request->hasFile('cv')) {
            $cv = $request->file('cv');
            $cvext = $cv->getClientOriginalExtension();
            $cvnew = Auth::user()->name."_".rand(10000,1001238).".".$cvext;
            $cv->move('uploads/lamaran',$cvnew);
        }
        if ($request->hasFile('ktp')) {
            $ktp = $request->file('ktp');
            $ktpext = $ktp->getClientOriginalExtension();
            $ktpnew = Auth::user()->name."_".rand(10000,1001238).".".$ktpext;
            $ktp->move('uploads/lamaran',$ktpnew);
        }
        if ($request->hasFile('ijazah')) {
            $ijazah = $request->file('ijazah');
            $ijazahext = $ijazah->getClientOriginalExtension();
            $ijazahnew = Auth::user()->name."_".rand(10000,1001238).".".$ijazahext;
            $ijazah->move('uploads/lamaran',$ijazahnew);
        }
        if ($request->hasFile('transkripnilai')) {
            $transkripnilai = $request->file('transkripnilai');
            $transkripnilaiext = $transkripnilai->getClientOriginalExtension();
            $transkripnilainew = Auth::user()->name."_".rand(10000,1001238).".".$transkripnilaiext;
            $transkripnilai->move('uploads/lamaran',$transkripnilainew);
        }
        if ($request->hasFile('pasfoto')) {
            $pasfoto = $request->file('pasfoto');
            $pasfotoext = $pasfoto->getClientOriginalExtension();
            $pasfotonew = Auth::user()->name."_".rand(10000,1001238).".".$pasfotoext;
            $pasfoto->move('uploads/lamaran',$pasfotonew);
        }
        if ($request->hasFile('skck')) {
            $skck = $request->file('skck');
            $skckext = $skck->getClientOriginalExtension();
            $skcknew = Auth::user()->name."_".rand(10000,1001238).".".$skckext;
            $skck->move('uploads/lamaran',$skcknew);
        }
        if ($request->hasFile('suratketerangandokter')) {
            $suratketerangandokter = $request->file('suratketerangandokter');
            $suratketerangandokterext = $suratketerangandokter->getClientOriginalExtension();
            $suratketerangandokternew = Auth::user()->name."_".rand(10000,1001238).".".$suratketerangandokterext;
            $suratketerangandokter->move('uploads/lamaran',$suratketerangandokternew);
        }

        // Proses Input DB
        $lamaran = new Lamaran;
        $lamaran->user_id = Auth::user()->id;
        $lamaran->lowker_id = $id;
        $lamaran->suratlamaran = $suratlamarannew;
        $lamaran->cv = $cvnew;
        $lamaran->ktp = $ktpnew;
        $lamaran->ijazah = $ijazahnew;
        $lamaran->transkripnilai = $transkripnilainew;
        $lamaran->pasfoto = $pasfotonew;
        $lamaran->skck = $skcknew;
        $lamaran->suratketerangandokter = $suratketerangandokternew;
        $lamaran->save();

        $lowker = Lowker::find($id);

        $notifikasi = new Notifikasi;
        $notifikasi->sender_id = Auth::user()->id;
        $notifikasi->receiver_id = $lowker->user_id;
        $notifikasi->lowker_id = $lowker->id;
        $notifikasi->judul = "Lamaran Baru";
        $notifikasi->isi = "Ada lamaran baru di lowongan pekerjaan anda ".$lowker->judul;
        $notifikasi->save();

        return redirect()->route('lowongan-pekerjaan.index');
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
