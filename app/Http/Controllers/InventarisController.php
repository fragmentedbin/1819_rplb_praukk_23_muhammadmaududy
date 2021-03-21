<?php

namespace App\Http\Controllers;

use App\{Inventaris, DetailPinjamanView};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InventarisController extends Controller
{
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
    //     dd(
    //         $request->nama_inventaris,
    //         $request->qty
    // );
        $id_inv = Inventaris::max('id_inventaris') + 1;
        Inventaris::create([
            'nama_inventaris' => $request->nama_inventaris,
            'kode_inventaris' => "INV/"."$id_inv"."/".date("ymd").date("his")."/"."$request->ruangan"."/"."$request->jenis_product",
            'keterangan_inventaris' => $request->keterangan_inventaris,
            'jumlah_inventaris' => $request->qty,
            'tanggal_register_inventaris' => date('Y-m-d'),
            'id_ruang' => $request->ruangan,
            'id_jenis' => $request->jenis_product,
            'id_user' => "1"
        ]);
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Inventaris  $inventaris
     * @return \Illuminate\Http\Response
     */
    public function show(Inventaris $inventaris)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Inventaris  $inventaris
     * @return \Illuminate\Http\Response
     */
    public function edit(Inventaris $inventaris)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Inventaris  $inventaris
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inventaris $inventaris)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Inventaris  $inventaris
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inventaris $inventaris)
    {
        //
    }
}
