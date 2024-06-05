@extends('admin.main')
@section('content')
    <div class="pagetitle">
        <h1>Edit Student</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Pages</li>
                <li class="breadcrumb-item active">Edit Student</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="card">
            <div class="card-body">
                <form action="/admin/student/update/{{ $student->id }}" method="post" class="mt-3">
                    @csrf
                    @method('PUT')
                    <div class="mb-2">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" id="name" class="form-control"
                            value="{{ $student->name ?? '' }}">
                    </div>

                    <div class="mb-2">
                        <label for="nim" class="form-label">NIM</label>
                        <input type="text" name="nim" id="nim" class="form-control"
                            value="{{ $student->nim ?? '' }}">
                    </div>

                    <div class="mb-2">
                        <label for="major" class="form-label">Major</label>
                        <select name="major" id="major" class="form-select">
                            <option value="">Pilih Jurusan</option>
                            <option
                                value="Teknik Informatika"{{ $student->major == 'Teknik Informatika' ? 'selected' : '' }}>
                                Teknik Informatika</option>
                            <option value="Sistem Informasi"{{ $student->major == 'Sistem Informasi' ? 'selected' : '' }}>
                                Sistem Informasi</option>
                            <option value="Bisnis Digital"{{ $student->major == 'Bisnis Digital' ? 'selected' : '' }}>Bisnis
                                Digital</option>
                        </select>
                    </div>

                    <div class="mb-2">
                        <label for="class" class="form-label">Class</label>
                        <input type="text" name="class" id="class" class="form-control"
                            value="{{ $student->class ?? '' }}">
                    </div>

                    <div class="mb-2">
                        <label for="course_id" class="form-label">Course</label>
                        <select name="course_id" id="course_id" class="form-select">
                            <option value="">Choose a course</option>
                            @foreach($courses as $course)
                                <option value="{{ $course->id }}" {{ $student->course_id == $course->id ? 'selected' : '' }}>
                                    {{ $course->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
