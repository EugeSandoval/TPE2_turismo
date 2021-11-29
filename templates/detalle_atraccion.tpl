{include file="templates/header.tpl"}

<div class="container d-inline" id="atraccion">
    <h1 class="text-center">Nombre: {$atracciones->nombre}</h1>
    <h2 class="text-center">Descripcion: {$atracciones->descripcion}</h2>
    <h2 class="text-center">Provincia: {$atracciones->nombre_prov}</h2>
</div>

{include file="templates/footer.tpl"}