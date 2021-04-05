@extends('layouts/structure')
@section('content')
<?php
$effectiveDate = date('Y-m-d');
$effectiveDate = date('Y-m-d', strtotime("+3 months", strtotime($effectiveDate)));
?>
<div class="content-main">
    <h1>add Peminjaman <span class="user-id">ID-USER #{{Auth::user()->id}}</span></h1>
    <hr>
    <form method="POST" action="/usr_add" class="form" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="nama" class="form-label ">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control">
        </div>
        <div class="form-group">
            <label for="email" class="form-label ">email</label>
            <input type="email" name="email" id="email" class="form-control">
        </div>
        <div class="form-group">
            <label for="password" class="form-label ">Password</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>
        <div class="form-group">
            <label for="nip" class="form-label ">NIP</label>
            <input type="number" name="nip" id="nip" class="form-control">
        </div>
        <div class="form-group">
            <label for="alamat" class="form-label ">Alamat</label>
            <input type="text" name="alamat" id="alamat" class="form-control">
        </div>
        <div class="form-group">
            <label for="level" class="form-label" style="color: rgb(255, 73, 73) ;">Level</label>
            <select name="level" id="level" class="form-select">
                <option selected>----</option>
                @foreach ($level as $lvl)
                <option value="{{$lvl->id_level}}">{{$lvl->nama_level}}</option>
                @endforeach
            </select>
        </div>

        <input type="submit" value="Submit" class="btn btn-primary">
    </form>
</div>
<script>
</script>
@endsection