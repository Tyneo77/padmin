<?php
namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Infopixel extends Model
{

  protected $guarded = [
    'id'
  ];
    /**
     * The roles that belong to the user.
     */
    public function collections()
    {
        return $this->hasMany(CollectionInfopixel::class);
    }
}