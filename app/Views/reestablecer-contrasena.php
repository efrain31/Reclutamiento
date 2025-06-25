<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Restablecer contraseña</title>
  <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- IMPORTANTE para responsividad -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<?= $this->include('templates/header') ?>

<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card shadow rounded-3">
        <div class="card-body">
          <h3 class="text-center mb-4">Cambiar contraseña</h3>

          <?php if(session()->getFlashdata('success')): ?>
              <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
            <?php elseif(session()->getFlashdata('error')): ?>
              <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
            <?php endif; ?>

          <form action="<?= base_url('actualizar-contrasena') ?>" method="post">
            <?= csrf_field() ?>

            <input type="hidden" name="correo" value="<?= esc($correo) ?>">
            <input type="hidden" name="token" value="<?= esc($token) ?>">

            <div class="mb-3 position-relative">
              <label class="form-label">Contraseña nueva</label>
              <input type="password" name="contrasena" id="contrasena" class="form-control" required>
              <span toggle="#contrasena" class="bi bi-eye-slash toggle-password"></span>
            </div>

            <div class="mb-3 position-relative">
              <label class="form-label">Confirmar tu contraseña</label>
              <input type="password" name="confirmar_contrasena" id="confirmar_contrasena" class="form-control" required>
              <span toggle="#confirmar_contrasena" class="bi bi-eye-slash toggle-password"></span>
            </div>

            <!--<div class="form-check mb-3">
              <input class="form-check-input" type="checkbox" name="cerrar_sesiones" id="cerrar_sesiones">
              <label class="form-check-label" for="cerrar_sesiones">
                Cerrar mis sesiones activas en otros dispositivos
              </label>
            </div>-->

            <button type="submit" class="btn btn-primary w-100">Cambiar contraseña</button>
          </form>

          <div class="mt-3 text-center">
            <a href="<?= base_url('iniciar_session') ?>">Volver al inicio de sesión</a>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

<script>
  const togglePassword = document.querySelectorAll(".toggle-password");
  togglePassword.forEach(item => {
    item.addEventListener("click", function () {
      const input = document.querySelector(this.getAttribute("toggle"));
      if (input.type === "password") {
        input.type = "text";
        this.classList.remove("bi-eye-slash");
        this.classList.add("bi-eye");
      } else {
        input.type = "password";
        this.classList.remove("bi-eye");
        this.classList.add("bi-eye-slash");
      }
    });
  });
</script>
<style>
    .toggle-password {
      cursor: pointer;
      position: absolute;
      right: 15px;
      top: 75%;
      transform: translateY(-50%);
      color: #888;
    }
    .btn-primary {
      background-color: #1a1a6c;
      border-color: #1a1a6c;
    }
    .py-5 {
    padding-top: 6rem !important;
    padding-bottom: 3rem !important;
}
  </style>
  
</body>
</html>
<?= $this->include('templates/footer') ?>