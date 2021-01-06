<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mascotas') }}
        </h2>
    </x-slot>
    <x-slot name="slot">
        <div class="flex flex-col space-y-4">
            {{-- <h1 class="text-xl font-semibold">Lista de mascotas</h1> --}}

            <div>
                <a href="{{ route('pets.create') }}"
                    class="items-center justify-center rounded-md border bg-green-400 uppercase text-white text-xs font-semibold px-4 py-2">
                    Agregar
                </a>
            </div>

            @if (count($pets) > 0)
            <table class="table-fixed border-collapse border border-green-800">
                <thead>
                    <tr>
                        <th class="border border-green-800"></th>
                        <th class="border border-green-800">No.</th>
                        <th class="border border-green-800 w-1/6">Nombre</th>
                        <th class="border border-green-800 w-1/6">Raza</th>
                        <th class="border border-green-800 w-1/12">Edad</th>
                        <th class="border border-green-800 w-1/12">Sexo</th>
                        <th class="border border-green-800 w-1/6">Registro</th>
                        <th class="border border-green-800 w-1/6">Ultima actualización</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pets as $key=> $item)
                    <tr>
                        <td class="border border-green-800">

                            <div class="flex space-x-4">
                                <a href="{{ route('pets.edit', $item->id) }} "
                                    class="flex items-center justify-center rounded-md border bg-green-400 uppercase text-white text-xs font-semibold px-4 py-2">
                                    Editar
                                </a>
                                <a href="javascript: document.getElementById('delete-{{ $item->id }}').submit()"
                                    class="flex items-center justify-center rounded-md border bg-red-400 uppercase text-white text-xs font-semibold px-4 py-2">
                                    Eliminar
                                </a>
                                <form id="delete-{{ $item->id }}" action="{{ route('pets.destroy', $item->id) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </div>

                        </td>
                        <td class="px-2 border border-green-800">{{ ++$key}} </td>
                        <td class="px-2 border border-green-800">{{ $item->name }} </td>
                        <td class="px-2 border border-green-800">{{ $item->breed }} </td>
                        <td class="px-2 border border-green-800">{{ $item->age }} </td>
                        <td class="px-2 border border-green-800">{{ $item->sex }} </td>
                        <td class="px-2 border border-green-800">{{ $item->created_at}} </td>
                        <td class="px-2 border border-green-800">{{ $item->updated_at}} </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <div class="text-lg  text-yellow-500 bg-yellow-100 items-center p-5">
                <p>
                    Todavía no hay mascotas registradas.
                </p>
            </div>
            @endif
        </div>



    </x-slot>
</x-app-layout>