@extends('layouts/structure')
@section('content')
<div class="content-main">
    <div class="title-content">
        <h1>Ruangan</h1>
        <span class="btn-add p-2"><a href="/rng_add" class="btn btn-primary"><i
                    class="fa fa-plus"></i></a></span>
    </div>
    <table class="table table-striped display nowrap" style="width: 100%" id="ruangan-table">
        <thead>
            <tr>
                <th scope="col">NO</th>
                <th scope="col">ID-RNG</th>
                <th scope="col">Kode Ruangan</th>
                <th scope="col">Nama Ruangan</th>
                <th scope="col">Keterangan Ruangan</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ruangan as $view)
            <tr>
                <th>{{$loop->iteration}}</th>
                <td>{{$view->id_ruangan}}</td>
                <td>{{$view->kode_ruangan}}</td>
                <td>{{$view->nama_ruangan}}</td>
                <td>{{$view->keterangan_ruangan}}</td>
                <th>
                    <a class="btn btn-primary" href="/rng_show/{{$view->id_ruangan}}"><i class="fas fa-eye"></i></a>
                    @can('employee-stuff')
                    <a class="btn btn-danger" href="/rng_edit/{{$view->id_ruangan}}"><i class="fas fa-pen"></i></a>
                    <form action="/rng_delete/{{$view->id_ruangan}}" style="display: contents;" method="POST">
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