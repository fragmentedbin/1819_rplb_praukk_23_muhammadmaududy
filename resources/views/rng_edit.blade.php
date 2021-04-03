@extends('layouts/structure')
@section('content')
{{-- {{dd($rng->nama_ruangan)}} --}}
<div class="content-main">
    <h1>edit Ruangan <span class="user-id">ID-USER {{Auth::user()->id}}</span></h1>
    <hr>
    <form method="POST" action="/rng_post/{{$rng->id_ruangan}}" class="form" enctype="multipart/form-data">
        @method('post')
        @csrf
        <div class="form-group">
            <label for="nama_ruangan" class="form-label ">Nama Ruangan</label>
            <input type="text" name="nama_ruangan" id="nama_ruangan" class="form-control"
                value="{{$rng->nama_ruangan}}">
        </div>
        <div class="form-group">
            <label for="keterangan_ruangan" class="form-label ">Keterangan Ruangan</label>
            <input type="text" name="keterangan_ruangan" id="keterangan_ruangan" class="form-control"
                value="{{$rng->keterangan_ruangan}}">
        </div>

        <input type="submit" value="Submit" class="btn btn-primary">
    </form>
</div>
<script>
</script>
@endsection