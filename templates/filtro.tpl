{include file="templates/header.tpl"}
<form class="mb-3" action="buscarPorProvincia" method="POST">
    <h1 class="mb-3">{$titulo}</h1>
    <p>Filtrar Atracciones por Provincia: <input type="text" name="provincia" id="provincia">
    <input class="btn btn-info" type="submit" value=Buscar > 
</form>
<div class="container container-sm">
    <table class="table table-sm">
        <tr >
            <th >Nombre</th>
            <th >Descripción</th>
            <th >Provincia</th>
        </tr>
        {foreach from=$atracciones item=$atraccion}
            <tr >
                <td >{$atraccion->nombre}</td>
                <td >{$atraccion->descripcion}</td>
                <td >{$atraccion->nombre_prov}</td>
            </tr>
        {/foreach}
    </table>
</div>

{include file="templates/footer.tpl"}