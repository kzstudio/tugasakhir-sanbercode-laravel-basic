<<<<<<< HEAD
@extends('template.master')

@section('title', 'Pertanyaan')

=======
@extends('layouts.layouting')
@section('title', 'Tambah Data')
>>>>>>> 52252f99cfb3a517e994066461bd47fb7c8ccb18
@section('content')
<div class="container">
	<form action="/pertanyaan" method="POST">
    @csrf
    <div class="form-group">
        @foreach ($users as $user)
    <label name="user_id" value="{{$user->id}}">{{$user->id}}</label>
        @endforeach
    </div>
    <div class="form-group">
        <label for="content">Judul</label>
      <input type="text" class="form-control" name="judul" placeholder="Masukan judul">
    </div>
    <div class="form-group">
      <label for="content">Pertanyaan</label>
      <textarea class="form-control" id="content" name="isi"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

@endsection
