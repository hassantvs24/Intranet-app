<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{

    protected $fillable = ['title', 'html_content', 'board_id', 'card_type', 'is_visible', 'view_type'];

    public function board()
    {
        return $this->belongsTo('App\Board');
    }

    public function scopeType( $query, $value ) {
        return $query->where( 'card_type', $value );
    }

    public function scopeVisible( $query, $value ) {
        return $query->where( 'is_visible', $value );
    }

    public function scopeViewType( $query, $value ) {
        return $query->where( 'view_type', $value );
    }
}
