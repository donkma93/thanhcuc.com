<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AdminUser;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Tạo admin user mặc định
        AdminUser::updateOrCreate(
            ['email' => 'admin@thanhcuc.edu.vn'],
            [
                'name' => 'Admin Thanh Cúc',
                'email' => 'admin@thanhcuc.edu.vn',
                'password' => 'admin123', // Sẽ được hash tự động trong model
                'role' => 'admin',
                'is_active' => true,
            ]
        );

        // Tạo thêm một admin user khác (tùy chọn)
        AdminUser::updateOrCreate(
            ['email' => 'manager@thanhcuc.edu.vn'],
            [
                'name' => 'Quản lý Thanh Cúc',
                'email' => 'manager@thanhcuc.edu.vn',
                'password' => 'manager123',
                'role' => 'manager',
                'is_active' => true,
            ]
        );

        $this->command->info('Admin users created successfully!');
        $this->command->info('Email: admin@thanhcuc.edu.vn | Password: admin123');
        $this->command->info('Email: manager@thanhcuc.edu.vn | Password: manager123');
    }
}
