<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobfair;
use Image;
use Auth;

class AdminJobfairController extends Controller
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
      $jobfairs = Jobfair::latest()->get();
      return view('back.content.jobfair-index', compact('jobfairs'));
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
      if ($request->hasFile('foto')) {
        $foto = $request->file('foto');
        $filename = time().'.'.$foto->getClientOriginalExtension();
        Image::make($foto)->resize(848,450)->save( public_path('/uploads/jobfair/'.$filename));
      } else {
        $filename = '';
      }

      Auth::user()->jobfairs()->create([
        'judul' => $request->judul,
        'isi' => $request->isi,
        'foto' => $filename,
        'alamat' => $request->alamat,
        'tglmulai' => $request->tglmulai,
        'tglselesai' => $request->tglselesai,
        'htm' => $request->htm,
        'status' => 1,
      ]);

      return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jobfair = Jobfair::find($id);
        return view('back.content.jobfair-detail', compact('jobfair'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jobfair = Jobfair::find($id);
        return view('back.content.jobfair-edit', compact('jobfair'));
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
        $jobfair = Jobfair::find($id);

        if ($request->hasFile('foto')) {
          $foto = $request->file('foto');
          $filename = time().'.'.$foto->getClientOriginalExtension();
          Image::make($foto)->resize(848,450)->save( public_path('/uploads/jobfair/'.$filename));
        }

        if ($request->hasFile('foto')) {
          $jobfair->judul = $request->judul;
          $jobfair->isi = $request->isi;
          $jobfair->foto = $filename;
          $jobfair->alamat = $request->alamat;
          $jobfair->tglmulai = $request->tglmulai;
          $jobfair->tglselesai = $request->tglselesai;
          $jobfair->htm = $request->htm;
          $jobfair->update();
        } else {
          $jobfair->judul = $request->judul;
          $jobfair->isi = $request->isi;
          $jobfair->alamat = $request->alamat;
          $jobfair->tglmulai = $request->tglmulai;
          $jobfair->tglselesai = $request->tglselesai;
          $jobfair->htm = $request->htm;
          $jobfair->update();
        }

        return redirect()->route('kelola-jobfair.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jobfair = Jobfair::find($id);
        $jobfair->delete();
        return back();
    }
}
