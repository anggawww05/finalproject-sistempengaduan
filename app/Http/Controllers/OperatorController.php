<?php

namespace App\Http\Controllers;

use App\Http\Requests\OperatorStoreRequest;
use App\Http\Requests\OperatorUpdateRequest;
use App\Models\Operator;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OperatorController extends Controller
{
    public function index(Request $request)
    {
        if ($request->search) {
            $operators = Operator::where('full_name', 'like', "%$request->search%")
                ->orWhere('phone_number', 'like', "%$request->search%")
                ->orWhere('type', 'like', "%$request->search%")
                ->orWhereHas('user', function ($query) use ($request) {
                    $query->where('username', 'like', "%$request->search%")
                        ->where('email', 'like', "%$request->search%");
                })
                ->latest()
                ->get();
        } else {
            $operators = Operator::latest()->get();
        }
        return view('dashboard.operator.index', [
            'title' => 'Halaman Operator',
            'operators' => $operators,
            'search' => $request->search,
        ]);
    }

    public function show(int $id)
    {
        return view('dashboard.operator.detail', [
            'title' => 'Halaman Detail Operator',
            'operator' => Operator::with('user')->where('id', $id)->firstOrFail(),
        ]);
    }

    public function create()
    {
        return view('dashboard.operator.create', [
            'title' => 'Halaman Tambah Operator',
        ]);
    }

    public function store(OperatorStoreRequest $request)
    {
        try {
            $imagePath = null;
            if ($request->hasFile('image_path')) {
                $image = $request->file('image_path');
                $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $imagePath = $image->storeAs('operator', $imageName, 'public');
            }

            $operator = Operator::create([
                'image_path' => $imagePath,
                'full_name' => $request->full_name,
                'phone_number' => $request->phone_number,
                'type' => $request->type,
            ]);
            User::create([
                'username' => $request->username,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'operator_id' => $operator->id,
            ]);

            return redirect(route('dashboard.operator.index'))->with('success', 'Berhasil membuat akun operator!');
        } catch (\Exception $e) {
            logger($e->getMessage());
            return redirect(route('dashboard.operator.index'))->with('failed', 'Gagal membuat akun operator!');
        }
    }

    public function edit(int $id)
    {
        return view('dashboard.operator.edit', [
            'title' => 'Halaman Edit Operator',
            'operator' => Operator::with('user')->where('id', $id)->firstOrFail(),
        ]);
    }

    public function update(OperatorUpdateRequest $request, int $id)
    {
        try {
            $operator = Operator::with('user')->where('id', $id)->firstOrFail();
            $imagePath = $operator->image_path;

            if ($request->hasFile('image_path')) {
                if ($operator->image_path && Storage::disk('public')->exists($operator->image_path)) {
                    Storage::disk('public')->delete($operator->image_path);
                }

                $image = $request->file('image_path');
                $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $imagePath = $image->storeAs('operator', $imageName, 'public');
            }

            $operator->update([
                'image_path' => $imagePath,
                'full_name' => $request->full_name,
                'phone_number' => $request->phone_number,
                'type' => $request->type,
            ]);
            if ($request->password) {
                $operator->user->update([
                    'username' => $request->username,
                    'email' => $request->email,
                    'password' => bcrypt($request->password)
                ]);
            } else {
                $operator->user->update([
                    'username' => $request->username,
                    'email' => $request->email,
                ]);
            }

            return redirect(route('dashboard.operator.index'))->with('success', 'Berhasil mengedit akun operator!');
        } catch (\Exception $e) {
            logger($e->getMessage());
            return redirect(route('dashboard.operator.index'))->with('failed', 'Gagal mengedit akun operator!');
        }
    }

    public function destroy(int $id)
    {
        try {
            $operator = Operator::with('user')->where('id', $id)->firstOrFail();

            if ($operator->image_path && Storage::disk('public')->exists($operator->image_path)) {
                Storage::disk('public')->delete($operator->image_path);
            }

            $operator->user->delete();
            $operator->delete();

            return redirect(route('dashboard.operator.index'))->with('success', 'Berhasil menghapus akun operator!');
        } catch (\Exception $e) {
            logger($e->getMessage());
            return redirect(route('dashboard.operator.index'))->with('failed', 'Gagal membuat akun operator!');
        }
    }
}
