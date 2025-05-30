<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
  <title>Registro | ESCARH</title>
  <?= $this->include('templates/styless') ?>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<?= $this->include('templates/header') ?>

<div class="registro">
        <div class="row container-custom">
            <div class="col-md-5 text-md-start text-center mb-4">
                <h2 class="fw-bold"> Regístrate</h2>
                <p>Y accede a las mejores oportunidades laborales.</p>
            </div>
            <div class="col-md-7">
                <div class="form-registro">
                    <form action="/registro/store" method="POST">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Nombre</label>
                                <input type="text" class="form-control" name="nombre" placeholder="Escriba su nombre" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Apellido</label>
                                <input type="text" class="form-control" name="apellido" placeholder="Escriba su apellido" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Correo</label>
                                <input type="email" class="form-control" name="correo"placeholder="Escriba su correo" required>
                            </div>
                          <div class="col-md-6">
                            <label class="form-label">Celular</label>
                            <input type="tel" class="form-control" name="celular" placeholder="10 dígitos" required>
                        </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Soy</label>
                            <select name="soy" class="form-select">
                                <option>Empresa</option>
                                <option>Postulado</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                                <label class="form-label">Contraseña</label>
                                <input type="password" class="form-control" name="contrasena" placeholder="Escriba su contraseña" required>
                            </div>
                            <div class="botones">
                        <button type="submit" class="btn3" >Regístrate</button>
</div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
   document.addEventListener("DOMContentLoaded", function() {
        // Detectar si estamos en la página de Registro
        let urlActual = window.location.pathname;
        if (urlActual.includes("registro")) {
            // Capturar el botón "Nosotros"
            let btnNosotros = document.getElementById("btnNosotros");

            if (btnNosotros) {
                btnNosotros.addEventListener("click", function(event) {
                    event.preventDefault(); // Evita la navegación normal
                    window.location.href = "<?= base_url('inicio') ?>#nosotros"; // Redirige a la sección "Nosotros" en inicio
                });
            }
        }
    });

    document.addEventListener("DOMContentLoaded", function() {
        // Detectar si estamos en la página de Registro
        let urlActual = window.location.pathname;
        if (urlActual.includes("registro")) {
            // Capturar el botón "Nosotros"
            let btnBolsa = document.getElementById("btnBolsa");

            if (btnBolsa) {
                btnBolsa.addEventListener("click", function(event) {
                    event.preventDefault(); // Evita la navegación normal
                    window.location.href = "<?= base_url('inicio') ?>#bolsas"; // Redirige a la sección "bolsa" en inicio
                });
            }
        }
    });

    document.addEventListener("DOMContentLoaded", function() {
    <?php if (session()->getFlashdata('success')): ?>
            Swal.fire({
                icon: 'success',
                title: '¡Registro exitoso!',
                text: '<?= session()->getFlashdata('success') ?>',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Aceptar'
            }).then(() => {
                // Redirigir al formulario si hace falta
                window.location.hash = 'iniciar_sesion';
            });
        <?php elseif (session()->getFlashdata('error')): ?>
            Swal.fire({
                icon: 'error',
                title: '¡Error!',
                text: '<?= session()->getFlashdata('error') ?>',
                confirmButtonColor: '#d33',
                confirmButtonText: 'Intentar de nuevo'
            }).then(() => {
                window.location.hash = 'registro';
            });
        <?php elseif (session()->getFlashdata('errors')): ?>
            Swal.fire({
                icon: 'warning',
                title: 'Hay errores en el registro',
                html: `<ul style="text-align: left;"><?php foreach (session()->getFlashdata('errors') as $e): ?><li><?= esc($e) ?></li><?php endforeach; ?></ul>`,
                confirmButtonColor: '#f0ad4e',
                confirmButtonText: 'Corregir'
            }).then(() => {
                window.location.hash = 'registro';
            });
        <?php endif; ?>
    });
    </script>
</body>
</html>
<?= $this->include('templates/footer') ?> <!-- Llama al footer -->


<style  {csp-style-nonce}>
.form-select {
    background-color: white;
    --bs-form-select-bg-img: url(data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%23343a40' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='m2 5 6 6 6-6'/%3e%3c/svg%3e);
}
.text-md-start {
    text-align: center !important;
}
    </style>