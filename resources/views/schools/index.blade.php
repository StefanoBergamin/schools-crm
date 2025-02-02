@extends('layouts.app')

@section('title', 'Schools')

@section('content')
    <div class="d-flex justify-content-between">
        <h1>Escuelas</h1>
        <a href="{{ route('schools.create') }}" class="btn btn-primary mb-3">Añadir nueva escuela</a>
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
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($schools as $school)
                    <tr>
                        <td>{{ $school->name }}</td>
                        <td>{{ $school->email }}</td>
                        <td>{{ $school->phone_number }}</td>
                        <td class="text-center">
                            <a href="{{ route('schools.show', $school) }}" class="btn btn-sm btn-secondary">Mostrar</a>
                            <a href="{{ route('schools.edit', $school) }}" class="btn btn-sm btn-secondary">Editar</a>
                            <form action="{{ route('schools.destroy', $school) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button
                                    type="submit"
                                    class="btn btn-sm btn-danger"ç
                                    onclick="return confirm('¿Estás seguro que deseas eliminar esta escuela?')"
                                    >Eliminar</button
                                >
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{ $schools->links() }}
@endsection