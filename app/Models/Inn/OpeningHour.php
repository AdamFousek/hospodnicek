<?php

namespace App\Models\Inn;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OpeningHour extends Model
{
    use HasFactory;

    protected $table = 'inn_opening_hours';

    protected $fillable = [
        'inn_id',
        'day_of_week',
        'open_from',
        'open_to',
        'is_closed',
        'exception',
        'exception_date',
    ];

    public function inn(): BelongsTo
    {
        return $this->belongsTo(Inn::class);
    }
}
