@extends('layouts/structure')
@section('content')
<?php
$effectiveDate = date('Y-m-d');
$effectiveDate = date('Y-m-d', strtotime("+3 months", strtotime($effectiveDate)));
?>
<div class="content-main">
    <h1>add Ruangan <span class="user-id">ID-USER #{{Auth::user()->id}}</span></h1>
    <hr>
    <form method="POST" action="/rng_add" class="form" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="nama_ruangan" class="form-label ">Nama Ruangan</label>
            <input type="text" name="nama_ruangan" placeholder="rpl b" id="nama_ruangan" class="form-control">
        </div>
        <div class="form-group">
            <label for="keterangan_ruangan" class="form-label ">Keterangan Ruangan</label>
            <input type="text" name="keterangan_ruangan" placeholder="ruangan rpl b" id="keterangan_ruangan" class="form-control">
        </div>
        <input type="submit" value="Submit" class="btn btn-primary">
    </form>
</div>
<script>
</script>
@endsection