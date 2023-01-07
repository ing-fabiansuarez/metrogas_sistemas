<?php

namespace App\Enums;


enum EStateActaEntrega
{
    case CREADO;
    case CERRADO;

    public function getId(): int
    {
        return match ($this) {
            EStateActaEntrega::CREADO => 1,
            EStateActaEntrega::CERRADO => 2,
        };
    }

    public function getName(): string
    {
        return match ($this) {
            EStateActaEntrega::CREADO => 'CREADO',
            EStateActaEntrega::CERRADO => 'COMPLETO',
        };
    }

    public static function from($id)
    {
        foreach (self::cases() as $caso) {
            if ($caso->getId() == $id) {
                return $caso;
            }
        }
    }
}
