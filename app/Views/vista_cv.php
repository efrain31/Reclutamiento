<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
  <title>Crear|CV</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">  <link href="<?= base_url('../css/bolsa_empleo.css') ?>" rel="stylesheet">
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
<?= $this->include('templates/header') ?> 
<br><br><br><br><br>
<div class="container text-center my-5">
 <div style="text-align: right;">
  <a href="javascript:window.history.go(-1);" class="back-button">← Atrás</a>
</div>
    <div class="cv">
        <h2 class="cv-titulo">¿No tienes CV?</h2>
        <p class="cv-subtitulo">¡Crea el tuyo ahora!</p>
        <a href="<?= base_url('crear_cv') ?>" class="btn btn-primary cv-button">Crear CV</a>
    </div>
</div>

</body>
</html>
<!-- Aquí podrías agregar la lista de vacantes, filtros, etc. -->
<?= $this->include('templates/footer') ?> <!-- Llama al footer -->
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



