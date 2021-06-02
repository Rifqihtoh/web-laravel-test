<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organizer extends Model
{
    protected $primaryKey = 'Org_id';
    protected $table = 'organizers';
    protected $fillable = ['Org_nama','Org_email','Org_telepon','Org_email','Org_password','Org_description','Org_alamat'];
}
