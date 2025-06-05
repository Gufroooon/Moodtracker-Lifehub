<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        return response()->json(Todo::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'desk' => 'required|min:3',
            'kategori' => 'required|string',
            'tanggal'  => 'required|date',
        ]);

        $todo = Todo::create($request->all());
        return response()->json($todo, 201);
    }

    

    public function show($id)
    {
        return response()->json(Todo::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $todo = Todo::findOrFail($id);

        $request->validate([
            'desk' => 'sometimes|required|min:3',
            'kategori' => 'sometimes|required|string',
            'tanggal'  => 'sometimes|required|date',
        ]);

        $todo->update($request->all());
        return response()->json($todo);
    }

    public function destroy($id)
    {
        $todo = Todo::findOrFail($id);
        $todo->delete();

        return response()->json(['message' => 'Data berhasil dihapus']);
    }
}
