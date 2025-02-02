@extends('layouts.app')

@section('title', $student->first_name . ' ' . $student->last_name)

@section('content')
    <h1>{{ $student->first_name }} {{ $student->last_name }}</h1>

    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">Información alumno</h5>
            <p class="card-text"><strong>Escuela:</strong> <a href="{{ route('schools.show', $student->school) }}">{{ $student->school->name }}</a></p>
            <p class="card-text"><strong>Fecha de nacimiento:</strong> {{ $student->date_of_birth->format('d/m/Y') }}</p>
            <p class="card-text"><strong>Ciudad nadal:</strong> {{ $student->hometown ?: 'N/A' }}</p>
        </div>
    </div>

    <div class="mt-3">
        <a href="{{ route('students.edit', $student) }}" class="btn btn-secondary">Editar Alumno</a>
        <form action="{{ route('students.destroy', $student) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this student?')">Eliminar Alumno</button>
        </form>
    </div>
@endsection