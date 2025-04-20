<?php

namespace App\Filament\Widgets;

use Leandrocfe\FilamentApexCharts\Widgets\ApexChartWidget;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BlogPostsChart extends ApexChartWidget
{
    /**
     * Chart Id
     *
     * @var string
     */
    protected static ?string $chartId = 'blogPostsChart';

    /**
     * Widget Title
     *
     * @var string|null
     */
    protected static ?string $heading = 'Người dùng mới';

    protected function getOptions(): array
    {
        // Lấy số tài khoản tạo trong mỗi tháng của năm hiện tại
        $monthlyAccounts = DB::table('users')
            ->select(DB::raw('MONTH(created_at) as month'), DB::raw('COUNT(*) as total'))
            ->whereYear('created_at', Carbon::now()->year)  // Lọc theo năm hiện tại
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->pluck('total', 'month')
            ->toArray();

        // Đảm bảo rằng dữ liệu cho tất cả các tháng từ 1 đến 12 có mặt (Nếu không có, gán 0)
        $accountsPerMonth = [];
        for ($month = 1; $month <= 12; $month++) {
            $accountsPerMonth[$month] = isset($monthlyAccounts[$month]) ? $monthlyAccounts[$month] : 0;
        }

        // Trả về cấu hình cho biểu đồ
        return [
            'chart' => [
                'type' => 'bar',
                'height' => 300,
            ],
            'series' => [
                [
                    'name' => 'Số Tài Khoản Tạo',
                    'data' => array_values($accountsPerMonth),  // Dữ liệu số tài khoản tạo theo tháng
                ],
            ],
            'xaxis' => [
                'categories' => ['Th1', 'Th2', 'Th3', 'Th4', 'Th5', 'Th6', 'Th7', 'Th8', 'Th9', 'Th10', 'Th11', 'Th12'],
                'labels' => [
                    'style' => [
                        'fontFamily' => 'inherit',
                        'fontWeight' => 600,
                    ],
                ],
            ],
            'yaxis' => [
                'labels' => [
                    'style' => [
                        'fontFamily' => 'inherit',
                    ],
                ],
            ],
            'colors' => ['#f59e0b'],
        ];
    }
}
