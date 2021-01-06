<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mascotas') }}
        </h2>
    </x-slot>
    <x-slot name="slot">
        <div>
            <h1 class="text-xl font-semibold flex-auto">{{ __('Modificar mascota')}} </h1>

            <form action="{{ route('pets.update', $pet->id) }} " method="POST"
                class="flex flex-col space-x-4 space-y-4">
                @csrf
                @method('PUT')

                <div class="flex flex-row space-x-4">
                    <x-label for="i_name" :value="__('Nombre')" />
                    <x-input id="i_name" type="text" name="name" required :value="$pet->name" />
                </div>
                <div class="flex flex-row space-x-4">
                    <x-label for="i_age" :value="__('Edad')" />
                    <x-select id="i_age" name="age" required>
                        <option value=""> -- SELECCIONE --</option>
                        @foreach ($ages as $age)
                            @if($pet->age === $age->name)
                                <option value="{{ $age->name }}" selected> {{ $age->name }} </option>
                            @else
                                <option value="{{ $age->name }}"> {{ $age->name }} </option>
                            @endif
                        @endforeach
                    </x-select>
                </div>
                <div class="flex flex-row space-x-4">
                    <x-label for="i_breed" :value="__('Raza')" />
                    <x-select id="i_breed" name="breed" required>
                        <option value=""> -- SELECCIONE --</option>
                        @foreach ($breeds as $breed)
                            @if($pet->breed === $breed->name)
                                <option value="{{ $breed->name }}" selected> {{ $breed->name }} </option>
                            @else
                                <option value="{{ $breed->name }}"> {{ $breed->name }} </option>
                            @endif
                        @endforeach
                    </x-select>
                </div>
                <div class="flex flex-row space-x-4">
                    <x-label for="i_male" :value="__('Macho')" />
                    <x-input id="i_male" name="sex" type="radio" required :value="__('Macho')"/>
                    <x-label for="i_female" :value="__('Hembra')" />
                    <x-input id="i_female" name="sex" type="radio" required :value="__('Hembra')" checked/>
                </div>

                <div class="flex-auto flex space-x-2">
                    <x-button>Guardar</x-button>
                    <a href="{{ route('pets.index') }} " class="">
                        <x-secondary-button>cancelar</x-secondary-button>
                    </a>
                </div>

            </form>
        </div>
    </x-slot>

</x-app-layout>