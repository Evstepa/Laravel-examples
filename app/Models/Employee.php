<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    /**
     * Поля таблицы
     *
     * @var non-empty-list<non-empty-string>
     */
    protected $fillable = [
        'name',
        'surname',
        'email',
        'age',
        'job',
        'address',
        'workData',
    ];
}
