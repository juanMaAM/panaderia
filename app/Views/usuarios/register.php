<div class="container">
    <div class="row">
        <div class="col">

        <h2>Registrarse</h2>

        <h5>Favor de llenar todos los campos</h5>
        <?= validation_list_errors() ?>

    <form action="<?=base_url('usuario/insert'); ?>" method="POST">
    <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
        <div class="mb-3">
            
            <label for="nombreUsuario" class="form-label">Ingrese su nombre:</label>
            <input name="nombre" type="text" 
            class="form-control" id="nombreUsuario"
            required placeholder="nombre" value="<?= set_value('nombre') ?>" >

            <label for="correo" class="form-label">Ingrese su correo:</label>
            <input name="correo" type="Email" 
            class="form-control" id="correo"
            required placeholder="ejemplo@gmail.com"
            value="<?= set_value('correo') ?>" >

            <label for="telefono" class="form-label">Ingrese su numero de telefono:</label>
            <input name="telefono" type="tel" 
            class="form-control" id="telefono"
            required
            value="<?= set_value('telefono') ?>" >

            <label for="fechaNacimiento" class="form-label">Ingrese su fecha de nacimiento:</label>
            <input name="fechaNacimiento" type="date" 
            class="form-control" id="fechaNacimiento"
            required
            value="<?= set_value('fechaNacimiento') ?>" >
                
                <label for="password" class="form-label">Contraseña:</label>
                <input name="contraseña" type="password" 
                class="form-control" id="password"
                required>
                
                <label for="password2" class="form-label">Confirme su contraseña:</label>
                <input name="contraseña2" type="password" 
                class="form-control" id="password2"
                required>


            


        </div>
        <input type="submit" class="btn btn-success" value="Crear cuenta">
        </form>
        
        
        
        <a href="<?= base_url('/login') ?>">regresar</a>

    </div>
    </div>
</div>