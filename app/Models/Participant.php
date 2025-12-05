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
        'phone',
        'drive_video_file_id',
        'drive_image_file_id',
        'image_library_file_no',
        'video_library_file_no',
        'video_chain_serial',
        'action_performed',
        'video_length',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'phone', 'phone');
    }
}
