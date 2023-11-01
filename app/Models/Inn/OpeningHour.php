<?php

namespace App\Models\Inn;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Inn\OpeningHour
 *
 * @property int $id
 * @property int $inn_id
 * @property int $day_of_week
 * @property string $open_from
 * @property string $open_to
 * @property int $is_closed
 * @property int $exception
 * @property string|null $exception_date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Inn\Inn $inn
 * @method static \Database\Factories\Inn\OpeningHourFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|OpeningHour newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OpeningHour newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OpeningHour query()
 * @method static \Illuminate\Database\Eloquent\Builder|OpeningHour whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OpeningHour whereDayOfWeek($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OpeningHour whereException($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OpeningHour whereExceptionDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OpeningHour whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OpeningHour whereInnId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OpeningHour whereIsClosed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OpeningHour whereOpenFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OpeningHour whereOpenTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OpeningHour whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
