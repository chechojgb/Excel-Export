<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Carbon\Carbon;


class CustomerImportExcel implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {

        
        foreach ($rows as $row) {

            $startDate = Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['start']))->format('Y-m-d H:i:s');
            $endDate = Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['end']))->format('Y-m-d H:i:s');
            $createdAt = Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['created_at']))->format('Y-m-d H:i:s');
            $updatedAt = Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['updated_at']))->format('Y-m-d H:i:s');
            DB::table('calls')->updateOrInsert(
                ['id' => $row['id']],
                [
                    'phone_number' => $row['phone_number'] ?? null,
                    'hold_time' => $row['hold_time'] ?? 0,
                    'muted_time' => $row['muted_time'] ?? 0,
                    'queue_time' => $row['queue_time'] ?? 0,
                    'type_id' => $row['type_id'] ?? null,
                    'campaign_id' => $row['campaign_id'] ?? null,
                    'user_id' => $row['user_id'] ?? 0,
                    'state_id' => $row['state_id'] ?? null,
                    'start' => $startDate,
                    'end' => $endDate,
                    'created_at' => $createdAt,
                    'updated_at' => $updatedAt,
                    'user_to_user' => $row['user_to_user'] ?? '{}', 
                    'hanging' => $row['hanging'] ?? null,
                ]
            );
        }
    }
}
