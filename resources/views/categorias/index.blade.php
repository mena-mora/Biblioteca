@extends('layout.admin')
@section('title', 'Home')
@section('content')

    <h1 class="text-2xl font-bold text-blue-800 mb-4">Categorias</h1>
    <table class="table-auto w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-200">
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