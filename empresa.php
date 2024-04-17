<?php
/*En la clase Empresa:
1. Se registra la siguiente información: denominación, dirección, la colección de clientes, colección de
motos y la colección de ventas realizadas.
2. Método constructor que recibe como parámetros los valores iniciales para los atributos de la clase.
3. Los métodos de acceso para cada una de las variables instancias de la clase.
4. Redefinir el método _toString para que retorne la información de los atributos de la clase.

5. Implementar el método retornarMoto($codigoMoto) que recorre la colección de motos de la Empresa y
retorna la referencia al objeto moto cuyo código coincide con el recibido por parámetro.
6. Implementar el método registrarVenta($colCodigosMoto, $objCliente) método que recibe por
parámetro una colección de códigos de motos, la cual es recorrida, y por cada elemento de la colección
se busca el objeto moto correspondiente al código y se incorpora a la colección de motos de la instancia
Venta que debe ser creada. Recordar que no todos los clientes ni todas las motos, están disponibles
para registrar una venta en un momento determinado.
El método debe setear los variables instancias de venta que corresponda y retornar el importe final de la
venta.
7. Implementar el método retornarVentasXCliente($tipo,$numDoc) que recibe por parámetro el tipo y
número de documento de un Cliente y retorna una colección con las ventas realizadas al cliente.
*/
include_once ("venta.php");
class empresa{
    private $denominacion;
    private $direccion;
    private $arrayClientes;
    private $colecMotos;
    private $arrayVentas;

    public function __construct($denom,$direcc,$colecclientes,$arraymotos,$colecVentas)
    {
        $this->denominacion=$denom;
        $this->direccion=$direcc;
        $this->arrayClientes=$colecclientes;
        $this->colecMotos=$arraymotos;
        $this->arrayVentas=$colecVentas;
    }


    public function getDenominacion()
    {
        return $this->denominacion;
    }

   
    public function setDenominacion($denominacion)
    {
        $this->denominacion = $denominacion;

        
    }

   
    public function getDireccion()
    {
        return $this->direccion;
    }

  
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

       
    }

  
    public function getArrayClientes()
    {
        return $this->arrayClientes;
    }

   
    public function setArrayClientes($arrayClientes)
    {
        $this->arrayClientes = $arrayClientes;

       
    }

    
    public function getColecMotos()
    {
        return $this->colecMotos;
    }

     
    public function setColecMotos($colecMotos)
    {
        $this->colecMotos = $colecMotos;

       
    }

    
    public function getArrayVentas()
    {
        return $this->arrayVentas;
    }

    
    public function setArrayVentas($arrayVentas)
    {
        $this->arrayVentas = $arrayVentas;

        
    }

    public function __toString()
    {
     return   "denominacion: " .$this->getDenominacion()."\n".
             "direccion: " .$this->getDireccion()."\n".
             "\nlista clientes: \n " .$this->arrayclientesAstring()."\n".
              "\nlista motos: \n" .$this->colecMotosAString()."\n".
             "\nlista ventas: \n"  .$this->arrayVentasAString()."\n";

             
    }
    public function arrayclientesAstring(){
    $retorno="";
    $coleccion=$this->getArrayClientes();
       for($i=0;$i<count($coleccion);$i++){
        $retorno.= $coleccion[$i] . "\n";
        $retorno.="---------------------";
       } 
       return $retorno;
    }

    public function colecMotosAString(){
        $retorno="";
        $coleccion=$this->getColecMotos();
        for($i=0;$i<count($coleccion);$i++){
            $retorno.= $coleccion[$i] . "\n";
            $retorno.="---------------------";
        }
        return $retorno;
    }
    public function arrayVentasAString(){
        $retorno="";
        $coleccion=$this->getArrayVentas();
        for($i=0;$i<count($coleccion);$i++){
            $retorno.= $coleccion[$i] . "\n";
            $retorno.="---------------------";
        }
        return $retorno;
    }
    public function retornarMoto($codigoMoto){
        $motoLista=-1;
        $arrayMotos=$this->getColecMotos();
        $encontrada=false;
        $cantMotos=count($arrayMotos);
        $i=0;
        while($i<$cantMotos && $encontrada == false){
           $objMoto=$arrayMotos[$i];
           $codMotoArray=$objMoto->getcodigo();
            if($codigoMoto==$codMotoArray){
                $encontrada=true;
                $motoLista=$objMoto;
            }
            $i++;
        }
        return $motoLista;
    }
    public function registrarVenta($colCodigosMoto, $objCliente){
        $dadoBaja=$objCliente->getEstadoCliente();
        $precioFinal=-1;
        if($dadoBaja){
            
            $arrayVentas=$this->getArrayVentas();
            $cantVentas=count($arrayVentas);
            $objVenta=new venta($cantVentas,$objCliente);

            $cantCodigos=count($colCodigosMoto);
            $incorporados=0;
            while($incorporados<$cantCodigos){
             $objMoto=$this->retornarMoto( $colCodigosMoto[$incorporados]);
             if($objMoto !==-1){
             $objVenta->incorporarMoto($objMoto);
             }
             $incorporados++;
            }
            $arraymoto=$objVenta->getArrayMotos();
            if(count($arraymoto)>0){
            array_push($arrayVentas,$objVenta);
            $this->setArrayVentas($arrayVentas);
            $precioFinal=$objVenta->getPrecioFinal();}
        }
        return $precioFinal;
    }

    public function retornarVentasXCliente($tipo,$numDoc){
        $arrayVentas=$this->getArrayVentas();
        $ventasAcliente=[];
        $cantVentas=count($arrayVentas);
        for( $i=0;$i<$cantVentas;$i++){
            $objVenta=$arrayVentas[$i];
           $objCliente=$objVenta->getObjCliente();
            $tipoCliente=$objCliente->getTipoCliente();
            $documentoCliente=$objCliente->getDocCliente();
            if($tipo==$tipoCliente && $documentoCliente==$numDoc){
                array_push($ventasAcliente,$objVenta);
            }
        }
        return $ventasAcliente;
    }
}
