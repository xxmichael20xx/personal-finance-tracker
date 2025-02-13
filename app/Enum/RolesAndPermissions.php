<?php

namespace App\Enum;

class RolesAndPermissions
{
    // Roles
    public const ROLE_ADMIN = 'Admin';

    // User Management
    public const CAN_VIEW_USERS = 'can view users';
    public const CAN_LIST_USERS = 'can list users';
    public const CAN_CREATE_USER = 'can create user';
    public const CAN_UPDATE_USER = 'can update user';
    public const CAN_DELETE_USER = 'can delete user';
    public const CAN_RESTORE_USER = 'can restore user';

    // Role Management
    public const CAN_MANAGE_ROLES = 'can manage roles';

    // Financial Management
    public const CAN_MANAGE_FINANCES = 'can manage finances';

    // Reports
    public const CAN_VIEW_REPORTS = 'can view reports';

    /**
     * Get all permissions categorized by groups.
     *
     * @return array
     */
    public static function grouped(): array
    {
        return [
            'users' => [
                self::CAN_VIEW_USERS,
                self::CAN_LIST_USERS,
                self::CAN_CREATE_USER,
                self::CAN_UPDATE_USER,
                self::CAN_DELETE_USER,
                self::CAN_RESTORE_USER,
            ],
            'roles' => [
                self::CAN_MANAGE_ROLES,
            ],
            'finances' => [
                self::CAN_MANAGE_FINANCES,
            ],
            'reports' => [
                self::CAN_VIEW_REPORTS,
            ],
        ];
    }

    /**
     * Return all permissions as a flat array.
     *
     * @return array
     */
    public static function all(): array
    {
        return array_merge(...array_values(self::grouped()));
    }

    /**
     * Get predefined roles and their permissions.
     *
     * @return array
     */
    public static function roles(): array
    {
        return [
            self::ROLE_ADMIN => self::all(), // Admin gets all permissions
        ];
    }
}

