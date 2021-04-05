@extends('layouts/structure')
@section('content')
<div class="content-main">
    <div class="title-content">
        <h1>Log Activity</h1>
    </div>

    <table class="table table-striped display nowrap" style="width: 100%" id="inventaris-table">
        <thead>
            <tr>
                <th>NO</th>
                <th scope="col">ID-LOG</th>
                <th scope="col">ID-USER</th>
                <th scope="col">User</th>
                <th scope="col">Aktifitas</th>
                <th scope="col">Time</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($user as $usr)
            <tr>
                <th>{{$loop->iteration}}</th>
                <td>{{$usr->id_log}}</td>
                <td>{{$usr->id_user}}</td>
                <td>{{$usr->name}}</td>
                <td>{{$usr->activities}}</td>
                <td>{{$usr->created_at}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<script>


</script>
@endsection
