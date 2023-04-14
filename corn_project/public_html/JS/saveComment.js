$(document).ready(function () {
  // cuando se envía el formulario
  $("#comentario-form").submit(function (event) {
    // prevenir la recarga de la página
    event.preventDefault();

    // obtener los datos del formulario
    var comentario = $("#comentario").val();
    var id_recipe = $("#id_recipe").val();
    var user_form = $("#user_form").val();

    // enviar los datos con AJAX
    $.ajax({
      type: "POST",
      url: "../../../../app/Controllers/SaveComment.php", // aquí va la URL del archivo PHP que guarda el comentario en la base de datos
      data: {
        comentario: comentario,
        id_recipe: id_recipe,
        user: user_form,
      },
      success: function (response) {
        var res = JSON.parse(response);
        $("#comentarios").append(
          '<div class="card"><div class="card-header text-body-secondary"><span class="badge bg-secondary">' +
            res.nombre +
            '</span> Ahora </div><div class="card-body"><p class="card-text">' +
            res.comentario +
            "</p></div></div>"
        );
        // Limpiar el formulario de comentarios
        $("#comentario").val("");
      },
      error: function (response) {
        var error = JSON.parse(response.responseText);
        alert(error.mensaje);
      },
    });
  });
});
