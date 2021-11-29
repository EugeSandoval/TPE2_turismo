{include file='templates/header.tpl'}

    <div class="mb-3">
        <h1>{$titulo}</h1>
        <form class="form-alta" action="registro" method="POST">
            <input placeholder="email" type="text" name="email" id="email">
            <input placeholder="password" type="password" name="password" id="password">
            <input type="submit" class="btn btn-primary" value="Registrar">
            <a class="btn btn-info" href="login">Volver</a>
        </form>
    </div>
</div>
<h4 class="alert-info">{$error}</h4>


{include file='templates/footer.tpl'}