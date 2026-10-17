<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    public const STATUSES = ['new', 'contacted', 'scheduled', 'done', 'cancelled'];

    protected $fillable = [
        'name','email','whatsapp','city','role','grade','school','curriculum',
        'topics','country','major','start_year','question','mode','days','times',
        'source','status',
    ];

    protected function casts(): array
    {
        return ['topics'=>'array','start_year'=>'array','days'=>'array','times'=>'array'];
    }

    // 0812... -> 62812... untuk link wa.me
    public function getWaNumberAttribute(): string
    {
        $n = preg_replace('/\D/', '', $this->whatsapp);
        return str_starts_with($n, '0') ? '62'.substr($n, 1) : $n;
    }
}