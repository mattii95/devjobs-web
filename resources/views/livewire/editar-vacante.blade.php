<form action="" class="md:w-1/2 space-y-5" wire:submit.prevent='editarVacante'>
    <div>
        <x-input-label for="title" :value="__('Titulo Vacante')" />
        <x-text-input 
            id="title" 
            class="block mt-1 w-full" 
            type="text" 
            wire:model="title" 
            :value="old('title')" 
            placeholder="Titulo Vacante"
        />
        @error('title')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>
    <div>
        <x-input-label for="salario" :value="__('Salario Mensual')" />
        <select 
            wire:model="salario" 
            id="salario"
            class="mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
        >
            <option value="">-- Seleccione una opción --</option>
            @foreach ($salarios as $salario)
                <option value="{{ $salario->id }}">{{ $salario->salario }}</option>
            @endforeach
        </select>
        @error('salario')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>
    <div>
        <x-input-label for="category" :value="__('Categoría')" />
        <select 
            wire:model="category" 
            id="category"
            class="mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
        >
            <option value="">-- Seleccione una opción --</option>
            @foreach ($categorias as $categoria)
                <option value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>
            @endforeach
        </select>
        @error('category')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>
    <div>
        <x-input-label for="empresa" :value="__('Empresa')" />
        <x-text-input 
            id="empresa" 
            class="block mt-1 w-full" 
            type="text" 
            wire:model="empresa" 
            :value="old('empresa')" 
            placeholder="Empresa: ej. Spotify, Amazon"
        />
        @error('empresa')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>
    <div>
        <x-input-label for="ultimo_dia" :value="__('último dia para postularse')" />
        <x-text-input 
            id="ultimo_dia" 
            class="block mt-1 w-full" 
            type="date" 
            wire:model="ultimo_dia" 
            :value="old('ultimo_dia')"
        />
        @error('ultimo_dia')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>
    <div>
        <x-input-label for="description" :value="__('Descripcion')" />
        <textarea 
            wire:model="description" 
            id="description"
            placeholder="Descripcion del puesto"
            class="mt-1 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full h-72"
        >
        </textarea>
        @error('description')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>
    <div>
        <x-input-label for="image" :value="__('Imagen')" />
        <x-text-input 
            id="image" 
            class="block mt-1 w-full" 
            type="file" 
            wire:model="new_image" 
            accept="image/*"
        />
        @error('new_image')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
        <div class="my-5 w-80">
            @if ($new_image)
                {{ __('Imagen Preview') }}
                <img src="{{ $new_image->temporaryUrl() }}" />
            @endif
        </div>
        <div class="my-5 w-80">
            <x-input-label :value="__('Imagen Actual')" />
            <img src="{{ asset('storage/vacantes/' . $image) }}" alt="{{ 'Imagen vacante: ' . $title }}">
        </div>
    </div>
    <x-primary-button>
        {{ __('Guardar cambios') }}
    </x-primary-button>
</form>