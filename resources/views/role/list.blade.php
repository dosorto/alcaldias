@extends('layouts.app')
@Section('list')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('assets/css/role.css')}}">
</head>
<body>
    <div class="mt-2" style="margin-left: 25px">
        <h3>Roles y Permisos</h3>
        <hr>
        <div class="parent">
        <div class="contenedor-1">
            <div class="row mb-2">
                <div class="col-10"> 
                    <h4>Lista de Roles</h4>
                </div>
                <div class="col-2">
                    <form class="d-inline" method="GET" action="{{ route('createRole') }}"> 
                        <button type="submit" class="btn btn-primary">
                        Nuevo
                    </button>
                </form>

               
                </div>
            </div>
            <table class="table table-hover">
                <thead>
                  <tr class="table-secondary">
                    <th scope="col">#</th>
                    <th scope="col">Rol</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Acción</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $role->name }}</td>
                        <td>{{ $role->description }}</td>
                        <td>
                            <div>
                                <form action="{{ route('rolesUpdate', $role) }}" class="d-inline" method="GET">
                                    <button type="submit" class="btn btn-info"><i class="bi bi-pen-fill"></i></button>

                                </form>
                                <form method="POST" action="{{ route('roleDelete', $role) }}" class="d-inline form-delete">
                                   @method('DELETE')
                                   @csrf
                                    <button type="submit" class="btn btn-danger" ><i class="bi bi-trash2-fill"></i></button>
                                </form>
                            </div>
                        </td>
                      </tr>
                    @endforeach
                </tbody>
              </table>
              @if ($roles->count() > 5)
              {{ $roles->links() }}
              @endif

              {{-- {{ $roles->links() }} --}}
        </div>
        <div class="contenedor-2">
            <div class="row">
                <div class="col-10"> 
                    <h4>Lista de Permisos</h4>
                </div>
                <div class="col-2">
                    <form class="d-inline" method="GET" action="{{ route('createPermission') }}"> 
                        <button type="submit" class="btn btn-primary">
                        Nuevo
                    </button>
                </div>
            </div>
            <table class="table table-hover mt-1">
                <thead>
                  <tr class="table-secondary">
                    <th scope="col">#</th>
                    <th scope="col">Permiso</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Acción</th>
                  </tr>
                </thead>
                <tbody>
                
                    @foreach ($permissions as $permission)
                    <tr>
                        <th scope="row">{{ $loop->iteration}}</th>
                        <td>{{ $permission->name }}</td>
                        <td>{{ $permission->description }}</td>
                        <td>
                            <div>
                                <form action="{{ route('permissionsUpdate', $permission) }}" class="d-inline" method="GET">
                                    <button type="submit" class="btn btn-info"><i class="bi bi-pen-fill"></i></button>

                                </form>
                                <form method="POST" action="{{ route('permissionDelete', $permission) }}" class="d-inline form-delete">
                                   @method('DELETE')
                                   @csrf
                                    <button type="submit" class="btn btn-danger" ><i class="bi bi-trash2-fill"></i></button>
                                </form>
                            </div>
                        </td>
                      </tr>
                    @endforeach
                </tbody>
              </table>
              {{ $permissions->links() }}
        </div>
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

