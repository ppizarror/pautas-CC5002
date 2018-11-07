<?php
/**
 * Pauta pregunta 3 C2 semestre 2018-2.
 *
 * Enunciado:
 * Escriba un script en PHP que genera código HTML que incluye un listado de tareas que se obtienen desde una base de datos y además incluye un formulario que permite almacenar una nueva tarea. En la base de datos, las tareas tienen un número identificador, una descripción (texto, largo máximo 300 caracteres) y un estado (entero con valor 1 o 0). Cuando se presenta el listado de tareas, se deben mostrar el id, la descripción y una glosa del estado, si es 0 debe decir “pendiente” si es 1 debe decir “terminada”. El formulario para ingresar una tarea debe solicitar solo la descripción y al momento de insertar en la base de datos, solo debe insertar la descripción y el estado con valor 0 (todas las tareas se insertar como “pendiente”).
 */

/**
 * Crea la conexión a la base de datos
 */
$db = new mysqli("localhost", "root", "", "pautas_cc5002", 3306);
$db->set_charset("utf8");

/**
 * Se recoge una llamada por post, guarda la tarea
 */
if ($_POST and isset($_POST["desc"])) {

    // Sanitiza el contenido del usuario
    $post_desc = $db->real_escape_string(htmlspecialchars($_POST["desc"]));

    // Chequea que el largo del texto sea menor a 300, mayor a cero
    if (strlen($post_desc) > 300 or strlen($post_desc) == 0) {
        die("Largo inválido de la descripción");
    }

    // Crea una nueva entrada en la base de datos
    $sql = "INSERT INTO `p3-c2-2018-2` (descripcion, estado) VALUES ('{$post_desc}',0)";
    $result = $db->query($sql) or die("Error al insertar nueva tarea");

    // Redirige a la misma página para evitar envío de la misma tarea
    header('Location:' . $_SERVER['PHP_SELF'] . '?' . $_SERVER['QUERY_STRING']);
    die;

}

/**
 * Escribe encabezado de HTML
 */
echo <<<EOF
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Listado de tareas</title>
    <style>
        table, th, td {
            border: 1px solid black;
        }
</style>
</head>
<body>
EOF;

/**
 * Carga las tareas desde el servidor
 */
echo <<<EOF
<table>
<h1>Listado de tareas</h1>
<h2>Tareas en base de datos</h2>
<thead>
    <tr>
      <th>id</th>
      <th>Descripción</th>
      <th>Estado</th>
    </tr>
  </thead>
<tbody>
EOF;

$sql = "SELECT id,descripcion,estado FROM `p3-c2-2018-2` ORDER BY id DESC";
$result = $db->query($sql) or die("Error al obtener listado de tareas");
while ($row = $result->fetch_assoc()) {
    if ($row["estado"] == 0) {
        $estado = "pendiente";
    } else {
        $estado = "terminada";
    }
    echo "<tr><td>" . $row["id"] . "</td><td>" . $row["descripcion"] . "</td><td>" . $estado . "</td></tr>";
}

/**
 * Escrbe el formulario
 */
echo <<<EOF
</tbody>
</table>
<br>
<h2>Ingreso de nueva tarea</h2>
<form method="post"> <!-- No es necesaria la etiqueta action="#" -->
Descripción: <br>
<textarea name="desc" maxlength="300" placeholder="Descripción de la tarea" required cols="40" rows="2">
</textarea>
<br>
<button type="submit">Crear tarea</button>
</form>
</body>
EOF;
