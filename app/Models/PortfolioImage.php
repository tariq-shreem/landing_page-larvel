<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortfolioImage extends Model
{
    use HasFactory;

    protected $fillable=['img','portfolio_id'];

    public function Portfolio(){
        return $this->hasOne(Portfolio::class,'id','portfolio_id');
    }
}
