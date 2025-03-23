<?php

namespace App\Enums;

enum RolePermission: string
{
    /**
     * Categories permissions
     */
    case VIEW_CATEGORIES = 'view_categories';
    case CREATE_CATEGORIES = 'create_categories';
    case EDIT_CATEGORIES = 'edit_categories';
    case DELETE_CATEGORIES = 'delete_categories';
    /**
     * Bundles permissions
     */
    case VIEW_BUNDLES = 'view_bundles';
    case CREATE_BUNDLES = 'create_bundles';
    case EDIT_BUNDLES = 'edit_bundles';
    case DELETE_BUNDLES = 'delete_bundles';
    /**
     * Products permissions
     */
    case VIEW_PRODUCTS = 'view_products';
    case CREATE_PRODUCTS = 'create_products';
    case EDIT_PRODUCTS = 'edit_products';
    case DELETE_PRODUCTS = 'delete_products';

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
                self::VIEW_PRODUCTS->value,
                self::VIEW_BUNDLES->value,
            ],
            default => []
        };
    }
}
