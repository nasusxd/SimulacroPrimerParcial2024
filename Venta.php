<?php
/*Se registra la siguiente información: número, fecha, referencia al cliente, referencia a una colección de
motos y el precio final.
2. Método constructor que recibe como parámetros cada uno de los valores a ser asignados a cada
atributo de la clase.
3. Los métodos de acceso de cada uno de los atributos de la clase.
4. Redefinir el método _toString para que retorne la información de los atributos de la clase.
5. Implementar el método incorporarMoto($objMoto) que recibe por parámetro un objeto moto y lo
incorpora a la colección de motos de la venta, siempre y cuando sea posible la venta. El método cada
vez que incorpora una moto a la venta, debe actualizar la variable instancia precio final de la venta.
Utilizar el método que calcula el precio de venta de la moto donde crea necesario.
*/
class Venta
{
    private $numero;
    private $objFecha;
    private $objCliente;
    private $precioFinal;
    private $arrayCodMotos;

    public function __construct($numVenta, $fechaVenta, $cliente, $precio)
    {
        $this->numero = $numVenta;
        $this->objFecha = $fechaVenta;
        $this->objCliente = $cliente;
        $this->precioFinal = $precio;
        $this->arrayCodMotos = [];
    }

    public function getnumero()
    {
        return $this->numero;
    }
    public function getobjFecha()
    {
        return $this->objFecha;
    }
    public function getobjCliente()
    {
        return $this->objCliente;
    }

    public function getprecioFinal()
    {
        return $this->precioFinal;
    }
    public function getarrayCodMotos()
    {
        return $this->arrayCodMotos;
    }

    public function setnumero($numVenta)
    {
        $this->numero = $numVenta;
    }
    public function setobjFecha($fechaVenta)
    {
        $this->objFecha = $fechaVenta;
    }
    public function setobjCliente($cliente)
    {
        $this->objCliente = $cliente;
    }

    public function setprecioFinal($precio)
    {
        $this->precioFinal = $precio;
    }
    public function setarrayCodMotos($vendiendoMotos)
    {
        $this->arrayCodMotos = $vendiendoMotos;
    }
    public function __tostring()
    {
        return "\n" . $this->getnumero() . "\n" . $this->getobjFecha() . "\n" . $this->getobjCliente() . "\n" . $this->getprecioFinal() . "\n" . print_r($this->getarrayCodMotos());
    }
    public function incorporarMoto($objMoto)
    {
        $fecha = $this->getobjFecha();
        $precio = $objMoto->darPrecioVenta($objMoto, $fecha);
        $precioFinal = $this->getprecioFinal();

        $arrayCodMotos = $this->getarrayCodMotos();
        $cantMotos = count($arrayCodMotos);
       
        $codigo = $objMoto->getcodigo();
        

        if ($precio !== -1) {
            $arrayCodMotos[$cantMotos] = ["codigo" => $codigo];
            $precioFinal = $precio + $precioFinal;
            $this->setprecioFinal($precioFinal);
            $this->setarrayCodMotos($arrayCodMotos);
            $cadena = "el articulo se sumo con exito a la venta";
        } else {
            $cadena = "el articulo codigo: " . $codigo . "  no esta disponible para la venta";
        }
        return $cadena;
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