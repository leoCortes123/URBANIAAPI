<?php

namespace App\Domain\Unidad\Entities;

final class Unidad
{
    public function __construct(
        private ?int $id,
        private string $numeroUnidad,
        private ?string $codigoUnidad,
        private ?int $pisoUnidad,
        private ?float $areaM2Unidad,
        private ?float $coeficienteUnidad,
        private ?bool $estadoUnidad,
        private int $bloqueId,
        private int $conjuntoId,
        private int $estadoOcupacionId,
    ) {
    }

    public function id(): ?int
    {
        return $this->id;
    }

    public function numeroUnidad(): string
    {
        return $this->numeroUnidad;
    }

    public function codigoUnidad(): ?string
    {
        return $this->codigoUnidad;
    }

    public function pisoUnidad(): ?int
    {
        return $this->pisoUnidad;
    }

    public function areaM2Unidad(): ?float
    {
        return $this->areaM2Unidad;
    }

    public function coeficienteUnidad(): ?float
    {
        return $this->coeficienteUnidad;
    }

    public function estadoUnidad(): ?bool
    {
        return $this->estadoUnidad;
    }

    public function bloqueId(): int
    {
        return $this->bloqueId;
    }

    public function conjuntoId(): int
    {
        return $this->conjuntoId;
    }

    public function estadoOcupacionId(): int
    {
        return $this->estadoOcupacionId;
    }
}
