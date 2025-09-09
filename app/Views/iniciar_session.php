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
        <div class="row align-items-center">
            <!-- Columna de la imagen -->
            <div class="col-md-6 mb-3 mb-md-0 text-center">
                <img src="img/inicio-sesion.jpeg" alt="Imagen" class="img-fluid">
            </div>

            <!-- Columna del login -->
            <div class="col-md-6">
                <div class="login-box p-4">
                    <h3 class="text-center mb-3">Inicia Sesión</h3>
                    <div class="text-center mb-3">
                        <button class="google-btn">
                            <img src="https://img.icons8.com/color/48/000000/google-logo.png" /> Iniciar con Google
                        </button>
                    </div>
                    <hr>
                    <form action="<?= base_url('/sesion/stores') ?>" method="post">
                        <div class="mb-3">
                            <label class="form-label">Correo Electrónico</label>
                            <input type="email" class="form-control" name="correo" placeholder="Escribe tu correo" required>
                        </div>
                        <div class="mb-3 position-relative">
                            <label class="form-label">Contraseña</label>
                            <input type="password" class="form-control" name="contrasena" id="contrasena" placeholder="Escribe tu contraseña" required>
                            <span toggle="#contrasena" class="bi bi-eye-slash toggle-password"></span>
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" name="recuerdame">
                            <label class="form-check-label">Recuérdame</label>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Iniciar Sesión</button>
                    </form>
                    <div class="text-center mt-3">
                        <p>No tienes cuenta? <a href="<?= base_url('registro') ?>">Regístrate</a></p>
                        <p><a href="<?= base_url('recuperar-contrasena') ?>">Olvidé mi contraseña</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
<?= $this->include('templates/footer') ?>

<!-- Bootstrap icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

<script>
    const togglePassword = document.querySelectorAll(".toggle-password");
    togglePassword.forEach(item => {
        item.addEventListener("click", function() {
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
    body {
        background-color: rgb(255, 255, 255);
    }

    .login-container {
        display: flex;
        height: 100vh;
        align-items: center;
        justify-content: center;
        flex-wrap: wrap; 
    }

    .login-box {
        background: white;
        padding: 30px;
        border-radius: 10px;
        width: 400px;
        box-sizing: border-box;
    }

    .google-btn {
        background: white;
        border: 1px solid #ddd;
        align-items: center;
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

    .img-fluid {
        max-width: 80%;
        height: auto;
        margin-top: 150px; /* Baja la imagen */
        margin-bottom: 30px;
    }

    .toggle-password {
        cursor: pointer;
        position: absolute;
        right: 15px;
        top: 75%;
        transform: translateY(-50%);
        color: #888;
    }

    @media (max-width: 768px) {
        .login-container {
            display: block;
            height: auto;
            padding-top: 30px; /* Para que no choque con navbar */
        }

        .img-fluid {
            max-width: 70%;
            margin-top: 50px; 
        }

        .login-box {
            width: 90%;
            margin: auto;
            margin-top: 20px;
        }
    }
</style>
