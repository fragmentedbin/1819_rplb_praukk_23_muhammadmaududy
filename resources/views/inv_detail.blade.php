@extends('layouts/structure')
@section('content')
<div class="content-main">
    <!-- Portfolio Item Heading -->
    <h1 class="my-4">
        <h1>{{$inv->nama_inventaris}}</h1>
    </h1>
    <!-- Portfolio Item Row -->
    <div class="row">

        <div class="col-md-8">
            <img class="img-fluid" src="{{asset('img/inventaris/'. $inv->id_inventaris .'/'. $inv->img_inventaris)}}"
                alt="" style="max-width: 550px">
        </div>
    </div>

    {{-- {{dd('img/inventaris/'. Auth::user()->id .'/'. $inv->img_inventaris )}} --}}
    <h1>Detail Inventory <span class="user-id">ID-USER #{{Auth::user()->id}}</span></h1>
    <hr>
    <div>
    </div>
    <ul>
        <li>
            ID : {{$inv->id_inventaris}}
        </li>
        <li>
            Kode Inventaris : {{$inv->kode_inventaris}}
        </li>
        <li>
            Nama Barang : {{$inv->nama_inventaris}}
        </li>
        <li>
            Keterangan : {{$inv->keterangan_inventaris}}
        </li>
        <li>
            Tanggal barang masuk : {{$inv->tanggal_register_inventaris}}
        </li>
        <li>
            Quantity : {{$inv->jumlah_inventaris}}
        </li>
        <li>
            ID Jenis : {{$inv->id_jenis}}
        </li>
        <li>
            ID Ruangan : {{$inv->id_ruang}}
        </li>
        <li>
            ID User : {{$inv->id_user}}
        </li>
    </ul>
    <a class="btn btn-danger" href="/edit/{{$inv->id_inventaris}}"><i class="fas fa-pen"></i></a>
    <form action="/delete/{{$inv->id_inventaris}}" style="display: contents;" method="POST">
        @method('delete')
        @csrf
        <button type="submit" class="btn btn-warning" href=""><i class="fas fa-trash"></i></button>
    </form>
</div>
<script>
</script>
@endsection
{{-- {{dd($inv)}} --}}