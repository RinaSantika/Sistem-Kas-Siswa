<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Vehicle;

class VehicleController extends Controller
{
    public function index(){
        $vehicle = DB::select('select * from vehicle');
        return view('vehicle.index')->with('vehicle', $vehicle);
    }

    public function create(){
        return view('vehicle.create');
    }

    public function store(Request $request){
        $request->validate([
            'vehicle_type' => 'required',
            'license_number' => 'required',
            'year_created' => 'required',
        ]);
        DB::insert('INSERT INTO vehicle(vehicle_type, license_number, year_created) VALUES (:vehicle_type, :license_number, :year_created)',
            [
                'vehicle_type' => $request->vehicle_type,
                'license_number' => $request->license_number,
                'year_created' => $request->year_created,
            ]
        );
        return redirect()->route('vehicle.index')->with('success', 'Data Vehicle berhasil disimpan');
    }

    public function edit($id){
        $vehicle = DB::table('vehicle')->where('id', $id)->first();
        return view('vehicle.edit')->with('vehicle', $vehicle);
    }

    public function update($id, Request $request){
        $request->validate([
            'vehicle_type' => 'required',
            'license_number' => 'required',
            'year_created' => 'required',
        ]);
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::update(
            'UPDATE vehicle SET vehicle_type = :vehicle_type, license_number = :license_number, year_created = :year_created WHERE id = :id',
            [
                'id' => $id,
                'vehicle_type' => $request->vehicle_type,
                'license_number' => $request->license_number,
                'year_created' => $request->year_created,
            ]
        );
        return redirect()->route('vehicle.index')->with('success', 'Data Vehicle berhasil diubah');

    }

    public function delete($id)
    {
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::delete('DELETE FROM vehicle WHERE id = :id', ['id' => $id]);
        return redirect()->route('vehicle.index')->with('success', 'Data Vehicle berhasil dihapus');
    }
}