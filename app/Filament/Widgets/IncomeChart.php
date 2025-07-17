<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Transaction;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use Illuminate\Database\Eloquent\Builder;

class IncomeChart extends ChartWidget
{
    protected static ?int $sort = 2;
    protected static ?string $heading = 'Pemasukan';
    protected static string $color = 'success';



    protected function getData(): array
    {
        // bisa
        // $data = Trend::query(Transaction::income())
        //     ->between(
        //         start: now()->startOfMonth(),
        //         end: now()->endOfMonth(),
        //     )
        //     ->perDay()
        //     ->sum('amount',);

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
        //         fn(Builder $query) => $query->income()
        //     );

        // test 2
        $data = Trend::query(Transaction::income())
            ->dateColumn('date_transaction') // ⬅️ gunakan kolom date_transaction
            ->between(
                start: now()->startOfMonth(),
                end: now()->endOfMonth(),
            )
            ->perDay()
            ->sum('amount');

        return [
            'datasets' => [
                [
                    'label' => 'Pemasukan',
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
