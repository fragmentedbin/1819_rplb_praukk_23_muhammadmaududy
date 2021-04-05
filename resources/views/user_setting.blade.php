@extends('layouts/structure')
@section('content')
<div class="content-main">
    <div class="title-content">
        <h1>User Setting</h1>
        {{-- {{dd($user->id_level)}} --}}

        @can('only-admin')
        <span class="btn-add p-2"><a href="usr_add" class="btn btn-primary"><i class="fa fa-plus"></i></a></span>
        @endcan
        {{-- @can('', App\Inventaris::class)
        @endcan --}}

    </div>

    <table class="table display nowrap" style="width: 100%" id="userSetting-table">
        <thead>
            <tr>
                <th>NO</th>
                <th scope="col">ID-User</th>
                <th scope="col">Nama</th>
                <th scope="col">Email</th>
                <th scope="col">NIP</th>
                <th scope="col">Alamat</th>
                <th scope="col">Level</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($usr_id as $usr)
            @if ($usr->deleted_at == true)
            @elseif($usr->deleted_at == NULL)

            <tr>
                <th>{{$loop->iteration}}</th>
                <td>{{$usr->id}}</td>
                <td>{{$usr->nama_peminjam}}</td>
                <td>{{$usr->email}}</td>
                <td>{{$usr->nip}}</td>
                <td>{{$usr->alamat}}</td>
                <td>{{$usr->id_level}}</td>
                <th>
                    <a class="btn btn-primary" href="/show_usr/{{$usr->id}}"><i class="fas fa-eye"></i></a>
                    @can('only-admin')
                    <a class="btn btn-danger" href="/edit_usr/{{$usr->id}}"><i class="fas fa-pen"></i></a>
                    <form action="/user_delete/{{$usr->id}}" style="display: contents;" method="POST">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-warning"><i class="fas fa-trash"></i></button>
                    </form>
                    @endcan
                </th>
            </tr>
            @endif


            @endforeach
        </tbody>
    </table>
</div>
<script>


</script>
@endsection