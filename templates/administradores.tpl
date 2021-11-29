{include file='templates/header.tpl'}

    <div class="mb-3">
        <div class="mb-3">
            <h1>{$titulo}</h1>
            <form class="form-alta" action="verify" method="post">
                <input placeholder="email" type="text" name="email" id="email" required>
                <input placeholder="password" type="password" name="password" id="password" required>
                <input type="submit" class="btn btn-primary" value="Entrar">
                <a class="btn btn-info" href="login">Volver</a>
            </form>
        </div>
    </div>
    <h4 class="alert-danger">{$error}</h4>
</div>
{include file='templates/footer.tpl'}
