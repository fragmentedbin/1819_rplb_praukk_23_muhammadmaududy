@extends('layouts/structure')
@section('content')
<div class="content-main">
    <div class="title-content">
        <h1>Inventaris</h1>
        {{-- {{dd($user->id_level)}} --}}

        @can('only-admin')
        <span class="btn-add p-2"><a href="inv_add" class="btn btn-primary"><i
                    class="fa fa-plus"></i></a></span>
        @endcan
        {{-- @can('', App\Inventaris::class)
        @endcan --}}

    </div>

    <table class="table table-striped display nowrap" style="width: 100%" id="inventaris-table">
        <thead>
            <tr>
                <th>NO</th>
                <th scope="col">ID-INV</th>
                <th scope="col">Kode Inventaris</th>
                <th scope="col">Nama</th>
                <th scope="col">Keterangan</th>
                <th scope="col">Tanggal Registrasi</th>
                <th scope="col">Jumlah</th>
                <th scope="col">ID-JNS</th>
                <th scope="col">ID Ruang</th>
                <th scope="col">ID User</th>
                <th scope="col">action</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($inventaris as $inv)
            <tr>
                <th>{{$loop->iteration}}</th>
                <td>INV-{{$inv->id_inventaris}}</td>
                <td>{{$inv->kode_inventaris}}</td>
                <td>{{$inv->nama_inventaris}}</td>
                <td>{{$inv->keterangan_inventaris}}</td>
                <td>{{$inv->tanggal_register_inventaris}}</td>
                <td>{{$inv->jumlah_inventaris}}</td>
                <td>{{$inv->id_jenis}}</td>
                <td>{{$inv->id_ruang}}</td>
                <td>{{$inv->id_user}}</td>
                <th>
                    <a class="btn btn-primary" href="/show/{{$inv->id_inventaris}}"><i class="fas fa-eye"></i></a>
                    @can('employee-stuff')
                    <a class="btn btn-danger" href="/edit/{{$inv->id_inventaris}}"><i class="fas fa-pen"></i></a>
                    <form action="/delete/{{$inv->id_inventaris}}" style="display: contents;" method="POST">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-warning" href=""><i class="fas fa-trash"></i></button>
                    </form>
                    @endcan
                </th>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<script>


</script>
@endsection
