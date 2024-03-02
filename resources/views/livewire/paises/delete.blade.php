<div>
    <!-- Botón para abrir la modal -->
    <button wire:click="openModal">Abrir Modal</button>

    <!-- Modal -->
    <div
        wire:click="closeModal"
        wire:loading.remove
        class="fixed inset-0 w-full h-full bg-gray-500 bg-opacity-75 flex items-center justify-center"
        x-show="showModal"
    >
        <!-- Contenido de la modal -->
        <div class="bg-white p-8 max-w-md mx-auto rounded-md">
            <!-- Contenido de tu modal aquí -->

            <!-- Botón para cerrar la modal -->
            <button wire:click="closeModal">Cerrar Modal</button>
        </div>
    </div>
</div>
