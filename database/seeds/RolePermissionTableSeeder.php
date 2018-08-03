<?php

use Illuminate\Database\Seeder;
use App\Models\PermissionRole;

class RolePermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('permission_role')->delete();

        /**
         * ADMIN ROLES
         *
         */
        \DB::table('permission_role')->insert(array (
            0 =>
                array (
                    'role_id' => 1,
                    'permission_id' => 1,
                ),
            1 =>
                array (
                    'role_id' => 1,
                    'permission_id' => 2,
                ),
            2 =>
                array (
                    'role_id' => 1,
                    'permission_id' => 3,
                ),
            3 =>
                array (
                    'role_id' => 1,
                    'permission_id' => 4,
                ),
            4 =>
                array (
                    'role_id' => 1,
                    'permission_id' => 5,
                ),
            5 =>
                array (
                    'role_id' => 1,
                    'permission_id' => 6,
                ),
            6 =>
                array (
                    'role_id' => 1,
                    'permission_id' => 7,
                ),
            7 =>
                array (
                    'role_id' => 1,
                    'permission_id' => 8,
                ),
            8 =>
                array (
                    'role_id' => 1,
                    'permission_id' => 9,
                ),
            9 =>
                array (
                    'role_id' => 1,
                    'permission_id' => 10,
                ),
        ));
    }
}
