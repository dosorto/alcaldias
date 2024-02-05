<div>
    <h1>CRUD Personas - Omri</h1>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            margin: 20px;
        }

        form {
            background-color: #ffffff;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            background-color: #007bff;
            color: #ffffff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button.cancel {
            background-color: #dc3545;
            margin-left: 10px;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            height: 30px;
            background-color: #ffffff;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            box-shadow: 0 0 8px rgba(0, 0, 0, 0.1);
            position: relative;
        }

        li button {
            top: 5px;
            right: 5px;
            background-color: #dc3545;
            color: #ffffff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            float: right;
        }

        li button.edit {
            background-color: #007bff;
            margin-right: 5px;
            margin-left: 10px;
        }

    </style>

    <form wire:submit.prevent="{{ $updateMode ? 'update' : 'store' }}">
        <input type="text" wire:model="nombre_completo" placeholder="Nombre completo">
        <input type="text" wire:model="dni" placeholder="DNI">
        <input type="text" wire:model="sexo" placeholder="Sexo">
        <input type="date" wire:model="fecha_nacimiento" placeholder="Fecha de nacimiento">
        <button type="submit">{{ $updateMode ? 'Actualizar' : 'Guardar' }}</button>
        @if($updateMode)
            <button wire:click="updateMode = false" type="button" class="cancel">Cancelar</button>
        @endif
    </form>
    <h1>Personas Agregadas</h1>
    <style>
    .full-width-table {
        width: 100%;
        border-collapse: collapse;
        background-color: white;
    }
    .full-width-table th,
    .full-width-table td {
        text-align: center;
        padding: 8px;
        border: 1px solid #ddd;
    }
</style>

<table class="full-width-table">
    <thead>
        <tr>
            <th>Nombre Completo</th>
            <th>DNI</th>
            <th>Sexo</th>
            <th>Fecha de Nacimiento</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($personas as $persona)
            <tr>
                <td>{{ $persona->nombre_completo }}</td>
                <td>{{ $persona->dni }}</td>
                <td>{{ $persona->sexo }}</td>
                <td>{{ $persona->fecha_nacimiento }}</td>
                <td>
                    <button wire:click="edit({{ $persona->id }})" type="button" class="edit">Editar</button>
                    <button wire:click="destroy({{ $persona->id }})" type="button">Eliminar</button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>


</div>