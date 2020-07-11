
@foreach($jawaban as $det)
<div class="callout callout-dange r" style="margin-bottom:20px;padding:5px;">
    <div class="row">
        <div class="col-sm-1" style="width:120px;">
           
            <div class="card card-primary card-outline" style="margin-bottom:5px;">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-body" style="padding:0.26rem;text-align:center;">
                                <?php if ( $det->user_id != Auth::user()['id'] ){ ?>
                                <p class="card-text up-vote-jawaban hover" id-data="{{$det->id}}" style="margin-bottom:0 !important;font-size:30px;"><b><i class="fa fa-chevron-up"></i></b></p>
                                <?php } ?>
                                <p class="card-text jawaban-vote" style="margin-bottom:0px;font-size:30px;">
                                {{$det->total_vote}}
                                </p>
                                <?php if ( $det->user_id != Auth::user()['id'] ){ ?>
                                <p class="card-text down-vote-jawaban  hover" id-data="{{$det->id}}" style="margin-bottom:0 !important;font-size:30px;"><b><i class="fa fa-chevron-down"></i></b></p>
                                <?php } ?>

                               
                            </div>
                            
                        </div>
                    </div>
            </div>

            <?php if ($det->resolved>0){ ?>
            <div class="card card-success card-outline" style="margin-bottom:5px;">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-body font-success border-success" style="padding:0.26rem;text-align:center;">
                                
                                <p class="card-text jawaban-vote" style="margin-bottom:0px;font-size:14px;font-weight:bold;">
                                RESOLVED
                                </p>
                                

                               
                            </div>
                            
                        </div>
                    </div>
            </div>
                <?php } ?>
        </div>
        <div class="col-sm-11">
            <div class="row">
                <div class="col-sm-11">
                <span class='detail-isi-jawaban'>{!! $det->isi !!}</span>
                </div>

                <div class="col-sm-1" >
                <?php if ($det->user_id == Auth::user()['id']){ ?>
                <a id-data="{{$det->id}}" style="float:right;"  href="javascript:;" class="btn btn-default load-form-jawaban"><i class="fa fa-pen"></i></a>
                <?php } ?>
                <?php if (!$det->pertanyaan->status_resolved){ ?>
                <form action="/jawaban-resolved/{{$det->id}}" method="POST">
                    @csrf
                    @method('PUT')
                    <button style="float:right;" class="btn btn-success"><i class="fa fa-check"></i></button>
                </form>
                <?php } ?>
                </div>
            </div>    

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