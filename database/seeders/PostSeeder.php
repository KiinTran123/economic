<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('posts')->insert([
            [
                'title' => 'Khám phá du lịch Hà Nội',
                'content' => 'Hà Nội là một thành phố tuyệt vời để khám phá với lịch sử lâu đời và những địa điểm du lịch hấp dẫn. Bạn có thể thăm Hồ Gươm, Văn Miếu, và nhiều điểm đến khác.',
                'is_active' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Công thức nấu phở bò ngon',
                'content' => 'Phở bò là một món ăn đặc trưng của Việt Nam. Để làm phở bò ngon, bạn cần chuẩn bị nguyên liệu tươi ngon và công thức nước dùng đậm đà.',
                'is_active' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Lợi ích của việc tập thể dục hàng ngày',
                'content' => 'Tập thể dục không chỉ giúp cơ thể khỏe mạnh mà còn cải thiện tâm trạng và sức khỏe tinh thần. Hãy bắt đầu tập luyện ngay hôm nay!',
                'is_active' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Cách làm bánh chưng ngày Tết',
                'content' => 'Bánh chưng là món ăn truyền thống trong dịp Tết Nguyên Đán. Bạn cần chuẩn bị gạo nếp, thịt lợn, đậu xanh, và lá dong để làm món bánh này.',
                'is_active' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Công nghệ 5G và tương lai của viễn thông',
                'content' => '5G sẽ mở ra một kỷ nguyên mới cho ngành công nghệ viễn thông, mang đến tốc độ internet cực kỳ nhanh chóng và cải thiện trải nghiệm kết nối.',
                'is_active' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Hướng dẫn chăm sóc cây cảnh trong nhà',
                'content' => 'Cây cảnh trong nhà không chỉ giúp trang trí không gian sống mà còn mang lại không khí trong lành. Hãy chăm sóc chúng đúng cách để cây phát triển tốt.',
                'is_active' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Top 10 địa điểm du lịch nổi tiếng ở Đà Nẵng',
                'content' => 'Đà Nẵng là một thành phố du lịch nổi tiếng với những bãi biển tuyệt đẹp và các địa điểm tham quan như Bà Nà Hills, Cầu Rồng, và Ngũ Hành Sơn.',
                'is_active' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Làm thế nào để tiết kiệm năng lượng hiệu quả',
                'content' => 'Tiết kiệm năng lượng là một yếu tố quan trọng trong việc bảo vệ môi trường và giảm chi phí. Hãy bắt đầu từ những thói quen nhỏ như tắt đèn khi không cần thiết và sử dụng thiết bị tiết kiệm năng lượng.',
                'is_active' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Khám phá ẩm thực miền Trung Việt Nam',
                'content' => 'Miền Trung Việt Nam nổi tiếng với những món ăn đậm đà, phong phú. Một số món ăn đặc sản như mì Quảng, bún bò Huế, và cơm hến là những món không thể bỏ qua.',
                'is_active' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Cách bảo vệ sức khỏe trong mùa dịch',
                'content' => 'Trong mùa dịch, việc giữ vệ sinh cá nhân và tuân thủ các quy tắc phòng chống dịch là rất quan trọng. Hãy luôn đeo khẩu trang, rửa tay thường xuyên và giữ khoảng cách an toàn.',
                'is_active' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Những quy tắc ứng xử trong giao tiếp công sở',
                'content' => 'Ứng xử trong môi trường công sở là một yếu tố quan trọng giúp bạn xây dựng mối quan hệ tốt với đồng nghiệp và cấp trên. Hãy luôn lịch sự, tôn trọng và hợp tác khi làm việc.',
                'is_active' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
