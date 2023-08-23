<div class="card-group">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title mod letra4"><b>Formulario Crear Rol</b></h5>  
            <p class="card-text">
            <form action="#" method="POST" class="formuemple">
                <div class="form-group">
                    <label for="id"><b>Id Rol</b></label>
                    <input type="rol" class="form-control" id="rol" name="rol" placeholder="id rol">
                    <label for="rol"><b>Rol</b></label>
                    <input type="nombre_rol" class="form-control" id="nombre_rol" name="nombre_rol" placeholder="Escriba su Rol">
                </div>
                <div class="centrar">
                    <a type="submit" class="btn btn-success letra3" href="?c=Roles&a=registrarRoles" name="#" required>Registrar Rol</a>

                    <a type="submit" href="?c=Landing&a=empleados" class="btn bg-secondary text-white">Atrás</a>
                </div>
            </form>
            </p>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-body">
      <h5 class="card-title letra4">Lista de Roles</h5>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre Rol</th>
            <th scope="col">Editar</th>
            <th scope="col">Borrar</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>Administrador</td>
            <td><a href="">Editar</a></td>
            <td><a href="">Borrar</a></td>
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>Proveedor</td>
            <td><a href="">Editar</a></td>
            <td><a href="">Borrar</a></td>
      
          </tr>
          <tr>
            <th scope="row">3</th>
            <td>Coordinador</td>
            <td><a href="">Editar</a></td>
            <td><a href="">Borrar</a></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
