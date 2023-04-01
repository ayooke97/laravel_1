@extends ('template')
@section ('main')

<form action="{{ route('siswa.store') }}" method = "post">
  @csrf  
  <div class="form-group">
    <label>Nomor Induk</label>
    <input type="number" class="form-control @error('nis') is-invalid @enderror" name="nis" value="{{ old('nis') }}">
    {{-- @error('nis') <p>Input kosong</p> @enderror --}}
    
  </div>
  <div class="form-group">
    <label>Nama</label>
    <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}">
  </div>
  
  <div class="form-group">
    <label>Alamat</label>
    <textarea class="form-control @error('alamat') is-invalid @enderror" rows="5" name="alamat">{{ old('alamat') }}</textarea>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection