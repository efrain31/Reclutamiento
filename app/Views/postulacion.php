<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Postulación | <?= esc($vacante['titulo']) ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
  <?= $this->include('templates/header') ?>

  <div class="container p-4">
    <div class="mb-4">
      <div style="text-align: right;">
        <a href="javascript:window.history.go(-1);" class="back-button">← Atrás</a>
      </div>
      <h2><strong><?= esc($vacante['titulo']) ?></strong></h2>
      <small>
        <!-- </?= esc($vacante['empresa']) ?> ·--> <?= esc($vacante['ubicacion']) ?> · <?= esc($vacante['tipo']) ?>
      </small>
      <hr><br>
      <h4><strong>Postúlate</strong></h4>
      <small> Llena el siguiente formulario</small>
    </div>
    <br>
    <form action="<?= base_url('guardar_postulacion') ?>" method="POST" enctype="multipart/form-data">
      <!--</?= csrf_field() ?>-->
      <input type="hidden" name="id_vacante" value="<?= esc($vacante['id']) ?>">

      <div class="mb-3">
        <label class="form-label">Nombre completo</label>
        <input type="text" name="nombre" class="form-control" placeholder="Escribe tu nombre completo" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Correo electrónico</label>
        <input type="email" name="correo" class="form-control" placeholder="Escribe tu correo electronico" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Número telefónico</label>
        <input type="text" name="telefono" class="form-control" placeholder="Escribe tu número telefónico" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Actual o pasado trabajo</label>
        <input type="text" name="trabajo" class="form-control" placeholder="Escribe tu actual o pasado trabajo">
      </div>

      <div class="mb-3">
        <label class="form-label">LinkedIn URL</label>
        <input type="url" name="linkedin" class="form-control" placeholder="Enlace a tu linkedin">
      </div>

      <div class="mb-3">
        <label class="form-label">Portafolio URL</label>
        <input type="url" name="portfolio" class="form-control" placeholder="Enlace a tu portafolio">
      </div>

      <div class="mb-3">
        <label for="informacion" class="form-label">Información adicional</label>
        <textarea id="informacion" name="informacion" class="form-control" rows="4" maxlength="500" placeholder="Escribe algo adicional sobre ti que quieres compartir" oninput="updateContador()"></textarea>
        <!-- Línea separadora -->
        <!--<hr class="my-2">-->
        <!-- Botones de formato y contador alineados -->
        <div class="d-flex justify-content-between align-items-center mt-2">
          <div class="btn-group" role="group">
            <small class="text-muted">Máximo 500 caracteres</small>
          </div>
          <div class="text-muted small">
            <span id="contador">0</span> / 500
          </div>
        </div>
        <!--<small class="text-muted">Máximo 500 caracteres</small>-->
      </div>

      <div class="col-md-5">
        <label class="form-label">Sube tu CV</label>
        <div class="sube-cv">
          <i><img width="30" height="30" src="https://img.icons8.com/offices/30/attach.png" alt="attach" /></i> Agrega tu cv <!--class="bi bi-paperclip fs-1"-->
          <input type="file" name="cv" class="form-control mt-3" accept=".pdf,.doc,.docx">
        </div>
        <small class="text-muted">Formatos aceptados: PDF, DOC, DOCX</small>
      </div><br>

      <div class="mb-4">
        <!--<p><strong>No cuentas con CV? </strong><a href="<-?= base_url('crear_cv') ?>">Da click</a></p>-->
        <p><strong>No cuentas con CV? </strong><a href="#" onclick="guardarEnSesionYCrearCV()">Da click</a>
          <hr>
      </div>

      <div class="d-grid">
        <button type="submit" class="btn btn-postular">Postularme</button>
      </div>

      <p class="text-muted text-center mt-3" style="font-size: 13px;">
        Al enviar la solicitud confirmas que aceptas nuestros <a href="#">Términos de servicio</a> y <a href="#">Política de privacidad</a>.
      </p>
    </form>

  </div>
</body>

</html>
<?= $this->include('templates/footer') ?>

<script>
  function insertTag(openTag, closeTag) {
    var textarea = document.getElementById('informacion');
    var start = textarea.selectionStart;
    var end = textarea.selectionEnd;
    var text = textarea.value;
    var selectedText = text.substring(start, end);
    var newText = text.substring(0, start) + openTag + selectedText + closeTag + text.substring(end);
    textarea.value = newText;
    textarea.focus();
    textarea.selectionStart = start + openTag.length;
    textarea.selectionEnd = end + openTag.length + selectedText.length;
    updateContador();
  }

  function updateContador() {
    var textarea = document.getElementById('informacion');
    var contador = document.getElementById('contador');
    contador.textContent = textarea.value.length;
  }

  function guardarEnSesionYCrearCV() {
    const formData = new FormData(document.querySelector('form'));
    fetch("<?= base_url('guardar_postulacion_temporal') ?>", {
      method: 'POST',
      body: formData
    }).then(() => {
      window.location.href = "<?= base_url('crear_cv') ?>";
    });
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
  .form-control,
  .form-control:focus {
    border-radius: 8px;
    box-shadow: none;
  }

  label {
    /* font-weight: 500;*/
    font-size: 16px;
    font-weight: bold;
    /* Resalta el texto */
  }

  .btn-postular {
    background: #1a1e6a;
    color: #fff;
    border-radius: 8px;
    padding: 12px;
    font-weight: 600;
  }

  .btn-postular:hover {
    background: #141750;
    color: #fff;
  }

  .sube-cv {
    border: 2px dashed #1d7ee0;
    border-radius: 8px;
    padding: 30px;
    text-align: center;
    color: #6c757d;
    cursor: pointer;
  }

  .sube-cv:hover {
    background: #f8f9fa;
  }

  .p-4 {
    padding: 1.5rem !important;
    margin-top: 7rem !important;
  }

  .small,
  small {
    font-size: .875em;
    color: #888888;
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



