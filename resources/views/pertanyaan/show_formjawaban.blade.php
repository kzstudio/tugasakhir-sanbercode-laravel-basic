<div class="card mb-0 pt-2" style=height:55px;">
    <div class="row justify-content-between">
        <div class="col-sm-8 pl-4">
            <h4>Jawbanmu</4>
        </div>
        <div class="col-sm-4">
           <!-- perncairan berdasarkan order -->
        </div>
    </div>
</div>
<form method="POST" action="{{Url('/jawaban/'.$pertanyaan->id)}}">
    @csrf
    <textarea class="form-control" id="summary-ckeditor" name="isi" required></textarea>
    <button type="submit" class="btn btn-primary mt-1">Simpan</button>
</form>

@push('scripts')
<script src="{{ asset('/js/ckeditor/ckeditor.js') }}"></script>
<script>
CKEDITOR.replace( 'summary-ckeditor' );
</script>
@endpush