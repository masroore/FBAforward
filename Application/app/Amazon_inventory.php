<?php

namespace App;

use App\BaseModel;
use Illuminate\Database\Eloquent\Model as Eloquent;

class Amazon_inventory extends Eloquent
{

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */

    public function users()
    {
        return $this->belongsTo(Users::class);
    }
    public function shipment_detail()
    {
        return $this->hasMany(Shipment_detail::class);
    }
    public function supplier_detail()
    {
        return $this->hasMany(Supplier_detail::class);
    }
}
