@extends('template.master')

@section('title', 'Dashboard')

@section('content')

<form action="{{Url('/jawaban-resolved/'.$pertanyaan->id)}}" method='POST'>
    @csrf
    @method('PUT')

    <button type="submit" class='btn btn-info'>Submit</button>
</form>
@endsection
