<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UploadedTask extends Model
{
    use HasFactory;
    protected $fillable = [
        "taskId",
        "userId",
        "submittedTaskURL",
        "approved"
    ];
}
