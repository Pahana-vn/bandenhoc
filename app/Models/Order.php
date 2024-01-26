<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = "order";
    protected $fillable = ["id_account", "ship", "total", "payment", "shiptime", "note", "status", "token", "created_at", "updated_at"];
    protected $primarykey = "id";

    public function account()
    {
        return $this->hasOne('Account::class', 'id', 'account_id');
    }
    public function details()
    {
        return $this->hasMany('orderdetail::class', 'id_order', 'id');
    }
}
