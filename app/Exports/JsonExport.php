<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;


class JsonExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    protected $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function collection()
    {
        // Convert array data into a collection
        return collect($this->data);
    }

    public function headings(): array
    {
        // Assuming the first item in the array contains the keys for all items
        $headings = array_keys($this->data[0]);

        // Convert each heading to uppercase
        return array_map('strtoupper', $headings);
    }
}
