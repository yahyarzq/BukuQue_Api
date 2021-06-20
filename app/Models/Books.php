<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property boolean $is_nugas
 * @property boolean $is_ngaji
 * @property boolean $is_doabanguntidur
 * @property boolean $is_doabelumtidur
 * @property string $book_content
 * @property boolean $is_subuh
 * @property boolean $is_dzuhur
 * @property boolean $is_azhar
 * @property boolean $is_maghrib
 * @property boolean $is_isya
 * @property string $date
 * @property integer $Surah_id
 * @property boolean $bookisreviewed
 * @property Surah $surah
 */
class Books extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['is_nugas', 'is_ngaji', 'is_doabanguntidur', 'is_doabelumtidur', 'book_content', 'is_subuh', 'is_dzuhur', 'is_azhar', 'is_maghrib', 'is_isya', 'date', 'bookisreviewed'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function surah()
    {
        return $this->belongsTo('App\Surah', 'Surah_id');
    }
}
