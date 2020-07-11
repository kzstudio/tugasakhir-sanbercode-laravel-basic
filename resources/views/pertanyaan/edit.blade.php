
@extends('template.master')

@section('title', 'Pertanyaan')


@section('content')
<div class="container">
<form action="/pertanyaan/{{$pertanyaan ->id}}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        @foreach ($users as $user => $item)
            <input type="hidden" name="user_id" value="{{$item ->id}}">
        @endforeach
    </div>
    <div class="form-group">
        <label for="content">Judul</label>
    <input type="text" class="form-control" name="judul" value="{{$pertanyaan ->judul}}" placeholder="Masukan judul">
    </div>
    <div class="form-group">
      <label for="content">Pertanyaan</label>
    <textarea class="form-control" id="content" name="isi" value="{{$pertanyaan ->isi}}" placeholder="Isi"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

@endsection
