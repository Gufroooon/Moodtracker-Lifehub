<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\LifeHub;
use Illuminate\Http\Request;

class LifeHubController extends Controller
{
    public function index()
    {
        return response()->json(LifeHub::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'kegiatan' => 'required|min:3',
            'kategori' => 'required|string',
            'tanggal' => 'required|date',
        ]);

        $lifehub = LifeHub::create($request->all());
        return response()->json($lifehub, 201);
    }

    public function show($id)
    {
        return response()->json(LifeHub::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $lifehub = LifeHub::findOrFail($id);
        $request->validate([
            'kegiatan' => 'sometimes|required|min:3',
            'kategori' => 'sometimes|required|string',
            'tanggal' => 'sometimes|required|date',
        ]);

        $lifehub->update($request->all());
        return response()->json($lifehub);
    }

    public function destroy($id)
    {
        $lifehub = LifeHub::findOrFail($id);
        $lifehub->delete();
        return response()->json(['message' => 'Data berhasil dihapus']);
    }
}
