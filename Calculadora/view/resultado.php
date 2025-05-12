<?php
session_start();
require_once '../view/view.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../assets/calculadora2.css" />

</head>
<body>
      <section class="resultado">
      <h1>Resultado</h1>
      <div class="resultado__container">
        <input
          type="text"
          name="resultado"
          value="<?php echo isset($_SESSION['resultado']) ? $_SESSION['resultado'] : ''; ?>"
          placeholder="Resultado"
          disabled
        />
      </div>
      <form action="../controller/app.php" method="GET">
        <input type="hidden"  name="action" value="volver" />
      <button type="submit" class="btn">Volver a calcular</button>
      </form>
    </section>

</body>
</html>