{include file="templates/header.tpl"}
    <h1>Bienvenido {$email}</h1>
    <a class="btn btn-success" href="login">Logout </a>
    <form class="mb-3 text-center" action="buscarPorProvincia" method="POST">
        Filtrar Atracciones por Provincia: <input type="text" name="provincia" id="provincia">
        <input class="btn btn-info" type="submit" value=Buscar > 
    </form>
        
    <div class="container container-sm">
        <table class="table table-sm">
        <thead>
            <th>Atraccion</th>
            <th>Provincia</th>
        </thead>
            {foreach from=$atracciones item=$atraccion}
                <tr >
                    <td>{$atraccion->nombre}</td>
                    <td>{$atraccion->nombre_prov}</td>
                </tr>
            {/foreach}
        </table>
        
    </div>


{include file="templates/footer.tpl"}
