<div>
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        @forelse ( $vacantes as $vacante)    
            <div class="p-6 border-b text-gray-900 border-gray-200 dark:text-gray-100 dark:border-gray-700 md:flex md:justify-between md:items-center">
                <div class="space-y-3">
                    <a href="" class="text-xl font-bold">
                        {{ $vacante->title }}
                    </a>
                    <p class="text-sm font-bold">{{ $vacante->empresa }}</p>
                    <p class="text-sm">Último dia: {{ $vacante->ultimo_dia->format('d/m/Y') }}</p>
                </div>
                <div class="flex flex-col md:flex-row items-stretch gap-3 mt-5 md:mt-0">
                    <a 
                        href=""
                        class="bg-slate-800 dark:bg-slate-300 py-2 px-4 text-white dark:text-gray-900 text-xs font-bold uppercase rounded-lg text-center"
                    >
                        Candidatos
                    </a>
                    <a 
                        href=""
                        class="bg-blue-500  py-2 px-4 text-white text-xs font-bold uppercase rounded-lg text-center"
                    >
                        Editar
                    </a>
                    <a 
                        href=""
                        class="bg-red-500  py-2 px-4 text-white text-xs font-bold uppercase rounded-lg text-center"
                    >
                        Eliminar
                    </a>
                </div>
            </div>
        @empty
            <p class="p-3 text-center text-sm text-gray-600 dark:text-white">No hay vacantes que mostrar.</p>
        @endforelse
    </div>
    <div class="mt-10">
        {{ $vacantes->links() }}
    </div>
</div>
