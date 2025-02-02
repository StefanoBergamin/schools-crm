@extends('layouts.app')

@section('title', 'Students')

@section('content')
    <div class="d-flex justify-content-between">
        <h1>Alumnos</h1>
        <a href="{{ route('students.create') }}" class="btn btn-primary mb-3">Añadir nuevo alumno</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Escuela</th>
                    <th>Fecha de nacimiento</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td>{{ $student->first_name }} {{ $student->last_name }}</td>
                        <td>{{ $student->school->name }}</td>
                        <td>{{ $student->date_of_birth->format('d/m/Y') }}</td>
                        <td class="text-center">
                            <a href="{{ route('students.show', $student) }}" class="btn btn-sm btn-secondary">Mostrar</a>
                            <a href="{{ route('students.edit', $student) }}" class="btn btn-sm btn-secondary">Editar</a>
                            <form action="{{ route('students.destroy', $student) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button
                                    type="submit"
                                    class="btn btn-sm btn-danger"
                                    onclick="return confirm('¿Estás seguro de que deseas eliminar a este alumno?')"
                                    >Eliminar</button
                                >
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{ $students->links() }}
@endsection