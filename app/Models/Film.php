<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Film extends Model
{
    protected $table = 'film';
    protected $fillable = ['title','release_date','duration','rated','rating','poster'];
    use Sortable;
    public $sortable = ['title','release_date','duration','rated','rating'];

    public function getPoster()
    {
        if(!$this->poster){
            return asset('images/default.jpg');
        }
        return asset('images/'.$this->poster);
    }
    public function genre()
    {
        return $this->belongsToMany(Genre::class)->withTimeStamps();
    }
}
