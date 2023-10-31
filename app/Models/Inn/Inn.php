<?php

namespace App\Models\Inn;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * App\Models\Inn\Inn
 *
 * @property-read \App\Models\Inn\Address|null $address
 * @property-read \App\Models\Inn\Contact|null $contact
 * @property-read \App\Models\Inn\Owner|null $owner
 * @method static \Database\Factories\Inn\InnFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Inn newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Inn newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Inn query()
 * @mixin \Eloquent
 */
class Inn extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'identification_number',
        'establishment',
        'user_id',
        'photo_url',
    ];

    protected $casts = [
        'establishment' => 'date',
    ];

    public function address(): HasOne
    {
        return $this->hasOne(Address::class);
    }

    public function owner(): HasOne
    {
        return $this->hasOne(Owner::class);
    }

    public function contact(): HasOne
    {
        return $this->hasOne(Contact::class);
    }

    public function openingHours(): HasMany
    {
        return $this->hasMany(OpeningHour::class);
    }
}
