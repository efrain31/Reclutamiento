<!DOCTYPE html>
<html lang="es">
<head>
    <title>Iniciar Sesión</title>
</head>
<body>
    <h2>Iniciar Sesión</h2>
    <?php if (session()->getFlashdata('error')): ?>
        <p><?= session()->getFlashdata('error') ?></p>
    <?php endif; ?>
    <form action="/auth" method="post">
        <input type="email" name="correo" placeholder="Correo electrónico" required>
        <input type="password" name="contrasena" placeholder="Contraseña" required>
        <button type="submit">Ingresar</button>
    </form>
    <a href="/registro">Registrarse</a>
</body>
</html>