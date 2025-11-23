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
    private function extractDriveId($value)
    {
        if (!$value)
            return null;

        if (str_contains($value, 'drive.google.com')) {
            preg_match('/\/d\/(.*?)\//', $value, $match);
            return $match[1] ?? null;
        }

        return $value;
    }

    public function model(array $row)
    {
        return new Participant([
            'date_taken' => trim($row['date_taken'] ?? null),
            'location' => trim($row['location'] ?? null),
            'camera_no' => trim($row['camera_no'] ?? null),
            'name' => trim($row['name'] ?? null),
            'email' => trim($row['email'] ?? null),
            'drive_video_file_id' => $this->extractDriveId($row['drive_video_file_id'] ?? null),
            'drive_image_file_id' => $this->extractDriveId($row['drive_image_file_id'] ?? null),
            'image_library_file_no' => trim($row['image_library_file_no'] ?? null),
            'video_library_file_no' => trim($row['video_library_file_no'] ?? null),
            'video_chain_serial' => trim($row['video_chain_serial'] ?? null),
        ]);
    }

    public function chunkSize(): int
    {
        return 1000;  // process 1000 rows at a time for performance
    }
}
