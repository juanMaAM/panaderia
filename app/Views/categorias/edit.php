<div class="container">
    <div class="row">
        <div class="col">
<?php print_r($categoria); ?>
        <h2>Actualizar Categoria</h2>
    <form action="<?=base_url('categorias/update/'); ?>" method="POST">
    <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
    <div class="mb-3">
            <label for="categoria" class="form-label">categoria</label>
            <input name="categoria" type="text" required ="<?=$categoria[0]->nombreCategoria; ?>"
                    class="form-control" id="marca" placeholder="Categoria">
                    <label for="descripcion" class="form-label">descripcion</label>
            <input name="descripcion" type="text" required value="<?=$categoria[0]->descripcionCategoria; ?>"
                    class="form-control" id="marca" placeholder="Descripción">
            <input type="hidden" name="idcategoria" value="<?=$categoria[0]->idCategoria;?>" >
    </div>
        <input type="submit" class="btn btn-success" name="Modificar" value="Modificar">
        </form>
    
    </div>
    </div>
</div>