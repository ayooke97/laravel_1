@extends ('template')
@section ('main')
<form action="{{ route('siswa.update',$data->id) }}" method="post">
  @csrf
  @method ('put')  
  <div class="form-group">
    <label>Nomor Induk</label>
    <input type="number" class="form-control @error('nis') is-invalid @enderror" name="nis" value="{{ $data->nis }}">
    {{-- @error('nis') <p>Input kosong</p> @enderror --}}   
  </div>
  <div class="form-group">
    <label>Nama</label>
    <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ $data->nama }}">
  </div>
  <div class="form-group">
    <label>Alamat</label>
    <textarea class="form-control @error('alamat') is-invalid @enderror" rows="5" name="alamat">{{ $data->alamat }}</textarea>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection