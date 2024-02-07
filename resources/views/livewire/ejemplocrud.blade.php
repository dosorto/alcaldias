<div> 
    <h1>REGISTRO DE PERSONAS</h1>

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
        <ul>
            <li>    
                <label for="name">Nombre Completo:</label>
                <br>
                <input type="text" wire:model="nombre_completo"> 
            </li>
        </ul>
        <ul>
            <li>
                <label for="name">DNI:</label>
                <br>
                <input type="text" wire:model="dni"> 
            </li>
        </ul>
        <ul>
            <li>            
                <label for="name">Sexo:</label>
                <br>
                <input type="text" wire:model="sexo"> 
            </li>
        </ul>
        <ul>
            <li>
                <label for="name">Fecha de nacimiento:</label>
                <br>
                <input type="date" wire:model="fecha_nacimiento"> 
            </li>
        </ul>
        <ul>
            <li>
                <button type="submit">{{ $updateMode ? 'Actualizar' : 'Guardar' }}</button> 
                    @if($updateMode) 
                        <button wire:click="updateMode = false" type="button">Cancelar</button> 
                    @endif 
            </li>
        </ul>
    </form> 
    
    <h1>DATOS ALMACENADOS</h1>

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