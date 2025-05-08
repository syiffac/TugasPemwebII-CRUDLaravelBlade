<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;

class SupplierController extends Controller
{
    public function index(Request $request)
    {
    $search = $request->input('search');
    
    $suppliers = Supplier::query()
        ->when($search, function ($query) use ($search) {
            $query->where('nama', 'LIKE', "%{$search}%")
                  ->orWhere('email', 'LIKE', "%{$search}%")
                  ->orWhere('alamat', 'LIKE', "%{$search}%")
                  ->orWhere('telepon', 'LIKE', "%{$search}%");
        })
        ->get();

    return view('index', compact('suppliers', 'search'));
    }
    public function create()
    {
        return view('create');
    }
    public function store(Request $request)
    {
        try {
            // Validasi data
            $validatedData = $request->validate([
                'nama' => 'required|string|max:255',
                'alamat' => 'required|string',
                'telepon' => 'required|string|max:20',
                'email' => 'required|email|unique:suppliers,email',
                'status' => 'required|in:active,inactive',
            ]);

            // Simpan data ke database
            Supplier::create($validatedData);

            return redirect()
                ->route('suppliers.index')
                ->with('success', 'Supplier berhasil ditambahkan.');
        } catch (\Exception $e) {
            return back()
                ->withInput()
                ->with('error', 'Gagal menambahkan supplier: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $supplier = Supplier::findOrFail($id);
        return view('edit', compact('supplier'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
            'email' => 'required|email|unique:suppliers,email,' . $id,
            'status' => 'required|in:active,inactive',
        ]);

        $supplier = Supplier::findOrFail($id);
        $supplier->update($request->all());
        $statusMessage = $request->status === 'active' ? 'diaktifkan' : 'dinonaktifkan';
        return redirect()->route('suppliers.index')
            ->with('success', "Supplier berhasil diperbarui dan $statusMessage.");
    }
    public function destroy($id)
    {
        Supplier::findOrFail($id)->delete();
        return redirect()->route('suppliers.index')->with('success', 'Supplier berhasil dihapus.');
    }
}