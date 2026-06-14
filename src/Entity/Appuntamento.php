<?php

class Appuntamento {
    private $id;
    private $data;
    private $ora;
    private $cliente;
    private $tatuatore;

    public function __construct($id, $data, $ora, $cliente, $tatuatore) {
        $this->id = $id;
        $this->data = $data;
        $this->ora = $ora;
        $this->cliente = $cliente;
        $this->tatuatore = $tatuatore;
    }

    public function getId() {
        return $this->id;
    }

    public function getData() {
        return $this->data;
    }

    public function getOra() {
        return $this->ora;
    }

    public function getCliente() {
        return $this->cliente;
    }

    public function getTatuatore() {
        return $this->tatuatore;
    }
}