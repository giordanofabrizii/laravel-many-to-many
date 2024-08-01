<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Type;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTypeRequest;
use App\Http\Requests\UpdatetypeRequest;

class typeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = Type::all();
        return view('admin.types.index',compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $type = new Type();
        return view('admin.types.create',compact('type'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTypeRequest $request)
    {
        $data = $request->validated();
        $newtype = new Type($data);
        $newtype->save();
        return redirect()->route('admin.types.show', $newtype);

    }

    /**
     * Display the specified resource.
     */
    public function show(Type $type)
    {
        //
        return view('admin.types.show',compact('type'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Type $type)
    {
        $types = Type::all();
        return view('admin.types.edit',compact('type','types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTypeRequest $request, Type $type)
    {
        $data = $request->validated();
        $type->update($data);
        return redirect()->route('admin.types.show', $type);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type)
    {
        $type->delete();
        return redirect()->route('admin.types.index');
    }

    public function deleted(Type $types)
    {

        // get deleted types
        $types = Type::onlyTrashed()->get();

        return view('admin.types.deleted',compact('types'));

    }

    public function restore(string $id)
    {
        $type = type::onlyTrashed()->findOrFail($id);
        $type->restore();

        return redirect()->route('admin.types.index');
    }

    public function permdelete(string $id)
    {
        $type = type::onlyTrashed()->findOrFail($id);
        $type->forceDelete();

        return redirect()->route('admin.types.deleted');
    }
}
