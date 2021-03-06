@extends('template.master')

@section('title', 'Detail Pertanyaan')

@section('content')
<div class="col-md-12">
</div>
<div class="col-md-12">
    @include('pertanyaan.show_judul')
    @include('pertanyaan.show_lihat_pertanyaan')
    @include('pertanyaan.show_jumlah_jawaban')
    @include('pertanyaan.show_list_jawaban')
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

    @include('pertanyaan.show_formjawaban')
    <div class="col-md-12">
&nbsp;
</div>
    </div>
</div>
@endsection

@push('scripts')
<script>
     $(".hapus-form-pertanyaan").on('click', function(){
        var obj = this;
        $.ajax({
            type:'POST',
            url:'/pertanyaan/{{$pertanyaan->id}}',
            data:{
                _token:'<?php echo csrf_token() ?>',
                _method:'DELETE'
            },
            success:function(data) {
                if (data.status == '1'){
                    
                    Swal.fire({
                        title: 'Perhatian!',
                        text: data.msg,
                        icon: 'success',
                        confirmButtonText: 'Cool'
                    });
                    
                    location.href = "{{Url('/pertanyaan')}}";
                }else{
                    Swal.fire({
                        title: 'Perhatian!',
                        text: data.msg,
                        icon: 'error',
                        confirmButtonText: 'Cool'
                    });
                }
                 
            }
        });
    });

     $(".hapus-form-jawaban").on('click', function(){
        var obj = this;
        var id = $(this).attr('id-data');
        $.ajax({
            type:'POST',
            url:'/jawaban/'+id,
            data:{
                _token:'<?php echo csrf_token() ?>',
                _method:'DELETE'
            },
            success:function(data) {
                if (data.status == '1'){
                    
                    Swal.fire({
                        title: 'Perhatian!',
                        text: data.msg,
                        icon: 'success',
                        confirmButtonText: 'Cool'
                    });
                    
                    location.reload();
                }else{
                    Swal.fire({
                        title: 'Perhatian!',
                        text: data.msg,
                        icon: 'error',
                        confirmButtonText: 'Cool'
                    });
                }
                 
            }
        });
    });

     

    $(".load-form-jawaban").on('click', function(){
        var obj = this;
        var id = $(this).attr('id-data');
        $.ajax({
            type:'POST',
            url:'/jawaban-load-form/'+id,
            data:{
                _token:'<?php echo csrf_token() ?>',
                _method:'PUT',
            },
            success:function(data) {
              
                $(obj).parents('.row').find('.detail-isi-jawaban').html(data.form);
                setTimeout(() => {
                    CKEDITOR.replace( 'load-form-jawaban' );
                }, 300);
            }
        });
    });

    $(".up-vote-pertanyaan").on('click', function(){
        var obj = this;
        $.ajax({
            type:'POST',
            url:'/pertanyaan-up-vote/{{$pertanyaan->id}}',
            data:{
                _token:'<?php echo csrf_token() ?>',
                _method:'PUT',
            },
            success:function(data) {
                if (data.status == '000'){
                    Swal.fire({
                        title: 'Perhatian!',
                        text: data.msg,
                        icon: 'error',
                        confirmButtonText: 'Cool'
                    });
                }
              
                $(obj).parents('.card-body').find('.pertanyaan-vote').html(data.vote);
            }
        });
    });

    $(".down-vote-pertanyaan").on('click', function(){
        var obj = this;
        $.ajax({
            type:'POST',
            url:'/pertanyaan-down-vote/{{$pertanyaan->id}}',
            data:{
                _token:'<?php echo csrf_token() ?>',
                _method:'PUT',
            },
            success:function(data) {
                if (data.status == '000'){
                    Swal.fire({
                        title: 'Perhatian!',
                        text: data.msg,
                        icon: 'error',
                        confirmButtonText: 'Cool'
                    });
                   
                }

                $(obj).parents('.card-body').find('.pertanyaan-vote').html(data.vote);
            }
        });
    });

    $(".up-vote-jawaban").on('click', function(){
        var obj = this;
        var id = $(this).attr('id-data');
        $.ajax({
            type:'POST',
            url:'/jawaban-up-vote/'+id,
            data:{
                _token:'<?php echo csrf_token() ?>',
                _method:'PUT',
            },
            success:function(data) {
                if (data.status == '000'){
                    Swal.fire({
                        title: 'Perhatian!',
                        text: data.msg,
                        icon: 'error',
                        confirmButtonText: 'Cool'
                    });
                }
              
                $(obj).parents('.card-body').find('.jawaban-vote').html(data.vote);
            }
        });
    });

    $(".down-vote-jawaban").on('click', function(){
        var obj = this;
        var id = $(this).attr('id-data');
        $.ajax({
            type:'POST',
            url:'/jawaban-down-vote/'+id,
            data:{
                _token:'<?php echo csrf_token() ?>',
                _method:'PUT',
            },
            success:function(data) {
                if (data.status == '000'){
                    Swal.fire({
                        title: 'Perhatian!',
                        text: data.msg,
                        icon: 'error',
                        confirmButtonText: 'Cool'
                    });
                   
                }

                $(obj).parents('.card-body').find('.jawaban-vote').html(data.vote);
            }
        });
    });
</script>
@endpush