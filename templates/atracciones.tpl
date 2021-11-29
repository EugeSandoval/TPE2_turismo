{include file="templates/header.tpl"}

    <a class="btn btn-success" href="login">Logout </a>
    <h1 class="mb-3 ">{$titulo}</h1> 
     <form class="mb-3 " action="agregarAtraccion" method="POST">
        Nombre:<input type="text" name= "nombre" id="nombre">
        Descripción:<input type="text" name="descripcion" id="descripcion">
        Provincia: <select name="provincia" id="provincia">
         {foreach from=$provincias item=$provincia }
            <option value={$provincia->id_prov}>{$provincia->nombre_prov}</option>
         {/foreach}
        <input class="btn btn-light btn-sm" type="submit" value=Agregar>
    </form>
    <form class="mb-3 " action="buscarPorProvincia" method="POST">
        Filtrar Atracciones por Provincia: <input type="text" name="provincia" id="provincia">
        <input class="btn btn-info" type="submit" value=Buscar > 
    </form>
    <div class="container container-sm">
        <table class="table table-sm">
        <thead>
            <th>Atraccion</th>
            <th>Provincia</th>
            <th>Eliminar</th>
            <th>Ver</th>
            <th>Editar</th>
        </thead>
            {foreach from=$atracciones item=$atraccion}
                <tr class="table-info">
                    <td>{$atraccion->nombre}</td>
                    <td>{$atraccion->nombre_prov}</td>
                    <td>
                        <a class="btn btn-light btn-sm" href="eliminarAtraccion/{$atraccion->id}">Eliminar</a>
                    </td>
                    <td>
                        <a class="btn btn-light btn-sm" href="verAtraccion/{$atraccion->id}" name="id_vista">Ver</a>
                    </td>
                    <td class="d-block">
                        <form class="mb-3" action="editarAtraccion/{$atraccion->id}" method="POST">
                            <label>Nombre:</label><input class="form-control" type="text" name="nombre" id="nombre">
                            <label>Descripción:</label><input class="form-control" type="text" name="descripcion">
                            <label>Provincia: </label>
                            <select name="provincia" id="provincia">
                                {foreach from=$provincias item=$provincia }
                                    <option value={$provincia->id_prov} name="provincia">{$provincia->nombre_prov}</option>
                                {/foreach}
                            </select>
                            <input class="btn btn-light btn-sm" type="submit" value=Editar>
                        </form> 
                    </td>
                </tr>
            {/foreach}
        </table>
    </div>

    <h1 class="mb-3 ">{$listado}</h1>
     <form class="mb-3 " action="agregarProvincia" method="POST">
            Nombre:<input type="text" name= "nombre_prov" id="nombre_prov">
            Region:<input type="text" name="region" id="region">
            Cantidad Poblacion: <input type="number" name="cant_poblacion" id="cant_poblacion">
            <input type="submit" value=Agregar>
    </form>
    
    <div class="container container-sm">
        <table class="table table-sm">
        <thead>
            <th>Nombre</th>
            <th>Región</th>
            <th>Eliminar</th>
            <th>Ver</th>
            <th>Editar</th>
        </thead>
            {foreach from=$provincias item=$provincia}
                <tr class="table-info">
                    <td>{$provincia->nombre_prov}</td>
                    <td>{$provincia->region}</td>
                    <td>
                        <a class="btn btn-light btn-sm" href="eliminarProvincia/{$provincia->id_prov}">Eliminar</a>
                    </td>
                    <td>
                        <a class="btn btn-light btn-sm" href="verProvincia/{$provincia->id_prov}" name="id_vista">Ver</a>
                    </td>
                    <td class="d-block">
                        <form class="mb-3" action="editarProvincia/{$provincia->id_prov}" method="POST">
                            <label>Nombre:</label><input class="form-control" type="text" name="nombre_prov" id="nombre_prov">
                            <label>Region:</label><input class="form-control" type="text" name="region">
                            <label>Cantidad Poblacion: </label><input class="form-control" type="number" name="cant_poblacion">
                            <input class="btn btn-light btn-sm" type="submit" value=Editar>
                        </form> 
                    </td>
                </tr>
            {/foreach}
        </table>
    </div>

    
{include file="templates/footer.tpl"}

