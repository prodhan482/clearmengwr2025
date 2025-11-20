<?php

namespace App\Imports;

use App\Models\Participant;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ParticipantsImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Participant([
            'code_number' => trim($row['code_number'] ?? ''),
            'name' => trim($row['name'] ?? ''),
            'email' => trim($row['email'] ?? null),
            'phone' => trim($row['phone'] ?? null),
            'notes' => trim($row['notes'] ?? null),
            'drive_video_file_id' => trim($row['drive_video_file_id'] ?? null),
            'drive_image_file_id' => trim($row['drive_image_file_id'] ?? null),
        ]);
    }

    public function chunkSize(): int
    {
        return 1000;  // process 1000 rows at a time for performance
    }
}
