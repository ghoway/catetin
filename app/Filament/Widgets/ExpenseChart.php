<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Transaction;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;


class ExpenseChart extends ChartWidget
{
    protected static ?int $sort = 3;
    protected static ?string $heading = 'Pengeluaran';
    protected static string $color = 'danger';


    protected function getData(): array
    {
        // bisa
        // $data = Trend::query(Transaction::expense())
        //     ->between(
        //         start: now()->startOfMonth(),
        //         end: now()->endOfMonth(),
        //     )
        //     ->perDay()
        //     ->sum('amount');

        // test1
        // $data = Trend::model(Transaction::class)
        //     ->dateColumn('date_transaction')
        //     ->between(
        //         start: now()->startOfMonth(),
        //         end: now()->endOfMonth(),
        //     )
        //     ->perDay()
        //     ->sum(
        //         'amount',
        //         fn($query) => $query->expense()
        //     );

        // test 2
        $data = Trend::query(Transaction::expense())
            ->dateColumn('date_transaction')
            ->between(
                start: now()->startOfMonth(),
                end: now()->endOfMonth(),
            )
            ->perDay()
            ->sum('amount');


        return [
            'datasets' => [
                [
                    'label' => 'Pengeluaran',
                    'data' => $data->map(fn(TrendValue $value) => $value->aggregate),
                ],
            ],
            'labels' => $data->map(fn(TrendValue $value) => $value->date),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
