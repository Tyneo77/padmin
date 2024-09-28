<?php

namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Collection extends Model
{
   
  protected $guarded = [
    'id'
  ];
  /**
     * The roles that belong to the user.
     */
    public function chapter(){
      return$this->belongsTo(Chapter::class);
    }
    public function ctype(){
      return$this->belongsTo(Ctype::class);
    }
    public function infopixels()
    {
        return $this->hasMany(CollectionInfopixel::class);
    }
}
    