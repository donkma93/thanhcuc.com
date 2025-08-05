<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\AdminUser;
use Illuminate\Support\Facades\Validator;

class CreateAdminUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:create-user {--name=} {--email=} {--password=} {--role=admin}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Tạo admin user mới cho hệ thống quản trị';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('🚀 Tạo Admin User mới cho Thanh Cúc Du Học');
        $this->line('');

        // Lấy thông tin từ options hoặc prompt
        $name = $this->option('name') ?: $this->ask('Họ và tên');
        $email = $this->option('email') ?: $this->ask('Email');
        $password = $this->option('password') ?: $this->secret('Mật khẩu (tối thiểu 6 ký tự)');
        $role = $this->option('role') ?: $this->choice('Vai trò', ['admin', 'manager'], 0);

        // Validate input
        $validator = Validator::make([
            'name' => $name,
            'email' => $email,
            'password' => $password,
        ], [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admin_users,email',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            $this->error('❌ Dữ liệu không hợp lệ:');
            foreach ($validator->errors()->all() as $error) {
                $this->line("   • $error");
            }
            return Command::FAILURE;
        }

        // Kiểm tra email đã tồn tại
        if (AdminUser::where('email', $email)->exists()) {
            $this->error("❌ Email '$email' đã được sử dụng!");
            return Command::FAILURE;
        }

        // Tạo admin user
        try {
            $adminUser = AdminUser::create([
                'name' => $name,
                'email' => $email,
                'password' => $password, // Sẽ được hash tự động
                'role' => $role,
                'is_active' => true,
            ]);

            $this->line('');
            $this->info('✅ Tạo admin user thành công!');
            $this->line('');
            $this->table(
                ['Thông tin', 'Giá trị'],
                [
                    ['ID', $adminUser->id],
                    ['Họ tên', $adminUser->name],
                    ['Email', $adminUser->email],
                    ['Vai trò', $adminUser->role],
                    ['Trạng thái', $adminUser->is_active ? 'Hoạt động' : 'Vô hiệu hóa'],
                    ['Ngày tạo', $adminUser->created_at->format('d/m/Y H:i:s')],
                ]
            );
            $this->line('');
            $this->info("🔗 Đăng nhập tại: " . url('/admin/login'));
            $this->line('');

            return Command::SUCCESS;

        } catch (\Exception $e) {
            $this->error('❌ Có lỗi xảy ra: ' . $e->getMessage());
            return Command::FAILURE;
        }
    }
}
