<?php

namespace App\Enums;

enum RolePermission: string
{
    case VIEW_CATEGORIES = 'view_categories';
    case CREATE_CATEGORIES = 'create_categories';
    case EDIT_CATEGORIES = 'edit_categories';
    case DELETE_CATEGORIES = 'delete_categories';

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

    /**
     * @return array<string>
     */
    public static function forRole(UserRole $role): array
    {
        return match ($role) {
            UserRole::ADMIN => self::values(),
            UserRole::MANAGER => [
                self::VIEW_CATEGORIES->value,
            ],
            default => []
        };
    }
}
