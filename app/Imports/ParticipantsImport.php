<?php

namespace App\Imports;

use App\Models\Participant;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ParticipantsImport implements ToModel, WithHeadingRow
{
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

    private function normalizePhone($value)
    {
        if (!$value) return null;

        // Remove all non-digits
        $clean = preg_replace('/\D/', '', $value);

        // If 10 digits → add leading 0
        if (strlen($clean) === 10 && $clean[0] !== '0') {
            $clean = '0' . $clean;
        }

        // If 880XXXXXXXXX → convert to 0XXXXXXXXX
        if (strlen($clean) === 13 && substr($clean, 0, 3) === '880') {
            $clean = '0' . substr($clean, 3);
        }

        // If 88XXXXXXXXXX → convert to 0XXXXXXXXX
        if (strlen($clean) === 12 && substr($clean, 0, 2) === '88') {
            $clean = '0' . substr($clean, 2);
        }

        return $clean;
    }

    public function model(array $row)
    {
        return new Participant([
            'date_taken' => trim($row['date_taken'] ?? null),
            'location' => trim($row['location'] ?? null),
            'camera_no' => trim($row['camera_no'] ?? null),
            'name' => trim($row['name'] ?? null),
            'email' => trim($row['email'] ?? null),
            'phone' => $this->normalizePhone($row['phone'] ?? null),

            'drive_video_file_id' => $this->extractDriveId($row['drive_video_file_id'] ?? null),
            'drive_image_file_id' => $this->extractDriveId($row['drive_image_file_id'] ?? null),

            'image_library_file_no' => trim($row['image_library_file_no'] ?? null),
            'video_library_file_no' => trim($row['video_library_file_no'] ?? null),
            'video_chain_serial' => trim($row['video_chain_serial'] ?? null),

            'action_performed' => trim($row['action_performed'] ?? null),
            'video_length' => trim($row['video_length'] ?? null),
        ]);
    }

    public function chunkSize(): int
    {   
        return 1000;
    }
}
