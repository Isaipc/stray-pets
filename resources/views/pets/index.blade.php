{{-- @extends('dashboard') --}}

<x-app-layout>
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Mascotas') }}
    </h2>
</x-slot>
<x-slot name="slot">
    <div class="card">
        <div class="card-header">
            <a href="{{ route('pets.create') }}" class="btn btn-md btn-success">Nueva mascota</a>
            </h2>
        </div>
        <div class="card-body">
            <h4 class="card-title">Lista de mascotas</h4>
            {{-- <p class="card-text">Text</p>  --}}

            @if (count($pets) > 0)
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Fecha de registro</th>
                        <th>Última actualización</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pets as $key=> $item)
                    <tr>
                        <td scope="row">{{ ++$key}} </td>
                        <td>{{ $item->nombre }} </td>
                        <td>{{ $item->created_at}} </td>
                        <td>{{ $item->updated_at}} </td>
                        <td>
                            <a href="{{ route('pets.edit', $item->id) }} " class="btn btn-sm btn-primary">Editar</a>
                            <a href="javascript: document.getElementById('delete-{{ $item->id }}').submit()" class="btn btn-sm btn-danger">Eliminar</a>
                            <form id="delete-{{ $item->id }}" action="{{ route('pets.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="alert alert-info" role="alert">Todavía no hay pets registradas.</div>
            @endif
            </div>
            <div class="card-footer text-muted">
                En esta sección puede agregar nuevas categorías.
        </div>
    </div>    
</x-slot>
</x-dashboard>
{{-- @section('content') --}}

{{-- @endsection --}}

