<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Admin;
use App\Models\Company;
use App\Models\Employee;
use App\Models\Enrollment;
use App\Models\Hiring_jobs;
use App\Models\Role;
use App\Models\Task;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Company::create([
            'name' => 'Wannage',
            'slug' => Str::slug('Wannage') . uniqid(),
            'description' => 'This company is about messaging your friend easily',
            'address' => 'G-1, Aungzaya street, Tharkayta, Yangon',
            'website' => 'wannage.com',
            'email' => 'wannage@a.com'
        ]);
        Company::create([
            'name' => 'Test',
            'slug' => Str::slug('test') . uniqid(),
            'description' => 'This company is about messaging your friend easily',
            'address' => 'G-1, Aungzaya street, Tharkayta, Yangon',
            'website' => 'test.com',
            'email' => 'test@a.com'
        ]);

        Role::create([
            'name' => 'Backend Web Developer',
            'slug' => Str::slug('Backend Web Developer') . uniqid()
        ]);
        Role::create([
            'name' => 'Frontend Web Developer',
            'slug' => Str::slug('Frontend Web Developer') . uniqid()
        ]);

        Admin::create([
            'name' => 'admin',
            'email' => 'admin@a.com',
            'password' => Hash::make('password'),
            'role' => 'CEO',
            'company_id' => 1,
        ]);

        Employee::create([
            'name' => 'employeeOne',
            'profile' => 'profile.jpg',
            'slug' => Str::slug('employeeOne') . uniqid(),
            'phone' => '09123456789',
            'address' => '1839922, Aungzaya street, Tharkayta, Yangon',
            'email' => 'employeeOne@a.com',
            'password' => Hash::make('password'),
            'role_id' => 1,
            'salary' => '2000000',
            'company_id' => 1
        ]);
        Employee::create([
            'name' => 'employeeTwo',
            'profile' => 'profile.jpg',
            'slug' => Str::slug('employeeTwo') . uniqid(),
            'phone' => '09123456789',
            'address' => '1839922, Aungzaya street, Tharkayta, Yangon',
            'email' => 'employeeTwo@a.com',
            'password' => Hash::make('password'),
            'role_id' => 1,
            'salary' => '2000000',
            'company_id' => 1
        ]);
        Employee::create([
            'name' => 'employeeThree',
            'profile' => 'profile.jpg',
            'slug' => Str::slug('employeeThree') . uniqid(),
            'phone' => '09123456789',
            'address' => '1839922, Aungzaya street, Tharkayta, Yangon',
            'email' => 'employeeThree@a.com',
            'password' => Hash::make('password'),
            'role_id' => 2,
            'salary' => '2000000',
            'company_id' => 2
        ]);

        Hiring_jobs::create([
            'name' => 'Wannage',
            'slug' => Str::slug('Wannage') . uniqid(),
            'description' => 'Blah blah',
            'role_id' => 1,
            'requirement' => 'Br Nyar',
            'company_id' => 1,
            'interview_date' => 'Nov 30',
            'deadline' => 'Nov 28'
        ]);

        Enrollment::create([
            'name' => 'Kyaw Kyaw',
            'slug' => Str::slug('Kyaw Kyaw') . uniqid(),
            'email' => 'kyaw@a.com',
            'phone' => '09123456789',
            'address' => 'jhasgdaks',
            'resume' => 'resume.png',
            'role_id' => 1,
            'estimated_salary' => '600000-800000',
            'company_id' => 1,
            'hiring_id' => 1
        ]);
        Enrollment::create([
            'name' => 'Wan',
            'slug' => Str::slug('Wan') . uniqid(),
            'email' => 'wan@a.com',
            'phone' => '09123456789',
            'address' => 'jhasgdaks',
            'resume' => 'resume.png',
            'role_id' => 1,
            'estimated_salary' => '600000-800000',
            'company_id' => 1,
            'hiring_id' => 1
        ]);

        Task::create([
            'title' => 'Ecommernce Website',
            'slug' => Str::slug('Ecommernce Website') . uniqid(),
            'description' => 'To create ecommernce web application.',
            'company_id' => 1,
            'employee_id' => 1,
            'is_new' => true,
            'deadline' => '14.12.2022'
        ]);
    }
}
