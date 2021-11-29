{include file='templates/header.tpl'}

<h1>Comentarios</h1> 
    {if ($isAdmin)}
    <table class="container container-sm table table-sm complete"  id="ver-comentarios">
        
    </table>
    {else}
    <table class="container container-sm table table-sm"  id="ver-comentarios">
        
    </table>
    {/if}
<script src="js/cargarComentarios.js"></script> 
{include file='templates/footer.tpl'}

