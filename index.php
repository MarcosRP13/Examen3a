<?php
function getAllLamps() {
    $host = 'db';
    $dbname = 'stadium';
    $username = 'root';
    $password = 'test';
    
    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $stmt = $pdo->prepare("SELECT * FROM lamps WHERE lamp_on = 1");
        $stmt->execute();
        
        $lamps = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return $lamps;
    } catch (PDOException $e) {
        echo "Error de conexión: " . $e->getMessage();
    }
}

$lamps = getAllLamps();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Lámparas</title>
</head>
<body>
    <h1>Listado de Lámparas Encendidas</h1>

    <?php
    if (empty($lamps)) {
        echo "<p>No hay lámparas encendidas.</p>";
    } else {
        foreach ($lamps as $lamp) {
            echo "<div>";
            echo "<p>Lámpara ID: " . $lamp['lamp_id'] . "</p>";
            echo "<p>Nombre: " . $lamp['lamp_name'] . "</p>";
            echo "<p>Estado: Encendida</p>";
            echo "<p>Potencia: " . $lamp['lamp_model.model_wattage'] . "W</p>";
            echo "<p>Ubicación: " . $lamp['lamp_zone'] . "</p>";
            echo "</div>";
        }
    }
    ?>
</body>
</html>
s