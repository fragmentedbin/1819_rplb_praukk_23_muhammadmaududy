@extends('layout/structure')
@section('content')
<div class="content-main">
    <h1>Pinjaman</h1>
    <table class="table display nowrap" style="width: 100%" id="pinjaman-table">
        <thead>
            <tr>
                <th scope="col">NO</th>
                <th scope="col">ID-DPJ</th>
                <th scope="col">ID-INV</th>
                <th scope="col">ID-Peminjam</th>
                <th scope="col">Quantity</th>
                <th scope="col">Tanggal Peminjaman</th>
                <th scope="col">Tanggal Kembali</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pinjaman as $view)
            <tr>
                <th>{{$loop->iteration}}</th>
                <td>DPJ-{{$view->id_detail_pinjaman}}</td>
                <td>INV-{{$view->id_inventaris}}</td>
                <td>{{$view->id_peminjam}}</td>
                <td>{{$view->jumlah_pinjaman}}</td>
                <td>{{$view->tanggal_peminjaman}}</td>
                <td>{{$view->tanggal_kembali}}</td>
                <th>
                    <a class="btn btn-danger" href=""><i class="fas fa-pen"></i></a>
                    <a class="btn btn-warning" href=""><i class="fas fa-trash"></i></a>
                </th>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<script>


</script>
@endsection
