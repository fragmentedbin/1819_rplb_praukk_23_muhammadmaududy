<?php

namespace App\Http\Controllers;

use App\Ruangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
// use App\Http\Controllers\Auth\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class RuanganController extends Controller
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

        if (Gate::allows('viewAny')){
            $ruangan = Ruangan::all();
            return view('ruangan', compact('ruangan'));
        }elseif (Gate::denies('viewAny')) {
            return view('/home');
        }else{
            return view('/home');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/rng_add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = DB::table('ruangan')->orderBy('id_ruangan', 'desc')->first();
        // dd($id->id_ruangan);
        $dd = $id->id_ruangan + 1;
        $id_user = Auth::user()->id;
        Ruangan::create([
            'nama_ruangan' => $request->nama_ruangan,
            'kode_ruangan' => "RNG"."/".$dd."/".date("ymd").date("his").$id_user,
            'keterangan_ruangan' => $request->keterangan_ruangan,
        ]);
        return redirect('/ruangan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ruangan  $ruangan
     * @return \Illuminate\Http\Response
     */
    public function show(Ruangan $ruangan)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ruangan  $ruangan
     * @return \Illuminate\Http\Response
     */
    public function edit(Ruangan $rng_id)
    {
        $ruangan = DB::table('ruangan')->where('id_ruangan', $rng_id->id_ruangan)->get();
        $rng = $ruangan[0];
        // dd($ruangan->id_ruangan);
        return view('/rng_edit', compact('rng'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ruangan  $ruangan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ruangan $rng_id)
    {
        // dd($rng_id);
        // $ruangan = Ruangan::all();
        $ruangan_update = Ruangan::where('id_ruangan', $rng_id -> id_ruangan)->update([
            'nama_ruangan' => $request->nama_ruangan,
            'keterangan_ruangan' => $request->keterangan_ruangan
        ]);
        return redirect('/ruangan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ruangan  $ruangan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ruangan $rng_id)
    {
        Ruangan::destroy($rng_id->id_ruangan);
        return redirect('/ruangan')->with('status', 'Customer Remove success fully!');
    }
}
