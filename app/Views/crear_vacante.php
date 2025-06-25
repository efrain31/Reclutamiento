<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
  <title>Crear | Vacante</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">  
  <link href="<?= base_url('../css/bolsa_empleo.css') ?>" rel="stylesheet">
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
<?= $this->include('templates/header') ?> 

<div class="container my-5">
  <h2 class="section-title">Nueva Vacante</h2>
  
  <div style="text-align: right;">
        <a href="javascript:window.history.go(-1);" class="btn btn-link">Atrás</a>
  </div>

  <h2 class="section-sub">Llena la información</h2>
  <form action="<?= base_url('vacantes/guardar') ?>" method="post" enctype="multipart/form-data">
 
    <div class="row g-3">

      <div class="col-md-6">
        <label class="form-label">Título</label>
        <input type="text" name="titulo" class="form-control" placeholder="Título" required>
      </div>

      <div class="col-md-6">
        <label class="form-label">Descrición de la empresa</label>
        <textarea name="descripcion" class="form-control" placeholder="Descripción"></textarea>
      </div>

      <div class="col-md-6">
        <label class="form-label">Categoría</label>
        <!--<input type="text" name="categoria" class="form-control" placeholder="Categoría">-->
        <select name="categoria" class="form-select">
          <option value="Chofer">Chofer</option>
          <option value="Ventas">Ventas</option>
          <option value="Administrativo">Administrativo</option>
          <option value="Mecánico">Mecánico</option>
          <option value="Electro Mecánico">Electro Mecánico</option>
        </select>
      </div>

      <div class="col-md-6">
        <label class="form-label">Tipo de trabajo</label>
        <select name="tipo" class="form-select">
          <option value="Tiempo completo">Tiempo completo</option>
          <option value="Medio tiempo">Medio tiempo</option>
          <option value="Freelance">Freelance</option>
        </select>
      </div>

      <div class="col-md-6">
        <label class="form-label">Ciudad, Municipio</label>
        <input type="text" name="ubicacion" class="form-control" placeholder="Ubicación">
      </div>

      <!--<div class="col-md-6">
        <label class="form-label">Modalidad</label>
        <select name="modalidad" class="form-select">
          <option value="Presencial">Presencial</option>
          <option value="Híbrido">Híbrido</option>
          <option value="Remote">Remote</option>
        </select>
      </div>-->

      <!--<div class="col-md-6">
        <label class="form-label">Ubicación</label>
        <input type="text" name="ubicacion" class="form-control" placeholder="Ubicación">
      </div>-->

      <div class="col-md-6">
        <label class="form-label">Salario Mensual</label>
        <!--<input type="text" name="salario" class="form-control" placeholder="Salario">-->
        <select name="salario" class="form-select">
          <option value="$1000">$1000</option>
          <option value="$5000">$5000</option>
          <option value="$10000">$10000</option>
        </select>
      </div>

      <div class="col-md-6">
        <label class="form-label">Requisitos del puesto</label>
        <textarea name="requisitos" class="form-control" placeholder="Requisitos del puesto"></textarea>
      </div>

      <div class="col-md-6">
        <label class="form-label">Responsabilidades del puesto</label>
        <textarea name="responsabilidades" class="form-control" placeholder="Responsabilidades del puesto"></textarea>
      </div>

      <div class="col-md-6">
        <label class="form-label">Prestaciones y Beneficios Adicionales</label>
      <textarea name="prestaciones" class="form-control" placeholder="Prestaciones y beneficios"></textarea>
      </div>

      <div class="col-md-6">
        <label class="form-label">Habilidades Requeridas</label>
        <input type="text" name="habilidades" class="form-control" placeholder="Habilidades (separadas por coma)">
      </div>

      <div class="col-md-6">
        <label class="form-label">Logo de la empresa</label>
        <input type="file" name="logo" class="form-control">
      </div>

    </div>

    <div class="mt-4">
      <button type="submit" class="btn btn-guardar">Guardar</button>
    </div>
  </form>

</div>
</body>
</html>
<!-- Aquí podrías agregar la lista de vacantes, filtros, etc. -->
<?= $this->include('templates/footer') ?> <!-- Llama al footer -->

<style>
    .form-label { 
      font-weight: 600; 
    }
    .form-control, .form-select { 
      border-radius: .5rem; 
    }
    .btn-guardar { 
      background: #1a1a66; 
      color: #fff; 
      border-radius: .5rem; 
    }
    .btn-guardar:hover {
      background:#1a1a66; 
      color: #fff; 
    }
    .section-title { 
      font-size: 2rem; 
      font-weight: 700; 
      margin-bottom: 1rem; 
    }
    .section-sub { 
      font-size: 1.1rem; 
      /*font-weight: 700;*/ 
      margin-bottom: 1rem; 
    }
    .my-5 {
      margin-top: 7rem !important;
      margin-bottom: 3rem !important;
      padding: 60px;
    }
  </style>