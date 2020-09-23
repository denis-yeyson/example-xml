<?php
require_once 'db/conexion.php';
$conexion = new Conexion;
$pacientes = $conexion->getDatos('select * from pacientes');
$text_xml = $conexion->array2xml($pacientes, 'pacientes', 'paciente');
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Fuente de GoogleFonts -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400&display=swap" rel="stylesheet">

  <!-- Componentes para CodeMirror -->
  <link rel="stylesheet" href="./vendors/codemirror.css">
  <link rel="stylesheet" href="./vendors/ayu-dark.css">
  <link rel="stylesheet" href="./vendors/show-hint.css">
  <script src="./vendors/codemirror.js"></script>
  <script src="./vendors/formatting.js"></script>
  <script src="./vendors/show-hint.css"></script>
  <script src="./vendors/xml-hint.js"></script>
  <script src="./vendors/xml.js"></script>

  <!-- DataTable Componente -->
  <link rel="stylesheet" href="http://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="http://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>

  <!-- CSS personalizado -->
  <link rel="stylesheet" href="./assets/css/style.css">

  <title>Document</title>
</head>

<body>
  <div class="container">
    <h1 class="titulo">Ejercicios XML</h1>
    <div class="tabla">
      <table id="myTable">
        <thead>
          <th>Id</th>
          <th>Nombre</th>
          <th>Ape. Paterno</th>
          <th>Ape. Materno</th>
          <th>genero</th>
          <th>dni</th>
        </thead>
        <tbody>
          <?php foreach ($pacientes as $paciente) { ?>
            <tr>
              <td><?php echo $paciente['id'] ?></td>
              <td><?php echo $paciente['nombres'] ?></td>
              <td><?php echo $paciente['ape_paterno'] ?></td>
              <td><?php echo $paciente['ape_materno'] ?></td>
              <td><?php echo $paciente['genero'] ?></td>
              <td><?php echo $paciente['dni'] ?></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
    <div class="editor">
      <button onclick="format()">FORMATEAR XML</button>
      <form>
        <textarea id="code" name="code">
        <?php echo $text_xml;
        ?>
      </textarea>
      </form>
    </div>

  </div>
  <script src="./assets/js/script.js"></script>
  <script>
    $(document).ready(function() {
      $('#myTable').DataTable();
    });
    (() => {
      var t = `<?php echo $text_xml; ?>`;
      editor.setValue(t);
      format();
    })();
  </script>
</body>

</html>
