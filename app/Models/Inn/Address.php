<?php

namespace App\Models\Inn;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Inn\Address
 *
 * @property-read \App\Models\Inn\Inn|null $inn
 * @method static \Database\Factories\Inn\AddressFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Address newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Address newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Address query()
 * @mixin \Eloquent
 */
class Address extends Model
{
    use HasFactory;

    protected $table = 'inn_addresses';

    protected $fillable = [
        'inn_id',
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
