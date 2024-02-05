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
        width: 100%;
    }

    input{
        width: 700px;
    }

    table{
        width: 100%;
        text-align: center;
    }
</style>

<div> 
    <h1>REGISTRO DE PERSONAS</h1>
    <form wire:submit.prevent="{{ $updateMode ? 'update' : 'store' }}"> 
        <ul>
            <li>    
                <label for="name">Nombre:</label>
                <input type="text" wire:model="nombre_completo"> 
            </li>
        </ul>
        <ul>
            <li>
                <label for="name">DNI:</label>
                <input type="text" wire:model="dni"> 
            </li>
        </ul>
        <ul>
            <li>
                <label for="name">Sexo:</label>
                <input type="text" wire:model="sexo"> 
            </li>
        </ul>
        <ul>
            <li>
                <label for="name">Fecha de nacimiento:</label>
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