<div class="container">
    <div class="row">
        <div class="col">
            <h1>Productos</h1>
            <a href="<?= base_url('producto/add/'); ?>" class="btn btn-success">Agregar</a>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID Producto</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Precio</th> <!-- Agregado -->
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($producto as $key) : ?>
                        <tr>
                            <td><?= $key->idProducto ?></td>
                            <td><?= $key->nombreProducto ?></td>
                            <td><?= $key->descripcion ?></td>
                            <td><?= $key->precioProducto ?></td> <!-- Agregado -->
                            <td>
                                <a href="<?= base_url('producto/delete/'.$key->idProducto); ?>" class="btn btn-danger">Borrar</a>
                                <a href="<?= base_url('producto/edit/'.$key->idProducto); ?>" class="btn btn-warning">Modificar</a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


