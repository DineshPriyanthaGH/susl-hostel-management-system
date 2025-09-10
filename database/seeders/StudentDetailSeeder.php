<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $students = [
            [
                'title' => 'Mr.',
                'full_name' => 'Kamal Perera Silva',
                'name_with_initials' => 'K.P. Silva',
                'nic' => '200015678901',
                'date_of_birth' => '2000-08-15',
                'mobile_number' => '0771234567',
                'email' => 'kamal.silva@student.susl.edu.lk',
                'permanent_address' => '123 Galle Road, Colombo 03',
                'guardian_name' => 'Nimal Silva',
                'guardian_mobile' => '0777654321',
                'guardian_address' => '123 Galle Road, Colombo 03',
                'year_1_hostel' => 'Sarasavi Hostel',
                'year_2_hostel' => 'Sarasavi Hostel',
                'year_3_hostel' => 'Off Campus',
                'year_4_hostel' => 'Off Campus',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Mrs.',
                'full_name' => 'Nimesha Kumari Fernando',
                'name_with_initials' => 'N.K. Fernando',
                'nic' => '199912345678',
                'date_of_birth' => '1999-12-20',
                'mobile_number' => '0789876543',
                'email' => 'nimesha.fernando@student.susl.edu.lk',
                'permanent_address' => '456 Kandy Road, Ratnapura',
                'guardian_name' => 'Sunil Fernando',
                'guardian_mobile' => '0712345678',
                'guardian_address' => '456 Kandy Road, Ratnapura',
                'year_1_hostel' => 'Sarasavi Hostel',
                'year_2_hostel' => 'Sarasavi Hostel',
                'year_3_hostel' => 'Sarasavi Hostel',
                'year_4_hostel' => 'Off Campus',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Mr.',
                'full_name' => 'Thilina Rajapaksha Wickramasinghe',
                'name_with_initials' => 'T.R. Wickramasinghe',
                'nic' => '200103456789',
                'date_of_birth' => '2001-03-10',
                'mobile_number' => '0765432109',
                'email' => 'thilina.wickramasinghe@student.susl.edu.lk',
                'permanent_address' => '789 Main Street, Embilipitiya',
                'guardian_name' => 'Chandana Wickramasinghe',
                'guardian_mobile' => '0723456789',
                'guardian_address' => '789 Main Street, Embilipitiya',
                'year_1_hostel' => 'Nil Manel Hostel',
                'year_2_hostel' => 'Nil Manel Hostel',
                'year_3_hostel' => 'Nil Manel Hostel',
                'year_4_hostel' => 'Nil Manel Hostel',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Mrs.',
                'full_name' => 'Ishara Madushani Bandara',
                'name_with_initials' => 'I.M. Bandara',
                'nic' => '200007890123',
                'date_of_birth' => '2000-07-25',
                'mobile_number' => '0712345678',
                'email' => 'ishara.bandara@student.susl.edu.lk',
                'permanent_address' => '321 Temple Road, Balangoda',
                'guardian_name' => 'Prasanna Bandara',
                'guardian_mobile' => '0765432109',
                'guardian_address' => '321 Temple Road, Balangoda',
                'year_1_hostel' => 'Sunethra Hostel',
                'year_2_hostel' => 'Sunethra Hostel',
                'year_3_hostel' => 'Off Campus',
                'year_4_hostel' => 'Off Campus',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Mr.',
                'full_name' => 'Dhanuka Chamara Jayasinghe',
                'name_with_initials' => 'D.C. Jayasinghe',
                'nic' => '199911223344',
                'date_of_birth' => '1999-11-05',
                'mobile_number' => '0778901234',
                'email' => 'dhanuka.jayasinghe@student.susl.edu.lk',
                'permanent_address' => '654 Lake Road, Pelmadulla',
                'guardian_name' => 'Roshan Jayasinghe',
                'guardian_mobile' => '0734567890',
                'guardian_address' => '654 Lake Road, Pelmadulla',
                'year_1_hostel' => 'Parakrama Hostel',
                'year_2_hostel' => 'Parakrama Hostel',
                'year_3_hostel' => 'Parakrama Hostel',
                'year_4_hostel' => 'Off Campus',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        // Clear existing data and insert new data
        DB::table('student_details')->truncate();
        DB::table('student_details')->insert($students);
        
        $this->command->info('✅ Student details seeded successfully!');
        $this->command->info('📊 Inserted ' . count($students) . ' student records');
    }
}
