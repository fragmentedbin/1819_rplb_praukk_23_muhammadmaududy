@extends('layout/structure')
@section('content')
<div class="content-main">
    <h1>Inventaris</h1>
    <table class="table display nowrap" style="width: 100%" id="inventaris-table">
        <thead>
            <tr>
                <th>#</th>
                <th scope="col">ID</th>
                <th scope="col">ID Jenis</th>
                <th scope="col">Tanggal</th>
                <th scope="col">ID Ruang</th>
                <th scope="col">Kode Inventaris</th>
                <th scope="col">ID Petugas</th>
                <th scope="col">Nama</th>
                <th scope="col">Kode</th>
                <th scope="col">Keterangan</th>
                <th scope="col">Jumlah</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>1</th>
                <th>INV-1</th>
                <td>JNS-1</td>
                <td>12/02/2002</td>
                <td>RNG-1</td>
                <td>1-1</td>
                <td>PTG-1</td>
                <td>Battery</td>
                <td>00001</td>
                <td>Baik</td>
                <td>5</td>
            </tr>
            <tr>
                <th>2</th>
                <th>INV-2</th>
                <td>JNS-2</td>
                <td>22/02/2002</td>
                <td>RNG-2</td>
                <td>2-2</td>
                <td>PTG-2</td>
                <td>PCB</td>
                <td>00002</td>
                <td>Baik</td>
                <td>7</td>
            </tr>
           
        </tbody>
    </table>
</div>
<script>
    

</script>
@endsection