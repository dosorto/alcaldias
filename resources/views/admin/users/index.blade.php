@include('home')
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Usuarios</title>
    <link rel="stylesheet" href="{{ asset('assets/css/role.css') }}">
    <style>
        *{
            text-align: center;
        }
    </style>
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
                    <th scope="col">Asignar Rol</th>
                    <th scope="col">Restablecer contraseña</th>
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
                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="d-inline form-delete" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i class="bi bi-trash2-fill"></i></button>
                        </form>
                    </td>
                    <td>
                        <button type="button" class="btn btn-success assign-role-btn" data-user-id="{{ $user->id }}">Asignar</button>
                    </td>
                    <td>
                        <a type="button" class="btn btn-success" href="{{ route('password.request') }}">Restablecer</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Modal -->
<div id="assignRoleModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h3>Asignar Rol</h3>
        <form id="assignRoleForm" method="POST" action="{{ route('assign.role') }}">
            @csrf
            <label for="role">Selecciona un rol:</label>
            <select name="role" id="role">
                @foreach($roles as $role)
                <option value="{{ $role->name }}">{{ $role->name }}</option>
                @endforeach
            </select>
            <input type="hidden" name="user_id" id="user_id">
            <button type="submit" class="btn btn-primary">Asignar</button>
        </form>
    </div>
</div>

<!-- Script -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // Obtener el modal
    var modal = document.getElementById("assignRoleModal");

    // Obtener el botón que abre el modal
    var btns = document.querySelectorAll(".assign-role-btn");

    // Obtener el elemento <span> que cierra el modal
    var span = document.getElementsByClassName("close")[0];

    // Cuando el usuario hace clic en el botón, abrir el modal
    btns.forEach(function(button) {
        button.onclick = function() {
            var userId = button.getAttribute("data-user-id");
            document.getElementById("user_id").value = userId;
            modal.style.display = "block";
        }
    });

    // Cuando el usuario hace clic en <span> (x), cerrar el modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // Cuando el usuario hace clic en cualquier parte fuera del modal, cerrarlo
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

    // Envío del formulario
    var form = document.getElementById("assignRoleForm");
    form.onsubmit = function() {
        // Aquí podrías agregar alguna validación adicional si es necesario
        return true;
    };
</script>

{{-- Alerta de eliminar Role --}}
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
