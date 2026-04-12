<?php

namespace App\Domain\ParametroConjunto\Entities;

final class ParametroConjunto
{
    public function __construct(
        private ?int $id,
        private int $parametroSistemaId,
        private int $conjuntoId,
        private ?string $valorParamConjunto,
    ) {
    }

    public function id(): ?int
    {
        return $this->id;
    }

    public function parametroSistemaId(): int
    {
        return $this->parametroSistemaId;
    }

    public function conjuntoId(): int
    {
        return $this->conjuntoId;
    }

    public function valorParamConjunto(): ?string
    {
        return $this->valorParamConjunto;
    }
}
