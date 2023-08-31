<div class="card-group">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title mod letra4"><b>Formulario Crear Rol</b></h5>
      <p class="card-text">
      <form action="#" method="POST" class="formuemple">
        <div class="form-group">
          <label for="rol"><b>Nombre Rol:</b></label>
          <input type="text" class="form-control" placeholder="Nombre Nuevo Rol" name="rol" required>
        </div>
        <div class="centrar">
          <input class="btn btn-success letra3" type="submit" value="Registrar Rol">

          <a type="submit" href="?c=Dashboard" class="btn bg-secondary text-white">Atrás</a>
         
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
            <?php foreach ($roles as $rol) : ?>
                     <tr class="text-center">
                         <td><?php echo $rol->getidrol(); ?></td>
                         <td><?php echo $rol->getNombre(); ?></td>
                         <td>
                             <a href="?c=Roles&a=actualizarRoles&codigoRol=<?php echo $rol->getidrol() ?>" class="btn btn-success">
                                 <i class="fas fa-sync-alt"></i>
                             </a>
                         </td>
                         <td>
                             <a href="?c=Roles&a=eliminarRoles&codigoRol=<?php echo $rol->getidrol() ?>" class="btn btn-warning">
                                 <i class="far fa-trash-alt"></i>
                             </a>
                         </td>
                     </tr>
                 <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>


