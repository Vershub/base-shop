<?php

namespace App\Enums;

enum UserRole: string
{
    case ADMIN = 'admin';
    case MANAGER = 'manager';
    case CLIENT = 'client';

    /**
     * @return array<string>
     */
    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    /**
     * @return array<string>
     */
    public static function names(): array
    {
        return array_column(self::cases(), 'name');
    }

    public static function getByName(string $roleName): ?self
    {
        foreach (self::cases() as $case) {
            if ($case->name === strtoupper($roleName)) {
                return $case;
            }
        }

        return null;
    }
}
