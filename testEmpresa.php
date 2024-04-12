<?php
include_once("Empresa.php");
include_once("Moto.php");
include_once("Venta.php");
include_once("Cliente.php");
include_once("calendario.php");
/*
Implementar un script TestEmpresa en la cual:
1. Cree 2 instancias de la clase Cliente: $objCliente1, $objCliente2.
2. Cree 3 objetos Motos con la información visualizada en la tabla: código, costo, año fabricación,
descripción, porcentaje incremento anual, activo */
$objCliente1=new Cliente("pedro","sanchez",true,"cuil","20475656447");
$objCliente2=new Cliente("maria","jones",true,"dni","37561643");
$objEmpresa=new Empresa("alta gama",  "Av. Argenetina 123");
$objMoto1=new Moto(11, 2230000, 2022," Benelli Imperiale 400",85 , true);
$objMoto2=new Moto(12, 584000, 2021,"Zanella Zr 150 Ohc " ,70 ,true);
$objMoto3=new Moto(13, 999900, 2023, "Zanella Patagonian Eagle 250",55 ,false);
$objEmpresa->nuevaMoto($objMoto1);
$objEmpresa->nuevaMoto($objMoto2);
$objEmpresa->nuevaMoto($objMoto3);

//print_r($objEmpresa->getcoleccionMotos()) ;

$objEmpresa->setcoleccionClientes([$objCliente1, $objCliente2 ]);

$rpa=$objEmpresa->registrarVenta( [11,12,12], $objCliente2);
echo $rpa;
 $ventaXCliente=$objEmpresa->retornarVentasXCliente("dni",37561643);
print_r($ventaXCliente);




/*6. Invocar al método registrarVenta($colCodigosMotos, $objCliente) de la Clase Empresa donde el
$objCliente es una referencia a la clase Cliente almacenada en la variable $objCliente2 (creada en el
punto 1) y la colección de códigos de motos es la siguiente [0]. Visualizar el resultado obtenido.
7. Invocar al método registrarVenta($colCodigosMotos, $objCliente) de la Clase Empresa donde el
$objCliente es una referencia a la clase Cliente almacenada en la variable $objCliente2 (creada en el
punto 1) y la colección de códigos de motos es la siguiente [2]. Visualizar el resultado obtenido.
8. Invocar al método retornarVentasXCliente($tipo,$numDoc) donde el tipo y número de documento se
corresponden con el tipo y número de documento del $objCliente1.
9. Invocar al método retornarVentasXCliente($tipo,$numDoc) donde el tipo y número de documento se
corresponden con el tipo y número de documento del $objCliente2
10. Realizar un echo de la variable Empresa creada en 2*/


