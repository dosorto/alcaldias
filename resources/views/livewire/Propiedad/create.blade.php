<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Nueva Propiedad</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.4.7/flowbite.min.css" />
</head>
<body class="bg-gray-100 dark:bg-gray-900">
    <div class="container mx-auto p-4 max-w-lg">
        <!-- Contenido de la página -->
        <div class="bg-white p-6 rounded-md shadow-md dark:bg-gray-800">
            <!-- Encabezado -->
            <div class="mb-4">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Selecciona un contribuyente
                </h3>
            </div>
            <!-- Formulario -->
            <div>
                <form class="space-y-4">
                    <div>
                        <label for="propietario" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Propietario</label>
                        <select id="propietario" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                            <option value="">Seleccione propietario</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="claveCatastral" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Clave Catastral</label>
                        <input type="number" id="claveCatastral" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                    </div>

                    <div class="mb-3">
                        <label for="tipoPropiedad" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tipo de Propiedad</label>
                        <select id="tipoPropiedad" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                            <option value="">Seleccione tipo de propiedad</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="georeferenciacion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Georeferenciación</label>
                        <select id="georeferenciacion" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                            <option value="">Seleccione georeferenciación</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="pais" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">País</label>
                        <select id="pais" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                            <option value="">Seleccione país</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="departamento" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Departamento</label>
                        <select id="departamento" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                            <option value="">Seleccione departamento</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="municipio" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Municipio</label>
                        <select id="municipio" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                            <option value="">Seleccione municipio</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="aldea" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Aldea</label>
                        <select id="aldea" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                            <option value="">Seleccione aldea</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="barrio" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Barrio</label>
                        <select id="barrio" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                            <option value="">Seleccione barrio</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="descripcion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descripción</label>
                        <textarea id="descripcion" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"></textarea>
                    </div>

                    <div class="flex justify-center">
                        <button type="submit" class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                            Crear
                        </button>
                        <button type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                            Cancelar
                        </button>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
    

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.4.7/flowbite.min.js"></script>
</body>
</html>
