<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Student::all();


        return view('dashboard.students.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $classrooms=Classroom::all();//mau munculkan data di kategori
        return view('dashboard.students.create',compact('classrooms'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required', //form validasion laravel
            'gender'=>'required',
            'classroom_id'=>'required',
            'religion'=>'required',
            'address'=>'required'
            
        ], [
            'name.required' => 'Nama harus diisi'//pakai translate
        ]);

        $data=$request->all();

        $data['img']=Storage::disk('public')
         ->put('student_img',$request->file('img'));

        Student::query()->create($data);//munculkan semuanya

        return to_route('students.index')->with('success', 'Berhasil tambah kategori');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Student::query()->findOrFail($id);
        $classrooms=Classroom::all();//mau munculkan data di kategori

        return view('dashboard.students.edit', compact('data','classrooms'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $student = Student::query()->findOrFail($id);

        $data = $request->all();
        // dd($request->img);
        $data['img'] = $student->img;

        if ($request->hasFile('img')) {
            Storage::disk('public')->delete($student->img);
            $data['img'] = Storage::disk('public')
            ->put('student_img', $request->file('img'));
            // dd($data);
        }

        $student->update($data);
    //    dd($student);

        return to_route('students.index')->with('success', 'Berhasil update Data Siswa');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student=Student::query()->findOrFail($id);
        //menghapus gambar
 
       // Storage::disk('public')->delete($task->image);
 //menghapus dari tabel
        $student->delete();
 
 
         return to_route('students.index')->with('success', 'Berhasil hapus siswa');
    }
}
