<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Usuarios</title>
    <link rel="stylesheet" href="{{ asset('assets/css/role.css') }}">
 
    @extends('layouts.app')
    @section ('content')
</head>
<body>
<div class="row">
    <div class="col-md-12">
        <h2 style="margin-top: 30px;">Listado de Usuarios</h2>
        <table class="table table-hover">
            <thead>
                <tr class="table-secondary">
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Email</th>
                    <th scope="col">Rol</th>
                    <th scope="col">Acciones</th>
                    <th scope="col">Asignar Roles</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if($user->roles->isNotEmpty())
                        {{ $user->getRoleNames()->implode(', ') }}
                        @else
                        Sin rol asignado
                        @endif
                    </td>
                    <td>                        
                            <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-primary"><i class="bi bi-pen-fill"></i></a>
                            <button type="button" class="btn btn-danger delete-user-btn" data-user-id="{{ $user->id }}"><i class="bi bi-trash2-fill"></i></button>
                        </td>
                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="d-inline form-delete" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i class="bi bi-trash2-fill"></i></button>
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('assign.role') }}" method="POST">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                            <select name="role">
                                @foreach($roles as $role)
                                <option value="{{ $role->name }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                            <button type="submit" class="btn btn-success">Asignar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
{{-- Alerta de eliminar Role --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $('.form-delete').submit(function(e){
        e.preventDefault();
        Swal.fire({
            title: "¿Estas seguro?",
            text: "¡Se eliminará el registro definitivamente!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "¡Sí, eliminar!",
            cancelButtonText: "Cancelar"
        }).then((result) => {
            if (result.isConfirmed) {
                this.submit();
                Swal.fire({
                    title: "¡Eliminado!",
                    text: "El registro se eliminó con éxito.",
                    icon: "success"
                });
            }
        });
    });
</script>
</body>
</html>
@endsection