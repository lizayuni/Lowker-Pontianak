<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Image;
use App\Pengaduan;
use App\Jobfair;
use App\TipeBerkas;
use App\TipePekerjaan;
use App\Lowker;
use App\Notifikasi;
use DB;

class PagesController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth', ['except' => ['index', 'tentang']]);
  }

  public function pilihanlogin()
  {
    if (Auth::user()->role == "admin") {
      return redirect()->route('admin.beranda');
    } else {
      return redirect()->route('front.beranda');
    }
  }

  public function index()
  {
    $tipeberkases = TipeBerkas::all();
    $tipepekerjaans = TipePekerjaan::all();

    if (Auth::check()) {
      $minatexplode = explode(",", Auth::user()->interest);
      $jumlahminat = count($minatexplode);


      for ($i=0; $i < $jumlahminat; $i++) { 
        $minat = $minatexplode[$i];
        $lowkersementara[] = DB::table('lowkers')->where('status',1)->where('bagian', $minat)->take(5)->get();
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

    }

    return view('front.content.beranda', compact('tipeberkases', 'tipepekerjaans', 'lowkers', 'jlhlowker'));
  }

  public function kontak()
  {
    return view('front.content.kontak');
  }

  public function kontakCreate(Request $request)
  {
    if ($request->hasFile('foto')) {
      $foto = $request->file('foto');
      $filename = time().'.'.$foto->getClientOriginalExtension();
      Image::make($foto)->save( public_path('/uploads/pengaduan/'.$filename));
    } else {
      $filename = '';
    }

    Auth::user()->kontaks()->create([
      'judul' => $request->judul,
      'isi' => $request->isi,
      'foto' => $filename
    ]);

    $notifikasi = new Notifikasi;
    $notifikasi->sender_id = Auth::user()->id;
    $notifikasi->receiver_id = 1;
    $notifikasi->judul = "Pengaduan Baru Ditambahkan Oleh Pengguna";
    $notifikasi->isi = "Ada pengaduan yang baru saja ditambahkan oleh pengguna.";
    $notifikasi->save();

    return back();
  }

  public function jobfair()
  {
    $jobfairs = Jobfair::latest()->paginate(3);
    return view('front.content.jobfair', compact('jobfairs'));
  }

  public function jobfairDetail($id)
  {
    $jobfair = Jobfair::find($id);
    return view('front.content.jobfair-detail', compact('jobfair'));
  }

  public function tentang()
  {
    return view('front.content.tentang');
  }
}
