<?php
/*1. Se registra la siguiente información: denominación, dirección, la colección de clientes, colección de
motos y la colección de ventas realizadas.
2. Método constructor que recibe como parámetros los valores iniciales para los atributos de la clase.
3. Los métodos de acceso para cada una de las variables instancias de la clase.
4. Redefinir el método _toString para que retorne la información de los atributos de la clase.
 
 */
include_once("Moto.php");
include_once("Venta.php");
include_once("Cliente.php");
include_once("calendario.php");
class Empresa
{
    private $denominacion;
    private $direccion;
    private $coleccionClientes;
    private $coleccionMotos;
    private $coleccionVentas;

    public function __construct($denominacionEmpresa, $direcc)
    {
        $this->denominacion = $denominacionEmpresa;
        $this->direccion = $direcc;
        $this->coleccionClientes = [];
        $this->coleccionMotos = []; //["codigo"=> , "costo"=> , "anioFabricacion"=> , "descripcion"=> "","porcentajeAnual"=> ,"activa"=> ,]
        $this->coleccionVentas = [];
    }
    public function getdenominacion()
    {
        return $this->denominacion;
    }
    public function setdenominacion($denominacionEmpresa)
    {
        $this->denominacion = $denominacionEmpresa;
    }

    public function getdireccion()
    {
        return $this->direccion;
    }
    public function setdireccion($direcc)
    {
        $this->direccion = $direcc;
    }

    public function getcoleccionClientes()
    {
        return $this->coleccionClientes;
    }
    public function setcoleccionClientes($arrayClientes)
    {
        $this->coleccionClientes = $arrayClientes;
    }

    public function getcoleccionMotos()
    {
        return $this->coleccionMotos;
    }
    public function setcoleccionMotos($arrayMotos)
    {
        $this->coleccionMotos = $arrayMotos;
    }

    public function getcoleccionVentas()
    {
        return $this->coleccionVentas;
    }
    public function setcoleccionVentas($arrayVentas)
    {
        $this->coleccionVentas = $arrayVentas;
    }

    public function __tostring()
    {
    }

    public function retornarMoto($codigoMoto)
    {
        $arrayMotos = $this->getcoleccionMotos();
        $cantMotos = count($arrayMotos);
        $i = 0;
        $encontrado = false;
        while ($i < $cantMotos && $encontrado == false) {
            if ($codigoMoto == $arrayMotos[$i]["codigo"]) {
                $codigo = $codigoMoto;
                $costo = $arrayMotos[$i]["costo"];
                $anioFabricacion = $arrayMotos[$i]["anioFabricacion"];
                $descripcion = $arrayMotos[$i]["descripcion"];
                $porcentajeAnual = $arrayMotos[$i]["porcentajeAnual"];
                $activa = $arrayMotos[$i]["activa"];
                $objMoto = new Moto($codigo, $costo, $anioFabricacion, $descripcion, $porcentajeAnual, $activa);
                $encontrado = $objMoto;
            } 
          $i++;
            
            
        }
        return $encontrado;
    }
    public function registrarVenta($colCodigosMoto, $objCliente)
    {
        $estaHabilitado = $objCliente->getestadoCliente();
        if ($estaHabilitado) {
            $cantCodigos = count($colCodigosMoto);
            $precio = 0;
            $dia = date("d");
            $mes = date("m");
            $anio = date("y");
            $fecha = new calendario($dia, $mes, $anio);
            $numVenta = count($this->getcoleccionVentas());
            $objVenta = new Venta($numVenta, $fecha, $objCliente, $precio);

            for ($i = 0; $i < $cantCodigos; $i++) {
                $codigo = $colCodigosMoto[$i];
                $objMoto = $this->retornarMoto($codigo);
                if ($objMoto == !false) {
                    $cadena = $objVenta->incorporarMoto($objMoto);
                    echo $cadena . "\n";
                } else {
                    echo "la moto con el cod. " . $codigo . " no fue encontrada" . "\n";
                }
            }
            $importeFinal = $objVenta->getprecioFinal();
            $coleccionVentas=$this->getcoleccionVentas();
            $cantVentas=count($coleccionVentas);
            $coleccionVentas[$cantVentas]["numero"]=$cantVentas;
            $coleccionVentas[$cantVentas]["fecha"]=$fecha;
            $coleccionVentas[$cantVentas]["tipo"]=$objCliente->gettipoDocumento();
            $coleccionVentas[$cantVentas]["documento"]=$objCliente->getdocumentoCliente();
            $coleccionVentas[$cantVentas]["precioFinal"]=$importeFinal;
            $coleccionVentas[$cantVentas]["motosV"]=$objVenta->getarrayCodMotos();
             $this->setcoleccionVentas($coleccionVentas);
            
        } else {
            $importeFinal = -1;
        }
        return $importeFinal;
    }
    public function retornarVentasXCliente($tipo,$numDoc){
        $coleccionClientes=$this->getcoleccionClientes();
        $cantCliente=count($coleccionClientes);
        $esta=false;
        $i=0;
        $ventasCliente=[];
        while($i<$cantCliente && $esta==false){
            if($tipo==$coleccionClientes[$i]["tipo"] && $numDoc==$coleccionClientes[$i]["documento"]){
                $esta=true;
                $nroVentas[]=$coleccionClientes[$i]["nroventas"];
            }else{
                $i++;
            }
        }
        if($esta){
            $cantVentas=count($nroVentas);
            $coleccionVentas=$this->getcoleccionVentas();
            $cantVentasColeccion=count($coleccionVentas);
            $i=0;
            $n=0;
            $seEncontraron=0;
            while($i<$cantVentasColeccion && $seEncontraron< $cantVentas){
                if($nroVentas[$n]==$coleccionVentas[$i]["numero"]){
                    $seEncontraron++;
                    $numero=$nroVentas[$n];
                    $fecha=$coleccionVentas[$i]["fecha"];
                    $tipo=$coleccionVentas[$i]["tipo"];
                    $documento=$coleccionVentas[$i]["documento"];
                    $precioFinal=$coleccionVentas[$i]["precioFinal"];
                    $motos=$coleccionVentas[$i]["motosV"];
                    $cantLista=count($ventasCliente);
                    $ventasCliente [$cantLista] = [
                        "numero" => $numero,
                        "fecha" => $fecha,
                        "tipo" => $tipo,
                        "documento"=>$documento,
                        "precioFinal" => $precioFinal,
                        "codigoM" => $motos
                    ];
                    $n++;
                }
             $i++;

            }
        }
        return $ventasCliente;

    }
    public function nuevaMoto($objMoto){
       $codigo=$objMoto->getcodigo();
       $coleccionMotos=$this->getcoleccionMotos();
       $cantMotos= count($coleccionMotos);
       $esta = in_array($codigo, array_column($coleccionMotos, "codigo"));
       if($esta==!true){

          $costo=$objMoto->getcosto();
          $anioFabricacion=$objMoto->getanioFabricacion();
          $porcentajeAnual=$objMoto->getporcentajeAnual();
          $descripcion=$objMoto->getdescripcion();
          $activa=$objMoto->getactiva();

        $coleccionMotos[$cantMotos]["codigo"]=$codigo;
        $coleccionMotos[$cantMotos]["costo"]= $costo;
        $coleccionMotos[$cantMotos]["anioFabricacion"]= $anioFabricacion;
        $coleccionMotos[$cantMotos]["descripcion"]= $descripcion;
        $coleccionMotos[$cantMotos]["porcentajeAnual"]= $porcentajeAnual;
        $coleccionMotos[$cantMotos]["activa"]= $activa;
        $this->setcoleccionMotos($coleccionMotos);
       }

    }
}
/*
}
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

}*/ /*coleccion cliente = ["nombre"=>"" , "apellido"=>"" , "estado"=> , "tipo"=> , "documento"=> , "nroventas"=> []]
coleccion ventas["numero"=> , "fecha"=> ,"cliente"=>[],"precioFinal"=> , "motosV"=>[]]*/
