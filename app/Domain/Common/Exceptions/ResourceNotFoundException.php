<?php

namespace App\Domain\Common\Exceptions;

use RuntimeException;

final class ResourceNotFoundException extends RuntimeException
{
    public static function pais(): self
    {
        return new self('País no encontrado.');
    }

    public static function conjuntoTipo(): self
    {
        return new self('Tipo de conjunto no encontrado.');
    }

    public static function conjuntoEstado(): self
    {
        return new self('Estado de conjunto no encontrado.');
    }

    public static function unidadEstado(): self
    {
        return new self('Estado de unidad no encontrado.');
    }

    public static function usuarioEstado(): self
    {
        return new self('Estado de usuario no encontrado.');
    }

    public static function usuarioTipoDocumento(): self
    {
        return new self('Tipo de documento no encontrado.');
    }

    public static function rol(): self
    {
        return new self('Rol no encontrado.');
    }

    public static function categoriaConcepto(): self
    {
        return new self('Categoría de concepto no encontrada.');
    }

    public static function departamento(): self
    {
        return new self('Departamento no encontrado.');
    }

    public static function municipio(): self
    {
        return new self('Municipio no encontrado.');
    }

    public static function permiso(): self
    {
        return new self('Permiso no encontrado.');
    }

    public static function parametroSistema(): self
    {
        return new self('Parámetro de sistema no encontrado.');
    }

    public static function conjunto(): self
    {
        return new self('Conjunto no encontrado.');
    }

    public static function bloque(): self
    {
        return new self('Bloque no encontrado.');
    }

    public static function unidad(): self
    {
        return new self('Unidad no encontrada.');
    }

    public static function usuario(): self
    {
        return new self('Usuario no encontrado.');
    }

    public static function conceptoCobro(): self
    {
        return new self('Concepto de cobro no encontrado.');
    }

    public static function conjuntoUsuario(): self
    {
        return new self('Vínculo conjunto-usuario no encontrado.');
    }

    public static function rolPermiso(): self
    {
        return new self('Asignación rol-permiso no encontrada.');
    }

    public static function unidadOcupante(): self
    {
        return new self('Ocupante de unidad no encontrado.');
    }

    public static function parametroConjunto(): self
    {
        return new self('Parámetro de conjunto no encontrado.');
    }
}
