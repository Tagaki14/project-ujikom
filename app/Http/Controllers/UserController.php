<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Data Petugas',
            'page' => 'user',
            'users' => User::all()
        ];

        return view('user.index', $data);
    }
    public function create()
    {
        $data = [
            'title' => 'Tambah Data Petugas',
            'page' => 'user',
        ];

        return view('user.tambah', $data);
    }
    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'username' => 'required|unique:users,username',
            'email' => 'required|unique:users,email',
            'no_hp' => 'required|unique:users,no_hp',
        ], [
            'nama' => 'Nama lengkap harus diisi!',
            'username.required' => 'Username lengkap harus diisi!',
            'username.unique' => 'Username sudah ada di dalam database!',
            'email.required' => 'Email harus diisi!',
            'email.unique' => 'Email sudah ada di dalam database!',
            'no_hp.required' => 'Nomor HP harus diisi!',
            'no_hp.unique' => 'Nomor HP sudah ada di dalam database!',
        ]);

        $validatedData['status'] = 'aktif';
        $validatedData['level'] = 'resepsionis';
        $validatedData['password'] = bcrypt('123456');

        User::create($validatedData);
        return redirect('/user')->with('info', 'Data user berhasil ditambahkan ke dalam database!');
    }
    public function edit(User $user)
    {
        $data = [
            'title' => 'Edit Profile User',
            'page' => 'user',
            'user' => $user
        ];

        return view('user.edit', $data);
    }
    public function update(Request $request): RedirectResponse
    {
        $id = $request->id;

        $validatedData = $request->validate([
            'nama' => 'required',
            'username' => 'required|max:20|unique:users,username,' . $id,
            'email' => 'required|unique:users,email,' . $id,
            'no_hp' => 'required|max:13|unique:users,no_hp,' . $id,
            'photoUpload' => 'nullable|image|file|max:1024',
        ], [
            'nama' => 'Nama lengkap harus diisi!',
            'username.required' => 'Username lengkap harus diisi!',
            'username.unique' => 'Username sudah ada di dalam database!',
            'username.max' => 'Username maksimal 20 digit!',
            'email.required' => 'Email harus diisi!',
            'email.unique' => 'Email sudah ada di dalam database!',
            'no_hp.required' => 'Nomor HP harus diisi!',
            'no_hp.unique' => 'Nomor HP sudah ada di dalam database!',
            'no_hp.max' => 'Nomor HP maksimal 13 digit!',
            'photoUpload.image' => 'Yang diupload harus gambar!',
            'photoUpload.max' => 'Ukuran gambar tidak boleh lebih dari 1MB!'
        ]);

        if ($request->hasFile('photoUpload')) {
            $file = $request->file('photoUpload');
            $name = $file->hashName();
            $file->storeAs('profile', $name);
            $validatedData['photo'] = $name;

            if ($request->has('photoLama') && $request->photoLama !== null) {
                $filePath = public_path('storage/profile/' . $request->photoLama);
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
            }
        }

        $user = User::find($id);
        $user->update($validatedData);

        return redirect('/user')->with('info', 'Data user berhasil diupdate di dalam database!');
    }
    public function destroy(User $user): RedirectResponse
    {
        $user->delete();
        return redirect('/user')->with('info', 'Data user berhasil dihapus di dalam database!');
    }
}
