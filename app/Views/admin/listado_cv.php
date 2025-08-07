<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Listado de CVs</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="<?= base_url('../css/cvs.css') ?>">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<?= $this->include('templates/header') ?>

<div class="container py-4">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <a href="javascript:window.history.go(-1);" class="btn btn-link">← Atrás</a>
    <a href="<?= base_url('crear_vacante') ?>" class="btn btn-primary subir">+ Subir nuevo trabajo</a>
  </div>

  <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">
    <h4 class="mb-2">Total Aplicantes: <?= $totalCvs ?></h4>

  <div class="search-tools">
      <input type="text" id="searchInput" class="form-control" placeholder="Buscar Aplicantes..." style="min-width: 230px;">

      <select id="filtroEstatus" class="form-select" style="min-width: 160px;">
        <option value="">Filtrar por estatus</option>
        <option value="En revision">En revision</option>
        <option value="Citado">Citado</option>
        <option value="Entrevista">Entrevista</option>
        <option value="No aceptado">No aceptado</option>
        <option value="Contratado">Contratado</option>
      </select>
    </div>
  </div>

  <div class="table-responsive">
    <table class="table table-bordered table-striped align-middle">
      <thead class="table-dark text-center">
        <tr>
          <th>Nombre Completo</th>
          <th>Tipo de Trabajo</th>
          <th>Estatus</th>
          <th>Fecha de Aplicación</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody id="tablaCvs">
        <?php foreach($cvs as $cv): ?>
          <tr>
            <td class="text-center"><?= esc($cv['nombre'] ?? 'Sin nombre') . ' ' . esc($cv['apellidos'] ?? '') ?></td>
            <td class="text-center"><?= esc($cv['titulo_vacante'] ?? 'No especificado') ?></td>
            <td class="text-center">
              <div class="dropdown">
                <button class="btn btn-outline-secondary btn-sm dropdown-toggle redon" type="button" data-bs-toggle="dropdown">
                  <?= esc($cv['estatus'] ?? 'En revision') ?>
                </button>
                <ul class="dropdown-menu">
               <?php
               $opciones = ['En revision', 'Citado', 'Entrevista', 'No aceptado', 'Contratado'];
              foreach ($opciones as $opcion):
               ?>
              <li>
            <form action="<?= base_url('cambiar_estatus/' . $cv['id']) ?>" method="post" class="d-inline">
              <?= csrf_field() ?>
              <input type="hidden" name="nuevo_estatus" value="<?= $opcion ?>">
              <button type="submit" class="dropdown-item"><?= $opcion ?></button>
            </form>
              </li>
              <?php endforeach; ?>
                </ul>
              </div>
            </td>
            <td class="text-center">
               <?php
            $meses = [1=>'Ene', 2=>'Feb', 3=>'Mar', 4=>'Abr', 5=>'May', 6=>'Jun', 7=>'Jul', 8=>'Agos', 9=>'Sep', 10=>'Oct', 11=>'Nov', 12=>'Dic'];
            $fecha = strtotime($cv['created_at']);
            $dia = date('d', $fecha);
            $mes = $meses[(int)date('m', $fecha)];
            $anio = date('Y', $fecha);
            echo "$dia $mes, $anio";
            ?>
            <!--<-?= esc(date('j F, Y', strtotime($cv['created_at']))) ?>-->
            <!--<-?= date('j F, Y', strtotime($cv['created_at'])) ?>   d/m/Y-->
            </td>
            <td class="text-center">
              <a href="<?= base_url('detalle_cv/'.$cv['id']) ?>" class="btn btn-sm btn-primary mb-1">
                <i class="bi bi-eye"></i> Ver
              </a>

              <!-- <-?php if (!empty($cv['archivo_cv'])): ?>
               <a href="<-?= base_url('uploads/cv_postulados/'.$cv['archivo_cv']) ?>" target="_blank" class="btn btn-sm btn-success mb-1">
                  <i class="bi bi-filetype-pdf"></i> PDF
                </a>
                <a href="<-?= base_url('uploads/cv_postulados/'.$cv['archivo_cv']) ?>" download class="btn btn-sm btn-danger mb-1">
                  <i class="bi bi-download"></i>
                </a>
              <-?php else: ?>
                <a href="<-?= base_url('exportar_cv/'.$cv['id']) ?>" class="btn btn-sm btn-warning mb-1">
                  <i class="bi bi-file-earmark-pdf"></i> Generar PDF
                </a>
              <-?php endif; ?>-->
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
   <!-- PAGINACIÓN -->
  <div class="d-flex justify-content-center">
    <?= $pager->links() ?>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
  // Búsqueda en tiempo real
  document.getElementById('searchInput').addEventListener('keyup', function () {
    let filtro = this.value.toLowerCase();
    document.querySelectorAll('#tablaCvs tr').forEach(row => {
      let nombre = row.cells[0].textContent.toLowerCase();
      row.style.display = nombre.includes(filtro) ? '' : 'none';
    });
  });

  // Filtro por estatus
  document.getElementById('filtroEstatus').addEventListener('change', function () {
    let estatus = this.value.toLowerCase();
    document.querySelectorAll('#tablaCvs tr').forEach(row => {
      console.log(row.cells[2]?.innerText);
      let boton = row.cells[2].querySelector('.dropdown-toggle');
      let estado = boton ? boton.innerText.trim().toLowerCase() : '';
      row.style.display = estatus === '' || estado.includes(estatus) ? '' : 'none';
    });
  });
</script>
<?= $this->include('templates/footer') ?>
</body>
</html>