<?php
class Moto
{
    /* 1. Se registra la siguiente información: código, costo, año fabricación, descripción, porcentaje
incremento anual, activa (atributo que va a contener un valor true, si la moto está disponible para la
venta y false en caso contrario).
2. Método constructor que recibe como parámetros los valores iniciales para los atributos definidos en la
clase.
3. Los métodos de acceso de cada uno de los atributos de la clase.
4. Redefinir el método toString para que retorne la información de los atributos de la clase.
5. Implementar el método darPrecioVenta el cual calcula el valor por el cual puede ser vendida una moto.
Si la moto no se encuentra disponible para la venta retorna un valor < 0. Si la moto está disponible para
la venta, el método realiza el siguiente cálculo:
$_venta = $_compra + $_compra * (anio * por_inc_anual)
donde $_compra: es el costo de la moto.
anio: cantidad de años transcurridos desde que se fabricó la moto.
por_inc_anual: porcentaje de incremento anual de la moto
*/
    private $codigo;
    private $costo;
    private $anioFabricacion;
    private $descripcion;
    private $porcentajeAnual;
    private $activa;

    public function __construct($codigoMoto, $costoMoto, $fabricacionMoto, $descrip, $porceAnual, $activaMoto)
    {
        $this->codigo = $codigoMoto;
        $this->costo = $costoMoto;
        $this->anioFabricacion = $fabricacionMoto;
        $this->descripcion = $descrip;
        $this->porcentajeAnual = $porceAnual;
        $this->activa = $activaMoto;
    }
    public function getcodigo()
    {
        return $this->codigo;
    }
    public function getcosto()
    {
        return $this->costo;
    }
    public function getanioFabricacion()
    {
        return $this->anioFabricacion;
    }
    public function getdescripcion()
    {
        return $this->descripcion;
    }
    public function getporcentajeAnual()
    {
        return $this->porcentajeAnual;
    }
    public function getactiva()
    {
        return $this->activa;
    }

    public function setcodigo($codigoMoto)
    {
        $this->codigo = $codigoMoto;
    }
    public function setcosto($costoMoto)
    {
        $this->costo = $costoMoto;
    }
    public function setanioFabricacion($fabricacionMoto)
    {
        $this->anioFabricacion = $fabricacionMoto;
    }
    public function setdescripcion($descrip)
    {
        $this->descripcion = $descrip;
    }
    public function setporcentajeAnual($porceAnual)
    {
        $this->porcentajeAnual = $porceAnual;
    }
    public function setactiva($activaMoto)
    {
        $this->activa = $activaMoto;
    }
    public function __tostring()
    {
        return "\n" . $this->getcodigo() . "\n" . $this->getcosto() . "\n" .
            $this->getanioFabricacion() . "\n" . $this->getdescripcion() . "\n" .
            $this->getporcentajeAnual() . "\n" . $this->getactiva();
    }
    public function darPrecioVenta($objMoto, $objFecha)
    {
        $_compra = $objMoto->getcosto();
        $anioFabricacion = $objMoto->getanioFabricacion();
        $por_inc_anual = 100 / ($objMoto->getporcentajeAnual());
        $activa = $objMoto->getactiva();
        $anioActual = $objFecha->getanio();
        $anios = $anioActual - $anioFabricacion;
        $_venta = -1;
       
        if ($activa == true) {
              $_venta = $_compra + $_compra * ($anios * $por_inc_anual);
        }
        return $_venta;
    }
}
/*
public function __construct(){
    $this->;
}
public function get(){
    return $this->;
}
public function set(){
    $this-> = $;
}
["codigo"=> , "costo"=> , "anioFabricacion"=> , "descripcion"=> "","porcentajeAnual"=> ,"activa"=> ,]*/