<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Formulir;
use App\Anggota;
use Session;

class FormulirController extends Controller
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
        $formulirs = Formulir::all();
        return view('formulir.index', compact('formulirs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $anggotas = Anggota::all();
        return view('formulir.create', compact('anggotas'));
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
            'nomer_formulir' => 'required|max:255|unique:formulirs',
            'biaya' => 'required',
            'id_anggota' => 'required|max:255',

        ]);

         $formulirs = new Formulir;
         $formulirs->nomer_formulir = $request->nomer_formulir;
         $formulirs->biaya = $request->biaya;
         $formulirs->id_anggota = $request->id_anggota;
         $formulirs->save();
         Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil menyimpan <b>$formulirs->nomer_formulir</b>"
        ]);
        return redirect()->route('formulir.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $formulirs = Formulir::findOrFail($id);
         $anggotas = Anggota::findOrFail($id);
         return view('formulir.show', compact('formulirs','anggotas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $formulirs = Formulir::findOrFail($id);
        $anggotas = Anggota::all();
        $selectedanggota = Formulir::findOrFail($id)->id_anggota;
        return view('formulir.edit', compact('formulirs','anggotas','selectedanggota'));
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
            'nomer_formulir' => 'required|max:255',
            'biaya' => 'required',
            'id_anggota' => 'required|max:255',

        ]);

         $formulirs = Formulir::findOrFail($id);
         $formulirs->nomer_formulir = $request->nomer_formulir;
         $formulirs->biaya = $request->biaya;
         $formulirs->id_anggota = $request->id_anggota;
         $formulirs->save();
        return redirect()->route('formulir.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $formulirs = Formulir::findOrFail($id);
        $formulirs->delete();
       return redirect()->route('formulir.index');
    }
}
