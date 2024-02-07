<div> 
    <h1>CRUD Nataly</h1>
    <h2>REGISTRO DE PERSONAS</h2>
    <style>
    *{
        font-size: 18px;
        margin: 10px;
    }

    h1 {
        text-align: center;
        font-size: 22px;
        margin: 20px;
    }

    h2 {
        text-align: center;
        font-size: 18px;
        margin: 20px;
    }

    form{
        background-color: white;
        width: 100%;
    }

    table{
        background-color: white;
        max-width:1280px;
        margin-left: 50px;
        text-align: center;
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    th {
    background-color: #f2f2f2;
    }

    td {
    padding: 8px;
    border: 1px solid #ddd;
    }

    tr:nth-child(even) {
    background-color: #f9f9f9;
    }

    tr:hover {
    background-color: #e0e0e0;
    }

    td:first-child {
    font-weight: bold;
    }

    form {
    max-width:1250px;
    margin: 20px auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    background-color: white;
    }

    label {
    display: block;
    margin-bottom: 2px;
    font-weight: bold;
    }

    input{
    width: 1090px;
    float: center;
    padding: 8px;
    margin-top: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    }

    input[type="submit"] {
    background-color: #4caf50;
    color: #fff;
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    }

    input[type="submit"]:hover {
    background-color: #45a049;
    }
    </style>

    <form wire:submit.prevent="{{ $updateMode ? 'update' : 'store' }}">
        <label>Ingrese su nombre completo:</label>
        <input type="text" wire:model="nombre_completo">
        <label>Ingrese su DNI:</label>
        <input type="text" wire:model="dni">
        <label>Ingrese su sexo:</label>
        <input type="text" wire:model="sexo">
        <label>Ingrese su fecha de nacimiento:</label>
        <input type="date" wire:model="fecha_nacimiento">
        <br>
        <button type="submit">{{ $updateMode ? 'Actualizar' : 'Guardar' }}</button>
        @if($updateMode)
            
        @endif
    </form>
    
    <h2>DATOS ALMACENADOS</h2>

    <table> 
        <thead> 
            <tr> 
                <th>Nombre Completo</th> 
                <th>DNI</th> 
                <th>Sexo</th> 
                <th>Fecha de Nacimiento</th> 
                <th>Opciones</th> 
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
                        <button wire:click="edit({{ $persona->id }})" type="button" class="edit">Actualizar</button> 
                        <button wire:click="destroy({{ $persona->id }})" type="button">Eliminar</button> 
                    </td> 
                </tr> 
            @endforeach 
        </tbody> 
    </table>
</div>