<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('roles')->delete();

        \DB::table('roles')->insert(array (
            0 =>
                array (
                    'id' => 1,
                    'display_name' => 'Administrator',
                    'name' => 'administrator',
                    'description' => 'System Administrator',
                ),
            1 =>
                array (
                    'id' => 2,
                    'display_name' => 'Manager',
                    'name' => 'manager',
                    'description' => 'System Manager',
                ),
            2 =>
                array (
                    'id' => 3,
                    'display_name' => 'Employee',
                    'name' => 'employee',
                    'description' => 'Employee',
                ),
        ));
    }
}
