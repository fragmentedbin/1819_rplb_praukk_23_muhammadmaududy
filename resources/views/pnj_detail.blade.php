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
            <img class="img-fluid add-pict-preview" src="{{asset('img/inventaris/'. $inv->id_inventaris .'/'. $inv->img_inventaris)}}"
                alt="{{$inv->nama_inventaris}}">
        </div>
    </div>

    {{-- {{dd('img/inventaris/'. Auth::user()->id .'/'. $inv->img_inventaris )}} --}}
    <h1>Detail Peminjaman <span class="user-id">ID-USER #{{Auth::user()->id}}</span></h1>
    {{-- {{dd($pnj_id)}} --}}
    <hr>
    <div>
    </div>
    <ul>
        <li>
            ID Pinjaman : {{$pnj_id->id_peminjaman}}
        </li>
        <li>
            Nama Barang : {{$inv->nama_inventaris}}
        </li>
        <li>
            Keterangan : {{$inv->keterangan_inventaris}}
        </li>
        <li>
            Tanggal barang masuk : {{$pnj_id->tanggal_peminjaman}}
        </li>
        <li>
            Masa tenggang S/d : {{$pnj_id->tanggal_kembali}}
        </li>
        <li>
            Quantity : {{$pnj_id->jumlah_pinjaman}}
        </li>
        {{-- <li>
            @if ($pnj_id->approval == 1)
            Status :<span style="color: rgb(0, 189, 0);"> Accepted</span> 
            
            @elseif ($pnj_id->approval == 0)
            Status :<span style="color: rgb(255, 24, 24);"> Declaine</span> 
                
            @elseif ($pnj_id->approval == NULL)
            Status :<span style="color: rgb(99, 99, 99);"> Pending</span> 
            

            @endif
        </li> --}}
    </ul>
    @can('employee-stuff')
        
    <a class="btn btn-danger" href="/edit/{{$pnj_id->id_peminjaman}}"><i class="fas fa-pen"></i></a>
    <form action="/delete/{{$pnj_id->id_peminjaman}}" style="display: contents;" method="POST">
        @method('delete')
        @csrf
        <button type="submit" class="btn btn-warning" href=""><i class="fas fa-trash"></i></button>
    </form>
    <form action="/pnj_approve/{{$pnj_id->id_peminjaman}}" style="display: contents;" method="POST">
    @method('POST')
    @csrf
    <button type="submit" class="btn btn-success"><i class="fas fa-check"></i></button>
    </form>
    @endcan
</div>
<script>
</script>
@endsection
{{-- {{dd($inv)}} --}}
