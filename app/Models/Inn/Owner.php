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
 * @property int $id
 * @property int $inn_id
 * @property string $company_name
 * @property string $country
 * @property string $street
 * @property string $post_code
 * @property string $city
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Owner whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Owner whereCompanyName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Owner whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Owner whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Owner whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Owner whereInnId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Owner wherePostCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Owner whereStreet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Owner whereUpdatedAt($value)
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
