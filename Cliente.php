<?php
class Cliente
{
    private $nombreCliente;
    private $apellidoCliente;
    private $estadoCliente;
    private $tipoDocumento;
    private $documentoCliente;

    public function __construct($nombre, $apellido, $estado, $tipoDoc, $documento)
    {
        $this->nombreCliente = $nombre;
        $this->apellidoCliente = $apellido;
        $this->estadoCliente = $estado;
        $this->tipoDocumento = $tipoDoc;
        $this->documentoCliente = $documento;
    }

    //GETS

    public function getnombreCliente()
    {
        return $this->nombreCliente;
    }
    public function getapellidoCliente()
    {
        return $this->apellidoCliente;
    }
    public function getestadoCliente()
    {
        return $this->estadoCliente;
    }
    public function gettipoDocumento()
    {
        return $this->tipoDocumento;
    }
    public function getdocumentoCliente()
    {
        return $this->documentoCliente;
    }

    //Sets
    public function setnombreCliente($nombre)
    {
        $this->nombreCliente = $nombre;
    }
    public function setapellidoCliente($apellido)
    {
        $this->apellidoCliente = $apellido;
    }
    public function setestadoCliente($estado)
    {
        $this->estadoCliente = $estado;
    }
    public function settipoDocumento($tipoDoc)
    {
        $this->tipoDocumento = $tipoDoc;
    }
    public function setdocumentoCliente($documento)
    {
        $this->documentoCliente = $documento;
    }

    public function __tostring()
    {
        return "\nnombre y apellido: " . $this->getnombreCliente() . " " . $this->getapellidoCliente() . "\nestado: " . $this->getestadoCliente() . "\ntipo y documento: " . $this->gettipoDocumento() . "" . $this->getdocumentoCliente();
    }
}
