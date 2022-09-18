<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Staff
 *
 * @property int $id
 * @property string $staff_id
 * @property string $name
 * @property string $department_name
 * @property string $position
 * @property int $phone_number
 * @property string $currency
 * @property float $salary
 * @property string|null $resume
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Staff extends Model
{
    protected $table = 'staffs';


    protected $fillable = [
        'staff_id',
        'name',
        'department_name',
        'position',
        'phone_number',
        'currency',
        'salary',
        'resume'
    ];

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::created(function ($model) {
            $model->staff_id = 'MTX-' . str_pad($model->id, 3, "0", STR_PAD_LEFT);
            $model->save();
        });
    }
}
