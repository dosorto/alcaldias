<!-- Modal -->
<div class="fixed inset-0 w-full h-full bg-gray-500 bg-opacity-75 flex items-center justify-center">
    <!-- Contenido de la modal -->
    <div class="bg-white p-4 min-w-96 max-w-md mx-auto rounded-md bg-white p-4 min-w-96 max-w-md mx-auto rounded-md dark:bg-gray-900">
        <!-- Contenido de tu modal aquí -->
        <!-- Modal header -->
        <div class="flex items-center justify-between border-b rounded-t dark:border-gray-600">
            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                Sesión cerrada correctamente
            </h3>
            <button wire:click="closeModal()" type="button" class="mb-3 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
        </div>
        <div class="p-4 md:p-4">
            <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Seleccione una opción</h4>
        </div>

        <div style="text-align: center;" class="content-center justify-center place-content-center">
            <button id="imprimir" class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                Imprimir reporte cierre
            </button>
            <a href="/" class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                Cancelar
            </a>
        </div>
    </div>
</div>

<script>
   document.getElementById("imprimir").addEventListener("click", function() {
    // Crear un iframe oculto
    var iframe = document.createElement('iframe');
    iframe.style.display = 'none';

    // Cuando el iframe esté cargado...
    iframe.onload = function() {
        // ...imprimir su contenido
        iframe.contentWindow.print();

        // Manejar el evento afterprint
        iframe.contentWindow.onafterprint = function() {
            // Redireccionar al inicio después de salir de la pantalla de impresión
            window.location.href = "/";
        };
    };

    // Cargar la página /reportecierrefactura en el iframe
    iframe.src = "/reportecierrefactura";

    // Agregar el iframe al cuerpo del documento
    document.body.appendChild(iframe);
});


</script>
