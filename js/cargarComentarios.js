document.addEventListener("DOMContentLoaded", iniciarPagina);
const url = "api/comentario";

async function getComentarios() {

    try {
        let response = await fetch(url);
        let comentarios = await response.json();
        verComentario(comentarios);
    } catch (error) {
        console.log(error);
    }
}

function verComentario(comentarios) {
    let calificacion = document.querySelector("#ver-comentarios");
    calificacion.innerHTML = "";
    let isAdmin = calificacion.classList.contains('complete');
    let header= `<tr >  
                    <th>  USER </th>   
                    <th>  COMENTARIO  </th>  
                    <th>  PUNTAJE </th>  
                    <th>  ATRACCION </th>   
                    ${isAdmin ? '<th>  ACCION </th>':''}
                </tr>`;
    calificacion.innerHTML += header;
    for (let comentario of comentarios) {
            let html = `<tr >
                            <td> ${comentario.email} </td>
                            <td> ${comentario.opinion} </td> 
                            <td> ${comentario.puntaje} </td> 
                            <td> ${comentario.nombre} </td>
                            ${isAdmin ? `<td>  <button class="btn btn-secondary btn-eliminar" onclick='eliminarComentario(${comentario.id_comentario})'>X</a> </td>`:''}
                        </tr>`;
            calificacion.innerHTML += html; 
    }
}

function iniciarPagina(e) {
    e.preventDefault();
    "use strict";
    const usuarioId = document.querySelector("#usuarioId");//input-hidden
    
    getComentarios();

    //funcion de agregar comments
    let formulario = document.getElementById("comment-form");
    if (formulario) {
        formulario.addEventListener("submit", async function (e) {
            e.preventDefault();

            let id_atraccion = document.querySelector("#id_atraccion");
            let email = document.querySelector("#email");
            let opinion = document.querySelector("#opinion");
            let puntaje = document.querySelector("#puntaje");
            let usuario = usuarioId.value;

            let opiniones = {
                // llama al valor del input y se lo asigna dentro de comentario dentro del json
                "email": email.value,
                "opinion": opinion.value,
                "id_atraccion": id_atraccion.value,
                "puntaje": puntaje.value,
                "id_usuario": usuario,
            }
            try {
                await fetch(url + "/" + id_atraccion.value, {
                    "method": "POST",
                    "headers": { 'Content-type': "application/json" },
                    "body": JSON.stringify(opiniones),
                })
                    .then(() => {
                        getComentarios();
                    })
                    .catch((error) => {
                        console.log(error);
                    });
            }
            catch (e) {
                console.log("hubo un error", e);
            }
        });

    }
}

async function eliminarComentario(id_comentario){
    
    try{
       await fetch(url + "/" + id_comentario, {
        "method": "DELETE",
        "headers": { 'Content-type': "application/json" },
    })
        .then(() => {
            getComentarios();
        })
        .catch((error) => {
            console.log(error)
        });
    }
    catch(error){
        console.log(error);
    }
}

