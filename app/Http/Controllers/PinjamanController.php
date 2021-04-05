<?php

namespace App\Http\Controllers;

use App\{Pinjaman, DetailPinjamanView, DetailPinjaman, Inventaris};
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class PinjamanController extends Controller
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
        if (Gate::allows('viewAny')) {
            $detailPinjaman = Pinjaman::all();
            $nama_inv = DetailPinjamanView::select('nama_inventaris')->get();
            // dd($nama_inv[0]);
        return view('/pinjaman', compact('detailPinjaman', 'nama_inv'));
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
        $id = DB::table('peminjaman')->orderBy('id_peminjaman', 'desc')->first();
        $dd = $id->id_peminjaman + 1;

        
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
            'id_peminjaman'=> $dd, 
        ]);
        return redirect('/pinjaman');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pinjaman  $pinjaman
     * @return \Illuminate\Http\Response
     */
    public function show(Pinjaman $pnj_id)
    {
        $inv =  DB::table('inventaris')->where('id_inventaris', "$pnj_id->id_inventaris")->first();
        
        // dd($pnj_id);
        // $inv = Inventaris::all();
        return view('/pnj_detail', compact('pnj_id', 'inv'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pinjaman  $pinjaman
     * @return \Illuminate\Http\Response
     */
    public function edit(Pinjaman $pnj_id)
    {
        // $jenis = DB::table('jenis')->get();
        // $getJenis = DB::table('inventaris')->select('id_jenis')->where('id_inventaris', "$pnj_id->id_inventaris")->get();
        // $selectedJenis = $getJenis[0]->id_jenis;
        // dd($selectedJenis, $jenis);
        $inventaris = Inventaris::all();
        $getInventaris = DB::table('inventaris')->where('id_inventaris',"$pnj_id->id_inventaris")->get();
        $selectedInv = $getInventaris[0]->id_inventaris;

        $getStatus = DB::table('peminjaman')->where('id_peminjaman', $pnj_id->id_peminjaman)->get();
        $selectedStatus = $getStatus[0]->status_peminjaman;
        // dd();
        return view('/pnj_edit', compact('pnj_id', 'selectedInv', 'selectedStatus', 'inventaris'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pinjaman  $pinjaman
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pinjaman $pnj_id)
    {
        // dd($request->qty);
        
        $pinjaman = Pinjaman::where('id_peminjaman', $pnj_id->id_peminjaman)->update([
            'id_inventaris' => $request->jenis_inventaris,
            'jumlah_pinjaman' => $request->qty,
            'status_peminjaman' => $request->status,
        ]);

        $detailPinjaman = DetailPinjaman::where('id_peminjaman', $pnj_id->id_peminjaman)->update([
            'id_inventaris' => $request->jenis_inventaris,
            'jumlah_pinjaman' => $request->qty,
        ]);
        return redirect('/pinjaman');
    }

    public function approve(Request $request, Pinjaman $pnj_id){
        Pinjaman::where('id_peminjaman', $pnj_id->id_peminjaman)->update([
            'approval' => 1,
        ]);
        return redirect('/pinjaman');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pinjaman  $pinjaman
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pinjaman $pnj_id)
    {
        Pinjaman::destroy($pnj_id->id_peminjaman);
        return redirect('/')->with('status', 'Customer Remove success fully!');
    }
}
