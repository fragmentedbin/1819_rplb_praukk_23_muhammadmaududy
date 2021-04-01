<?php

namespace App\Http\Controllers;

use App\{Pinjaman, DetailPinjamanView, DetailPinjaman, Inventaris};
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class PinjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::allows('viewAny')) {
            $detailPinjaman = DetailPinjamanView::all();
        return view('/pinjaman', compact('detailPinjaman'));
        }elseif (Gate::denies('viewAny')) {
            return view('/home');
        } else {
            return view('/home');
        }

        return view('pinjaman', compact('pinjaman'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $inventaris = Inventaris::all();
        return view('pnj_add', compact('inventaris'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id_user = Auth::user()->id;
        $effectiveDate = date('Y-m-d');
        $effectiveDate = date('Y-m-d', strtotime("+3 months", strtotime($effectiveDate)));
        
        $Pinjaman = Pinjaman::Create([
            'id_inventaris'=> $request-> jenis_product ,
            'jumlah_pinjaman'=> $request-> qty,
            'tanggal_peminjaman' => date("Y-m-d"),
            'tanggal_kembali' => $effectiveDate,
            'tanggal_dikembalikan' => NULL,
            'status_peminjaman' => "pending",
            'approval' => 0,
            'id_peminjam' => $id_user,
        ]);

        $Detail = DetailPinjaman::create([
            'id_inventaris'=> $request-> jenis_product,
            'jumlah_pinjaman'=> $request-> qty, 
            'id_peminjaman'=> $id_user, 
        ]);
        return redirect('/pinjaman');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pinjaman  $pinjaman
     * @return \Illuminate\Http\Response
     */
    public function show(Pinjaman $pinjaman)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pinjaman  $pinjaman
     * @return \Illuminate\Http\Response
     */
    public function edit(Pinjaman $pinjaman)
    {
        // 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pinjaman  $pinjaman
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pinjaman $pinjaman)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pinjaman  $pinjaman
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pinjaman $pinjaman)
    {
        //
    }
}
