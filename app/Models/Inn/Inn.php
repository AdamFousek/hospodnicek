<?php

namespace App\Models\Inn;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

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
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property string $identification_number
 * @property string|null $photo_url
 * @property \Illuminate\Support\Carbon|null $establishment
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Inn\OpeningHour> $openingHours
 * @property-read int|null $opening_hours_count
 * @method static \Illuminate\Database\Eloquent\Builder|Inn onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Inn whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Inn whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Inn whereEstablishment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Inn whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Inn whereIdentificationNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Inn whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Inn wherePhotoUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Inn whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Inn whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Inn withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Inn withoutTrashed()
 * @mixin \Eloquent
 */
class Inn extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Searchable;

    protected $fillable = [
        'name',
        'description',
        'identification_number',
        'establishment',
        'user_id',
        'photo_url',
    ];

    protected $casts = [
        'establishment' => 'date:d.m.Y',
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

    public function todayHours(): HasMany
    {
        return $this->openingHours()->where('day_of_week', date('N'));
    }

    public function toSearchableArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description ?? null,
            'identification_number' => $this->identification_number ?? null,
            'establishment' => $this->establishment?->format('d.m.Y'),
            'address_street' => $this->address->street ?? null,
            'address_post_code' => $this->address->post_code ?? null,
            'address_city' => $this->address->city ?? null,
            'address_country' => $this->address->country ?? null,
            '_geo' => [
                'lat' => $this->address->latitude ?? 0.0,
                'lng' => $this->address->longitude ?? 0.0,
            ]
        ];
    }
}
