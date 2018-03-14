<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kursusnama;
use Session;

class KursusController extends Controller
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
        //menampilkan semua data
        $kursusnamas = Kursusnama::all();
        
        //menampilkan data post melalui table posts
        return view('kursus.index', compact('kursusnamas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kursus.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_kursus' => 'required|max:255|unique:kursusnamas',
            'nama' => 'required|max:255|unique:kursusnamas',
            'alamat' => 'required|max:255|unique:kursusnamas',
            'jadwal' => 'required|max:255',
            'biaya' => 'required|max:255',

        ]);

         $kursusnamas = new Kursusnama;
         $kursusnamas->kode_kursus = $request->kode_kursus;
         $kursusnamas->nama = $request->nama;
         $kursusnamas->alamat = $request->alamat;
         $kursusnamas->jadwal = $request->jadwal;
         $kursusnamas->biaya = $request->biaya;
         $kursusnamas->save();
         Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil menyimpan <b>$kursusnamas->nama</b>"
        ]);
        return redirect()->route('kursus.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //menampilkan semua data
        $kursusnamas = Kursusnama::findOrFail($id);
        
        //menampilkan data post melalui table posts
        return view('kursus.show', compact('kursusnamas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //menampilkan semua data
        $kursusnamas = Kursusnama::findOrFail($id);
        
        //menampilkan data post melalui table posts
        return view('kursus.edit', compact('kursusnamas'));
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
        $request->validate([
            'kode_kursus' => 'required|max:255',
            'alamat' => 'required|max:255',
            'nama' => 'required|max:255',
            'jadwal' => 'required|max:255',
            'biaya' => 'required|max:255',

        ]);

         $kursusnamas = Kursusnama::findOrFail($id);
         $kursusnamas->kode_kursus = $request->kode_kursus;
         $kursusnamas->nama = $request->nama;
         $kursusnamas->alamat = $request->alamat;
         $kursusnamas->jadwal = $request->jadwal;
         $kursusnamas->biaya = $request->biaya;
         $kursusnamas->save();
        return redirect()->route('kursus.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kursusnamas = Kursusnama::findOrFail($id);
        $kursusnamas->delete();
        return redirect()->route('kursus.index');
    }
}
