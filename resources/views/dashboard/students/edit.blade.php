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
            <h3>Edit Siswa</h3>
        </div>

        <div class="row mt-3">
            <form method="POST" action="{{ route('students.update', $data->id) }}" enctype="multipart/form-data">
                @method('PATCH')
                @csrf
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td>Nama Siswa</td>
                            <td>
                                <input autocomplete="off" value="{{ $data->name }}" class="form-control" type="text"
                                    name="name">
                            </td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td>
                                <select name="gender" required>
                                    <option value="male" {{ $data->gender == 'male' ? 'selected' : '' }}>Male</option>
                                    <option value="female" {{ $data->gender == 'female' ? 'selected' : '' }}>Female</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>kelas</td>
                            <td>
                                <select name="classroom_id" class="form-control">
                                    <option value="">---pilih---</option>
                                    @foreach($classrooms as $classroom)
                                    <option value="{{$classroom->id}}" 
                                        {{($classroom->id==$data->classroom_id) ? 'selected':''}}>{{$classroom->name}}</option>
                                    @endforeach
                                    {{-- pengambilan data dari tabel category --}}
                                </select>
                                
                            </td>
                        </tr>
                        <tr>
                            <td>Agama</td>
                            <td>
                                <input autocomplete="off" value="{{ $data->religion }}" class="form-control" type="text"
                                    name="religion">
                            </td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>
                                <input autocomplete="off" value="{{ $data->address }}" class="form-control" type="text"
                                    name="address">
                            </td>
                        </tr>
                        <tr>
                            <td>Foto</td>
                            <td>
                                <input class="form-control" type="file" name="img">
                                <br>
                                <img width="100" height="100" src="{{ asset('storage/' . $data->img) }}">
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <button class="btn btn-success" type="submit">Update Data</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
@endsection
