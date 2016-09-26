<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users_Info extends Model
{

    protected $table = 'users_info';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'titel',
        'voornaam',
        'tussenvoegsel',
        'achternaam',
        'bedrijfsnaam',
        'woonplaats',
        'straatnaam',
        'huisnummer',
        'postcode',
        'telefoonnummer',
        'checkfactuur',
        'factuurwoonplaats',
        'factuurstraatnaam',
        'factuurpostcode',
        'factuurhuisnummer',
        'email'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

}
