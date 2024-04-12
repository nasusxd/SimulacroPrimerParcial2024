<?php
class calendario{

    private $dia;
    private $mes;
    private $anio;

    public function __construct($d, $m, $a){
    
        $this->dia = $d;
        $this->mes = $m;
        $this->anio = $a;
    }
    public function getdia(){
    
        return $this->dia;
    }

    public function  setdia($d){
    
        $this->dia = $d;
    }

    public function getmes(){
    
        return $this->mes;
    }

    public function setmes($m) {
   
        $this->mes = $m;
    }

    public function getanio(){
    
        return $this->anio;
    }

    public function setanio($a){
    
        $this->anio = $a;
    }



    public function __tostring(){
    
        return $this->ordenDia() . $this->getdia() . "/" . $this->ordenMes() . $this->getmes() . "/" . $this->getanio();
    }
    public function ordenDia(){
    
        $salida = "";
        $dia = $this->getdia();
        if ($dia < 10 && $dia == !"0" . $dia) {
            $salida = "0";
        }
        return $salida;
    }
    public function ordenMes() {
   
        $salida = "";
        $mes = $this->getmes();
        if ($mes < 10 && $mes == !("0" . $mes)) {
            $salida = "0";
        }
        return $salida;
    }
}
