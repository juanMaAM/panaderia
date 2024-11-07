<div class="container">
    <div class="row">
        <div class="col">
            <h2>Agregar Producto</h2>
            <?= validation_list_errors() ?>

            <form action="<?= base_url('producto/insert'); ?>" method="POST">
                <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                <div class="mb-3">
                    <label for="producto" class="form-label">Producto</label>
                    <input name="producto" type="text" 
                        class="form-control" id="producto"
                        required
                        placeholder="producto" value="<?= set_value('producto') ?>">

                    <label for="descripcion" class="form-label">Descripción</label>
                    <input name="descripcion" type="text" 
                        class="form-control" id="descripcion"
                        required
                        placeholder="descripción" value="<?= set_value('descripcion') ?>">

                    <label for="precio" class="form-label">Precio</label>
                    <input name="precio" type="text" 
                        class="form-control" id="precio"
                        required
                        placeholder="precio" value="<?= set_value('precio') ?>">
                </div>
                <input type="submit" class="btn btn-success" value="Agregar">
            </form>
        </div>
    </div>
</div>

