@extends('layouts/structure')
@section('content')
<div class="content-main">
    <div class="title-content">
        <h1>Pinjaman</h1>
        <span class="btn-add ml-auto p-2 justify-content-end"><a href="pnj_add" class="btn btn-primary"><i
                    class="fa fa-plus"></i></a></span>
    </div>
    <table class="table table-striped display nowrap" style="width: 100%" id="pinjaman-table">
        <thead>
            <tr>
                <th scope="col">NO</th>
                <th scope="col">ID-DPJ</th>
                <th scope="col">ID-INV</th>
                <th scope="col">Nama-INV</th>
                <th scope="col">ID-Peminjam</th>
                <th scope="col">Quantity</th>
                <th scope="col">Tanggal Peminjaman</th>
                <th scope="col">Tanggal Kembali</th>
                <th scope="col">Tanggal dikembalikan</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($detailPinjaman as $view)
            <tr>
                <th>{{$loop->iteration}}</th>
                <td>DPJ-{{$view->id_peminjaman}}</td>
                <td>INV-{{$view->id_inventaris}}</td>
                <td>{{$nama_inv[0]->nama_inventaris}}</td>
                <td>{{$view->id_peminjam}}</td>
                <td>{{$view->jumlah_pinjaman}}</td>
                <td>{{$view->tanggal_peminjaman}}</td>
                <td>{{$view->tanggal_kembali}}</td>
                <td>
                    @if($view->tanggal_dikembalikan == NULL) Belum dikembalikan @endif
                    {{$view->tanggal_dikembalikan}}
                </td>
                <th>
                    <a class="btn btn-primary" href="/pnj_show/{{$view->id_peminjaman}}"><i class="fas fa-eye"></i></a>
                    @can('employee-stuff')
                    <a class="btn btn-danger" href="/pnj_edit/{{$view->id_peminjaman}}"><i class="fas fa-pen"></i></a>
                    <form action="/pnj_delete/{{$view->id_peminjaman}}" style="display: contents;" method="POST">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-warning" href=""><i class="fas fa-trash"></i></button>
                    </form>
                    @endcan
                    {{-- @can('employee-stuff')
                    @endcan --}}
                </th>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<script>


</script>
@endsection