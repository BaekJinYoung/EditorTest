<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CkEditor extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', // 제목
        'content', // 내용
    ];
}
