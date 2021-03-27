@extends('layouts/structure')
@section('content')
<div class="content-main">
    <h1>edit Inventory <span class="user-id">ID-USER {{Auth::user()->id}}</span></h1>
    <hr>
    <form method="GET" action="/inv_put/{{$inventaris[0]->id_inventaris}}" class="form">
        @csrf
        <div class="form-group">

            <label for="jenis_product" class="form-label">Type</label>
            <?php
                // echo "<br/>";
                $id_inv = $inventaris[0]->id_jenis;
                // echo "<br/>";
                $id_rng = $ruangan[0]->id_ruangan;
                // echo "<br/>";
                $id_jns = $jenis[0]->id_jenis;
            ?>
            {{-- {{dd($id_jns)}} --}}
            <select name="jenis_product" id="jenis_product" class="form-select">
                <option>----</option>
                @foreach ($allJenis as $jns)
                <option @if ($id_inv===$jns->id_jenis) selected @endif value="{{$jns->id_jenis}}">{{$jns->nama_jenis}}
                </option>
                @endforeach
            </select>
            <label for="nama_inventaris" class="form-label">Name Product</label>
            <input type="text" name="nama_inventaris" id="nama_inventaris" class="form-control"
                value="{{$inventaris[0]->nama_inventaris}}">
        </div>
        <div class="form-group">
            <label for="keterangan" class="form-label ">Keterangan</label>
            <input type="text" name="keterangan_inventaris" id="keterangan" class="form-control"
                value="{{$inventaris[0]->keterangan_inventaris}}">
        </div>
        <div class="form-group">
            <label for="qty" class="form-label ">Qty</label>
            <input type="number" name="qty" style="width: 200px" id="qty" class="form-control"
                value="{{$inventaris[0]->jumlah_inventaris}}">
        </div>
        <div class="form-group">
            <label for="ruangan" class="form-label">Ruangan</label>
            <select name="ruangan" id="ruangan" class="form-select">
                <option selected>----</option>
                @foreach ($allRuangan as $rng)
                <option @if ($id_rng===$rng->id_ruangan) selected @endif
                    value="{{$rng->id_ruangan}}">{{$rng->nama_ruangan}} - {{$rng->keterangan_ruangan}}</option>
                @endforeach
            </select>
        </div>
        <input type="submit" value="Submit" class="btn btn-primary">
    </form>
</div>
<script>
</script>
@endsection
