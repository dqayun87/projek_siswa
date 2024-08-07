<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Classroom::all();


        return view('dashboard.classrooms.index', compact('datas'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.classrooms.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ], [
            'name.required' => 'Nama harus diisi'
        ]);


            Classroom::query()->create($request->all());


        return to_route('classrooms.index')->with('success', 'Berhasil tambah kategori');

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
        $data = Classroom::query()->findOrFail($id);


        return view('dashboard.classrooms.edit', compact('data'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required'
        ], [
            'name.required' => 'Nama harus diisi'
        ]);


        Classroom::query()->findOrFail($id)->update($request->all());


        return to_route('classrooms.index')->with('success', 'Berhasil update Kelas');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Classroom::query()->findOrFail($id)->delete();


        return to_route('classrooms.index')->with('success', 'Berhasil hapus kategori');

    }
}
