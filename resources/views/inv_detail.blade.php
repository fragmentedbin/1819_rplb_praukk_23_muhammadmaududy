@extends('layouts/structure')
@section('content')
<div class="content-main">
    <h1>Detail Inventory <span class="user-id">ID-USER #{{Auth::user()->id}}</span></h1>
    <hr>
    <ul>
        <li>
            ID : {{$inv->id_inventaris}}
        </li>
        <li>
            Kode Inventaris : {{$inv->kode_inventaris}}
        </li>
        <li>
            Nama Barang : {{$inv->nama_inventaris}}
        </li>
        <li>
            Keterangan : {{$inv->keterangan_inventaris}}
        </li>
        <li>
            Tanggal barang masuk : {{$inv->tanggal_register_inventaris}}
        </li>
        <li>
            Quantity : {{$inv->jumlah_inventaris}}
        </li>
        <li>
            ID Jenis : {{$inv->id_jenis}}
        </li>
        <li>
            ID Ruangan : {{$inv->id_ruang}}
        </li>
        <li>
            ID User : {{$inv->id_user}}
        </li>
    </ul>
</div>
<script>
</script>
@endsection
{{-- {{dd($inv)}} --}}
