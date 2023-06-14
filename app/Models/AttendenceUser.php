<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttendenceUser extends Model
{
    use HasFactory;
    protected $fillable=['ip','checkIn_time','checkOut_time','stay_duration','workDay_status'];
    protected $guard = [''];
}
