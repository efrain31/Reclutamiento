<div style='background-color:#f8f9fa;padding:20px;font-family:Arial,sans-serif;'>
  <div style='max-width:600px;margin:0 auto;background-color:#ffffff;padding:20px;border-radius:8px;box-shadow:0 2px 4px rgba(0,0,0,0.1);'>
    <!--<img src='https://escarh.com/public/1.png' alt='ESCARH' style='max-width:150px;margin-bottom:20px;'>
https://escarh.com/public/1.png-->
    <p style='font-size:16px;color:#555555;'>Hola <strong><?= esc($nombre) ?> <?= esc($apellido) ?></strong>,</p>

    <p style='font-size:16px;color:#555555;'>Gracias por registrarte en nuestra plataforma. Aquí tienes tus datos de acceso:</p>

    <table style='width:100%;margin:20px 0;border-collapse:collapse;'>
      <tr>
        <td style='padding:8px;border:1px solid #dddddd;'>Correo:</td>
        <td style='padding:8px;border:1px solid #dddddd;'><?= esc($correo) ?></td>
      </tr>
      <tr>
        <td style='padding:8px;border:1px solid #dddddd;'>Contraseña:</td>
        <td style='padding:8px;border:1px solid #dddddd;'><?= esc($contrasena) ?></td>
      </tr>
    </table>

    <p style='font-size:16px;color:#555555;'>Puedes iniciar sesión usando el siguiente enlace:</p>
    <p>
      <a href='<?= base_url('iniciar_session') ?>' style='display:inline-block;padding:10px 20px;color:#0d6efd;text-decoration:none;border-radius:4px;'>Iniciar sesión</a>
    </p>

    <p style='font-size:14px;color:#999999;margin-top:30px;'>Por seguridad, no compartas esta informacion con nadie más.</p>
    <p style='text-align: center; margin-top: 20px; font-size: 12px; color: #888;'>Este mensaje fue generado automáticamente por el sistema de contacto de Escarh.</p>
  </div>
</div>