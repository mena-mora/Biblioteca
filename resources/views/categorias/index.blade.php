@extends('layout.admin')
@section('title', 'Home')
@section('content')

    <h1 class="text-2xl font-bold text-blue-800 mb-4">Categorias</h1>
    
    
        <a href="{{ route('categorias.create') }}" class="bg-blue-700  text-white px-4 py-2 rounded-lg font-medium transition-all glow mb-4 inline-block">
        <i class="fas fa-plus mr-2"></i> Agregar Categoria
    </a>

    <table class="table-auto w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-slate-200">
                <th class="border border-gray-300 px-4 py-2">ID</th>
                <th class="border border-gray-300 px-4 py-2">Nombre</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categorias as $categoria)
                <tr>
                    <td class="border border-gray-300 px-4 py-2">{{ $categoria->id }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $categoria->nombre }}</td>
                </tr>
            @endforeach
        </tbody>


 
@endsection