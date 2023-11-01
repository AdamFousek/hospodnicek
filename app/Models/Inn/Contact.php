<?php

namespace App\Models\Inn;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Inn\Contact
 *
 * @method static \Database\Factories\Inn\ContactFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Contact newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Contact newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Contact query()
 * @property int $id
 * @property int $inn_id
 * @property string|null $phone_number
 * @property string|null $email
 * @property string|null $facebook
 * @property string|null $instagram
 * @property string|null $twitter
 * @property string|null $web
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereFacebook($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereInnId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereInstagram($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact wherePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereTwitter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereWeb($value)
 * @mixin \Eloquent
 */
class Contact extends Model
{
    use HasFactory;

    protected $table = 'inn_contacts';

    protected $fillable = [
        'inn_id',
        'phone',
        'email',
        'facebook',
        'instagram',
        'twitter',
        'web',
    ];
}
