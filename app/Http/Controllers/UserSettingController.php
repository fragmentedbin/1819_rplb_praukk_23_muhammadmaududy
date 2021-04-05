<?php

namespace App\Http\Controllers;

use App\User;
use App\Level;
use App\Peminjam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
// use App\Http\Controllers\Auth\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserSettingController extends Controller
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
        // ->join('orders', 'users.id', '=', 'orders.user_id')
        $usr_id = DB::table('users')
            ->join('peminjam', 'users.id', '=', 'peminjam.id_peminjam')
            ->select('users.*', 'peminjam.*')
            ->get();
        // dd($usr_id);
        return view('user_setting', compact('usr_id'));
        // ->select('league_name')
        // ->where('countries.country_name', $country)
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::all();
        $level = Level::all();
        return view('usr_add', compact('user','level'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $User = User::create([
            'name' => $request['nama'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'id_level' => $request->level,
        ]);

        $Peminjam = Peminjam::create([
            "nama_peminjam"=>$request->nama,
            "nip"=>$request->nip,
            "alamat"=>$request->alamat,
        ]);

        return redirect('/user_set');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user_id)
    {
        // dd($user_id);
        DB::beginTransaction();
        try {
            User::destroy($user_id->id);
            DB::commit();
            return redirect('/user_set')->with('success', 'user dengan id ' .$user_id->id. " berhasil di hapus");
        } catch (\Throwable $th) {
            return redirect('/user_set');
        }
    }
}
