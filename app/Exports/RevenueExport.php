<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class RevenueExport implements FromView
{
    protected $payments;

    public function __construct($payments)
    {
        $this->payments = $payments;
    }

    public function view(): View
    {
        return view('exports.revenue', [
            'payments' => $this->payments
        ]);
    }
}

