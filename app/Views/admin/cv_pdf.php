<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
  <title>CV de <?= esc($cv['nombre']) ?></title>
  <style>
    body { font-family: Arial, sans-serif; font-size: 12px; }
    h2 { border-bottom: 1px solid #ccc; padding-bottom: 4px; }
    ul { padding-left: 18px; }
  </style>
</head>
<body>

<h2>Datos Personales</h2>
<p><strong>Nombre:</strong> <?= esc($cv['nombre']).' '.esc($cv['apellidos']) ?></p>
<p><strong>Correo:</strong> <?= esc($cv['correo']) ?></p>
<p><strong>Teléfono:</strong> <?= esc($cv['telefono']) ?></p>
<p><strong>País:</strong> <?= esc($cv['pais']) ?></p>
<p><strong>Ciudad/Estado:</strong> <?= esc($cv['ciudad_estado']) ?></p>
<p><strong>Domicilio:</strong> <?= esc($cv['domicilio']) ?> | CP: <?= esc($cv['codigo_postal']) ?></p>

<h2>Experiencia laboral</h2>
<?php if($experiencias): ?>
<ul>
<?php foreach($experiencias as $exp): ?>
  <li>
    <strong><?= esc($exp['empresa']) ?></strong> - <?= esc($exp['puesto']) ?> (<?= esc($exp['mes_inicio']).'/'.$exp['anio_inicio'] ?> - <? esc($exp['mes_fin'].'/'.$exp['anio_fin']) ?>) - (<?= $exp['trabajo_actual'] ? 'Actualmente' : esc($exp['mes_inicio'].'/'.$exp['anio_inicio']) ?>)
  </li>
<?php endforeach; ?>
</ul>
<?php else: ?>
<p>No registró experiencia laboral.</p>
<?php endif; ?>

<h2>Educación y formación</h2>
<?php if($educaciones): ?>
<ul>
<?php foreach($educaciones as $edu): ?>
  <li>
    <strong><?= esc($edu['nivel_academico']) ?></strong> en <?= esc($edu['escuela']) ?> — <?= esc($edu['anio_graduacion']) ?> — <?= esc($edu['carrera']) ?>
  </li>
<?php endforeach; ?>
</ul>
<?php else: ?>
<p>No registró educación.</p>
<?php endif; ?>

<h2>Habilidades, conocimientos e idiomas</h2>
<?php if ($cv): ?>
<ul>
<?php foreach($cv['habilidades'] as $habi): ?>
  <li>
    <strong><?= esc($habi) ?></strong>
  </li>
<?php endforeach; ?>
</ul>
<?php else: ?>
<p>No registró educación.</p>
<?php endif; ?>

</body>
</html>