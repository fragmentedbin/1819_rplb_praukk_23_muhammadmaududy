@extends('layouts/structure')
@section('content')
{{-- {{dd($pnj_id)}} --}}
<div class="content-main">
    <h1>edit Peminjaman <span class="user-id">ID-USER {{Auth::user()->id}}</span></h1>
    <hr>
    <form method="POST" action="/pnj_post/{{$pnj_id->id_peminjaman}}" class="form" enctype="multipart/form-data">
        @method('post')
        @csrf
        <div class="form-group">
            <label for="jenis_inventaris" class="form-label ">Nama barang</label>
            <select name="jenis_inventaris" id="jenis_inventaris" class="form-select">
                <option>----</option>
                @foreach ($inventaris as $inv)
                {{-- {{dd($selectedInv)}} --}}
                <option {{$selectedInv." ". $inv->id_inventaris}} @if ($selectedInv === $inv->id_inventaris) selected @endif value="{{$inv->id_inventaris}}">{{$inv->nama_inventaris}}
                </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="qty" class="form-label ">Qty</label>
            <input type="number" name="qty" style="width: 200px" id="qty" class="form-control"
                value="{{$pnj_id->jumlah_pinjaman}}">
        </div>
        <div class="form-group">
            <label for="status" class="form-label ">Status Peminjaman</label>
            <select name="status" id="status" class="form-select"  style="width: 200px">
                <option>----</option>
                <option @if ($selectedStatus == "pending") selected @endif value="pending">Pending</option>
                <option @if ($selectedStatus == "decline") selected @endif value="decline">Decline</option>
                <option @if ($selectedStatus == "accepted") selected @endif value="accepted">Accepted</option>
            </select>
        </div>
        <input type="submit" value="Submit" class="btn btn-primary">
    </form>
</div>
<script>
</script>
@endsection
