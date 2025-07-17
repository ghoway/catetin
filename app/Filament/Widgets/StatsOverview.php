<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Transaction;

class StatsOverview extends BaseWidget
{
    protected static ?int $sort = 1;
    protected function getStats(): array
    {
        // get eloquent model transactions public function scopeExpense($query)
        $totalExpenses = Transaction::expense()->sum('amount');
        $totalIncome = Transaction::income()->sum('amount');
        return [
            // hitung total (Rp) pemasukan dari transaksi where category.is_expense false (diambil dari model Transaction)
            Stat::make('Total Pemasukan', 'Rp ' . number_format($totalIncome, 0, ',', '.'))
                ->description('Total pemasukan dari semua transaksi')
                ->icon('heroicon-o-arrow-down-circle')
                ->color('success'),

            Stat::make('Total Pengeluaran', 'Rp ' . number_format($totalExpenses, 0, ',', '.'))
                ->description('Total pengeluaran dari semua transaksi')
                ->icon('heroicon-o-arrow-up-circle')
                ->color('danger'),

            Stat::make('Selisih', 'Rp ' . number_format($totalIncome - $totalExpenses, 0, ',', '.'))
                ->description('Selisih antara pemasukan dan pengeluaran')
                ->icon('heroicon-o-arrows-up-down')
                ->color($totalIncome - $totalExpenses >= 0 ? 'success' : 'danger'),
        ];
    }
}
