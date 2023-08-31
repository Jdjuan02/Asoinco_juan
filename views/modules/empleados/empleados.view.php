<div class="card-group">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title mod letra4"><b>Formulario Crear Rol</b></h5>
      <p class="card-text">
      <form action="#" method="POST" class="formuemple">
        <div class="form-group">
          <label for="empl"><b>Id rol:</b></label>
          <input type="text" class="form-control" placeholder="Id Rol" name="empl" required>
          <label for="empl"><b>Nombre:</b></label>
          <input type="text" class="form-control" placeholder="Escriba su Nombre" name="empl" required>
          <label for="empl"><b>Correo:</b></label>
          <input type="text" class="form-control" placeholder="Escriba su correo" name="empl" required>
          <label for="empl"><b>Contraseña:</b></label>
          <input type="text" class="form-control" placeholder="Escriba su contraseña" name="empl" required>
          <label for="empl"><b>Celular:</b></label>
          <input type="text" class="form-control" placeholder="Escriba su celular" name="empl" required>
          <label for="empl"><b>Direccion:</b></label>
          <input type="text" class="form-control" placeholder="Escriba su direccion" name="empl" required>
        </div>
        <div class="centrar">
          <input class="btn btn-success letra3" type="submit" value="Registrar">

          <a type="submit" href="?c=Dashboard" class="btn bg-secondary text-white">Atrás</a>
         
        </div>
      </form>
      </p>
    </div>
  </div>
</div>
<div class="card">
  <div class="card-body">
    <h5 class="card-title letra4">Lista de Empleados</h5>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Nombres</th>
          <th scope="col">Correo</th>
          <th scope="col">Contraseña</th>
          <th scope="col">Celular</th>
          <th scope="col">Direccion</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($empleados as $empl) : ?>
          <tr class="text-center">
            <td><?php echo $empl->getidrol(); ?></td>
            <td><?php echo $empl->getidUsuarios(); ?></td>
            <td><?php echo $empl->getCorreo(); ?></td>
            <td><?php echo $empl->getContrasena(); ?></td>
            <td><?php echo $empl->getCelular(); ?></td>
            <td><?php echo $empl->getDireccion(); ?></td>
            <td>
              <a href="?c=Empleados&a=actualizarUsuarios=<?php echo $empl->getidrol() ?>" class="btn btn-success">
                <i class="fas fa-sync-alt"></i>
              </a>
            </td>
            <td>
              <a href="?c=Roles&a=eliminarRoles=<?php echo $empl->getidrol() ?>" class="btn btn-warning">
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>