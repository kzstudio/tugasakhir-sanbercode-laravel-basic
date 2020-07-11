@extends('template.master')

@section('title', 'Detail Pertanyaan')

@section('content')
<div class="col-md-12">
</div>
<div class="col-md-12">
    @include('pertanyaan.judul')
    @include('pertanyaan.lihat_pertanyaan')
    @include('pertanyaan.jumlah_jawaban')
    <div class="card " style="margin-bottom:0px;height:90px;">
    
    <div class="card mt-3 pb-0" style="height:38px;">
        <div class="row justify-content-between">
            <div class="col-sm-4 ">
                <ul class="pagination" style="float:left;">
                    <li class="page-item"><span class="page-link">Halaman Ke - </span></li>
                </ul>
                {{ $jawaban->links() }}
            </div>
            
            <div class="col-sm-4 " style="text-align:right;">
            <ul class="pagination" style="float:right;">
            <li class="page-item"><span class="page-link">Jawaban yang ditmapilkan :</span></li>
                <li class="page-item {{($perpage==5)?'active':''}}" ><a href="{{Url('/pertanyaan?'.(isset($_GET['page'])?'page='.$_GET['page'].'&perpage=5':'perpage=5'))}}" class="page-link">5</a></li>
                <li class="page-item {{($perpage==10)?'active':''}}"><a href="{{Url('/pertanyaan?'.(isset($_GET['page'])?'page='.$_GET['page'].'&perpage=10':'perpage=10'))}}" class="page-link">10</a></li>
                <li class="page-item {{($perpage==20)?'active':''}}"><a href="{{Url('/pertanyaan?'.(isset($_GET['page'])?'page='.$_GET['page'].'&perpage=20':'perpage=20'))}}" class="page-link">20</a></li>
            </ul>
            </div>
        </div>
    </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(".up-vote-pertanyaan").on('click', function(){
        alert('asdasd');
    });
</script>
@endpush