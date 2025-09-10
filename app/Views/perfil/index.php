<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
  <title>Perfil | Usuario</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet"> 
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
   <link rel="stylesheet" href="<?= base_url('../css/perfil.css') ?>">
</head>

<body>
<?= $this->include('templates/header') ?> 

<div class="container mt-5">
   <div style="text-align: right;">
  <a href="javascript:window.history.go(-1);" class="back-button">← Atrás</a>
</div>

    <h5 class="fw-bold mb-1">Mi perfil</h5><hr>
    <p class="text-muted mb-4">Esta es tu información personal, la puedes editar cuando gustes</p><hr>

    <form action="<?= base_url('perfil/actualizar') ?>" method="post" class="card border-0 shadow-sm p-4">

        <h6 class="fw-bold text-primary mb-3">Datos de tu perfil</h6>
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label">Nombre completo</label>
                <input type="text" name="nombre" class="form-control" value="<?= esc($usuario['nombre'] ?? '') ?> <?= esc($usuario['apellido'] ?? '') ?>" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Número de teléfono</label>
                <input type="text" name="celular" class="form-control" value="<?= esc($usuario['celular'] ?? '') ?>">
            </div>

            <div class="col-md-6">
                <label class="form-label">Email <span class="text-danger">*</span></label>
                <input type="email" name="correo" class="form-control" value="<?= esc($usuario['correo'] ?? '') ?>" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Dirección</label>
                <input type="text" name="direccion" class="form-control" value="<?= esc($usuario['direccion'] ?? '') ?>" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Fecha de nacimiento</label>
                <input type="date" name="fecha_nacimiento" class="form-control" value="<?= esc($usuario['fecha_nacimiento'] ?? '') ?>">
            </div>

            <div class="col-md-6">
                <label class="form-label">Género</label>
                <select name="genero" class="form-select">
                    <option value="Masculino" <?= ($usuario['genero'] ?? '') == 'Masculino' ? 'selected' : '' ?>>Masculino</option>
                    <option value="Femenino" <?= ($usuario['genero'] ?? '') == 'Femenino' ? 'selected' : '' ?>>Femenino</option>
                </select>
            </div>
        </div>

        <hr class="my-4">

        <h6 class="fw-bold text-primary mb-3">Tipo de cuenta</h6>
        <div class="d-flex flex-wrap gap-4">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="tipo_cuenta" id="jobseeker" value="Job Seeker" <?= ($usuario['tipo_cuenta'] ?? '') == 'Job Seeker' ? 'checked' : '' ?>>
                <label class="form-check-label" for="jobseeker">
                    <strong>Job Seeker</strong><br>
                    <small class="text-muted">Buscando Trabajo</small>
                </label>
            </div>
            <!--<div class="form-check">
                <input class="form-check-input" type="radio" name="tipo_cuenta" id="employer" value="Employer" <-?= ($usuario['tipo_cuenta'] ?? '') == 'Employer' ? 'checked' : '' ?>>
                <label class="form-check-label" for="employer">
                    <strong>Employer</strong><br>
                    <small class="text-muted">Reclutador</small>
                </label>
            </div>-->
        </div>
        <hr class="my-4">
        <div class="mt-4 d-flex gap-2">
            <button type="submit" class="btn btn-primary perfil">Guardar cambios</button>
            <a href="<?= base_url('perfil') ?>" class="btn btn-outline-secondary">Cancelar</a>
        </div>
    </form>
</div>
<?= $this->include('templates/footer') ?>
</body>
</html>

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



