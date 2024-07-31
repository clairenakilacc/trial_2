<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class Equipment extends Model
{
    use HasFactory;

    const ITEM_PREFIX = 'ITEM';
    const ITEM_COLUMN = 'item_no';
    const PROPERTY_PREFIX = 'PROP';
    const PROPERTY_COLUMN = 'property_no';
    const CONTROL_PREFIX = 'CTRL';
    const CONTROL_COLUMN = 'control_no';

    protected $fillable = [
        'unit_no',
        'description',
        'specifications',
        'facility_id',
        'category_id',
        'status',
        'date_acquired',
        'supplier',
        'amount',
        'estimated_life',
        'item_no',
        'property_no',
        'control_no',
        'serial_no',
        'no_of_stocks',
        'restocking_point', // Fixed typo: changed 'restocking point' to 'restocking_point'
        'person_liable',
        'remarks',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function facility()
    {
        return $this->belongsTo(Facility::class);
    }
}
