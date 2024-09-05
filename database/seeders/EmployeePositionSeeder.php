<?php

namespace Database\Seeders;

use App\Models\EmployeePosition;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeePositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EmployeePosition::create(['name' => 'غير محدد', 'level' => '-1', 'code' => '']);
        EmployeePosition::create(['name' => 'مدير', 'level' => '0', 'code' => 'Boss']);
        EmployeePosition::create(['name' => 'معاون اداري', 'level' => '1', 'code' => 'Administrative Assistant']);
        EmployeePosition::create(['name' => 'معاون فني', 'level' => '1', 'code' => 'Technical Assistant']);
        EmployeePosition::create(['name' => 'مسؤول شعبة', 'level' => '2', 'code' => 'Division Officer']);
        EmployeePosition::create(['name' => 'مدير مركز تسجيل', 'level' => '3',
         'code' => 'Registration Center Manager']);
        EmployeePosition::create(['name' => 'معاون مدير مركز تسجيل', 'level' => '4',
         'code' => 'Assistant Director of Registration Center']);
        EmployeePosition::create(['name' => 'موظف ملاك', 'level' => '5', 'code' => 'Employee']);
        EmployeePosition::create(['name' => 'موظف عقد تشغيلي', 'level' => '5', 'code' => 'Employee']);
    }
}
