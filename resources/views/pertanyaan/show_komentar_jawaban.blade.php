<?php 
        use App\Komentar;
        ?>
<div class="col-sm-1" style="width:120px;">
</div>
<div class="col-sm-11">
    <hr style="margin:5px;padding:0px;">            
    <?php
        $komentar_jawaban = Komentar::where(['jawaban_id'=>$det->id])->get();
    ?>
    @foreach($komentar_jawaban as $ko)
        <div class="col-sm-11">
        <p class="ml-4" style="margin:0px;padding:0px;">{{$ko->isi}} - <a href="#" style="color:blue;">{{$ko->user->name}}</a> {{date('d M Y', strtotime($ko->created_at)).' pukul '.date('H:i', strtotime($ko->created_at))}}</p>
        <hr style="margin:5px;padding:0px;">
        </div>
    @endforeach
    <a data-toggle="collapse" href="#collapseExample_jawab_{{$det->id}}" class="ml-4" style="font-weight:bold;">tambah komentar</a>
    <div class="collapse" id="collapseExample_jawab_{{$det->id}}">
        <form action="{{Url('/jawaban-komentar/'.$det->id)}}" method="POST">
        @csrf
        <div class="form-group">
        <label for="content">Komentar</label>
        <textarea type = "text" name="isi" class="form-control" placeholder="isi komentar" required></textarea>
        </div>
    
        <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>