<?php

use Illuminate\Database\Seeder;

use App\Models\Department;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('departments')->delete();

        \DB::table('departments')->insert([
            'id' => 1,
            'name' => 'Managment',
        ]);

        \DB::table('department_user')->insert([
            'department_id' => 1,
            'user_id' => 1
        ]);
    }
}
