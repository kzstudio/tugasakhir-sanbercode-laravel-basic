@extends('layouts.layouting')
@section('title', 'Dashboard')
@section('content')
<div class="container">
	<a href="/tambahpertanyaan" class="btn btn-success mb-4">Tambah Pertanyaan</a>
  <table class="table table-hover">
    <thead>
      <tr>
      	<th>#</th>
        <th>judul Pertanyaan</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    @foreach($pertanyaan as $k => $data)

      <tr>
        <td>{{$k + 1}}</td>
		<td>{{$data->judul}}</td>
		<td>
			<a href="/pertanyaan/{{$data->id}}" class="btn btn-info">Info</a>
			<a href="/pertanyaan/{{$data->id}}/edit" class="btn btn-warning">Edit</a>
      <form action="/pertanyaan/{{$data->id}}" method="post" style="display: inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
      </form>
		</td>
      </tr>

    @endforeach
    </tbody>
  </table>
</div>
@endsection
