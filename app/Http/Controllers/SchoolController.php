<?php

namespace App\Http\Controllers;

use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Exception;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $schools = School::paginate(5);

        return view('schools.index', compact('schools'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('schools.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048|dimensions:min_width=200,min_height=200',
            'email' => 'nullable|email',
            'phone_number' => 'nullable',
            'website' => 'nullable|url',
        ]);

        DB::beginTransaction();
        try {
            $school = new School($request->except('logo'));

            if ($request->hasFile('logo')) {
                $path = $request->file('logo')->store('logos');
                $school->logo = Storage::url($path);
            }

            $school->save();

            DB::commit();

            return redirect()->route('schools.index')->with('success', 'Escuela creada con éxito.');
        } catch (Exception $e) {
            DB::rollBack();

            return redirect()->route('schools.index')->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $school = School::find($id);

        return view('schools.show', compact('school'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $school = School::find($id);

        return view('schools.edit', compact('school'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048|dimensions:min_width=200,min_height=200',
            'email' => 'nullable|email',
            'phone_number' => 'nullable',
            'website' => 'nullable|url',
        ]);

        DB::beginTransaction();
        try {
            $school = School::find($id);
            $school->fill($request->except('logo'));

            if ($request->hasFile('logo')) {
                if ($school->logo) {
                    $path = str_replace('/storage/', '', $school->logo);
                    Storage::disk('public')->delete($path);
                }
                $path = $request->file('logo')->store('logos');
                $school->logo = Storage::url($path);
            }

            $school->save();

            DB::commit();

            return redirect()->route('schools.index')->with('success', 'Escuela actualizada con éxito.');
        } catch (Exception $e) {
            DB::rollBack();

            return redirect()->route('schools.index')->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::beginTransaction();
        try {
            $school = School::find($id);

            if ($school->logo) {
                $path = str_replace('/storage/', '', $school->logo);
                Storage::disk('public')->delete($path);
            }
            $school->delete();

            DB::commit();

            return redirect()->route('schools.index')->with('success', 'Escuela eliminada con éxito.');
        } catch (Exception $e) {
            DB::rollBack();

            return redirect()->route('schools.index')->with('error', $e->getMessage());
        }
    }
}
