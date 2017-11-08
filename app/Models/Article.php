<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    /**
     * An article belongs to a single user.
     *
     * @return Illuminate\Database\Eloquent\Concerns\belongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * The 'updated_at' columns date format is returned as d/m/y, i.e. 20/07/97.
     *
     * @param  String $date
     * @return Carbon\Carbon
     */
    public function getCreatedAtAttribute(String $date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('F d, Y');
    }

    /**
     * The 'updated_at' columns date format is returned as d/m/y, i.e. 20/07/97.
     *
     * @param  String $date
     * @return Carbon\Carbon
     */
    public function getUpdatedAtAttribute(String $date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('F d, Y');
    }
}
