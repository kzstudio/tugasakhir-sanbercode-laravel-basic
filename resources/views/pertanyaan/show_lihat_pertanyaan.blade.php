<div class="callout callout-danger" style="margin-bottom:1px;padding:5px;">
    <div class="row">
        <div class="col-sm-1" style="width:120px;">
            <div class="card card-primary card-outline" style="margin-bottom:5px;">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-body" style="padding:0.26rem;text-align:center;">
                            
                            <p class="card-text up-vote-pertanyaan hover" style="margin-bottom:0 !important;font-size:30px;">
                                <?php if ( $pertanyaan->user_id != Auth::user()['id'] ){ ?>
                                    <b><i class='fa fa-chevron-up'></i></b>
                                <?php } ?>
                            </p>
                            <p class="card-text pertanyaan-vote" style="margin-bottom:0px;font-size:30px;">
                            {{$pertanyaan->total_vote}}
                            </p>

                            <p class="card-text down-vote-pertanyaan  hover" style="margin-bottom:0 !important;font-size:30px;">
                                <?php if ($pertanyaan->user_id != Auth::user()['id']){ ?>
                                    <b><i class="fa fa-chevron-down"></i></b>
                                <?php } ?>
                            </p>
                            
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        <div class="col-sm-11">
            <div class="row">
                <div class="col-sm-10">
                <p>{!! $pertanyaan->isi !!}</p>
                </div>

                <div class="col-sm-2" >
                <?php if ($pertanyaan->user_id == Auth::user()['id']){ ?>
                            <a id-data="{{$pertanyaan->id}}" style="float:right;color:#fff"  href="javascript:;" class="btn btn-danger hapus-form-pertanyaan"><i class="fa fa-trash"></i></a>
                            <?php } ?>
                <?php if ($pertanyaan->user_id == Auth::user()['id']){ ?>
                <a style="float:right;"  href="/pertanyaan/{{$pertanyaan->id}}/edit/{{$pertanyaan->slug}}" class="btn btn-default"><i class="fa fa-pen"></i></a>
                <?php } ?>
                
                </div>
            </div>        
            <div class="row">
                <div class="col-sm-9">
                    <!-- tag -->
                        <?php 
                            foreach($pertanyaan->split_tags as $tag){
                        ?>
                        <button type="button" class="btn btn-primary btn-sm p-sm-0">{{$tag}}</button>
                        <?php        
                            }
                        ?>
                </div>
                <div class="col-sm-3">
                ditanyakan {{$pertanyaan->lamanya_dibuat}}
                <div class="row">
                    <div class="col-sm-2 user-panel mt-2 d-flex m-b-sm-0 mr-2" >
                        <div class="image">
                        <img src="{{ asset('template/dist/img/user2-160x160.jpg') }}" class="" alt="{{$pertanyaan->user->name}}">
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <span class="pt-2">{{$pertanyaan->user->name}}<span><br/>
                        {{$pertanyaan->user->total_reputasi}}
                    </div>
                </div>
                </div>
            </div>
        </div>
        
        @include('pertanyaan.show_komentar_pertanyaan')
    </div>
</div> 
