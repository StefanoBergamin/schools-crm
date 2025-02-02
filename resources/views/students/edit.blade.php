@extends('layouts.app')

@section('title', 'Editar Alumno')

@section('content')
    <h1>Editar Alumno</h1>

    <form action="{{ route('students.update', $student) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="first_name" class="form-label">Nombre</label>
            <input
                type="text"
                class="form-control @error('first_name') is-invalid @enderror"
                id="first_name"
                name="first_name"
                value="{{ old('first_name', $student->first_name) }}"
                required
            >
            @error('first_name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="last_name" class="form-label">Apellidos</label>
            <input
                type="text"
                class="form-control @error('last_name') is-invalid @enderror"
                id="last_name"
                name="last_name"
                value="{{ old('last_name', $student->last_name) }}"
                required
            >
            @error('last_name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="school_id" class="form-label">Escuela</label>
            <select class="form-select @error('school_id') is-invalid @enderror" id="school_id" name="school_id" required>
                <option value="">Seleccionar una escuela</option>
                @foreach ($schools as $school)
                    <option value="{{ $school->id }}" {{ old('school_id', $student->school_id) == $school->id ? 'selected' : '' }}>{{ $school->name }}</option>
                @endforeach
            </select>
            @error('school_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="date_of_birth" class="form-label">Fecha de nacimiento</label>
            <input
                type="date"
                class="form-control @error('date_of_birth') is-invalid @enderror"
                id="date_of_birth"
                name="date_of_birth"
                value="{{ old('date_of_birth', $student->date_of_birth->format('Y-m-d')) }}"
                required
            >
            @error('date_of_birth')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="hometown" class="form-label">Ciudad nadal</label>
            <input
                type="text"
                class="form-control @error('hometown') is-invalid @enderror"
                id="hometown"
                name="hometown"
                value="{{ old('hometown', $student->hometown) }}"
            >
            @error('hometown')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Alumno</button>
    </form>
@endsection