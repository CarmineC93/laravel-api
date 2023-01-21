<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;


class TypeController extends Controller
{
    public function index()
    {
        $types = Type::all();
        return view('admin.types.index', compact('types'));
    }

    public function show(Type $type)
    {
        return view('admin.types.show', compact('type'));
    }

    public function store(Request $request)
    {
        $val_data = $request->validate([
            'name' => ['required', 'unique:categories']
        ]);
        $val_data['slug'] = Str::slug($val_data['name'], '-');
        $type = Type::create($val_data);
        return redirect()->back()->with('message', "tipo $type->name è stato creato con successo");
    }

    public function update(Request $request, Type $type)
    {
        $val_data = $request->validate([
            'name' => ['required', Rule::unique('types')->ignore($type)]
        ]);
        $val_data['slug'] = Str::slug($val_data['name']);
        $type->update($val_data);
        return redirect()->back()->with('message', "Tipo $type->name è stata aggiornata con successo");
    }

    public function destroy(Type $type)
    {
        $type->delete();
        return redirect()->back()->with('message', "Tipo $type->name è stata cancellata");
    }
}
