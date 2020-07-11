<?php 
use App\Komentar;
?>
<div class="col-sm-1" style="width:120px;">
</div>
<div class="col-sm-11">
    <hr>      
    <?php
        $komentar_jawaban = Komentar::where(['jawaban_id'=>$det->jawaban_id])->get();
    ?>
    @foreach($komentar_jawaban as $det)
        <p>{{$det->isi}}</p>
        <hr>
    @endforeach
</div>