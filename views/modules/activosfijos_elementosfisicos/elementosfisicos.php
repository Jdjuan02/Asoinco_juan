<h1 class="letra4">Ingreso Activos Fijos o Elementos Fisicos</h1>
<form class="formuemple">
  <div class="form-group w-60%">
    <label for="alimento1" >Nombre Producto</label>
    <input type="text" name="nombreproinventario" class="form-control" placeholder="Ingrese el nombre del producto" required>
  </div>
  <div class="form-group">
    <label for="cantidad2">Cantidad</label>
    <input type="text" class="form-control"  name="cantidadproinventario" placeholder="Ingrese la cantidad" required>
  </div>
  <div class="form-group">
    <label for="fecha3">Fecha Ingreso:</label>
    <input type="date" class="form-control"  name="fechaproinventario" required>
  </div>
  
  <input class="btn btn-success letra3" type="submit" value="Ingresar Producto" name="ingresarproinventario">
  <a href="?c=Dashboard" class="btn btn-secondary">Atrás</a>
  <a href="?c=Landing&a=egresoelementosfisicos" class="btn btn-primary">Salida Activo Fijo o Elemento Fisico</a>
</form>
<br>
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nombre del producto</th>
      <th scope="col">Cantidad</th>
      <th scope="col">Fecha de Ingreso</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Larry</td>
      <td>the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>