<?php

namespace Database\Seeders;

use App\Models\Certificate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CertificateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Certificate::create([ 'name' => 'غير محدد']);
        Certificate::create([ 'name' => 'علوم حاسوب']);
        Certificate::create([ 'name' => 'هندسة حاسوب']);
        Certificate::create([ 'name' => 'الكترونيك']);
        Certificate::create([ 'name' => 'ادارة واقتصاد']);
        Certificate::create([ 'name' => 'بناء وانشاءات']);
        Certificate::create([ 'name' => 'زراعة']); 
    }
}
