


<div class="container">
    <div class="row">
        <div class="col">
        <h1>iniciar sesión</h1>
        

            <form action="<?=base_url('usuario/acceder'); ?>" method="POST">
                <h5>Ingrese nombre:</h5>
                <input type="text" name="nombre">
                <br />
                <h5>Ingrese correo</h5>
                <input type="mail" name="correo">
                <br />
                <h5>Ingrese su contraseña:</h5>
                <input type="password" name="password">
                <input type="submit" value="Acceder">
            </form>
        </div>
        


        
    </div>

        <br>
        <br>
        <p>¿No tienes cuenta?</p>
        <a href="<?= base_url('usuario/registro') ?>">crear cuenta</a>
</div>