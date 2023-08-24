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
                <?php
                // Assuming $roles is an array of role objects fetched from your data source
                if (is_array($roles)) {
                    foreach ($roles as $rol) : ?>
                        <tr class="text-center">
                            <td><?php echo $rol->getidRol(); ?></td>
                            <td><?php echo $rol->getNombre(); ?></td>
                            <td>
                                <a href="?c=Roles&a=actualizarRoles&codigoRol=<?php echo $rol->getRolCode() ?>" class="btn btn-success">
                                    <i class="fas fa-sync-alt"></i>
                                </a>
                            </td>
                            <td>
                                <a href="?c=Roles&a=eliminarRoles&codigoRol=<?php echo $rol->getRolCode() ?>" class="btn btn-warning">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                <?php endforeach;
                } else {
                    echo '<tr><td colspan="4">No roles found.</td></tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

