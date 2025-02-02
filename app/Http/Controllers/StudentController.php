<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::with('school')->paginate(5);

        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $schools = School::all();

        return view('students.create', compact('schools'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'school_id' => 'required', // |exists:schools,id
            'date_of_birth' => 'required|date',
            'hometown' => 'nullable',
        ]);

        DB::beginTransaction();
        try {
            Student::create($request->all());

            DB::commit();

            return redirect()->route('students.index')->with('success', 'Alumno creado con éxito.');
        } catch (Exception $e) {
            DB::rollBack();

            return redirect()->route('students.index')->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = Student::find($id);

        return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $student = Student::find($id);
        $schools = School::all();

        return view('students.edit', compact('student', 'schools'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'school_id' => 'required', // |exists:schools,id
            'date_of_birth' => 'required|date',
            'hometown' => 'nullable',
        ]);

        DB::beginTransaction();
        try {
            $student = Student::find($id);
            $student->update($request->all());

            DB::commit();

            return redirect()->route('students.index')->with('success', 'Alumno actualizado con éxito.');
        } catch (Exception $e) {
            DB::rollBack();

            return redirect()->route('students.index')->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::beginTransaction();
        try {
            $student = Student::find($id);
            $student->delete();

            DB::commit();

            return redirect()->route('students.index')->with('success', 'Alumno eliminado con éxito.');
        } catch (Exception $e) {
            DB::rollBack();

            return redirect()->route('students.index')->with('error', $e->getMessage());
        }
    }
}
