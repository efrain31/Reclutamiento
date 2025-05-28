<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editar | Vacante</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">  
  <link href="<?= base_url('../css/bolsa_empleo.css') ?>" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<?= $this->include('templates/header') ?> 

<div class="container my-5">

  <h1 class="section-title">Editar Vacante</h1>

  <div style="text-align: right;">
        <a href="javascript:window.history.go(-1);" class="btn btn-link">Atrás</a>
  </div>

  <h2 class="section-sub">Verifique la información</h2>
  <form action="<?= base_url('vacantes/actualizar/'.$vacante['id']) ?>" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>

    <div class="row g-3">

    <div class="col-md-6">
      <label class="form-label">Título</label>
      <input type="text" name="titulo" value="<?= esc($vacante['titulo']) ?>" class="form-control" required>
    </div>

    <div class="col-md-6">
      <label class="form-label">Descripción</label>
      <textarea name="descripcion" class="form-control" rows="4" required><?= esc($vacante['descripcion']) ?></textarea>
    </div>

    <div class="col-md-6">
      <label class="form-label">Tipo</label>
      <input type="text" name="tipo" value="<?= esc($vacante['tipo']) ?>" class="form-control">
    </div>

    <div class="col-md-6">
      <label class="form-label">Ubicación</label>
      <input type="text" name="ubicacion" value="<?= esc($vacante['ubicacion']) ?>" class="form-control">
    </div>

    <div class="col-md-6">
      <label class="form-label">Salario</label>
      <input type="text" name="salario" value="<?= esc($vacante['salario']) ?>" class="form-control">
    </div>

    <div class="col-md-6">
      <label class="form-label">Categoría</label>
      <input type="text" name="categoria" value="<?= esc($vacante['categoria']) ?>" class="form-control">
    </div>

    <div class="col-md-6">
      <label class="form-label">Habilidades (una por línea)</label>
      <textarea name="habilidades" class="form-control" rows="3"><?= esc($vacante['habilidades']) ?></textarea>
    </div>

    <div class="col-md-6">
      <label class="form-label">Requisitos (uno por línea)</label>
      <textarea name="requisitos" class="form-control" rows="3"><?= esc($vacante['requisitos']) ?></textarea>
    </div>

    <div class="col-md-6">
      <label class="form-label">Responsabilidades (una por línea)</label>
      <textarea name="responsabilidades" class="form-control" rows="3"><?= esc($vacante['responsabilidades']) ?></textarea>
    </div>

    <div class="col-md-6">
      <label class="form-label">Prestaciones (una por línea)</label>
      <textarea name="prestaciones" class="form-control" rows="3"><?= esc($vacante['prestaciones']) ?></textarea>
    </div>

    <div class="col-md-6">
      <label class="form-label">Cambiar Logo</label>
      <input type="file" name="logo" class="form-control">
      <?php if (!empty($vacante['logo'])): ?>
        <img src="<?= base_url('vacantes/'.$vacante['logo']) ?>" alt="logo" class="mt-2" style="width: 80px; height: 80px; object-fit: cover; border-radius: 6px;">
      <?php endif; ?>
    </div>
    </div>

    <button type="submit" class="btn btn-guardar">Guardar cambios</button>
    <a href="<?= base_url('/bolsa_empleo') ?>" class="btn btn-secondary">Cancelar</a>
  </form>
</div>
</body>
</html>
<?= $this->include('templates/footer') ?>

<style>
    .form-label { font-weight: 600; }
    .btn-guardar { background: #1a1e6a; color: #fff; }
    .btn-guardar:hover { background: #13155a; color: #fff; }
    .my-5 { margin-top: 7rem !important; margin-bottom: 3rem !important; padding: 60px;}
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
  </style>