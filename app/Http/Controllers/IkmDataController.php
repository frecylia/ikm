<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IkmData;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\IKMDataExport;

class IkmDataController extends Controller
{
    /**
     * Display the form.
     *
     * @return \Illuminate\View\View
     */
    public function index ()
    {
        $ikmData = IKMData::all();
        return view('formulir.tabeldata', compact('ikmData'));

    }

    public function export()
    {
        return Excel::download(new IKMDataExport, 'ikm_data.xlsx');
    }

    public function create()
    {
        return view('formulir.formulir');
    }

    /**
     * Store form data.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_usaha' => 'required|string|max:255',
            'nib' => 'required|string|max:255',
            'nama_pemilik' => 'required|string|max:255',
            'alamat_pemilik' => 'required|string',
            'alamat_usaha' => 'required|string',
            'kapasitas_bulan' => 'required|string|max:255',
            'kapasitas_tahun' => 'required|string|max:255',
            'halal' => 'nullable|string|max:255',
            'pirt' => 'nullable|string|max:255',
            'bpom' => 'nullable|string|max:255',
            'bidang_usaha' => 'required|string|max:255',
        ]);

        IkmData::create($validatedData);

        return redirect()->route('ikm_data.create')->with('success', 'Data submitted successfully!');
    }
}

