<div style='background-color:#f8f9fa;padding:20px;font-family:Arial,sans-serif;'>
  <div style='max-width:600px;margin:0 auto;background-color:#ffffff;padding:20px;border-radius:8px;box-shadow:0 2px 4px rgba(0,0,0,0.1);'>
    <p style='font-size:16px;color:#555555;'>Hola <strong><?= esc($nombre) ?> <?= esc($apellido) ?></strong>,</p>

    <p style='font-size:16px;color:#555555;'>Recibimos una solicitud para restablecer tu contraseña.</p>
    <p style='font-size:16px;color:#555555;'>Para continuar, haz clic en el siguiente enlace:</p>

    <table style='width:100%;margin:20px 0;border-collapse:collapse;'>
      <tr>
        <td>
          <a href='<?= esc($enlace) ?>' target='_blank' style='display:inline-block;padding:10px 20px;color:#0d6efd;text-decoration:none;border-radius:4px;'>Restablecer contraseña</a>
        </td>
      </tr>
    </table>

    <p style='font-size:16px;color:#555555;'>Si no solicitaste este cambio, puedes ignorar este mensaje.</p>

    <p style='text-align: center; margin-top: 20px; font-size: 12px; color: #888;'>Este mensaje fue generado automáticamente por el sistema de contacto de Escarh.</p>
  </div>
</div>