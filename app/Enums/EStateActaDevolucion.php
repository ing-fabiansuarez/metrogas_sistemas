<?php

namespace App\Enums;


enum EStateActaDevolucion
{
    case CREADO;
    case CERRADO;

    public function getId(): int
    {
        return match ($this) {
            EStateActaDevolucion::CREADO => 1,
            EStateActaDevolucion::CERRADO => 2,
        };
    }

    public function getName(): string
    {
        return match ($this) {
            EStateActaDevolucion::CREADO => 'CREADO',
            EStateActaDevolucion::CERRADO => 'COMPLETO',
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
    
    public static function toArray(): array
    {
        $array = [];
        foreach (self::cases() as $caso) {
            $array[$caso->getId()] = $caso->getName();
        }
        return $array;
    }
}
