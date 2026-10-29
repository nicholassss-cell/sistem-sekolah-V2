<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userTeacherEmail = 'nicholas@ski.sch.id';
        $userStudentEmail = 'andi@ski.sch.id';

        // User Teacher
        User::updateOrCreate(
            ['email' => $userTeacherEmail],
            [
                'name' => 'Nicholas Jonathan',
                'password' => bcrypt('password'),
                'role' => 'teacher',
            ]
        );

        // User Teacher
        User::updateOrCreate(
            ['email' => $userStudentEmail],
            [
                'name' => 'Nicholas Jonathan',
                'password' => bcrypt('password'),
                'role' => 'student',
            ]
        );
    }
}
