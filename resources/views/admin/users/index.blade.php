<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Usuarios</title>
    <style>

        body { 
            font-family: Arial, Verdana; 
            background-image: url('https://image.jimcdn.com/app/cms/image/transf/none/path/sc77e1e58a42c514a/image/i9977c7b3a6db203a/version/1516578954/image.jpg'); 
            background-size: cover;
            background-repeat: no-repeat;
            backdrop-filter: blur(2px); 
            margin: 0; 
            padding: 0; 
            display: flex; 
            height: 100vh; 
        } 

        header {
            background-color: #333;
            color: #fff;
            padding: 15px 20px;
            text-align: center;
            font-size: 24px;
        }

        h2 {
            color: #333;
            margin: 20px;
            text-align: center;
        }

        table {
            width: 1200px;
            border-collapse: collapse;
            margin-left: 120px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #333;
            color: #fff;
        }

        .btn {
            display: inline-block;
            padding: 8px 12px;
            margin-right: 10px;
            text-decoration: none;
            color: #fff;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn-primary {
            background-color: #007bff;
        }

        .btn-danger {
            background-color: #dc3545;
        }

        .btn-success {
            background-color: #2ECC71;
        }
        footer {
            background-color: #333;
            color: #fff;
            padding: 15px 20px;
            text-align: center;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>

<div class="row">
    <div class="col-md-12">
        <h2>Listado de Usuarios</h2>
        <a type="button" href="/"class="btn btn-primary" style="margin: 20px; margin-left: 120px;">Volver Inicio</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                    <th>Asignar Roles</th>
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
                        <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-primary">Editar</a>
                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                    <td>
                        <button type="button" class="btn btn-success assign-role-btn" data-user-id="{{ $user->id }}">Asignar Rol</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
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
    </div>
</div>

</body>
</html>
