<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AssignPermissions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
//    protected $signature = 'app:assign-permissions';

    /**
     * The console command description.
     *
     * @var string
     */
//    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    protected $signature = 'assign:permissions';
    protected $description = 'Assign roles and permissions to a user';

    public function handle()
    {
        $userId = 1; // Replace 1 with the actual user ID

        $user = User::find($userId);


        if (!$user) {
            $this->error('User not found!');
            return;
        }

        $roleName = 'Administrator (can create other users)';
        $role = Role::where('name', $roleName)->first();

        if (!$role) {
            $this->error('Role not found!');
            return;
        }

        $user->assignRole($role);

        $permissions = [
            'create-user',
            'edit-user',
            'delete-user',
            'create-role',
            'edit-role',
            'delete-role',
            // Add other permissions as needed
        ];

        foreach ($permissions as $permissionName) {
            $this->assignPermission($user, $permissionName);
        }

        // Additional permissions
        $additionalPermissions = [
            'user_management_access',
            'user_management_create',
            'user_management_edit',
            'user_management_view',
            'user_management_delete',
            'permission_access',
            'permission_create',
            'permission_edit',
            'permission_view',
            'permission_delete',
            'role_access',
            'role_create',
            'role_edit',
            'role_view',
            'role_delete',
            'user_access',
            'user_create',
            'user_edit',
            'user_view',
            'user_delete',
            'course_access',
            'course_create',
            'course_edit',
            'course_view',
            'course_delete',
            'lesson_access',
            'lesson_create',
            'lesson_edit',
            'lesson_view',
            'lesson_delete',
            'question_access',
            'question_create',
            'question_edit',
            'question_view',
            'question_delete',
            'questions_option_access',
            'questions_option_create',
            'questions_option_edit',
            'questions_option_view',
            'questions_option_delete',
            'test_access',
            'test_create',
            'test_edit',
            'test_view',
            // Add other permissions as needed

        ];

        foreach ($additionalPermissions as $permissionName) {
            $this->assignPermission($user, $permissionName);
        }

        $this->info('Role and permissions assigned successfully.');
    }

    protected function assignPermission($user, $permissionName): void
    {
        $permission = Permission::where('name', $permissionName)->first();

        if ($permission) {
            $user->givePermissionTo($permission);
            $this->info("Permission '$permissionName' assigned successfully.");
        } else {
            $this->warn("Permission not found for: $permissionName");
        }
    }
}
