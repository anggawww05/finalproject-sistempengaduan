<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentStoreRequest;
use App\Http\Requests\StudentUpdateRequest;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StudentController extends Controller
{
    public function index(Request $request): View
    {
        if ($request->search) {
            $students = Student::where('full_name', 'like', "%$request->search%")
                ->orWhere('phone_number', 'like', "%$request->search%")
                ->orWhere('study_program', 'like', "%$request->search%")
                ->orWhere('nim', 'like', "%$request->search%")
                ->orWhereHas('user', function ($query) use ($request) {
                    $query->where('username', 'like', "%$request->search%")
                        ->where('email', 'like', "%$request->search%");
                })
                ->latest()
                ->get();
        } else {
            $students = Student::latest()->get();
        }
        return view('dashboard.student.index', [
            'title' => 'Halaman Siswa',
            'students' => $students,
            'search' => $request->search,
        ]);
    }

    public function show(int $id): View
    {
        return view('dashboard.student.detail', [
            'title' => 'Halaman Detail Siswa',
            'student' => Student::with('user')->where('id', $id)->firstOrFail(),
        ]);
    }

    public function create(): View
    {
        return view('dashboard.student.create', [
            'title' => 'Halaman Tambah Siswa',
        ]);
    }

    public function store(StudentStoreRequest $request)
    {
        $imagePath = null;

        if ($request->hasFile('image_path')) {
            $image = $request->file('image_path');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/student'), $imageName);
            $imagePath = 'images/student/' . $imageName;
        }

        $student = Student::create([
            'image_path' => $imagePath,
            'full_name' => $request->full_name,
            'phone_number' => $request->phone_number,
            'study_program' => $request->study_program,
            'nim' => $request->nim,
        ]);
        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'student_id' => $student->id,
        ]);

        if ($user) return redirect(route('dashboard.student.index'))->with('success', 'Berhasil membuat akun siswa!');
        return redirect(route('dashboard.student.index'))->with('failed', 'Gagal membuat akun siswa!');
    }

    public function edit(int $id): View
    {
        return view('dashboard.student.edit', [
            'title' => 'Halaman Edit Siswa',
            'student' => Student::with('user')->where('id', $id)->firstOrFail(),
        ]);
    }

    public function update(StudentUpdateRequest $request, int $id)
    {
        $student = Student::with('user')->where('id', $id)->firstOrFail();
        $imagePath = $student->image_path;

        if ($request->hasFile('image_path')) {
            if ($student->image_path && file_exists(public_path($student->image_path))) {
                unlink(public_path($student->image_path));
            }

            $image = $request->file('image_path');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/student'), $imageName);
            $imagePath = 'images/student/' . $imageName;
        }

        $student->update([
            'image_path' => $imagePath,
            'full_name' => $request->full_name,
            'phone_number' => $request->phone_number,
            'study_program' => $request->study_program,
            'nim' => $request->nim,
        ]);
        if ($request->password) {
            $student->user->update([
                'username' => $request->username,
                'email' => $request->email,
                'password' => bcrypt($request->password)
            ]);
        } else {
            $student->user->update([
                'username' => $request->username,
                'email' => $request->email,
            ]);
        }

        if ($student) return redirect(route('dashboard.student.index'))->with('success', 'Berhasil mengedit akun siswa!');
        return redirect(route('dashboard.student.index'))->with('failed', 'Gagal mengedit akun siswa!');
    }

    public function destroy(int $id)
    {
        $student = Student::with('user')->where('id', $id)->firstOrFail();

        if ($student->image_path && file_exists(public_path($student->image_path))) {
            unlink(public_path($student->image_path));
        }

        $student->user->delete();
        $student->delete();

        return redirect(route('dashboard.student.index'))->with('success', 'Berhasil menghapus akun siswa!');
    }
}
