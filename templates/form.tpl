{include file="templates/header.tpl"}
    <form class="mb-3" name="form-comentarios" id="comment-form"  method="POST">
        <div>    
            <label>Email:</label>
            <input class="opinar" type="text" name= "email" id="email" value={$email}>
            <label>Puntaje:</label> 
            <select name="puntaje" id="puntaje"> 
                <option value=1 class="opinar" name="atraccion">1</option>
                <option value=2 class="opinar" name="atraccion">2</option>
                <option value=3 class="opinar" name="atraccion">3</option>
                <option value=4 class="opinar" name="atraccion">4</option>
                <option value=5 class="opinar" name="atraccion">5</option>
            </select>
            <label>Atracción:</label> 
            <select class="opinar" name="id_atraccion" id="id_atraccion">
                {foreach from=$atracciones item=$atraccion }
                    <option value={$atraccion->id} class="opinar" name="atraccion">{$atraccion->nombre}</option>
                {/foreach} 
            </select>
        </div>
        <div>
            <textarea cols="80" rows="5" class="opinar" type="text" name="opinion" id="opinion" placeholder='Escribí tu opinión'></textarea>
        </div>
        <input id="opinar" class="btn btn-light btn-sm" type="submit" value="Agregar Comentario">
        <input id="usuarioId" name="usuarioId" type="hidden" value="{$id}">
    </form>

    {include file="templates/footer.tpl"}