<?php

namespace App\Domain\UnidadOcupante\Entities;

final class UnidadOcupante
{
    public function __construct(
        private ?int $id,
        private string $tipoOcupante,
        private ?bool $esTitular,
        private string $fechaInicio,
        private ?string $fechaFin,
        private ?bool $estadoOcupante,
        private ?string $observaciones,
        private int $unidadId,
        private int $userId,
        private int $conjuntoId,
    ) {
    }

    public function id(): ?int
    {
        return $this->id;
    }

    public function tipoOcupante(): string
    {
        return $this->tipoOcupante;
    }

    public function esTitular(): ?bool
    {
        return $this->esTitular;
    }

    public function fechaInicio(): string
    {
        return $this->fechaInicio;
    }

    public function fechaFin(): ?string
    {
        return $this->fechaFin;
    }

    public function estadoOcupante(): ?bool
    {
        return $this->estadoOcupante;
    }

    public function observaciones(): ?string
    {
        return $this->observaciones;
    }

    public function unidadId(): int
    {
        return $this->unidadId;
    }

    public function userId(): int
    {
        return $this->userId;
    }

    public function conjuntoId(): int
    {
        return $this->conjuntoId;
    }
}
