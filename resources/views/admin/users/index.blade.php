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
                <a type="button" class="btn btn-primary" style="margin: 20px; margin-left: 120px;" >Agregar nuevo usuario</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Rol</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td> --- </td>
                                <td>
                                    <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-primary">Editar</a>
                                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display:inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                        <a type="button" class="btn btn-success">Asignar Rol</a>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
</body>
</html>
