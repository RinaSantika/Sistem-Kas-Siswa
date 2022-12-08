<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function index()
    {
        $customer = DB::select('select * from customer');
        return view('customer.index')->with('customer', $customer);
    }

    public function create()
    {
        return view('customer.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'tel_number' => 'required',
            'address' => 'required',
            'collateral' => 'required',
        ]);
        DB::insert(
            'INSERT INTO customer( name, tel_number, address, collateral) VALUES ( :name, :tel_number, :address, :collateral)',
            [
                'name' => $request->name,
                'tel_number' => $request->tel_number,
                'address' => $request->address,
                'collateral' => $request->collateral,
            ]
        );
        return redirect()->route('customer.index')->with('success', 'Data Customer berhasil disimpan');
    }

    public function edit($id)
    {
        $customer = DB::table('customer')->where('id', $id)->first();
        return view('customer.edit')->with('customer', $customer);
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'name' => 'required',
            'tel_number' => 'required',
            'address' => 'required',
            'collateral' => 'required',
        ]);
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::update(
            'UPDATE customer SET name = :name, tel_number = :tel_number, address = :address, collateral = :collateral WHERE id = :id',
            [
                'id' => $id,
                'name' => $request->name,
                'tel_number' => $request->tel_number,
                'address' => $request->address,
                'collateral' => $request->collateral,
            ]
        );
        return redirect()->route('customer.index')->with('success', 'Data Customer berhasil diubah');
    }

    public function delete($id)
    {
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::delete('DELETE FROM customer WHERE id = :id', ['id' => $id]);
        return redirect()->route('customer.index')->with('success', 'Data Customer berhasil dihapus');
    }
}
