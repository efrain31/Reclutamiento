<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
  <title>Bolsa | Empleo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet"> 
  <link href="<?= base_url('../css/bolsa_empleo.css') ?>" rel="stylesheet">
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
  <?= $this->include('templates/header') ?> 

    <div class="container text-center my-5">
    <h1 class="titulo">¡Encuentra el trabajo ideal para ti!</h1>
    <p class="subtitulo">Encuentra ofertas de trabajo en empresas de todos los sectores. ¡Postúlate hoy mismo y comienza tu carrera!</p>

  <form method="GET" action="<?= base_url('bolsa_empleo') ?>" class="buscador my-4">
    <div class="input-group buscador-input-group ">
    <input type="text" name="busqueda" class="form-control buscador-input" placeholder="Título, salario, empresa..." value="<?= esc($busqueda ?? '') ?>">
    <button class="btn btn-primary buscador-btn" type="submit">
      <i class="bi bi-search"></i>
    </button>
    </div>
    <button class="btn btn-outline-secondary filtros-btn" type="button">
      <i class="bi bi-filter-left"></i> Filtros
    </button>
  </form>

  <!--</?php if (session()->get('isLoggedIn') && session()->get('id_rol') === '1'): ?>
    <div class="mb-4">
    <a href="</?= base_url('crear_vacante') ?>" class="btn btn-crear">Crear Vacante</a>
    </div>
  </?php endif; ?>-->
    <h2 class="seccion-vacantes">Vacantes disponibles</h2>

  <div id="vacantes-container">
  
  </div>   
</div>
</body>
</html>
<?= $this->include('templates/footer') ?> <!-- Llama al footer -->

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script>

   document.addEventListener("DOMContentLoaded", function() {
        // Detectar si estamos en la página de Registro
        let urlActual = window.location.pathname;
        if (urlActual.includes("bolsa_empleo")) {
            // Capturar el botón "Nosotros"
            let btnNosotros = document.getElementById("btnNosotros");

            if (btnNosotros) {
                btnNosotros.addEventListener("click", function(event) {
                    event.preventDefault(); // Evita la navegación normal
                    window.location.href = "<?= base_url('/') ?>#nosotros"; // Redirige a la sección "bolsa" en inicio
                });
            }
        }
    });

function cargarVacantes(busqueda = '') {
    $.ajax({
        url: "<?= base_url('bolsa_empleo') ?>",
        method: "GET",
        data: { busqueda: busqueda},
        success: function(data) {
            $('#vacantes-container').html(data);
        }
    });
}

$(document).ready(function(){
  cargarVacantes(); 
    // Búsqueda en vivo
    $('.buscador-input').on('keyup', function(){
        let busqueda = $(this).val();
        cargarVacantes(busqueda);
    });

    // Delegar paginación
    $(document).on('click', '.pagination a', function(e){
        e.preventDefault();
        let url = $(this).attr('href');
        $.get(url, function(data){
        $('#vacantes-container').html(data);
    });
    });
});

// SweetAlert mensajes desde Flashdata
  <?php if(session()->getFlashdata('success')): ?>
    Swal.fire({
      icon: 'success',
      title: '¡Listo!',
      text: <?= json_encode(session()->getFlashdata('success')) ?>,
      confirmButtonColor: '#1a1e6a'
    });
  <?php elseif(session()->getFlashdata('error')): ?>
    Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: <?= json_encode(session()->getFlashdata('error')) ?>,
      confirmButtonColor: '#1a1e6a'
    });
  <?php elseif(session()->getFlashdata('info')): ?>
    Swal.fire({
      icon: 'info',
      title: 'Atención',
      text: <?= json_encode(session()->getFlashdata('info')) ?>,
      confirmButtonColor: '#1a1e6a'
    });
  <?php endif; ?>
</script>

<style>
.my-5 {
  padding: 60px;
}
.vacante-item {
  border-bottom: 1px solid #dee2e6;
  padding: 90px 0 0;
  position: relative;
}
.vacante-logo {
  width: 70px;
  height: 70px;
  border-radius: 8px;
  /*object-fit: cover;*/
  /*width: 60px;
  height: 60px;
  border-radius: 10px;
  background: #f2f2f2;*/
  object-fit: contain;
}
.vacante-logo-placeholder {
  width: 50px;
  height: 50px;
  background: #ffeb3b;
  border-radius: 8px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 24px;
  color: #333;
}
.vacante-titulo {
  font-size: 18px;
  font-weight: 700;
}
.vacante-descripcion {
  color: #6c757d;
  text-align: justify;
  display: -webkit-box;
  -webkit-line-clamp: 3; /* número de líneas antes de cortar */
  -webkit-box-orient: vertical;
  overflow: hidden;
  text-overflow: ellipsis;
  margin-bottom: 6px;
}
.vacante-vermas {
  color: #007bff;
  font-weight: 600;
  text-decoration: none;
  display: inline-flex;
  align-items: center;
  gap: 4px;
  font-size: 13px;
}
.vacante-meta {
  display: flex;
  gap: 16px;
  align-items: center;
  font-size: 14px;
  flex-wrap: wrap;
  margin-top: 8px;
}
.badge.bg-light {
  background: #f8f9fa !important;
  border-radius: 6px;
  padding: 4px 8px;
  font-size: 13px;
}
.vacante-actions {
  position: absolute;
  top: 100px;
  right: 0;
}
.btn-editar, .btn-editar:hover {
  background: #1a1e6a;
  color: #fff;
  border-radius: 8px;
  padding: 6px 14px;
  font-size: 14px;
  text-decoration: none;
  display: inline-block;
  transition: 0.3s;
}
.btn-crear, .btn-crear:hover {
  background: #1a1e6a;
  color: #fff;
}
.btn-postulate, .btn-postulate:hover {
  background: #1a1e6a; /*#198754*/
  color: #fff;
  border-radius: 8px;
  padding: 6px 14px;
  font-size: 14px;
  text-decoration: none;
  display: inline-block;
  transition: 0.3s;
}
@media (max-width: 768px) {
  .vacante-item {
    flex-direction: column;
  }
  .vacante-actions {
    position: static;
    margin-top: 10px;
  }
  .vacante-meta {
    flex-wrap: wrap;
    gap: 8px;
  }
}
</style>