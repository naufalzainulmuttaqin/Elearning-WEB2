<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    //menampilkan data courses dari database
    public function index(){
        // mendapatkan data dari tabel courses
        $courses = Courses::all();

        // kirim data ke view untuk ditampilkan
        return view('admin.contents.courses.index',[
            'courses' => $courses
        ]);
    }
    // method untuk menampilkan form tambah courses
    public function create(){
        return view('admin.contents.courses.create');
    }

    public function store(Request $request){
        // validasi data
        $request->validate([
            'name'=> 'required',
            'category'=> 'required',
            'desc'=> 'required'
        ]);

        // simpan ke database
        Courses::create([
            'name'=> $request->name,
            'category'=> $request->category,
            'desc'=> $request->desc,
        ]);

        // kembalikan kehalaman courses
        return redirect('/admin/courses')->with('message', 'Berhasil menambahkan Courses');
    }

    public function edit($id){
        // cari data courses berdasarkan id
        $courses = courses::find($id); //select * FROM coursess WHERE id;
        return view('admin.contents.courses.edit',[
            'courses' => $courses
        ]);
    }

    //  method untuk menyimpan hasil update
    public function update($id, Request $request){
        // cari data berdaskan id
        $courses = courses::find($id);

        $request->validate([
            'name'=> 'required',
            'category'=> 'required',
            'desc'=> 'required'
        ]);

        // simpan perubahan
        $courses->update([
            'name' => $request->name,
            'category' => $request->category,
            'desc' => $request->desc,
        ]);

        // kembali kehalaman courses
        return redirect('/admin/courses')->with('message', 'Berhasil Mengedit courses');
    }

    // method untuk menghapus courses
    public function destroy ($id){
        $courses = courses::find($id);

        // hapus courses
        $courses->delete();

        // kembali kehalaman courses
        return redirect('admin/courses')->with('message', 'Berhasil Mengedit courses');

    }
}

