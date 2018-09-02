<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lowker;
use App\TipeBerkas;
use App\TipePekerjaan;
use App\Notifikasi;
use App\User;
use Auth;

class AdminLowkerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
     {
       $this->middleware('admin');
     }

    public function index()
    {
      $lowkers = Lowker::where('status', 1)->get();
      return view('back.content.lowker-index', compact('lowkers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $tipeberkas = TipeBerkas::all();
      $tipepekerjaan = TipePekerjaan::all();
      return view('back.content.lowker-create', compact('tipeberkas', 'tipepekerjaan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $suratlamaran = 0;
      $cv = 0;
      $ktp = 0;
      $ijazah = 0;
      $transkripnilai = 0;
      $pasfoto = 0;
      $skck= 0;
      $suratketerangandokter = 0;

      if ($request->suratlamaran == "on") {
        $suratlamaran = 1;
      }
      if ($request->cv == "on") {
        $cv = 1;
      }
      if ($request->ktp == "on") {
        $ktp = 1;
      }
      if ($request->ijazah == "on") {
        $ijazah = 1;
      }
      if ($request->transkripnilai == "on") {
        $transkripnilai = 1;
      }
      if ($request->pasfoto == "on") {
        $pasfoto = 1;
      }
      if ($request->skck == "on") {
        $skck = 1;
      }
      if ($request->suratketerangandokter == "on") {
        $suratketerangandokter = 1;
      }

      Auth::user()->lowkers()->create([
        'tipeberkas_id' => $request->tipeberkas_id,
        'tipepekerjaan_id' => $request->tipepekerjaan_id,
        'judul' => $request->judul,
        'isi' => $request->isi,
        'namaperusahaan' => $request->namaperusahaan,
        'alamatperusahaan' => $request->alamatperusahaan,
        'email_perusahaan' => $request->email_perusahaan,
        'no_hp_perusahaan' => $request->no_hp_perusahaan,
        'penempatan' => $request->penempatan,
        'bagian' => $request->bagian,
        'suratlamaran' => $suratlamaran,
        'cv' => $cv,
        'ktp' => $ktp,
        'ijazah' => $ijazah,
        'transkripnilai' => $transkripnilai,
        'pasfoto' => $pasfoto,
        'skck' => $skck,
        'suratketerangandokter' => $suratketerangandokter,
        'penutupan' => $request->penutupan,
        'status' => 1
      ]);

      $lastlowker = Lowker::latest()->where('status',1)->first();

      $users = User::all();
      foreach ($users as $user) {
        $minatexplode = explode(",",$user->interest);
        foreach ($minatexplode as $minat) {
          if (strtolower($minat) == strtolower($lastlowker->bagian)) {
            $notifikasi = new Notifikasi;
            $notifikasi->sender_id = Auth::user()->id;
            $notifikasi->receiver_id = $user->id;
            $notifikasi->lowker_id = $lastlowker->id;
            $notifikasi->judul = "Lowongan Pekerjaan Baru Yang Cocok Untuk Kamu";
            $notifikasi->isi = "Ada lowongan pekerjaan yang baru saja ditambahkan dan sepertinya cocok untuk kamu.";
            $notifikasi->save();
          } else {

          }
        }
      }

      return redirect()->route('kelola-lowker.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $lowker = Lowker::find($id);
      return view('back.content.lowker-detail', compact('lowker'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $tipeberkas = TipeBerkas::all();
      $tipepekerjaan = TipePekerjaan::all();
      $lowker = Lowker::find($id);

      return view('back.content.lowker-edit', compact('lowker', 'tipeberkas', 'tipepekerjaan'));
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
      $suratlamaran = 0;
      $cv = 0;
      $ktp = 0;
      $ijazah = 0;
      $transkripnilai = 0;
      $pasfoto = 0;
      $skck= 0;
      $suratketerangandokter = 0;

      if ($request->suratlamaran == "on") {
        $suratlamaran = 1;
      }
      if ($request->cv == "on") {
        $cv = 1;
      }
      if ($request->ktp == "on") {
        $ktp = 1;
      }
      if ($request->ijazah == "on") {
        $ijazah = 1;
      }
      if ($request->transkripnilai == "on") {
        $transkripnilai = 1;
      }
      if ($request->pasfoto == "on") {
        $pasfoto = 1;
      }
      if ($request->skck == "on") {
        $skck = 1;
      }
      if ($request->suratketerangandokter == "on") {
        $suratketerangandokter = 1;
      }

      $lowker = Lowker::find($id);
      $lowker->tipeberkas_id = $request->tipeberkas_id;
      $lowker->tipepekerjaan_id = $request->tipepekerjaan_id;
      $lowker->judul = $request->judul ;
      $lowker->isi = $request->isi;
      $lowker->namaperusahaan = $request->namaperusahaan;
      $lowker->alamatperusahaan = $request->alamatperusahaan;
      $lowker->email_perusahaan = $request->email_perusahaan;
      $lowker->no_hp_perusahaan = $request->no_hp_perusahaan;
      $lowker->penempatan = $request->penempatan;
      $lowker->bagian = $request->bagian;
      $lowker->suratlamaran = $suratlamaran;
      $lowker->cv = $cv;
      $lowker->ktp = $ktp;
      $lowker->ijazah = $ijazah;
      $lowker->transkripnilai = $transkripnilai;
      $lowker->pasfoto = $pasfoto;
      $lowker->skck = $skck;
      $lowker->suratketerangandokter = $suratketerangandokter;
      $lowker->penutupan = $request->penutupan;
      $lowker->status = 1;
      $lowker->update();

      return redirect()->route('kelola-lowker.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $lowker = Lowker::find($id);
      $lowker->delete();
      return back();
    }

    public function tambahanUser()
    {
      $lowkers = Lowker::where('status', 0)->get();
      return view('back.content.lowker-user', compact('lowkers'));
    }

    public function terima($id)
    {
      $lowker = Lowker::find($id);
      $lowker->status = 1;
      $lowker->update();

      $notifikasi = new Notifikasi;
      $notifikasi->sender_id = Auth::user()->id;
      $notifikasi->receiver_id = $lowker->user_id;
      $notifikasi->lowker_id = $lowker->id;
      $notifikasi->judul = "Lowongan Pekerjaan Berhasil Ditambahkan";
      $notifikasi->isi = "Lowongan Pekerjaan yang anda tambahkan telah berhasil ditambahkan.";
      $notifikasi->save();

      $users = User::all();
      foreach ($users as $user) {
        $minatexplode = explode(",",$user->interest);
        foreach ($minatexplode as $minat) {
          if (strtolower($minat) == strtolower($lowker->bagian)) {
            $notifikasi = new Notifikasi;
            $notifikasi->sender_id = Auth::user()->id;
            $notifikasi->receiver_id = $user->id;
            $notifikasi->lowker_id = $lowker->id;
            $notifikasi->judul = "Lowongan Pekerjaan Baru Yang Cocok Untuk Kamu";
            $notifikasi->isi = "Ada lowongan pekerjaan yang baru saja ditambahkan dan sepertinya cocok untuk kamu.";
            $notifikasi->save();
          } else {

          }
        }
      }

      return back();
    }

    public function tolak($id)
    {
      $lowker = Lowker::find($id);
      $lowker->status = 2;
      $lowker->update();

      $notifikasi = new Notifikasi;
      $notifikasi->sender_id = Auth::user()->id;
      $notifikasi->receiver_id = $lowker->user_id;
      $notifikasi->lowker_id = $lowker->id;
      $notifikasi->judul = "Lowongan Pekerjaan Ditolak";
      $notifikasi->isi = "Lowongan Pekerjaan yang anda tambahkan ditolak.";
      $notifikasi->save();

      return back();
    }
}
