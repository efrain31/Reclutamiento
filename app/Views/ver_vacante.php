<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
  <title>Vacante</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">  
  <link href="<?= base_url('../css/bolsa_empleo.css') ?>" rel="stylesheet">
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
<?= $this->include('templates/header') ?> 

<div class="container my-4">
  <div class="row">

  <div style="text-align: right;">
        <a href="javascript:window.history.go(-1);" class="btn btn-link">Atrás</a>
  </div>

    <div class="col-md-8">
    
      <img src="<?= base_url('vacantes/'.$vacante['logo']) ?>" alt="logo" class="detalle-logo mb-3">

      <h3 class="mb-3 br">Descripción de la empresa</h3>
      <p><?= esc($vacante['descripcion']) ?></p>

      <h4 class="mt-4 br">Requisitos del puesto</h4>
      <ul> 
        <?php foreach ($vacante['requisitos'] as $req): ?>
          <li><?= esc($req) ?></li>
        <?php endforeach; ?>
      </ul>

      <h4 class="mt-4 br">Responsabilidades del puesto</h4>
      <ul>
        <?php foreach ($vacante['responsabilidades'] as $res): ?>
          <li><?= esc($res) ?></li>
        <?php endforeach; ?>
      </ul>

      <h4 class="mt-4 br">Prestaciones y Beneficios Adicionales</h4>
      <ul>
        <?php foreach ($vacante['prestaciones'] as $pres): ?>
          <li><?= esc($pres) ?></li>
        <?php endforeach; ?>
      </ul>

    </div>

    <div class="col-md-4">
    <div class="ver-item">
      <h5 class="mb-3 br">Detalles</h5>
      <p>Tipo de trabajo: <strong><?= esc($vacante['tipo']) ?></strong></p>
      <p>Publicación del trabajo: <strong><?= date('F j, Y', strtotime($vacante['fecha'])) ?></strong></p>
      <p>Ubicación:  <strong><?= esc($vacante['ubicacion']) ?></strong></p>
      <p>Salario: <strong><?= esc($vacante['salario']) ?></strong></p>
    </div>

    <div class="ver-item">
      <h5 class="mt-4 br">Categoría</h5>
      <?php foreach ($vacante['categorias'] as $cat): ?>
        <span class="badge bg-light1 text-dark1"><?= esc($cat) ?></span>
      <?php endforeach; ?>
    </div>

    <div class="ver-item">
      <h5 class="mt-4 br">Habilidades Requeridas</h5>
      <?php foreach ($vacante['habilidades'] as $hab): ?>
        <span class="badge bg-light2 text-dark2"><?= esc($hab) ?></span>
      <?php endforeach; ?>
      </div>

      <?php if (session()->get('isLoggedIn') && session()->get('id_rol') === '1'): ?>
          <div class="vacante-actions">
          <a href="<?= base_url('editar_vacante/'.$vacante['id']) ?>" class="btn btn-bri mt-5">Editar vacante</a>
        </div>
        <?php elseif (session()->get('isLoggedIn') && session()->get('id_rol') === '2'): ?>
          <!--<div class="vacante-actions">
          <a href="</?= base_url('vacantes/postulate/'.$vacante['id']) ?>" class="btn btn-bri mt-5">Postulate</a>
        </div>-->
        <?php elseif (!session()->get('isLoggedIn')): ?>
        <!--<div class="vacante-actions">
        <a href="</?= base_url('vacantes/postulate/'.$vacante['id']) ?>" class="btn btn-bri mt-5">Postúlate</a>
        </div>-->
        <?php endif; ?>
      <!--<a href="#" class="btn btn-bri mt-5">Postúlate</a>-->
    </div>
  </div>
</div>

</body>
</html>
<?= $this->include('templates/footer') ?> <!-- Llama al footer -->
<style>
.detalle-logo {
  width: 60px;
  height: 60px;
  border-radius: 10px;
  background: #f2f2f2;
  object-fit: contain;
}
.my-4 {
    margin-top: 9rem !important;
}
.br {
  font-weight: bold;
  color:rgb(0, 0, 0);
}
.container p {
    color: #6c757d;
    text-align: justify;
}
.container strong {
    color:rgb(10, 10, 10);
}
.ver-item {
  border-bottom: 1px solid #dee2e6;
  padding: 10px 0 30px;
  position: relative;
  padding-left: calc(var(--bs-gutter-x) * 1.1);
}
.bg-light1 {
    --bs-bg-opacity: 1;
    background-color: rgb(238 219 188) !important;
}
.text-dark1 {
    --bs-text-opacity: 1;
    color: #ee771c !important;
}
.btn-bri, .btn-bri:hover, .btn-bri:focus {
    background-color: #282977;
    color: white;
    position: relative;
    display: table;
}
.mt-5 {
    margin-top: 3.5rem !important;
}
.bg-light2 {
    --bs-bg-opacity: 1;
    background-color: rgb(208 231 255 / 37%) !important;
}
.text-dark2 {
    --bs-text-opacity: 1;
    color: rgb(27 107 187) !important;
}
</style>