<?= $this->include('templates/header') ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión | ESCARH</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
<?php endif; ?>
<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
<?php endif; ?>

<div class="container login-container">
    <div class="col-md-6">
            <img src="ruta/a/tu/imagen.jpg" alt="Imagen" class="img-fluid">
        </div>
    <div class="login-box">
        <h3 class="text-center">Inicia Sesión</h3>
        <div class="text-center">
            <button class="google-btn">
                <img src="https://img.icons8.com/color/48/000000/google-logo.png" href="#"/> Iniciar con Google <!--/auth/google-->
            </button>
        </div>
        <hr>
        <form action="<?= base_url('/sesion/stores') ?>" method="post">
            <div class="mb-3">
                <label class="form-label">Correo Electrónico</label>
                <input type="email" class="form-control" name="correo" placeholder="Escribe tu correo" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Contraseña</label>
                <input type="password" class="form-control" name="contrasena" placeholder="Escribe tu contraseña" required>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" name="recuerdame">
                <label class="form-check-label">Recuérdame</label>
            </div>
            <button type="submit" class="btn btn-primary w-100">Iniciar Sesión</button>
        </form>
        <div class="text-center mt-3">
            <p>No tienes cuenta? <a href="<?= base_url('registro') ?>">Regístrate</a></p>
           <!-- <p><a href="</?= base_url('recuperar-contrasena') ?>">Olvidé mi contraseña</a></p>-->
        </div>
    </div>
</div>

</body>
</html>
<?= $this->include('templates/footer') ?>

<style>
        body {
            background-color:rgb(255, 255, 255);
        }
        .login-container {
            display: flex;
            height: 100vh;
            align-items: center;
            justify-content: center;
        }
        .login-box {
            background: white;
            padding: 30px;
            border-radius: 10px;
           /* box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);*/
            width: 400px;
        }
        .google-btn {
            background: white;
            border: 1px solid #ddd;
           /* display: flex;*/
            align-items: center;
           /* justify-content: center;*/
            padding: 8px;
            border-radius: 5px;
            cursor: pointer;
            color: #282977;
            font-weight: bold;
        }
        .google-btn img {
            width: 20px;
            margin-right: 8px;
        }
        .btn-primary {
            background-color: #2c2c6c;
            border: none;
        }
        .btn-primary:hover {
            background-color: #1d1d4f;
        }
    </style>