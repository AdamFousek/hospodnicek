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
