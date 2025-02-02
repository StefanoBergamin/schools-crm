@extends('layouts.app')

@section('title', $school->name)

@section('content')
    <h1>{{ $school->name }}</h1>

    <div class="card mb-3">
        <div class="row g-0">
            <div class="col-md-4">
                @if ($school->logo)
                    <img src="{{ $school->logo }}" alt="{{ $school->name }} Logo" class="img-fluid rounded-start">
                @else
                    <div class="bg-secondary text-white d-flex align-items-center justify-content-center" style="height: 200px;">
                        <span>No Logo</span>
                    </div>
                @endif
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{ $school->name }}</h5>
                    <p class="card-text"><strong>Dirección:</strong> {{ $school->address }}</p>
                    <p class="card-text"><strong>Email:</strong> {{ $school->email ?: 'N/A' }}</p>
                    <p class="card-text"><strong>Teléfono:</strong> {{ $school->phone_number ?: 'N/A' }}</p>
                    <p class="card-text"><strong>Sitio web:</strong> {!! $school->website ? "<a href='{$school->website}' target='_blank'>{$school->website}</a>" : 'N/A' !!}</p>
                </div>
            </div>
        </div>
    </div>

    <h2>Alumnos</h2>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Fecha de nacimiento</th>
                    <th>Ciudad natal</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($school->students as $student)
                    <tr>
                        <td>{{ $student->first_name }} {{ $student->last_name }}</td>
                        <td>{{ $student->date_of_birth->format('d/m/Y') }}</td>
                        <td>{{ $student->hometown ?: 'N/A' }}</td>
                        <td>
                            <a href="{{ route('students.show', $student) }}" class="btn btn-sm btn-secondary">Mostrar</a>
                            <a href="{{ route('students.edit', $student) }}" class="btn btn-sm btn-secondary">Editar</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">No se encontraron estudiantes para esta escuela.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-3">
        <a href="{{ route('schools.edit', $school) }}" class="btn btn-secondary">Editar Escuela</a>
        <form action="{{ route('schools.destroy', $school) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro que deseas eliminar esta escuela?')">Eliminar Escuela</button>
        </form>
    </div>
@endsection