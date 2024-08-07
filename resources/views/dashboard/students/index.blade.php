@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <div class="alert-message">
                        <strong>Sukses!</strong> {{ session('success') }}
                    </div>
                </div>
            @elseif(session('error'))
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <div class="alert-message">
                        <strong>Terjadi Kesalahan!</strong> {{ session('error') }}
                    </div>
                </div>
            @endif

        </div>
        <div class="row">
           
            <h3>INI HALAMAN SISWA</h3>
        </div>

        <div class="row mb-3">
            <div class="col-md-3">
                <a href="{{ route('students.create') }}" class="btn btn-primary">Tambah Siswa</a>
            </div>

        </div>

        <div class="row mt-3">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Foto Siswa</th>
                        <th>Nama Siswa</th>
                        <th>Jenis Kelamin</th>
                        <th>Kelas</th>
                        <th>Agama</th>
                        <th>Alamat</th>
                        <th>Aksi</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($datas as $data)
                        <tr>
                            <td> {{ $loop->iteration }}</td>
                            <td>
                                <img width="200" height="200" src="{{asset('storage/' . $data->img)}}">
                                </td>
                            
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->gender }}</td>
                            <td>{{ $data->classroom->name }}</td>
                            <td>{{$data->religion}}</td>
                            <td>{{$data->address}}</td>

                            <td>
                                <form method="POST" action="{{ route('students.destroy', $data->id) }}">
                                    @method('DELETE')
                                    @csrf
                                    <a class="btn btn-success" href="{{ route('students.edit', $data->id) }}">Edit</a>
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Apa anda yakin ingin menghapus data?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="row mt-3">
            <div class="col-md-12 d-flex justify-content-center">
                {{-- {{ $datas->links() }} <!-- Pagination links --> --}}
            </div>
        </div>
    </div>
@endsection

