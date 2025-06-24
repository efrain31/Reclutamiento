<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Recuperar contraseña</title>
  <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- IMPORTANTE para responsividad -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body class="bg-light">
<?= $this->include('templates/header') ?>

  <div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-12 col-sm-10 col-md-8 col-lg-6">

        <div class="card shadow">
          <div class="card-body">
            <h3 class="text-center mb-4">Recuperar contraseña</h3>

            <?php if(session()->getFlashdata('success')): ?>
              <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
            <?php elseif(session()->getFlashdata('error')): ?>
              <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
            <?php endif; ?>

            <form action="<?= base_url('enviar-recuperacion') ?>" method="post">
              <?= csrf_field() ?>

              <div class="mb-3">
                <label for="correo" class="form-label">Correo electrónico</label>
                <input type="email" class="form-control" id="correo" name="correo" placeholder="Ingresa tu correo" required>
              </div>

              <div class="g-recaptcha mb-3" data-sitekey="6Leo_BQrAAAAAMQKs5ukj9Fa_4AUYXJF0OBltts7"></div>

              <button type="submit" class="btn btn-primary w-100">Enviar enlace de recuperación</button>
            </form>

            <div class="mt-3 text-center">
              <a href="<?= base_url('iniciar_session') ?>">Volver al inicio de sesión</a>
            </div>

          </div>
        </div>

      </div>
    </div>
  </div>
  <?= $this->include('templates/footer') ?>
</body>
</html>


<style>
   body {
 background-color: #f8f9fa;
    }

    .card {
      border: none;
      border-radius: 10px;
    }

    .btn-primary {
      background-color: #1a1a6c;
      border-color: #1a1a6c;
    }

    .btn-primary:hover {
      background-color: #0d0d4c;
      border-color: #0d0d4c;
    }

    .g-recaptcha {
      display: flex;
      justify-content: center;
    }
.py-5 {
    padding-top: 6rem !important;
    padding-bottom: 3rem !important;
}
</style>