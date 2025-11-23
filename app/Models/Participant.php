<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    protected $fillable = [
        'date_taken',
        'location',
        'camera_no',
        'name',
        'email',
        'drive_video_file_id',
        'drive_image_file_id',
        'image_library_file_no',
        'video_library_file_no',
        'video_chain_serial',
    ];
}
