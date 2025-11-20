<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    protected $fillable = [
        'code_number',
        'name',
        'email',
        'phone',
        'notes',
        'drive_video_file_id',
        'drive_image_file_id'
    ];
}
