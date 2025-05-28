<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
  <title>Bolsa | Empleo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">  <link href="<?= base_url('../css/bolsa_empleo.css') ?>" rel="stylesheet">
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
<?= $this->include('templates/header') ?> 

<div class="container text-center my-5">
    <h1 class="titulo">¡Encuentra el trabajo ideal para ti!</h1>
    <p class="subtitulo">Encuentra ofertas de trabajo en empresas de todos los sectores. ¡Postúlate hoy mismo y comienza tu carrera!</p>

    <div class="buscador my-4">
    <div class="input-group buscador-input-group"> <!-- flex-grow-1-->
      <input type="text" class="form-control buscador-input" placeholder="Título, salario, empresa...">
      <button class="btn btn-primary buscador-btn" type="button">
        <i class="bi bi-search"></i>
      </button>
    </div>
    <button class="btn btn-outline-secondary filtros-btn" type="button">
      <i class="bi bi-filter-left"></i> Filtros
    </button>
        
  </div>
  <?php if (session()->get('isLoggedIn') && session()->get('id_rol') === '1'): ?>
  <div class="mb-4">
  <a href="<?= base_url('crear_vacante') ?>" class="btn btn-crear">Crear Vacante</a>
</div>
<?php endif; ?>
  <h2 class="seccion-vacantes">Vacantes disponibles</h2>

  <?php if (!empty($vacantes)): ?>
  <?php foreach ($vacantes as $vacante): ?>
    <div class="vacante-item">
      <!-- Logo y Título -->
      <div class="d-flex align-items-center mb-2">
        <?php if (!empty($vacante['logo'])): ?>
          <img src="<?= base_url('vacantes/'.$vacante['logo']) ?>" alt="logo" class="vacante-logo me-3">
        <?php else: ?>
          <div class="vacante-logo-placeholder me-3">
            <i class="bi bi-briefcase-fill"></i>
          </div>
        <?php endif; ?>
        <h5 class="vacante-titulo mb-0"><?= esc($vacante['titulo']) ?></h5>
      </div>

      <!-- Descripción -->
      <p class="vacante-descripcion mb-1"><?= esc($vacante['descripcion']) ?>
      <a href="<?= base_url('ver_vacante/'.$vacante['id']) ?>" class="vacante-vermas">Ver más <i class="bi bi-box-arrow-up-right"></i></a>
      </p>
      <!-- Meta info 
      <div class="vacante-meta mt-2">
        <span class="badge bg-light border text-dark"><-?= esc($vacante['tipo']) ?></span>
        <small><i class="bi bi-geo-alt-fill me-1"></i><-?= esc($vacante['ubicacion']) ?></small>
        <-?php if (function_exists('time_elapsed_string')): ?>
          <small><i class="bi bi-clock me-1"></i><-?= time_elapsed_string($vacante['fecha']) ?></small>
        <-?php endif; ?>
      </div>-->

      <!-- Botones admin -->
      <!--<-?php if (isset($es_admin) && $es_admin): ?>-->
        <?php if (session()->get('isLoggedIn') && session()->get('id_rol') === '1'): ?>
          <div class="vacante-actions">
          <a href="<?= base_url('editar_vacante/'.$vacante['id']) ?>" class="btn btn-editar">Editar vacante</a>
        </div>
        <?php elseif (session()->get('isLoggedIn') && session()->get('id_rol') === '2'): ?>
          <!--<div class="vacante-actions">
          <a href="</?= base_url('vacantes/postulate/'.$vacante['id']) ?>" class="btn btn-editar">Postulate</a>
        </div>-->
        <?php elseif (!session()->get('isLoggedIn')): ?>
        <!--<div class="vacante-actions">
        <a href="</?= base_url('vacantes/postulate/'.$vacante['id']) ?>" class="btn btn-editar">Postúlate</a>
        </div>-->
        <?php endif; ?>
     <!-- <-?php endif; ?>-->
    </div>
    <!-- Meta info -->
    <div class="vacante-meta mt-2">
        <span class="badge bg-light border text-dark"><?= esc($vacante['tipo']) ?></span>
        <small><i class="bi bi-geo-alt-fill me-1"></i><?= esc($vacante['ubicacion']) ?></small>
        <?php if (function_exists('time_elapsed_string')): ?>
          <small><i class="bi bi-clock me-1"></i><?= time_elapsed_string($vacante['created_at']) ?></small>
        <?php endif; ?>
    </div>

  <?php endforeach; ?>
<?php else: ?>
  <p>No hay vacantes disponibles por el momento.</p>
<?php endif; ?>

        <!--<div class="vacante-actions">
          <a href="<-?= base_url('vacantes/editar/'.$vacante['id']) ?>" class="btn btn-outline-primary btn-sm mb-1">Editar</a>
          <a href="<-?= base_url('vacantes/eliminar/'.$vacante['id']) ?>" class="btn btn-outline-danger btn-sm">Eliminar</a>
          <a href="<-?= base_url('vacantes/cerrar/'.$vacante['id']) ?>" class="btn btn-primary btn-sm">Cerrar</a>
        </div>-->
     
    
</div>
</body>
</html>
<!-- Aquí podrías agregar la lista de vacantes, filtros, etc. -->
<?= $this->include('templates/footer') ?> <!-- Llama al footer -->

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
  width: 50px;
  height: 50px;
  border-radius: 8px;
  object-fit: cover;
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