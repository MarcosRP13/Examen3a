<?php
require_once 'Lamp.php';

class Lighting {
    private PDO $conn;

    public function __construct(PDO $db) {
        $this->conn = $db;
    }

    public function getAllLamps(): array {
        $sql = "SELECT lamps.lamp_id, lamps.lamp_name, lamp_on,
                       lamp_models.model_part_number, lamp_models.model_wattage,
                       zones.zone_name
                FROM lamps
                INNER JOIN lamp_models ON lamps.lamp_model = lamp_models.model_id
                INNER JOIN zones ON lamps.lamp_zone = zones.zone_id
                ORDER BY lamps.lamp_id";

        $stmt = $this->conn->query($sql);
        $lamps = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $lamps[] = new Lamp(
                $row['lamp_id'],
                $row['lamp_name'],
                $row['lamp_on'],
                $row['model_part_number'],
                $row['lamp_model.model_wattage'],
                $row['zone_name']
            );
        }

        return $lamps;
    }

    public function drawLampsList(): void {
        $lamps = $this->getAllLamps();
    
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Nombre</th><th>Encendida</th><th>Modelo</th><th>Potencia (W)</th><th>Zona</th></tr>";
    
        foreach ($lamps as $lamp) {
            echo "<tr>";
            echo "<td>{$lamp->getIdLampara()}</td>";
            echo "<td>{$lamp->getLampNombre()}</td>";
            echo "<td>" . ($lamp->getLampOn() ? "Sí" : "No") . "</td>";
            echo "<td>{$lamp->getDenominacion()}</td>";
            echo "<td>{$lamp->getPotencia()}</td>";
            echo "<td>{$lamp->getZona()}</td>";
            echo "</tr>";
        }
    
        echo "</table>";
    }
}
