<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lowker;
use App\TipeBerkas;
use App\TipePekerjaan;
use App\Notifikasi;
use Auth;
use DB;

class LowkerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
     {
       $this->middleware('auth', ['except' => ['filterTipeBerkas', 'filterTipePekerjaan']]);
     }

    public function index()
    {
      if (Auth::check()) {
        $minatexplode = explode(",", Auth::user()->interest);
        $jumlahminat = count($minatexplode);


        for ($i=0; $i < $jumlahminat; $i++) { 
          $minat = $minatexplode[$i];
          $lowkersementara[] = DB::table('lowkers')->where('status',1)->where('bagian', $minat)->get();
        }

        $jlhlowkersementara = count($lowkersementara);

        for ($i=0; $i < $jlhlowkersementara; $i++) { 
          if ($i == 0) {
            $lowkers = $lowkersementara[0];
          } else
          {
            $lowkers = $lowkers->merge($lowkersementara[$i]);
          }
        }

        $jlhlowker = $lowkers->count();
        // dd(Lowker::all());

      }

      return view('front.content.lowker', compact('lowkers', 'jlhlowker'));
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
      return view('front.content.lowker-create', compact('tipeberkas', 'tipepekerjaan'));
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

      $lowker = Auth::user()->lowkers()->create([
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
        'status' => 0
      ]);

      $notifikasi = new Notifikasi;
      $notifikasi->sender_id = Auth::user()->id;
      $notifikasi->receiver_id = 1;
      $notifikasi->lowker_id = $lowker->id;
      $notifikasi->judul = "Lowongan Pekerjaan Baru Ditambahkan Oleh Pengguna";
      $notifikasi->isi = "Ada lowongan pekerjaan yang baru saja ditambahkan oleh pengguna, verifikasi lamaran.";
      $notifikasi->save();

      return redirect()->route('front.lowkerSaya');
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
      $komentars = DB::table('comments')->latest()->where('commentable_type', 'App\Lowker')->where('commentable_id', $lowker->id)->get();
      return view('front.content.lowker-detail', compact('lowker', 'komentars'));
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

    public function filterTipePekerjaan($id)
    {
      $lowkers = Lowker::latest()->where('tipepekerjaan_id', $id)->where('status',1)->paginate(5);
      $jlhlowker = Lowker::where('status',1)->get()->count();
      $jlhlowkerfilter = Lowker::where('tipepekerjaan_id', $id)->where('status',1)->get()->count();
      return view('front.content.lowker-filter', compact('lowkers', 'jlhlowker', 'jlhlowkerfilter'));
    }

    public function filterTipeBerkas($id)
    {
      $lowkers = Lowker::latest()->where('tipeberkas_id', $id)->where('status',1)->paginate(5);
      $jlhlowker = Lowker::where('status',1)->get()->count();
      $jlhlowkerfilter = Lowker::where('tipeberkas_id', $id)->where('status',1)->get()->count();
      return view('front.content.lowker-filter', compact('lowkers', 'jlhlowker', 'jlhlowkerfilter'));
    }

    public function cari(Request $request)
    {
      $judul = '';
      $bagian  = '';
      $tipepekerjaan = '';

      if ($request->judul != '') {
        $judul = $request->judul;
      }

      if ($request->bagian != '') {
        $bagian = $request->bagian;
      }

      if ($request->tipepekerjaan_id != 0) {
        $tipepekerjaan = $request->tipepekerjaan_id;
      }

      $lowkers = Lowker::where('judul','like','%'.$judul.'%')->where('bagian','like','%'.$bagian.'%')->where('tipepekerjaan_id','like','%'.$tipepekerjaan.'%')
        ->orderBy('id')
        ->paginate(5);
        $lowkersfilter = Lowker::where('judul','like','%'.$judul.'%')->where('bagian','like','%'.$bagian.'%')->where('tipepekerjaan_id','like','%'.$tipepekerjaan.'%')
          ->orderBy('id')->get();
      $jlhlowker = Lowker::where('status',1)->get()->count();
      $jlhlowkerfilter = $lowkersfilter->count();
      return view('front.content.lowker-filter', compact('lowkers', 'jlhlowker', 'jlhlowkerfilter'));
    }
}
