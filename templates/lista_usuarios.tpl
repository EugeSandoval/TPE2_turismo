{include file="templates/header.tpl"}
<h1 class="mb-3">{$titulo}</h1> 
    <div class="container container-sm">
        <table class="table table-sm">
        <thead>
            <th>Email</th>
            <th>¿Es admin?</th>
            <th>Permisos</th>
            <th>Eliminar</th>
        </thead>
            {foreach from=$usuarios item=$usuario}
                <tr class="table-info">
                    <td>{$usuario->email}</td>
                    {if !($usuario->administrador)}
                        <td>NO</td>
                    {else}
                        <td>SI</td>
                    {/if}
                    {if !($usuario->administrador)}
                        <td>
                            <a class="btn btn-secondary" href="administrarPermisos/{$usuario->id_usuario}">Asignar</a>
                        </td>
                    {else}
                        <td>
                            <a class="btn btn-secondary" href="administrarPermisos/{$usuario->id_usuario}">Quitar</a>
                        </td>
                    {/if}
                    <td>
                        <a class="btn btn-secondary" href="eliminarUsuario/{$usuario->id_usuario}">X</a>
                    </td>
                </tr>
            {/foreach}
        </table>
    </div>
{include file="templates/footer.tpl"}