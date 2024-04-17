<?php
/*código, costo, año fabricación, descripción, porcentaje
incremento anual, activa (atributo que va a contener un valor true, si la moto está disponible para la
venta y false en caso contrario).*/
class moto{
    private $codigo;
    private $costo;
    private $aniofabri;
    private $descripcion;
    private $porcentaje;
    private $activa;

    public function __construct($codMoto,$costoMoto,$anioMoto,$descripMoto,$porceMoto,$actMoto)
    { 
        $this->codigo =$codMoto ;
        $this->costo =$costoMoto ;
        $this->aniofabri =$anioMoto ;
        $this->descripcion =$descripMoto ;
        $this->porcentaje =$porceMoto ;
        $this->activa =$actMoto ;
    }
    


   
    public function getCodigo()
    {
        return $this->codigo;
    }

   
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;

        
    }

    
    public function getCosto()
    {
        return $this->costo;
    }

   
    public function setCosto($costo)
    {
        $this->costo = $costo;

    }

    
    public function getAniofabri()
    {
        return $this->aniofabri;
    }

   
    public function setAniofabri($aniofabri)
    {
        $this->aniofabri = $aniofabri;

        
    }

    
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

    }

    
    public function getPorcentaje()
    {
        return $this->porcentaje;
    }

  
    public function setPorcentaje($porcentaje)
    {
        $this->porcentaje = $porcentaje;

       
    }

    
    public function getActiva()
    {
        return $this->activa;
    }

    
    public function setActiva($activa)
    {
        $this->activa = $activa;

        
    }

    public function __toString()
    {
        return $this->getCodigo() ."\n" . $this->getCosto() ."\n". $this->getAniofabri() ."\n". $this->getDescripcion() ."\n". $this->getPorcentaje() ."\n". $this->getActiva() ;
    }


    /*Implementar el método darPrecioVenta el cual calcula el valor por el cual puede ser vendida una moto.
Si la moto no se encuentra disponible para la venta retorna un valor < 0. Si la moto está disponible para
la venta, el método realiza el siguiente cálculo:
$_venta = $_compra + $_compra * (anio * por_inc_anual)
donde $_compra: es el costo de la moto.
anio: cantidad de años transcurridos desde que se fabricó la moto.
por_inc_anual: porcentaje de incremento anual de la moto.
 */
    public function darPrecioVenta($objMoto){
    $_venta= -1;
        $disponible=$objMoto->getActiva();
        if($disponible){
            $_compra=$objMoto->getCosto();
            $anioActual=date("Y");
            $anioMoto=$objMoto->getAniofabri();
            $anio=$anioActual-$anioMoto;
            $inc_anual=$objMoto->getPorcentaje();
            $_venta = $_compra + $_compra * ($anio * ($inc_anual/100));
        }
        return $_venta;
    }
}