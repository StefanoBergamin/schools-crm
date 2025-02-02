@extends('layouts.app')

@section('title', 'Editar Escuela')

@section('content')
    <h1>Editar Escuela</h1>

    <form action="{{ route('schools.update', $school) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input
                type="text"
                class="form-control @error('name') is-invalid @enderror"
                id="name"
                name="name"
                value="{{ old('name', $school->name) }}"
                required
            >
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Dirección</label>
            <input
                type="text"
                class="form-control @error('address') is-invalid @enderror"
                id="address"
                name="address"
                value="{{ old('address', $school->address) }}"
                required
            >
            @error('address')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="logo" class="form-label">Logo</label>
            <input type="file" class="form-control @error('logo') is-invalid @enderror" id="logo" name="logo">
            @if ($school->logo)
                <img src="{{ $school->logo }}" alt="School Logo" class="mt-2" style="max-width: 200px;">
            @endif
            @error('logo')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input
                type="email"
                class="form-control @error('email') is-invalid @enderror"
                id="email"
                name="email"
                value="{{ old('email', $school->email) }}"
            >
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="phone_number" class="form-label">Teléfono</label>
            <input
                type="text"
                class="form-control @error('phone_number') is-invalid @enderror"
                id="phone_number"
                name="phone_number"
                value="{{ old('phone_number', $school->phone_number) }}"
            >
            @error('phone_number')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="website" class="form-label">Sitio web</label>
            <input
                type="url"
                class="form-control @error('website') is-invalid @enderror"
                id="website"
                name="website"
                value="{{ old('website', $school->website) }}"
            >
            @error('website')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Escuela</button>
    </form>
@endsection