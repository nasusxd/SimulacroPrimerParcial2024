<?php
/*  Se registra la siguiente información: número, fecha, referencia al cliente, referencia a una colección de
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
class venta{
private $numeroVenta ;
private $fecha ;
private $objCliente ;
private $arrayMotos ;
private $precioFinal ;

public function __construct($numVenta,$cliente)
{
    $this->numeroVenta=$numVenta;
    $this->fecha= date("d-m-Y");
    $this->objCliente=$cliente;
    $this->arrayMotos=[];
    $this->precioFinal=0;
}


public function getNumeroVenta()
{
return $this->numeroVenta;
}


public function setNumeroVenta($numeroVenta)
{
$this->numeroVenta = $numeroVenta;


}


public function getFecha()
{
return $this->fecha;
}


public function setFecha($fecha)
{
$this->fecha = $fecha;


}


public function getObjCliente()
{
return $this->objCliente;
}


public function setObjCliente($objCliente)
{
$this->objCliente = $objCliente;


}


public function getArrayMotos()
{
return $this->arrayMotos;
}


public function setArrayMotos($arrayMotos)
{
$this->arrayMotos = $arrayMotos;


}


public function getPrecioFinal()
{
return $this->precioFinal;
}


 
public function setPrecioFinal($precioFinal)
{
$this->precioFinal = $precioFinal;


}
public function __toString()
{
    return $this->getNumeroVenta() ."\n". $this->getFecha() ."\n".$this->getObjCliente() ."\n".$this->arrayMotosAString() ."\n".$this->getPrecioFinal() ."\n";

   
}

public function arrayMotosAString(){
    $retorno="";
    $coleccion=$this->getArrayMotos();
    for($i=0;$i<count($coleccion);$i++){
        $retorno.= $coleccion[$i] . "\n";
        $retorno.="---------------------";
    }
}

/*que recibe por parámetro un objeto moto y lo
incorpora a la colección de motos de la venta, siempre y cuando sea posible la venta. El método cada
vez que incorpora una moto a la venta, debe actualizar la variable instancia precio final de la venta.
Utilizar el método que calcula el precio de venta de la moto donde crea necesario.
*/
public function incorporarMoto($objMoto){
    
    $objCliente=$this->getObjCliente();
    $activo=$objCliente->getEstadoCliente();
    $disponible=$objMoto->getActiva();
   
    if($activo && $disponible){
         $arrayMotos=$this->getArrayMotos();
        array_push($arrayMotos, $objMoto);
        $this->setArrayMotos($arrayMotos);
        $precioFinal=$this->getPrecioFinal();
         $precioMoto=$objMoto->darPrecioVenta($objMoto);
        $precioFinal=$precioFinal+$precioMoto; 
        $this->setPrecioFinal($precioFinal);
    }
   }
}