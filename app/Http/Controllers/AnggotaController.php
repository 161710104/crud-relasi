<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Anggota;
use App\Kursusnama;
use Session;

class AnggotaController extends Controller
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
        $anggotas = Anggota::with('Formulir')->get();
        return view('anggota.index', compact('anggotas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kursusnamas = Kursusnama::all();
        return view('anggota.create', compact('kursusnamas'));
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
            'nama' => 'required|max:255|unique:anggotas',
            'ttl' => 'required',
            'status_anggota' => 'required|max:255',
            'id_kursus' => 'required|max:255',

        ]);

         $anggotas = new Anggota;
         $anggotas->nama = $request->nama;
         $anggotas->ttl = $request->ttl;
         $anggotas->status_anggota = $request->status_anggota;
         $anggotas->id_kursus = $request->id_kursus;
         $anggotas->save();
         Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil menyimpan <b>$anggotas->nama</b>"
        ]);
        return redirect()->route('anggota.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $anggotas = Anggota::findOrFail($id);
        $kursusnamas = Kursusnama::findOrFail($id);
        return view('anggota.show', compact('anggotas','kursusnamas'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $anggotas = Anggota::findOrFail($id);
        $kursusnamas = Kursusnama::all();
        $selectedkursus = Anggota::findOrFail($id)->id_kursus;
        return view('anggota.edit', compact('anggotas','kursusnamas','selectedkursus'));
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
            'nama' => 'required|max:255',
            'ttl' => 'required',
            'status_anggota' => 'required|max:255',
            'id_kursus' => 'required|max:255',

        ]);

         $anggotas = Anggota::findOrFail($id);
         $anggotas->nama = $request->nama;
         $anggotas->ttl = $request->ttl;
         $anggotas->status_anggota = $request->status_anggota;
         $anggotas->id_kursus = $request->id_kursus;
         $anggotas->save();
        return redirect()->route('anggota.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $anggotas = Anggota::findOrFail($id);
        $anggotas->delete();
        return redirect()->route('anggota.index');
    }
}
