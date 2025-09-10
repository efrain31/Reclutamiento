<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <title>Crea tu CV | ESCARH</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>


  <?= $this->include('templates/header') ?>

  <div class="container mt-5 mb-5">
    <div class="text-center mb-4">
      <div style="text-align: right;">
        <a href="javascript:window.history.go(-1);" class="back-button">← Atrás</a> 
      </div>
      <h2 class="fw-bold">Crea tu CV</h2>
      <p class="text-muted">Completa tu CV para que los empleadores te encuentren fácilmente</p>
    </div>

    <form action="<?= base_url('guardar_cv') ?>" method="POST">
      <?= csrf_field() ?>

      <!-- Información personal -->
      <h5 class="form-title">Información personal</h5>
      <div class="row g-3">
        <div class="col-md-6">
          <label class="form-label">Nombre</label>
          <input type="text" name="nombre" class="form-control" placeholder="Nombre" required>
        </div>
        <div class="col-md-6">
          <label class="form-label">Apellidos</label>
          <input type="text" name="apellidos" class="form-control" placeholder="Apellidos" required>
        </div>
        <div class="col-md-6">
          <label class="form-label">País</label>
          <input type="text" name="pais" class="form-control" placeholder="País" required>
        </div>
        <div class="col-md-6">
          <label class="form-label">Ciudad/Estado</label>
          <input type="text" name="ciudad_estado" class="form-control" placeholder="Ciudad y Estado" required>
        </div>
        <div class="col-md-6">
          <label class="form-label">Domicilio</label>
          <input type="text" name="domicilio" class="form-control" placeholder="Domicilio">
        </div>
        <div class="col-md-6">
          <label class="form-label">C.P.</label>
          <input type="text" name="codigo_postal" class="form-control" placeholder="Código Postal">
        </div>
        <div class="col-md-6">
          <label class="form-label">Correo Electrónico</label>
          <input type="email" name="correo" class="form-control" placeholder="Correo Electrónico" required>
        </div>
        <div class="col-md-6">
          <label class="form-label">Teléfono</label>
          <input type="text" name="telefono" class="form-control" placeholder="Teléfono" required>
        </div>
      </div>

      <!-- EXPERIENCIA -->
      <h5 class="form-title">Experiencia</h5>
      <div id="experiencias">
        <div class="row g-3 experiencia-item">
          <div class="col-md-6">
            <label class="form-label">Nombre de la compañía</label>
            <input type="text" name="empresa[]" class="form-control" placeholder="Nombre de la Compañía">
          </div>
          <div class="col-md-6">
            <label class="form-label">Puesto de trabajo</label>
            <input type="text" name="puesto[]" class="form-control" placeholder="Puesto de trabajo">
          </div>
          <div class="col-md-6">
            <label class="form-label">País</label>
            <input type="text" name="pais_experiencia[]" class="form-control" placeholder="País">
          </div>
          <div class="col-md-6">
            <label class="form-label">Tipo de trabajo</label>
            <select name="tipo_trabajo[]" class="form-select">
              <!-- <option value="">Tipo de trabajo</option>-->
              <option value="Presencial">Presencial</option>
              <option value="Remoto">Remoto</option>
              <option value="Híbrido">Híbrido</option>
            </select>
          </div>
          <div class="col-md-3">
            <label class="form-label">Mes de inicio</label>
            <input type="text" name="mes_inicio[]" class="form-control" placeholder="Mes de inicio">
          </div>
          <div class="col-md-3">
            <label class="form-label">Año de inicio</label>
            <input type="text" name="anio_inicio[]" class="form-control" placeholder="Año de inicio">
          </div>
          <div class="col-md-3">
            <label class="form-label">Mes de finalización</label>
            <input type="text" name="mes_fin[]" class="form-control" placeholder="Mes de finalización">
          </div>
          <div class="col-md-3">
            <label class="form-label">Año de finalización</label>
            <input type="text" name="anio_fin[]" class="form-control" placeholder="Año de finalización">
          </div>
          <div class="col-12">
            <div class="form-check">

              <input class="form-check-input" type="checkbox" name="trabajo_actual[]" value="1">
              <label class="form-check-label">Todavía trabajo ahí</label>
            </div>
          </div>
          <hr>
        </div>
      </div>

      <div class="mb-3">
        <button type="button" class="btn btn-outline-primary btn-sm" onclick="agregarExperiencia()">+ Agregar otra experiencia</button>
      </div>

      <!-- EDUCACIÓN -->
      <h5 class="form-title">Educación</h5>
      <div id="educaciones">
        <div class="row g-3 educacion-item">
          <div class="col-md-6">
            <label class="form-label">Nivel académico</label>
            <input type="text" name="nivel_academico[]" class="form-control" placeholder="Nivel académico">
          </div>
          <div class="col-md-6">
            <label class="form-label">Escuela</label>
            <input type="text" name="escuela[]" class="form-control" placeholder="Escuela">
          </div>
          <div class="col-md-6">
            <label class="form-label">Carrera</label>
            <input type="text" name="carrera[]" class="form-control" placeholder="Carrera">
          </div>
          <div class="col-md-6">
            <label class="form-label">Año graduación</label>
            <input type="text" name="anio_graduacion[]" class="form-control" placeholder="Año de graduación">
          </div>
          <div class="col-12">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="sigo_estudiando[]" value="1">
              <label class="form-check-label">Sigo estudiando</label>
            </div>
          </div>
          <hr>
        </div>
      </div>

      <div class="mb-4">
        <button type="button" class="btn btn-outline-primary btn-sm" onclick="agregarEducacion()">+ Agregar otra educación</button>
      </div>

      <!-- HABILIDADES,CONOCIMIENTOS E IDIOMAS -->
      <h5 class="form-title">Habilidades, conocimientos e idiomas</h5>
      <div class="row g-3 habilidades-item">
        <div class="col-md-6">
          <textarea name="habilidades" class="form-control" rows="4" placeholder="habilidades, conocimientos e idiomas (separadas por coma)"></textarea>
        </div>
        <hr>
      </div>

      <div class="d-grid mt-4">
        <button type="submit" class="btn btn-primary btn-lg">Crear CV</button>
      </div>
    </form>

  </div>

  <?= $this->include('templates/footer') ?>

</body>

</html>

<script>
  function agregarExperiencia() {
    let experiencia = document.querySelector('.experiencia-item');
    let nueva = experiencia.cloneNode(true);
    // Limpiar los valores
    nueva.querySelectorAll('input, select').forEach(el => {
      if (el.type === 'checkbox') el.checked = false;
      else el.value = '';
    });
    document.getElementById('experiencias').appendChild(nueva);
  }

  function agregarEducacion() {
    let educacion = document.querySelector('.educacion-item');
    let nueva = educacion.cloneNode(true);
    // Limpiar los valores
    nueva.querySelectorAll('input, select').forEach(el => {
      if (el.type === 'checkbox') el.checked = false;
      else el.value = '';
    });
    document.getElementById('educaciones').appendChild(nueva);
  }

  // SweetAlert mensajes desde Flashdata
  <?php if (session()->getFlashdata('success')): ?>
    Swal.fire({
      icon: 'success',
      title: '¡Listo!',
      text: <?= json_encode(session()->getFlashdata('success')) ?>,
      confirmButtonColor: '#1a1e6a'
    });
  <?php elseif (session()->getFlashdata('error')): ?>
    Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: <?= json_encode(session()->getFlashdata('error')) ?>,
      confirmButtonColor: '#1a1e6a'
    });
  <?php elseif (session()->getFlashdata('info')): ?>
    Swal.fire({
      icon: 'info',
      title: 'Atención',
      text: <?= json_encode(session()->getFlashdata('info')) ?>,
      confirmButtonColor: '#1a1e6a'
    });
  <?php endif; ?>
</script>

<style>
  .form-title {
    font-weight: bold;
    margin-top: 30px;
    margin-bottom: 20px;
  }

  .btn-primary {
    background: #1a1e6a;
    border: none;
  }

  .btn-primary:hover {
    background: #141750;
  }

  .mt-5 {
    margin-top: 7rem !important;
  }

  .form-label {
    font-weight: 600;
  }
</style>

<style>
  .back-button {
    display: inline-block;
    padding: 0.5rem 1rem;
    background-color: #282977;
    color: white;
    text-decoration: none;
    border-radius: 0.25rem;
    font-weight: bold;
  }

  .back-button:hover {
    background-color: #150461ff;
  }
</style>