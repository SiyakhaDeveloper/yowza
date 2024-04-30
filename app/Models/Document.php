<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'category',
        'status',
        'date',
        'file_path',
    ];

    protected array $dates = ['date'];

    public function downloadHistories(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(DownloadHistory::class, 'document_id');
    }
}
