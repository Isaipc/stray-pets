<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mascotas') }}
        </h2>
    </x-slot>

    <x-slot name="slot">
        <div class="flex flex-col space-y-4">
            {{-- <h1 class="text-xl font-semibold">Lista de mascotas</h1> --}}
            @if (session('success'))
            <x-alert class="bg-green-600">
                {{ session('success')}}
            </x-alert>
            @endif
            @if (session('error'))
            <x-alert class="bg-red-600">
                {{ session('error')}}
            </x-alert>
            @endif

            <div>
                <a href="{{ route('pets.create') }}"
                    class="items-center justify-center rounded-md border bg-green-600 uppercase text-white text-xs font-semibold px-4 py-2">
                    Agregar
                </a>

            </div>
            <div class="">
                <form action="{{ route('pets.search') }} " method="GET" class="flex flex-wrap space-x-4 space-y-4">
                    @csrf

                    <div class="flex flex-col">
                        <x-label for="i_name" :value="__('Nombre')" />
                        <x-input id="i_name" type="text" name="name" :value="$request->name" />
                    </div>
                    <div class="flex flex-col">

                        <x-label for="i_age" :value="__('Edad')" />
                        <x-select id="i_age" name="age">
                            <option value=""> -- SELECCIONE --</option>
                            @foreach ($ages as $age)
                            @if($request->age === $age->name)
                            <option value="{{ $age->name }}" selected> {{ $age->name }} </option>
                            @else
                            <option value="{{ $age->name }}"> {{ $age->name }} </option>
                            @endif
                            @endforeach
                        </x-select>
                    </div>
                    <div class="flex flex-col">
                        <x-label for="i_breed" :value="__('Raza')" />
                        <x-select id="i_breed" name="breed">
                            <option value=""> -- SELECCIONE --</option>
                            @foreach ($breeds as $breed)
                            @if($request->breed === $breed->name)
                            <option value="{{ $breed->name }}" selected> {{ $breed->name }} </option>
                            @else
                            <option value="{{ $breed->name }}"> {{ $breed->name }} </option>
                            @endif
                            @endforeach

                        </x-select>
                    </div>
                    <div class="flex flex-col">
                        <x-label for="i_sex" :value="__('Sexo')" />
                        <x-select id="i_sex" name="sex">
                            <option value=""> -- SELECCIONE --</option>
                            @if($request->sex == "Macho")
                            <option value="Macho" selected>Macho</option>
                            <option value="Hembra">Hembra</option>
                            @elseif($request->sex == "Hembra")
                            <option value="Macho">Macho</option>
                            <option value="Hembra" selected>Hembra</option>
                            @else
                            <option value="Macho">Macho</option>
                            <option value="Hembra">Hembra</option>
                            @endif
                        </x-select>
                    </div>
                    <div class="flex  space-x-2">
                        <x-button>Buscar</x-button>
                        {{-- <x-secondary-button>Limpiar</x-secondary-button> --}}
                    </div>
                </form>
            </div>

            @if ($pets->count() > 0)
            <table class="table-fixed border-collapse border border-green-800 mt-4">
                <thead>
                    <tr>
                        <th class="border border-green-800" colspan="2">Acciones</th>
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
                    <tr class="hover:bg-gray-200 p-3">
                        <td class="border border-green-800">

                            <div class="flex space-x-4">
                                <a href="{{ route('pets.edit', $item->id) }} "
                                    class="text-green-600 uppercase text-xs font-bold px-4 py-2 hover:text-green-800">
                                    Modificar
                                </a>
                            </div>
                        </td>
                        <td class="border border-green-800">
                            <form id="delete-{{ $item->id }}" action="{{ route('pets.destroy', $item->id) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <a href="javascript: document.getElementById('delete-{{ $item->id }}').submit()"
                                    class="text-red-400 uppercase text-xs font-bold px-4 py-2 hover:text-red-600">
                                    Eliminar
                                </a>
                            </form>
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
            <div class="text-lg text-center  text-yellow-500 p-5 mt-2">
                <p>No se encontraron mascotas.</p>
            </div>
            @endif
        </div>
    </x-slot>
</x-app-layout>