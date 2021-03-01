@extends('layout/structure')
@section('content')
<div class="content-main">
    <h1>Pinjaman</h1>
    <table class="table display nowrap" style="width: 100%" id="pinjaman-table">
        <thead>
            <tr>
                <th>#</th>
                <th scope="col">ID_peminjam</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Tanggal Kembali</th>
                <th scope="col">Status Peminjaman</th>
                <th scope="col">ID_pegawawai</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>1</th>
                <td>PJM-1</td>
                <td>12/1/2020</td>
                <td>13/1/2020</td>
                <td>ON</td>
                <td>PGW-1</td>
            </tr>
            <tr>
                <th>2</th>
                <td>PJM-2</td>
                <td>22/2/2020</td>
                <td>23/2/2020</td>
                <td>ON</td>
                <td>PGW-2</td>
            </tr>
        </tbody>
    </table>
</div>
<script>


</script>
@endsection
