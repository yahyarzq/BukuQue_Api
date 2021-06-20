<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $name
 * @property string $number
 * @property string $phone_number
 * @property string $username
 * @property string $password
 * @property integer $Class_id
 * @property Class $class
 * @property Student[] $students
 */
class Teacher extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'teacher';

    /**
     * @var array
     */
    protected $fillable = ['name', 'number', 'phone_number', 'username', 'password'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function class()
    {
        return $this->belongsTo('App\Class', 'Class_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function students()
    {
        return $this->hasMany('App\Student', 'Teacher_id');
    }
}
