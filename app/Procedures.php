<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Procedures extends Model

// Hierbij is er een tabel aangemaakt met procedures in de database. Met dit Model wordt dat lijst uit de database opgevraagd.
{
 protected $table = 'procedure';
}
