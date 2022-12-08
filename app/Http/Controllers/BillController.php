<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Bill;

class BillController extends Controller
{
    public function index()
    {
        $bill = DB::select('select * from bill where is_deleted = 0');
        return view('bill.index')->with('bill', $bill);
    }

    public function create()
    {
        return view('bill.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required',
            'vehicle_id' => 'required',
            'amount' => 'required',
            'price' => 'required',
            // 'helmet' => 'required',
            'starting_date' => 'required',
            'end_date' => 'required',
            // 'extend_date' => 'required',
        ]);
        DB::insert(
            'INSERT INTO bill(customer_id, vehicle_id, amount, price, helmet, starting_date, end_date, extend_date) VALUES (:customer_id, :vehicle_id, :amount, :price, :helmet, :starting_date, :end_date, :extend_date)',
            [
                'customer_id' => $request->customer_id,
                'vehicle_id' => $request->vehicle_id,
                'amount' => $request->amount,
                'price' => $request->price,
                'helmet' => $request->helmet,
                'starting_date' => $request->starting_date,
                'end_date' => $request->end_date,
                'extend_date' => $request->extend_date,
            ]
        );
        return redirect()->route('bill.index')->with('success', 'Data Bill berhasil disimpan');
    }

    public function edit($id)
    {
        $bill = DB::table('bill')->where('id', $id)->first();
        return view('bill.edit')->with('bill', $bill);
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'customer_id' => 'required',
            'vehicle_id' => 'required',
            'amount' => 'required',
            'price' => 'required',
            // 'helmet' => 'required',
            'starting_date' => 'required',
            'end_date' => 'required',
            // 'extend_date' => 'required',
        ]);
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::update(
            'UPDATE bill SET customer_id = :customer_id, vehicle_id = :vehicle_id, amount = :amount, price = :price, helmet = :helmet, starting_date = :starting_date, end_date = :end_date, extend_date = :extend_date WHERE id = :id',
            [
                'id' => $id,
                'customer_id' => $request->customer_id,
                'vehicle_id' => $request->vehicle_id,
                'amount' => $request->amount,
                'price' => $request->price,
                'helmet' => $request->helmet,
                'starting_date' => $request->starting_date,
                'end_date' => $request->end_date,
                'extend_date' => $request->extend_date,
            ]
        );
        return redirect()->route('bill.index')->with('success', 'Data Bill berhasil diubah');
    }

    public function indexjoin(){
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        $data = DB::select('select * from 
        (SELECT bill.amount, bill.price, bill.helmet, bill.starting_date, bill.end_date, bill.is_deleted, vehicle.vehicle_type, vehicle.license_number, customer.name, customer.tel_number, customer.collateral
            FROM bill
            JOIN vehicle
            ON
            vehicle.id=bill.vehicle_id
            JOIN customer
            ON
            customer.id=bill.customer_id) 
            tb WHERE is_deleted = 0');

            // $data = DB::table('bill')
            // ->join('vehicle', 'vehicle.id', '=', 'bill.vehicle_id')
            // ->join('customer', 'customer.id', '=', 'bill.customer_id')
            // ->select('bill.amount', 'bill.price', 'bill.helmet', 'bill.starting_date', 'bill.end_date', 'bill.is_deleted', 'vehicle.vehicle_type', 'vehicle.license_number', 'customer.name', 'customer.tel_number', 'customer.collateral' )
            // ->where('is_deleted', '0')
            // ->get();
        return view('home')->with('data', $data);
    }

    public function indexsearch(Request $request){
        $request->validate(['name' => 'required',]);
        // $indexsearch = $request->indexsearch;
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        $data = DB::select('select * from 
        (SELECT bill.amount, bill.price, bill.helmet, bill.starting_date, bill.end_date, bill.is_deleted, vehicle.vehicle_type, vehicle.license_number, customer.name, customer.tel_number, customer.collateral
            FROM bill
            JOIN vehicle
            ON
            vehicle.id=bill.vehicle_id
            JOIN customer
            ON
            customer.id=bill.customer_id) 
            tb WHERE name = :name AND is_deleted = 0',["name"=>$request->name,]);

            // $data = DB::table('bill')
            // ->join('vehicle', 'vehicle.id', '=', 'bill.vehicle_id')
            // ->join('customer', 'customer.id', '=', 'bill.customer_id')
            // ->select('bill.amount', 'bill.price', 'bill.helmet', 'bill.starting_date', 'bill.end_date', 'bill.is_deleted', 'vehicle.vehicle_type', 'vehicle.license_number', 'customer.name', 'customer.tel_number', 'customer.collateral' )
            // ->where('customer.name', 'like', "\'%$indexsearch%\'")
            // ->orWhere('customer.tel_number', 'like', "\'%$indexsearch%\'")
            // ->orWhere('customer.collateral', 'like', "%$indexsearch%")
            // ->orWhere('vehicle.vehicle_type', 'like', "%$indexsearch%")
            // ->orWhere('vehicle.license_number', 'like', "%$indexsearch%")
            // ->orWhere('bill.starting_date', 'like', "%$indexsearch%")
            // ->orWhere('bill.end_date', 'like', "%$indexsearch%")
            // ->get();

            // ddd($data);
        return view('home')->with('data', $data);
    }

    public function delete($id)
    {
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::delete('DELETE FROM bill WHERE id = :id', ['id' => $id]);
        return redirect()->route('bill.index')->with('success', 'Data Bill berhasil dihapus');
    }

    public function softDelete($id)
    {
        DB::update('UPDATE bill SET is_deleted = 1 WHERE id = :id', ['id' => $id]);
        return redirect()->route('bill.index')->with('success', 'Data dihapus sementara');
    }

    public function restore($id)
    {
        DB::update('UPDATE bill SET is_deleted = 0 WHERE id = :id ', ['id' => $id]);

        return redirect()->route('bill.index')->with('success', 'Data direstore');
    }
    
    public function billsoft()
    {
        $bill = DB::select('SELECT * FROM bill where is_deleted = 1');

        return view('bill.soft')->with('bill', $bill);
    }
}
