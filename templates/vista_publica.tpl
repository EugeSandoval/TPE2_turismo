{include file="templates/header.tpl"}

<div class="col">
    <a class="btn btn-primary" href="iniciar">Iniciar Sesión</a>
    <a class="btn btn-info registro" href="registrar">Registro</a>
    <h1 class="mb-3">{$titulo}</h1>
    <form class="mb-3" action="buscarPorProvincia" method="POST">
        <p>Filtrar Atracciones por Provincia: <input type="text" name="provincia" id="provincia">
        <input class="btn btn-info" type="submit" value=Buscar > 
        <a class="btn btn-info" type="submit" href=login>Limpiar Filtro</a></p>
    </form>
    <div class="mb-3">
        <ul class="list-group">
            {foreach from=$atracciones item=$atraccion}
                <li class="list-group-item">
                    <a href="verAtraccion/{$atraccion->id}">{$atraccion->nombre}</a>
                </li>
            {/foreach}
        </ul>
    </div>
</div>     

{include file="templates/footer.tpl"}

