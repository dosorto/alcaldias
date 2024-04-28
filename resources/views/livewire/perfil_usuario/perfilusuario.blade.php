<div class="flex flex-wrap">
    <div class="w-full md:w-1/3 p-3 dark:text-white">
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 dark:bg-gray-900 dark:text-white">

            <br>
            <img style="width: 150px; margin-left: 90px;" src="{{ asset('storage/' . Auth::user()->img) }}"
                class="w-40 h-40 p-1 rounded-full ring-2 ring-gray-300 dark:ring-gray-500" alt="Bordered avatar">
            <form wire:submit.prevent="store({{ Auth::user()->id }})" enctype="multipart/form-data">
                <label class=" block pl-24 pt-2 mb-2 text-sm font-medium text-gray-900 dark:text-white"
                    for="user_avatar">
                    Cambiar foto de perfil</label>
                <input
                    class="flex-1 text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                    type="file" wire:model="image">
                <br>
                <div class="flex justify-center">
                    <button type="submit"
                        class="mt-2 ml-2 px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-s-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white">
                        Subir Imagen</button>
                </div>
            </form>
            <br>
            <th> ------------------------------------------------- </th>
            <p><b>Id de Usuario:</b> {{ Auth::user()->id }}</p>
            <th> ------------------------------------------------- </th>
            <p><b>Nombre de Usuario:</b> {{ Auth::user()->name }}</p>
            <th> ------------------------------------------------- </th>
            <p><b>Correo Electrónico:</b>{{ Auth::user()->email }}</p>
            <th> ------------------------------------------------- </th>
        </div>
    </div>

    <div class="flex flex-col items-center ">
        <div class="w-full items-center bg-white px-8 pt-8 pb-8 mb-4 dark:bg-gray-900 shadow-md rounded">
            <h2 class="text-xl font-bold mb-3 dark:text-white">Cambiar Contraseña</h2>
            <div class="flex space-y-1">

                <label for="codigo" class="block mb-2 text-sm mt-1 mx-2 font-medium text-gray-900 dark:text-white">
                    Contraseña Actual:
                </label>
                <input type="password" wire:model="currentPassword"
                    class="bg-gray-50 mx-2 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white h-[2.5rem]"
                    placeholder="Contraseña Actual" required />
                <label for="codigo" class="block mb-2 text-sm mt-1 mx-2 font-medium text-gray-900 dark:text-white">
                    Nueva contreña:
                </label>
                <input type="password"  wire:model="newPassword"
                    class="bg-gray-50 mx-2 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white h-[2.5rem]"
                    placeholder=" Nueva contreña" required />
                <button wire:click="cambiarContraseña({{ Auth::user()->id }})" class="text-white mt-2 ml-6 bg-blue-700 hover:bg-blue-800  font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Cambiar Contraseña</a>
                </button>
            </div>
            <br>
            <div>
                @if (session()->has('success'))
                    <div id="errorMessage" duration=30
                        class="flex items-center p-4 mb-4 text-green-800 border-t-4 border-green-300 bg-green-50 dark:text-green-400 dark:bg-gray-800 dark:border-green-800"
                        role="alert">
                        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                        </svg>
                        <div class="ms-3 text-sm font-medium">
                            {{ session('success') }}

                        </div>
                    </div>
                @elseif (session()->has('error'))
                    <div id="errorMessage" duration=30
                        class="flex items-center p-4 mb-4 text-red-800 border-t-4 border-red-300 bg-red-50 dark:text-red-400 dark:bg-gray-800 dark:border-red-800"
                        role="alert">
                        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="red" viewBox="0 0 20 20">
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                        </svg>
                        <div class="ms-3 text-sm font-medium">
                            {{ session('error') }}
                @endif
            </div>
        </div>
    </div>
</div>
