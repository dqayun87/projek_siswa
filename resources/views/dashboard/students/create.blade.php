@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        <div class="row">
            <h3>Tambah Siswa Baru</h3>
        </div>

        <div class="row mt-3">
            <form method="POST" action="{{ route('students.store') }}" enctype="multipart/form-data">
                {{-- entype form data untuk menampilkan data --}}
                @csrf
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td>Nama Siswa</td>
                            <td>
                                <input autocomplete="off" value="{{ old('name') }}" class="form-control" type="text"
                                    name="name">
                            </td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td>
                                <select name="gender" required>
                                    <option>----pilih-----</option>
                                    <option value="male">Laki-Laki</option>
                                    <option value="female">Perempuan</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Kelas</td>
                            <td>
                                <select name="classroom_id" class="form-control">
                                    <option value="">---pilih---</option>
                                    @foreach($classrooms as $classroom)
                                    <option value="{{$classroom->id}}" 
                                        {{($classroom->id==old('classroom_id')) ? 'selected':''}}>{{$classroom->name}}</option>
                                    @endforeach
                                    {{-- pengambilan data dari tabel category --}}
                                </select>
                                
                            </td>
                        </tr>
                        <tr>
                            <td>Agama</td>
                            <td>
                                <input autocomplete="off" value="{{ old('religion') }}" class="form-control" type="text"
                                    name="religion">
                            </td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>
                                <input autocomplete="off" value="{{ old('address') }}" class="form-control" type="text"
                                    name="address">
                            </td>
                        </tr>
                        <tr>
                            <tr>
                            
                                <td>Foto Siswa</td>
                                <td>
                                    <input class="form-control" type="file" name="img">
    
                                </td>
                                <tr>
                            <tr>
                                <td>
                                    <button class="btn btn-success" type="submit">Tambah Data</button>
                                </td>

                            </tr>
                            
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
@endsection