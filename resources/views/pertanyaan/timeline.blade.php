@extends('template.master')

@section('title', 'Pertanyaan')

@section('content')
<div class="col-md-12">
</div>
<div class="col-md-12">
    @include('pertanyaan.tambahlink')
    <div class="card " style="margin-bottom:0px;height:90px;">
    @foreach($pertanyaan as $det)
        <!-- /.card-header -->
        <div class="callout callout-danger" style="margin-bottom:1px;padding:5px;">
            <div class="row">
                <div class="col-sm-1" style="width:120px;">
                    <div class="card card-primary card-outline" style="margin-bottom:5px;">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-body" style="padding:0.26rem;text-align:center;">
                                    <p class="card-text" style="margin-bottom:0px;font-size:20px;">
                                    {{$det->total_vote}}
                                    </p>
                                    <p class="card-text" style="margin-bottom:0 !important;"><b>Upvote</b></p>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card card-{{($det->status_resolved==true)?'success':'danger'}} card-outline">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-body {{($det->status_resolved==true)?'border-success font-success':''}}" style="padding:0.26rem;text-align:center;">
                                    <p class="card-text" style="margin-bottom:0px;font-size:20px;">
                                    {{$det->jumlah_jawaban}} 
                                    </p>
                                    <p class="card-text" style="margin-bottom:0 !important;"><b>Jawaban</b></p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-11">
                    <h5><a href="{{Url('/pertanyaan/'.$det->id.'/'.$det->slug)}}"><b>{{$det->judul}}</b></a></h5>
                    <p>{!! $det->isi !!}</p>
                    
                    <div class="row">
                        <div class="col-sm-9">
                            <!-- tag -->
                                <?php 
                                    foreach($det->split_tags as $tag){
                                ?>
                                <button type="button" class="btn btn-primary btn-sm p-sm-0">{{$tag}}</button>
                                <?php        
                                    }
                                ?>
                        </div>
                        <div class="col-sm-3">
                        ditanyakan {{$det->lamanya_dibuat}}
                        <div class="row">
                            <div class="col-sm-2 user-panel mt-2 d-flex m-b-sm-0 mr-2" >
                                <div class="image">
                                <img src="{{ asset('template/dist/img/user2-160x160.jpg') }}" class="" alt="{{$det->user->name}}">
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <span class="pt-2">{{$det->user->name}}<span><br/>
                                {{$det->user->total_reputasi}}
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
        <!-- /.card-body -->
    @endforeach
    <div class="card mt-3 pb-0" style="height:38px;">
        <div class="row justify-content-between">
            <div class="col-sm-4 ">
                <ul class="pagination" style="float:left;">
                    <li class="page-item"><span class="page-link">Halaman Ke - </span></li>
                </ul>
                {{ $pertanyaan->links() }}
            </div>
            
            <div class="col-sm-4 " style="text-align:right;">
            <ul class="pagination" style="float:right;">
            <li class="page-item"><span class="page-link">Pertanyaan yang ditmapilkan :</span></li>
                <li class="page-item {{($perpage==5)?'active':''}}" ><a href="{{Url('/pertanyaan?'.(isset($_GET['page'])?'page='.$_GET['page'].'&perpage=5':'perpage=5'))}}" class="page-link">5</a></li>
                <li class="page-item {{($perpage==10)?'active':''}}"><a href="{{Url('/pertanyaan?'.(isset($_GET['page'])?'page='.$_GET['page'].'&perpage=10':'perpage=10'))}}" class="page-link">10</a></li>
                <li class="page-item {{($perpage==20)?'active':''}}"><a href="{{Url('/pertanyaan?'.(isset($_GET['page'])?'page='.$_GET['page'].'&perpage=20':'perpage=20'))}}" class="page-link">20</a></li>
            </ul>
            </div>
        </div>
    </div>
    <div class="col-md-12">
&nbsp;
</div>
</div>

@endsection