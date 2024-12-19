<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    public function computer()
    {
        return $this->belongsTo(computer::class);
    }

    protected $fillable = [
        'computer_id',   // ID của máy tính
        'reported_by',   // Người báo cáo
        'reported_date', // Ngày báo cáo
        'description',   // Mô tả vấn đề
        'urgency',       // Mức độ khẩn cấp
        'status',        // Trạng thái của vấn đề
    ];
}
