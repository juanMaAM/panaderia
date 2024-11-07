<div class="container">
    <div class="row">
        <div class="col">
            <?php print_r($producto); ?>
            <h2>Actualizar Producto</h2>
            <form action="<?= base_url('producto/update/'); ?>" method="POST">
                <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                <div class="mb-3">
                    <label for="producto" class="form-label">Producto</label>
                    <input name="producto" type="text" required value="<?= $producto[0]->nombreProducto; ?>"
                        class="form-control" id="producto" placeholder="producto">

                    <label for="descripcion" class="form-label">Descripción</label>
                    <input name="descripcion" type="text" required value="<?= $producto[0]->descripcion; ?>"
                        class="form-control" id="descripcion" placeholder="Descripción">

                    <label for="precio" class="form-label">Precio</label>
                    <input name="precio" type="text" required value="<?= $producto[0]->precioProducto; ?>"
                        class="form-control" id="precio" placeholder="Precio">

                    <input type="hidden" name="idProducto" value="<?= $producto[0]->idProducto; ?>">
                </div>
                <input type="submit" class="btn btn-success" name="Modificar" value="Modificar">
            </form>
        </div>
    </div>
</div>

