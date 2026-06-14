<?php

namespace InkMaster\Entity;

class Messaggio { 
    private ?int $id;  
    private ?int $mittente_id;
    private string $mittente_tipo; //può essere "Cliente" o "Tatuatore"
    private ?int $destinatario_id;
    private string $destinatario_tipo; //può essere "Cliente" o "Tatuatore"
    private string $testo;
    private string $data_invio;
    private string $ora_invio;
    private ?string $immagine;
    
    public function __construct(?int $id, ?int $mittente_id, string $mittente_tipo, ?int $destinatario_id, string $destinatario_tipo, string $testo, string $data_invio, string $ora_invio, ?string $immagine) {
        $this->id = $id;
        $this->mittente_id = $mittente_id;
        $this->mittente_tipo = $mittente_tipo;
        $this->destinatario_id = $destinatario_id;
        $this->destinatario_tipo = $destinatario_tipo;
        $this->testo = $testo;
        $this->data_invio = $data_invio;
        $this->ora_invio = $ora_invio;
        $this->immagine = $immagine;
    }

    // Getter
    public function getId(): ?int {
        return $this->id;
    }
    public function getMittenteId(): ?int {
        return $this->mittente_id;
    }
    public function getMittenteTipo(): string {
        return $this->mittente_tipo;
    }
    public function getDestinatarioId(): ?int {
        return $this->destinatario_id;
    }
    public function getDestinatarioTipo(): string {
        return $this->destinatario_tipo;
    }
    public function getTesto(): string {
        return $this->testo;
    }
    public function getDataInvio(): string {
        return $this->data_invio;
    }
    public function getOraInvio(): string {
        return $this->ora_invio;
    }
    public function getImmagine(): ?string {
        return $this->immagine;
    }

    // Setter
    public function setId(?int $id): void {
        $this->id = $id;
    }
    public function setMittenteId(?int $mittente_id): void {
        $this->mittente_id = $mittente_id;
    }
    public function setMittenteTipo(string $mittente_tipo): void {
        $this->mittente_tipo = $mittente_tipo;
    }
    public function setDestinatarioId(?int $destinatario_id): void {
        $this->destinatario_id = $destinatario_id;
    }
    public function setDestinatarioTipo(string $destinatario_tipo): void {
        $this->destinatario_tipo = $destinatario_tipo;
    }
    public function setTesto(string $testo): void {
        $this->testo = $testo;
    }
    public function setDataInvio(string $data_invio): void {
        $this->data_invio = $data_invio;
    }
    public function setOraInvio(string $ora_invio): void {
        $this->ora_invio = $ora_invio;
    }
    public function setImmagine(?string $immagine): void {
        $this->immagine = $immagine;
    }
}