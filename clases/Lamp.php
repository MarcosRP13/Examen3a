<?php

Class Lamp {
    
    private $lamp_id;
    private $lamp_name;
    private $lamp_on;
    private $lamps_models;
    private $potencia;
    private $lamp_zone;

    public function __construct($lamp_id, $lamp_name, $lamp_on, $lamps_models, $model_wattage, $lamp_zone) {
        $this->lamp_id = $lamp_id;
        $this->lamp_name = $lamp_name;
        $this->lamp_on = $lamp_on;
        $this->lamps_models = $lamps_models;
        $this->potencia = $model_wattage;
        $this->lamp_zone = $lamp_zone;
    }

    public function getIdLampara() {
        return $this->lamp_id;
    }

    public function getLampNombre() {
        return $this->lamp_name;
    }

    public function getLampOn() {
        return $this->lamp_on;
    }

    public function getDenominacion() {
        return $this->lamps_models;
    }

    public function getPotencia() {
        return $this->potencia;
    }

    public function getZona() {
        return $this->lamp_zone;
    }
}
