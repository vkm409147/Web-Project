<?php

namespace App\Http\Controllers;

use App\Models\Manufacturer;
use Illuminate\Http\Request;

class ManufacturerController extends Controller
{
    public function delete($id)
    {
        Manufacturer::where('ManuID', '=', $id)->delete();
        return redirect()->back()->with('success', 'Manufacturer deleted successfully');
    }

    public function Manufacturersave(Request $request)
    {
        $manu = new Manufacturer();
        $manu->ManuID = $request->id;
        $manu->ManuName = $request->name;
        $manu->ManuAddress = $request->address;
        $manu->save();
        return redirect()->back()->with('success', 'Manufacturer added successfully!');
    }

    public function Manufactureredit($id)
    {
        $manu = Manufacturer::where('ManuID', '=', $id)->first();
        return view('admin.manufacturer-edit', compact('manu'));
    }

    public function Manufacturerupdate(Request $request)
    {
        Manufacturer::where('ManuID', '=', $request->id)->update([
            'ManuName'=> $request->name,
            'ManuAddress'=> $request->address,
        ]);
        return redirect()->back()->with('success', 'Manufacturer updated successfully!');
    }
}