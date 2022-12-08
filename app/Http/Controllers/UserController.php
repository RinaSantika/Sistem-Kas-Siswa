<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    public function index(){
        $user = DB::select('select * from users');
        return view('user.index')->with('user', $user);
    }

    public function create(){
        return view('user.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        DB::insert(
            'INSERT INTO users( name, email, password) VALUES ( :name, :email, :password)',
            [
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]
        );
        return redirect()->route('user.index')->with('success', 'Data User berhasil disimpan');
    }

    public function edit($id){
        $user = DB::table('users')->where('id', $id)->first();
        return view('user.edit')->with('user', $user);
    }

    public function update($id, Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::update(
            'UPDATE users SET name = :name, email = :email, password = :password WHERE id = :id',
            [
                'id' => $id,
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]
        );
        return redirect()->route('user.index')->with('success', 'Data User berhasil diubah');

    }

    public function delete($id)
    {
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::delete('DELETE FROM users WHERE id = :id', ['id' => $id]);
        return redirect()->route('user.index')->with('success', 'Data User berhasil dihapus');
    }
}
