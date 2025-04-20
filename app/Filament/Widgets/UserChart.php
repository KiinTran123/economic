<?php

namespace App\Filament\Widgets;

use Leandrocfe\FilamentApexCharts\Widgets\ApexChartWidget;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class UserChart extends ApexChartWidget
{
    /**
     * Chart Id
     *
     * @var string
     */
    protected static ?string $chartId = 'userChart';

    /**
     * Widget Title
     *
     * @var string|null
     */
    protected static ?string $heading = 'Tổng Doanh Thu Mỗi Tháng';

    /**
     * Chart options (series, labels, types, size, animations...)
     * https://apexcharts.com/docs/options
     *
     * @return array
     */
    protected function getOptions(): array
    {
        $monthlyRevenue = DB::table('orders')
            ->select(DB::raw('MONTH(created_at) as month'), DB::raw('SUM(total_price) as total_revenue'))
            ->whereYear('created_at', Carbon::now()->year)
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->pluck('total_revenue', 'month')
            ->toArray();

        $revenuePerMonth = [];
        for ($month = 1; $month <= 12; $month++) {
            $revenuePerMonth[$month] = isset($monthlyRevenue[$month]) ? $monthlyRevenue[$month] : 0;
        }

        return [
            'chart' => [
                'type' => 'polarArea',
                'height' => 300,
            ],
            'series' => array_values($revenuePerMonth),
            'labels' => ['Th1', 'Th2', 'Th3', 'Th4', 'Th5', 'Th6', 'Th7', 'Th8', 'Th9', 'Th10', 'Th11', 'Th12'],  // Các tháng trong năm
            'legend' => [
                'labels' => [
                    'colors' => '#9ca3af',
                    'fontWeight' => 600,
                ],
            ],
            'dataLabels' => [
                'enabled' => true,
            ],
            'yaxis' => [
                'labels' => [
                    'style' => [
                        'fontFamily' => 'inherit',
                    ],

                ],
            ],
        ];
    }
}
