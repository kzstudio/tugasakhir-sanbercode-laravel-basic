
<div class="col-sm-1" style="width:120px;text-align:center;font-size:20px;">
    
</div>
<div class="col-sm-11">
    <hr style="margin:5px;padding:0px;">               
    @foreach($komentar_pertanyaan as $ko)
    <div class="row">
        <div class="col-sm-11">
        <p class="ml-4" style="margin:0px;padding:0px;">{{$ko->isi}} - <a href="#" style="color:blue;">{{$ko->user->name}}</a> {{date('d M Y', strtotime($ko->created_at)).' pukul '.date('H:i', strtotime($ko->created_at))}}</p>
        <hr style="margin:5px;padding:0px;">
        </div>
       
        
    </div>
    @endforeach
    <a data-toggle="collapse" href="#collapseExample" class="ml-4" style="font-weight:bold;">tambah komentar</a>
    <div class="collapse" id="collapseExample">
        <form action="{{Url('/pertanyaan-komentar/'.$pertanyaan->id)}}" method="POST">
        @csrf
        <div class="form-group">
        <label for="content">Komentar</label>
        <textarea type = "text" name="isi" class="form-control" placeholder="isi komentar" required></textarea>
        </div>
    
        <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>