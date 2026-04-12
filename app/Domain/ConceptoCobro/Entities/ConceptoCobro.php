<?php

namespace App\Domain\ConceptoCobro\Entities;

final class ConceptoCobro
{
    public function __construct(
        private ?int $id,
        private int $categoriaConceptoId,
        private string $codigoConcepto,
        private string $nombreConcepto,
        private ?string $descripcionConcepto,
        private ?string $valorBaseConcepto,
        private ?string $periodicidadConcepto,
        private ?bool $activoConcepto,
    ) {
    }

    public function id(): ?int
    {
        return $this->id;
    }

    public function categoriaConceptoId(): int
    {
        return $this->categoriaConceptoId;
    }

    public function codigoConcepto(): string
    {
        return $this->codigoConcepto;
    }

    public function nombreConcepto(): string
    {
        return $this->nombreConcepto;
    }

    public function descripcionConcepto(): ?string
    {
        return $this->descripcionConcepto;
    }

    public function valorBaseConcepto(): ?string
    {
        return $this->valorBaseConcepto;
    }

    public function periodicidadConcepto(): ?string
    {
        return $this->periodicidadConcepto;
    }

    public function activoConcepto(): ?bool
    {
        return $this->activoConcepto;
    }
}
