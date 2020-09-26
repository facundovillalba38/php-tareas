<?php include('header.php'); ?>

<div class="login">

    <form action="<?= ROOT_CLIENT ?>/process/login.php" method="POST">
        <?php if(isset($_GET["error"]))
                echo '<p class="alert-danger">Usuario y/o Contraseña incorrecto</p>';
        ?>
        <h1 class="uk-text-center">Task manager</h1>

        <div class="uk-margin">
            <label for="user">User</label>
            <input type="email" name="user" class="uk-input"/>
        </div>

        <div class="uk-margin">
            <label for="">Password</label>
            <input type="password" name="pass" class="uk-input" />
        </div>

        <button type="submit" class="uk-button uk-button-primary">Enviar</button>

    </form>

</div>


<?php include('footer.php'); ?>