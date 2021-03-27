<?php

namespace App\Http\Controllers;

use App\{Inventaris, DetailPinjamanView};
// use Illuminate\Http\Controllers\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
// use App\Http\Controllers\Auth\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


class InventarisController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $viewpinjaman = DetailPinjamanView::all();

        $inventaris = Inventaris::all();
        return view('index', compact('inventaris'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jenis = DB::table('jenis')->get();
        $ruangan = DB::table('ruangan')->get();
        return view ('inv_add', compact('jenis', 'ruangan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    // dd();
        // $id_inv = Inventaris::max('id_inventaris') + 1;
        $id = DB::table('inventaris')->orderBy('id_inventaris', 'desc')->first();
        $dd = $id->id_inventaris + 1;
        $id_user = Auth::user()->id;
        // $id_inv = Inventaris::max('id_inventaris') + 1;
        Inventaris::create([
            'nama_inventaris' => $request->nama_inventaris,
            'kode_inventaris' => "INV/"."$dd"."/".date("ymd").date("his")."/"."$request->ruangan"."/"."$request->jenis_product"."/"."$id_user",
            'keterangan_inventaris' => $request->keterangan_inventaris,
            'jumlah_inventaris' => $request->qty,
            'tanggal_register_inventaris' => date('Y-m-d'),
            'id_ruang' => $request->ruangan,
            'id_jenis' => $request->jenis_product,
            'id_user' => $id_user
        ]);
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Inventaris  $inventaris
     * @return \Illuminate\Http\Response
     */
    public function show(Inventaris $inv)
    {
        return view('inv_detail', compact('inv'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Inventaris  $inventaris
     * @return \Illuminate\Http\Response
     */
    public function edit(Inventaris $inv)
    {
        // $user = DB::table('users')->where('name', 'John')->first();
        $allJenis = DB::table('jenis')->get();
        $allRuangan = DB::table('ruangan')->get();
        $jenis = DB::table('jenis')->where('id_jenis', "$inv->id_jenis")->get();
        $ruangan = DB::table('ruangan')->where('id_ruangan', "$inv->id_ruang")->get();
        // dd($allJenis, $allRuangan);
        $inventaris = DB::table('inventaris')->where('id_inventaris', "$inv->id_inventaris")->get();

        // $ruangan = DB::table('ruangan')->get();
        return view('inv_edit', compact('inventaris', 'jenis', 'ruangan', 'allJenis', 'allRuangan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Inventaris  $inventaris
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inventaris $inv)
    {
        // dd($request->keterangan_inventaris, $inv->id_jenis);

        Inventaris::where('id_inventaris', $inv->id_inventaris)->update([
            'nama_inventaris' => $request->nama_inventaris,
            'keterangan_inventaris' => $request->keterangan_inventaris,
            'jumlah_inventaris' => $request->qty,
            'id_jenis' => $request->jenis_product,
            'id_ruang' => $request->ruangan
        ]);
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Inventaris  $inventaris
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inventaris $inv)
    {
        Inventaris::destroy($inv->id_inventaris);
        // $id =  DB::table('inventaris')->where('id_inventaris', "$inv->id_inventaris")->first();
        // $id = Inventaris::findOrFail($inv->id_inventaris);
        // $stf = $id->delete();
        // echo $inv->id_inventaris;
        return redirect('/')->with('status', 'Customer Remove success fully!');
    }
}
