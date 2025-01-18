<?php

namespace App\Interfaces\Http\Controllers;

use App\Application\MonthSummary\Services\MonthSummaryService;

class MonthSummaryController
{
    public function __construct(
        private MonthSummaryService $monthSummaryService
    )
    {

    }

    public function index() {
        $analysis = $this->monthSummaryService->getAnalysis();

        return view('month-summary', [
            'analysis' => $analysis
        ]);
    }
}
