<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body class="container">
    <div>
        <h3>Agregar Persona</h3>
    <form action="">
        <div class="mb-3 mt-3">
            <label for="exampleFormControlInput1" class="form-label">Nombres</label>
            <input type="email" class="form-control" id="nombres" wire:model="nombres">
          </div>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Apellidos</label>
            <input type="email" class="form-control" id="apellidos" wire:model="apellidos" >
          </div>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">DNI</label>
            <input type="email" class="form-control" id="dni" wire:model="dni" >
          </div>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Fecha de Nacimiento</label>
            <input type="email" class="form-control" id="fecha_nacimiento" wire:model="fecha_nacimiento" >
          </div>
        
          <button wire:click.prevent="guardar()" type="button" class="btn btn-success">Guardad</button>
          <button wire:click="volver()" type="button" class="btn btn-secundary"> Cancelar</button>
        
        </form>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    </div>
    </body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</html>


  