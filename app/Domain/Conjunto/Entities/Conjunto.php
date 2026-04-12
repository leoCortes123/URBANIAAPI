<?php

namespace App\Domain\Conjunto\Entities;

final class Conjunto
{
    public function __construct(
        private ?int $id,
        private string $nombreConjunto,
        private string $nitConjunto,
        private ?string $direccionConjunto,
        private ?string $telefonoConjunto,
        private ?int $estratoConjunto,
        private ?float $coeficienteTotalConjunto,
        private ?string $datosBancariosConjunto,
        private ?string $reglamentoUrlConjunto,
        private ?string $logoUrlConjunto,
        private ?string $portadaUrlConjunto,
        private ?string $galeriaConjunto,
        private ?bool $estadoConjunto,
        private int $conjuntoTipoId,
        private int $conjuntoEstadoId,
        private int $municipioId,
    ) {
    }

    public function id(): ?int
    {
        return $this->id;
    }

    public function nombreConjunto(): string
    {
        return $this->nombreConjunto;
    }

    public function nitConjunto(): string
    {
        return $this->nitConjunto;
    }

    public function direccionConjunto(): ?string
    {
        return $this->direccionConjunto;
    }

    public function telefonoConjunto(): ?string
    {
        return $this->telefonoConjunto;
    }

    public function estratoConjunto(): ?int
    {
        return $this->estratoConjunto;
    }

    public function coeficienteTotalConjunto(): ?float
    {
        return $this->coeficienteTotalConjunto;
    }

    public function datosBancariosConjunto(): ?string
    {
        return $this->datosBancariosConjunto;
    }

    public function reglamentoUrlConjunto(): ?string
    {
        return $this->reglamentoUrlConjunto;
    }

    public function logoUrlConjunto(): ?string
    {
        return $this->logoUrlConjunto;
    }

    public function portadaUrlConjunto(): ?string
    {
        return $this->portadaUrlConjunto;
    }

    public function galeriaConjunto(): ?string
    {
        return $this->galeriaConjunto;
    }

    public function estadoConjunto(): ?bool
    {
        return $this->estadoConjunto;
    }

    public function conjuntoTipoId(): int
    {
        return $this->conjuntoTipoId;
    }

    public function conjuntoEstadoId(): int
    {
        return $this->conjuntoEstadoId;
    }

    public function municipioId(): int
    {
        return $this->municipioId;
    }
}
