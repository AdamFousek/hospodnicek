<?php

namespace App\Models\Inn;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Inn\Owner
 *
 * @property-read \App\Models\Inn\Inn|null $inn
 * @method static \Database\Factories\Inn\OwnerFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Owner newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Owner newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Owner query()
 * @mixin \Eloquent
 */
class Owner extends Model
{
    use HasFactory;

    protected $table = 'inn_owners';

    protected $fillable = [
        'inn_id',
        'company_name',
        'country',
        'street',
        'post_code',
        'city',
    ];

    public function inn(): BelongsTo
    {
        return $this->belongsTo(Inn::class);
    }
}
