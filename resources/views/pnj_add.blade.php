@extends('layouts/structure')
@section('content')
<?php
$effectiveDate = date('Y-m-d');
$effectiveDate = date('Y-m-d', strtotime("+3 months", strtotime($effectiveDate)));
?>
<div class="content-main">
    <h1>add Peminjaman <span class="user-id">ID-USER #{{Auth::user()->id}}</span></h1>
    <hr>
    <form method="POST" action="/pnj_add" class="form" enctype="multipart/form-data">
        @csrf
        {{-- <input type="number" name="usr" value="{{Auth::user()->id}}"> --}}
        <div class="form-group">
            <label for="jenis_product" class="form-label">Type</label>
            <select name="jenis_product" id="jenis_product" class="form-select">
                <option selected>----</option>
                @foreach ($inventaris as $inv)
                <option value="{{$inv->id_inventaris}}">{{$inv->nama_inventaris}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="qty" class="form-label ">Qty</label>
            <input type="number" max="{{$inv->jumlah_inventaris}}" name="qty" style="width: 200px" id="qty" class="form-control">
        </div>
        <div class="form-group">
            <label for="date" class="form-label">Dikembalikan Sebelum : <span
                    style="color: rgb(255, 45, 45);">{{$effectiveDate}}</span></label>
            {{-- <input type="date" disabled name="date" style="width: 200px" id="date" class="form-control" value=""> --}}
        </div>

        <input type="submit" value="Submit" class="btn btn-primary">
    </form>
</div>
<script>
</script>
@endsection