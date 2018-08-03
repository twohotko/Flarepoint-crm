<?php

use Illuminate\Database\Seeder;
use App\Models\Permissions;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('permissions')->delete();

        /**
         * User Permissions
         */

        \DB::table('permissions')->insert(array (
            0 =>
                array (
                    'id' => 1,
                    'display_name' => 'Create user',
                    'name' => 'user-create',
                    'description' => 'Permission to create user',
                ),
            1 =>
                array (
                    'id' => 2,
                    'display_name' => 'Update user',
                    'name' => 'user-update',
                    'description' => 'Permission to update user',
                ),
            2 =>
                array (
                    'id' => 3,
                    'display_name' => 'Delete user',
                    'name' => 'user-delete',
                    'description' => 'Permission to delete user',
                ),
        ));

         /**
         * Client Permissions
         */

        \DB::table('permissions')->insert(array (
            0 =>
                array (
                    'id' => 4,
                    'display_name' => 'Create client',
                    'name' => 'client-create',
                    'description' => 'Permission to create client',
                ),
            1 =>
                array (
                    'id' => 5,
                    'display_name' => 'Update client',
                    'name' => 'client-update',
                    'description' => 'Permission to update client',
                ),
            2 =>
                array (
                    'id' => 6,
                    'display_name' => 'Delete client',
                    'name' => 'client-delete',
                    'description' => 'Permission to delete client',
                ),
        ));

         /**
         * Tasks Permissions
         */

        \DB::table('permissions')->insert(array (
            0 =>
                array (
                    'id' => 7,
                    'display_name' => 'Create task',
                    'name' => 'task-create',
                    'description' => 'Permission to create task',
                ),
            1 =>
                array (
                    'id' => 8,
                    'display_name' => 'Update task',
                    'name' => 'task-update',
                    'description' => 'Permission to update task',
                )
        ));

         /**
         * Leads Permissions
         */

        \DB::table('permissions')->insert(array (
            0 =>
                array (
                    'id' => 9,
                    'display_name' => 'Create lead',
                    'name' => 'lead-create',
                    'description' => 'Permission to create lead',
                ),
            1 =>
                array (
                    'id' => 10,
                    'display_name' => 'Update lead',
                    'name' => 'lead-update',
                    'description' => 'Permission to update lead',
                )
        ));
    }
}
