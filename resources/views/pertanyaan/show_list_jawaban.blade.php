@foreach($jawaban as $det)
<div class="callout callout-dange r" style="margin-bottom:20px;padding:5px;">
    <div class="row">
        <div class="col-sm-1" style="width:120px;">
           
            <div class="card card-primary card-outline" style="margin-bottom:5px;">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-body" style="padding:0.26rem;text-align:center;">
                                <?php if ( $det->user_id != Auth::user()['id'] ){ ?>
                                <p class="card-text up-vote-pertanyaan hover" style="margin-bottom:0 !important;font-size:30px;"><b><i class="fa fa-chevron-up"></i></b></p>
                                <?php } ?>
                                <p class="card-text pertanyaan-vote" style="margin-bottom:0px;font-size:30px;">
                                {{$det->total_vote}}
                                </p>
                                <?php if ( $det->user_id != Auth::user()['id'] ){ ?>
                                <p class="card-text down-vote-pertanyaan  hover" style="margin-bottom:0 !important;font-size:30px;"><b><i class="fa fa-chevron-down"></i></b></p>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <div class="col-sm-11">
            <p>{!! $det->isi !!}</p>

            <div class="row">
                <div class="col-sm-9">
                   
                </div>
                <div class="col-sm-3">
                dijawab {{$det->lamanya_dibuat}}
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
        @include('pertanyaan.show_komentar_jawaban')
    </div>
</div> 
@endforeach