<?php

namespace App\Http\Controllers;

use Session;
use Exception;
use App\Models\Vaccine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VaccineController extends Controller
{
    public function index()
    {
        $vaccine = Vaccine::get();
        return view('content.vaccine.index', compact('vaccine'));
    }

    public function list()
    {
        $vaccine = Vaccine::get();
        return view('content.vaccine.list', compact('vaccine'));
    }

    public function tambah()
    {
        return view('content.vaccine.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg',
        ]);
        $image = $request->file('image');
        $image->storeAs('public/vaccine', $image->hashName());

        $vaccine = Vaccine::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $image->hashName(),
        ]);
        return redirect('/vaccine');
    }

    public function edit($id)
    {
        $vaccine = Vaccine::find($id);
        return view('content.vaccine.edit', compact('vaccine'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
        ]);
        $vaccine = Vaccine::findOrFail($id);

        if ($request->file('image') == "") {
            $vaccine->update([
                'name' => $request->name,
                'price' => $request->price,
                'description' => $request->description,
            ]);
        } else {
            \Storage::disk('local')->delete('public/vaccine/' . $vaccine->image);

            $image = $request->file('image');
            $image->storeAs('public/vaccine', $image->hashName());

            $vaccine->update([
                'name' => $request->name,
                'price' => $request->price,
                'description' => $request->description,
                'image' => $image->hashName(),
            ]);

        }
        return redirect('/vaccine');
    }

    public function delete($id)
    {
        try {
            $vaccine = Vaccine::findOrFail($id);
            \Storage::disk('local')->delete('public/vaccine/' . $vaccine->image);
            $vaccine->delete();

            //redirect dengan pesan sukses
            Session::flash('success', 'delete success');
            return redirect()->route('vaccine.index');

        } catch (Exception $e) {
            Session::flash('error', 'delete error');
            return redirect()->route('vaccine.index');
        }

    }
}
