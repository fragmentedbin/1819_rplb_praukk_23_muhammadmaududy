@extends('layouts/structure')
@section('content')
<div class="content-main">
    <h1>add Inventory <span class="user-id">ID-USER #00001</span></h1>
    <hr>
    <form method="POST" action="/inv_add" class="form">
        @csrf
        <div class="form-group">
            <label for="jenis_product" class="form-label">Type</label>
            <select name="jenis_product" id="jenis_product" class="form-select">
                <option selected>----</option>
                @foreach ($jenis as $jns)
                    <option value="{{$jns->id_jenis}}">{{$jns->nama_jenis}}</option>
                @endforeach
            </select>
            <label for="nama_inventaris" class="form-label">Name Product</label>
            <input type="text" name="nama_inventaris" id="nama_inventaris" class="form-control">
        </div>
        <div class="form-group">
            <label for="keterangan" class="form-label ">Keterangan</label>
            <input type="text" name="keterangan_inventaris" id="keterangan" class="form-control">
        </div>
        <div class="form-group">
            <label for="qty" class="form-label ">Qty</label>
            <input type="number" name="qty" style="width: 200px" id="qty" class="form-control">
        </div>
        <div class="form-group">
            <label for="ruangan" class="form-label">Ruangan</label>
            <select name="ruangan" id="ruangan" class="form-select">
                <option selected>----</option>
                @foreach ($ruangan as $rng)
                    <option value="{{$rng->id_ruangan}}">{{$rng->nama_ruangan}} - {{$rng->keterangan_ruangan}}</option>
                @endforeach
            </select>
        </div>
        <input type="submit" value="Submit" class="btn btn-primary">
    </form>
</div>
<script>
</script>
@endsection