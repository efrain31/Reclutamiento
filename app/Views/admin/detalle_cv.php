<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detalle del CV</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="<?= base_url('../css/cvs.css') ?>">
</head>
<body>
  <?= $this->include('templates/header') ?>

<div class="container py-4">
  <h3 class="mb-4">Detalle de la Postulación</h3>
  <hr><br>

   <div class="mb-3">
        <h5><strong>Vacante:</strong> <?= esc($cv['titulo_vacante']) ?></h5>
    </div>

  <div class="cv-box">
    <p><strong>Nombre:</strong> <?= esc($cv['nombre'])?></p>
    <p><strong>Correo:</strong> <?= esc($cv['correo']) ?></p>
    <p><strong>Teléfono:</strong> <?= esc($cv['telefono']) ?></p>
    <p><strong>Trabajo:</strong> <?= isset($cv['trabajo']) ? esc($cv['trabajo']) : ''; ?>
    <p><strong>Linkedin:</strong> <?= isset($cv['linkedin']) ? esc($cv['linkedin']) : ''; ?></p>
    <p><strong>Portafolio:</strong> <?= isset($cv['portfolio']) ? esc($cv['portfolio']) : ''; ?></p>
    <p><strong>Informacion Adicional:</strong> <?= isset($cv['informacion']) ? esc($cv['informacion']) : ''; ?></p>
    <p><strong>Fecha de postulación:</strong> <?= esc(date("d/m/Y", strtotime($cv['created_at']))) ?></p>
    <p><strong>Estatus:</strong> <?= esc(ucwords(str_replace('_', ' ', $cv['estatus'] ?? 'En revision'))) ?></p>
  </div>

  <!-- Contenido diferente según tipo -->
    <?php if ($cv['tipo'] === 'creado'): ?>
      <div class="cv-box">
      <h2>CV creado por <?= esc($cv['nombre']) ?></h2>
      <hr>
        <!-- Datos completos del CV creado <h2> -->
         <h5>Datos Personales.</h5>
         <hr>
        <p><strong>Nombre:</strong> <?= esc($cv['nombre']).' '.esc($cv['apellidos']) ?></p>
        <p><strong>Correo:</strong> <?= esc($cv['correo']) ?></p>
        <p><strong>Teléfono:</strong> <?= esc($cv['telefono']) ?></p>
        <p><strong>País:</strong> <?= esc($cv['pais']) ?></p>
        <p><strong>Ciudad/Estado:</strong> <?= esc($cv['ciudad_estado']) ?></p>
        <p><strong>Domicilio:</strong> <?= esc($cv['domicilio']) ?> | CP: <?= esc($cv['codigo_postal']) ?></p>
        <div class="mb-4">
            <h5>Experiencia.</h5>
            <?php if (!empty($cv['experiencias'])): ?>
                <ul>
                    <?php foreach ($cv['experiencias'] as $exp): ?>
                        <li>
                            <strong><?= esc($exp['empresa']) ?></strong> — <?= esc($exp['puesto']) ?>
                            (<?= esc($exp['mes_inicio']).'/'.$exp['anio_inicio'] ?> — <?= esc($exp['mes_fin'].'/'.$exp['anio_fin']) ?>)
                            <!--(<-?= $exp['trabajo_actual'] ? 'Actualmente' : esc($exp['mes_inicio'].'/'.$exp['anio_inicio']) ?>)-->
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p>No hay experiencia registrada.</p>
            <?php endif; ?>
        </div>


        <div class="mb-4">
            <h5>Educación.</h5>
            <?php if (!empty($cv['educaciones'])): ?>
                <ul>
                    <?php foreach ($cv['educaciones'] as $edu): ?>
                        <li><strong><?= esc($edu['nivel_academico']) ?></strong> en <?= esc($edu['escuela']) ?> — <?= esc($edu['anio_graduacion']) ?> (<?= esc($edu['carrera']) ?>)</li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p>No hay formación académica registrada.</p>
            <?php endif; ?>
        </div>


        <div class="mb-4">
            <h5>Habilidades, conocimientos e idiomas.</h5>
            <?php if (!empty($cv['habilidades'])): ?>
                <ul>
                    <?php foreach ($cv['habilidades'] as $hab): ?>
                        <li><?= esc($hab) ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p>No hay habilidades registradas.</p>
            <?php endif; ?>
        </div>
        </div>
       <!-- <div class="cv-box">
      <div class="mt-3">
        <a href="<-?= base_url('exportar_cv/' . $cv['id']) ?>" class="btn btn-danger btn-sm" download>
          <i class="bi bi-download"></i> Descargar archivo
        </a>
      </div>
    </div>
        <div class="cv-box">
      <h5>CV Generado</h5>
      <div class="mt-3">
        <a href="<-?= base_url('exportar_cv/' . $cv['id']) ?>" class="btn btn-warning btn-sm">
          <i class="bi bi-file-earmark-pdf"></i> Generar PDF
        </a>
      </div>
    </div>-->
        <?php else: ?>
  <?php if (!empty($cv['archivo_cv']) && file_exists(FCPATH . 'uploads/cv_postulados/' . $cv['archivo_cv'])): ?>
    <div class="cv-box">
      <h5>CV Subido (PDF)</h5>
      <div class="pdf-container">
        <embed src="<?= base_url('uploads/cv_postulados/' . $cv['archivo_cv']) ?>" type="application/pdf" width="100%" height="100%">
      </div>
      <div class="mt-3">
        <a href="<?= base_url('uploads/cv_postulados/' . $cv['archivo_cv']) ?>" class="btn btn-success btn-sm btn-pdf" target="_blank">
          <i class="bi bi-eye"></i> Ver PDF
        </a>
        <!--<a href="<-?= base_url('uploads/cv_postulados/' . $cv['archivo_cv']) ?>" class="btn btn-danger btn-sm" download>
          <i class="bi bi-download"></i> Descargar PDF
        </a>-->
      </div>
    </div>
  <!--<-?php else: ?>
    <div class="cv-box">
      <h5>CV Generado</h5>
      <div class="mt-3">
        <a href="<-?= base_url('exportar_cv/' . $cv['id']) ?>" class="btn btn-warning btn-sm">
          <i class="bi bi-file-earmark-pdf"></i> Generar PDF
        </a>
      </div>
    </div>-->
  <?php endif; ?>
<?php endif; ?>

  <div class="cv-box">
    <h5>Cambiar Estatus</h5>
    <form action="<?= base_url('cambiar_estatus/' . $cv['id']) ?>" method="post">
        <?= csrf_field() ?>
      <select name="nuevo_estatus" class="form-select mb-2">
        <option value="En revision" <?= ($cv['estatus'] == 'En revision') ? 'selected' : '' ?>>En revisión</option>
        <option value="Citado" <?= ($cv['estatus'] == 'Citado') ? 'selected' : '' ?>>Citado</option>
        <option value="Entrevista" <?= ($cv['estatus'] == 'Entrevista') ? 'selected' : '' ?>>Entrevista</option>
        <option value="No aceptado" <?= ($cv['estatus'] == 'No aceptado') ? 'selected' : '' ?>>No aceptado</option>
        <option value="Contratado" <?= ($cv['estatus'] == 'Contratado') ? 'selected' : '' ?>>Contratado</option>
      </select>
      <button type="submit" class="btn btn-primary btn-sm">Actualizar</button>
    </form>
  </div>
<a href="<?= base_url('listado_cv') ?>" class="btn btn-secondary mt-3">
    <i class="bi bi-arrow-left"></i> Volver al listado
  </a>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<?= $this->include('templates/footer') ?>
</body>
</html>