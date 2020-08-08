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
      {{ strip_tags($data->isi) }}
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
      <form class="float-left mr-3" method="post" action="/pertanyaan/{{ $data->id }}">  
        @method('PUT')
        @csrf  
        <a type="submit" class="btn btn-danger btn-sm text-light">Delete</a>
      </form>  
      <form class="float-auto ml-3"> 
        <a href= "/pertanyaan/{{ $data->id }}/edit" class="btn btn-primary btn-sm text-light">Edit</a> 
      </form> 
    </div> 
</div>

@endsection
