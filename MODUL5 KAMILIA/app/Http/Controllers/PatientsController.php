<?php

namespace App\Http\Controllers;

use Session;
use Exception;
use App\Models\Patient;
use App\Models\Vaccine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PatientsController extends Controller
{
    public function index()
    {
        $patient = Patient::get();
        $vaccine = Vaccine::get();
        return view('content.patient.index', compact('patient', 'vaccine'));
    }

    public function tambah()
    {
        return view('content.patient.add',);
    }

    public function add($id)
    {
        $vaccine = Vaccine::find($id);
        return view('content.patient.tambah', compact('vaccine'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'nik' => 'required',
            'alamat' => 'required',
            'image_KTP' => 'required|image|mimes:png,jpg,jpeg',
            'no_hp' => 'required',
            'vaccine_id' => 'required',
        ]);

        $image = $request->file('image_KTP');
        $image->storeAs('public/patients', $image->hashName());

        $patient = Patient::create([
            'name' => $request->name,
            'nik' => $request->nik,
            'alamat' => $request->alamat,
            'image_ktp' => $image->hashName(),
            'no_hp' => $request->no_hp,
            'vaccine_id' => $request->vaccine_id
        ]);

        return redirect('/patient');
    }

    public function edit($id)
    {
        $patient = Patient::find($id);
        return view('content.patient.edit', compact('patient'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'nik' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'vaccine_id' => 'required',
        ]);
        $patient = Patient::findOrFail($id);

        if ($request->file('image_ktp') == "") {
            $patient->update([
                'name' => $request->name,
                'nik' => $request->nik,
                'alamat' => $request->alamat,
                'no_hp' => $request->no_hp,
                'vaccine_id' => $request->vaccine_id
            ]);
        } else {
            \Storage::disk('local')->delete('public/patient/' . $patient->image);

            $image = $request->file('image_KTP');
            $image->storeAs('public/patient', $image->hashName());

            $vaccine->update([
                'name' => $request->name,
                'nik' => $request->nik,
                'alamat' => $request->alamat,
                'image_ktp' => $image->hashName(),
                'no_hp' => $request->no_hp,
                'vaccine_id' => $request->vaccine_id
            ]);

        }
        return redirect('/patient');
    }

    public function delete($id)
    {
        try {
            $patient = Patient::findOrFail($id);
            \Storage::disk('local')->delete('public/patient/' . $patient->image);
            $patient->delete();
            //redirect dengan pesan sukses
            Session::flash('success', 'delete success');
            return redirect()->route('patient.index');
        } catch (Exception $e) {
            Session::flash('error', 'delete error');
            return redirect()->route('patient.index');
        }
    }
}
