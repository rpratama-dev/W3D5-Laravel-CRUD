
@extends('layouts/master')

@section('content')

	<!-- PRODUCT LIST -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Pertanyaan Terbaru</h3>
        <div class="card-tools">
        	<a href="{{ url('/pertanyaan/create') }}">
				<button type="button" class="btn btn-tool btn-primary text-dark">
				Tanya
				</button>
          	</a> 
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body p-0">
        <ul class="products-list product-list-in-card pl-2 pr-2">
        <!-- ITEM -->
        @foreach ($datas as $data)
          <li class="item">
            <div class="product-img">
              <img src="{{ asset('/adminlte/dist/img/default-150x150.png') }}" alt="Product Image" class="img-size-50">
            </div>
            <div class="product-info">
              <a href="{{ '/pertanyaan/'.$data->id }}" class="product-title">{{ $data->judul }}
                <span class="badge badge-info float-right">10 Jawaban</span></a>
              <span class="product-description">
                {!! $data->isi !!}
              </span>
            </div>
          </li>
        @endforeach
        </ul>
    </div> 

@endsection
