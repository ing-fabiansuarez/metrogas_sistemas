<?php

namespace App\Enums;


enum EStateActaEntrega
{
    case CREADO;

    public function getId(): int
    {
        return match ($this) {
            EStateActaEntrega::CREADO => 1,
        };
    }

    public function getName(): string
    {
        return match ($this) {
            EStateActaEntrega::CREADO => 'CREADO',
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
