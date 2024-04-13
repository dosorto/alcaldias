<!-- Modal -->
<div class="fixed inset-0 w-full h-full bg-gray-500 bg-opacity-75 flex items-center justify-center">
        <!-- Contenido de la modal -->
        
        <div class="bg-white p-4 min-w-96 max-w-md mx-auto rounded-md">
            <!-- Contenido de tu modal aquí -->
            <!-- Modal header -->
            <div class="flex items-center justify-between border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Cerrar Caja
                </h3>
                <button wire:click="closeModal()" type="button" class="mb-3 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <div class="p-4 md:p-4">
                
            </div>
    </div> 