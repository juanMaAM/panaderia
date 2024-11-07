<div class="container">
    <div class="row">
        <div class="col">
            <h1>Locales</h1>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID Local</th>
                        <th>Nombre</th>
                        <th>Alias</th>
                        <th>Dirección</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($locales as $key) : ?>
                        <tr>
                            <td><?= $key->idLocal ?></td>
                            <td><?= $key->nombreLocal ?></td>
                            <td><?= $key->aliasLocal ?></td>
                            <td><?= $key->direccionLocal ?></td>
                            <td>
                                <a href="<?= base_url('locales/edit/'.$key->idLocal); ?>" class="btn btn-warning">Modificar</a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>







