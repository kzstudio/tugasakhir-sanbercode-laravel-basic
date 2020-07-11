<div class="card mb-0 pt-2" style=height:85px;">
    <div class="row justify-content-between">
        <div class="col-sm-8 pl-4">
            <h2>{{$pertanyaan->judul}}</h2>
            {{$pertanyaan->lamanya_dibuat}}
        </div>
        <div class="col-sm-4">
            <a href="{{Url('/tambahpertanyaan')}}" class="btn btn-block btn-primary">Tambah Pertanyaan</a>
        </div>
    </div>
</div>