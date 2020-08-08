@extends('layouts/master')

@push('style')
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/summernote/summernote-bs4.css') }}">
@endpush

@section('content')

<form action="{{ $href }}" method="post"> 
    <div class="card w-100">
        <div class="card-body">
            @if ($data->id != '')
            @method('PUT')
            @endif 
            <input type="hidden" name="txtID" value="{{ $data->id != '' ? $data->id : '' }}">
            @csrf 
            <div class="form-group">
                <label for="txtJudul">Judul Pertanyaan</label>
                <input type="text" class="form-control @error('txtJudul') is-invalid @enderror" id="txtJudul" name="txtJudul" placeholder="Tulis judul" value="{{ $data->judul != '' ? $data->judul :  old('txtJudul') }}">  
                @error('txtJudul')
                    <span style="color: rgb(220, 53, 69); font-size: 12.8px;">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="txtPertanyaan">Pertanyaan</label> 
                  <div class="mb-3">
                    <textarea class="textarea @error('txtJudul') is-invalid @enderror" placeholder="Place some text here" id="txtPertanyaan" placeholder="Tulis isi pertanyaan" name="txtPertanyaan" 
                              style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $data->isi != '' ? $data->isi : old('txtPertanyaan') }}</textarea>
                    @error('txtPertanyaan')
                        <span style="color: rgb(220, 53, 69); font-size: 12.8px;">{{ $message }}</span>
                    @enderror
                  </div>  
            </div> 
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div> 
</form>
@endsection

@push('scripts')
<script src="{{ asset('adminlte/plugins/summernote/summernote-bs4.min.js') }}"></script>
<script>
  $(function () {
    // Summernote
    $('.textarea').summernote()
  })
</script>
@endpush

