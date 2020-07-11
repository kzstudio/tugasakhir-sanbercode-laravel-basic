<form action="/jawaban/{{$jawaban->id}}" method="POST">
@csrf 
@method('PUT')
<textarea class="form-control" id="load-form-jawaban" name="isi" required>{{$jawaban->isi}}</textarea>
<button type="submit" class="btn btn-primary mt-1">Simpan</button>
</form>