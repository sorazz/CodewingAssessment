<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use App\Exports\JsonExport;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Maatwebsite\Excel\Facades\Excel;

class ExportToExcelJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $data;
    /**
     * Create a new job instance.
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function handle()
    {
        // Export data to Excel
        Excel::store(new JsonExport($this->data), 'exports/data.xlsx');
    }
}
