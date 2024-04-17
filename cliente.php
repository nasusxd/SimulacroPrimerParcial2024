<?php
class cliente{
    private $nombreCliente;
    private $apellidoCliente;
    private $estadoCliente;
    private $tipoCliente;
    private $docCliente;

    public function __construct($nombre,$apellido,$estado,$tipo,$documento)
    {$this->nombreCliente=$nombre;
        $this->apellidoCliente = $apellido ;
        $this->estadoCliente =$estado ;
        $this->tipoCliente = $tipo;
        $this->docCliente= $documento;
        
    }

   
    public function getNombreCliente()
    {
        return $this->nombreCliente;
    }

    
    public function setNombreCliente($nombreCliente)
    {
        $this->nombreCliente = $nombreCliente;

        
    }

   
    public function getApellidoCliente()
    {
        return $this->apellidoCliente;
    }

   
    public function setApellidoCliente($apellidoCliente)
    {
        $this->apellidoCliente = $apellidoCliente;

       
    }

    
    public function getEstadoCliente()
    {
        return $this->estadoCliente;
    }

    
    public function setEstadoCliente($estadoCliente)
    {
        $this->estadoCliente = $estadoCliente;

       
    }

    
    public function getTipoCliente()
    {
        return $this->tipoCliente;
    }

   
    public function setTipoCliente($tipoCliente)
    {
        $this->tipoCliente = $tipoCliente;

       
    }

   
    public function getDocCliente()
    {
        return $this->docCliente;
    }

    
    public function setDocCliente($docCliente)
    {
        $this->docCliente = $docCliente;

        
    }
    public function __toString()
    {
        return "\n nombre y apellido: ".$this->getNombreCliente(). " ".$this->getApellidoCliente(). 
        "\nestado: ".$this->getEstadoCliente() ." tipo y num. de documento: ".$this->getTipoCliente()." ".$this->getDocCliente();
    }
}