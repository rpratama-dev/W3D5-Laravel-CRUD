@extends('layouts/master')

@section('content')

<div class="card w-100 card-info"> 
    <div class="card-header">
      <h3 class="card-title">{{ $data->judul }}</h3>
      <span class="time float-right"><i class="fas fa-clock"></i> {{ $data->created_at }}</span>
    </div>
    <!-- /.card-header -->
    <!-- form start -->  
    <div class="card-body">
      {!! $data->isi !!}
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
      <form class="float-left mr-3" method="post" action="/pertanyaan/{{ $data->id }}">  
        @method('DELETE')
        @csrf  
        <button type="submit" class="btn btn-block btn-danger btn-sm text-light">Delete</button>
      </form>  
      <form class="float-auto ml-3"> 
        <a href= "/pertanyaan/{{ $data->id }}/edit" class="btn btn-primary btn-sm text-light">Edit</a> 
      </form> 
    </div> 
</div>

@endsection
