<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $fillable = ['item_code','item_name', 'description', 'owner', 'status'];
}
