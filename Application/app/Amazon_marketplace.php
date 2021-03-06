<?php

namespace App;

use App\BaseModel;
use Illuminate\Database\Eloquent\Model as Eloquent;

class Amazon_marketplace extends Eloquent
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
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function customer_amazon_detail()
    {
        return $this->hasOne(Customer_amazon_detail::class);
    }
    public function dev_account()
    {
        return $this->hasOne(Dev_account::class);
    }

}
