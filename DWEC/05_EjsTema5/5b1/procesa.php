<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resumen Alta Paciente</title>
</head>

<body>
    <h1>Resumen de Alta Paciente</h1>
    <p><strong>Nombre:</strong> <?php echo $_POST['nombre']; ?></p>
    <p><strong>Sexo:</strong> <?php echo $_POST['sexo']; ?></p>
    <p><strong>Altura:</strong> <?php echo $_POST['altura']; ?> cm</p>
    <p><strong>Fecha de Nacimiento:</strong> <?php echo $_POST['fecha_nacimiento']; ?></p>
    <p><strong>Semana Preferente:</strong> <?php echo ($_POST['semana'] ?? 'No especificada'); ?></p>
    <p><strong>Fumador:</strong> <?php echo isset($_POST['fumador']) ? 'Sí' : 'No'; ?></p>
    <?php if (isset($_POST['fumador'])): ?>
        <p><strong>Nº Cigarrillos:</strong> <?php echo $_POST['cigarrillos']; ?></p>
    <?php endif; ?>
    <p><strong>Observaciones:</strong> <?php echo ($_POST['observaciones'] ?? 'No especificadas'); ?></p>
</body>

</html>
