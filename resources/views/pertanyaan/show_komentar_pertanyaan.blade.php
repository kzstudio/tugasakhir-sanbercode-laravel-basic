<div class="col-sm-1" style="width:120px;">
</div>
<div class="col-sm-11">
    <hr>               
    @foreach($komentar_pertanyaan as $det)
        <p>{{$det->isi}}</p>
        <hr>
    @endforeach
    <form action="{{Url('/komentar/'.$pertanyaan->id)}}" method="POST">
    @csrf
    </form>
</div>