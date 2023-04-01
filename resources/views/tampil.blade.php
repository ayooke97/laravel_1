@extends('template')

@section('main')

<h1>Data Siswa</h1>
<a href="{{ url('siswa/create') }}" class="btn btn-primary">Create (URL)</a>
<a href="{{ route('siswa.create') }}" class="btn btn-danger">Create (Route)</a>
@isset($data)
<table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nis</th>
      <th scope="col">Nama</th>
      <th scope="col">Alamat</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($data as $d) 
    <tr>
      <th scope="row">{{ $loop->iteration }}</th>
      <td>{{ $d->nis }}</td>
      <td>{{ $d->nama }}</td>
      <td>{{ $d->alamat }}</td>
      <td>
        <a href="{{ route('siswa.edit', $d->id) }}" class="btn btn-warning">Edit</a>
        <button type="submit" class="btn btn-danger">Delete</button>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@else
<p>Data Kosong</p>
@endisset

@endsection