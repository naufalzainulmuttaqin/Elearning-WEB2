<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    //method untuk menampilkan data student
    public function index(){
        // menarik data dari database
        $students = Student::all();


        // panggil view dan kirim data students
        return view('admin.contents.student.index',[
            'students' => $students
        ]);
    }

    // method untuk menampilkan form tambah student
    public function create(){
        return view('admin.contents.student.create');
    }

    public function store(Request $request){
        // validasi data
        $request->validate([
            'name'=> 'required',
            'nim'=> 'required|numeric',
            'major'=> 'required',
            'class'=> 'required'
        ]);

        // simpan ke database
        Student::create([
            'name' => $request->name,
            'nim' => $request->nim,
            'major' => $request->major,
            'class' => $request->class,
        ]);

        // kembalikan kehalaman student
        return redirect('/admin/student')->with('message', 'Berhasil menambahkan Student');
    }

    // method untuk menampilkan halaman edit
    public function edit($id){
        // cari data student berdasarkan id
        $student = Student::find($id); //select * FROM students WHERE id;
        return view('admin.contents.student.edit',[
            'student' => $student
        ]);
    }

    //  method untuk menyimpan hasil update
    public function update($id, Request $request){
        // cari data berdaskan id
        $student = Student::find($id);

        $request->validate([
            'name'=> 'required',
            'nim'=> 'required|numeric',
            'major'=> 'required',
            'class'=> 'required'
        ]);

        // simpan perubahan
        $student->update([
            'name' => $request->name,
            'nim' => $request->nim,
            'major' => $request->major,
            'class' => $request->class,
        ]);

        // kembali kehalaman student
        return redirect('/admin/student')->with('message', 'Berhasil Mengedit Student');
    }

    // method untuk menghapus student
    public function destroy ($id){
        $student = Student::find($id);

        // hapus student
        $student->delete();

        // kembali kehalaman student
        return redirect('/admin/student')->with('message', 'Berhasil Mengedit Student');

    }
}
