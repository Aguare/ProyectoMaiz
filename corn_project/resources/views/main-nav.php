<nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="/../../corn_project/public_html/index.php">
      <img src="/../../corn_project/public_html/img/home.png" alt="Logo" style="width:35px;">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/../../corn_project/public_html/index.php">Inicio</a>
        </li>
      </ul>
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#login-modal">
        Iniciar sesión
      </button>
    </div>
</nav>

<!-- Modal -->
<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="login-modal-label"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="login-modal-label">Iniciar sesión</h5>
      </div>
      <form method="post" action="/../corn_project/app/Controllers/ValidateSesion.php" class="was-validated">
        <div class="modal-body">

          <div class="form-group">
            <label for="username">Nombre de Usuario:</label>
            <input type="text" class="form-control" name="user" placeholder="Ingresa tu nombre de usuario" required>
          </div>
          <div class="form-group">
            <label for="password">Contraseña:</label>
            <input type="password" class="form-control" name="password" placeholder="Ingresa tu contraseña" required>
          </div>

        </div>
        <div class="modal-footer">
          <a href="/../../corn_project/resources/views/register.php" class="btn btn-link">Registrarse</a>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Iniciar sesión</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Scripts de Bootstrap -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
  integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
  integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>