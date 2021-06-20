<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $name
 * @property string $address
 * @property string $phone_number
 * @property string $number
 * @property string $username
 * @property string $password
 * @property integer $Teacher_id
 * @property integer $Class_id
 * @property integer $Books_id
 * @property integer $Books_Surah_id
 * @property Class $class
 * @property Teacher $teacher
 */
class Students extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name', 'address', 'phone_number', 'number', 'username', 'password'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function class()
    {
        return $this->belongsTo('App\Class', 'Class_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function teacher()
    {
        return $this->belongsTo('App\Teacher', 'Teacher_id');
    }
}
