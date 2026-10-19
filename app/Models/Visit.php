<?php
namespace App\Models;

use Illuminate\Database\Eloquent\MassPrunable;
use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    use MassPrunable;

    public $timestamps = false;
    protected $guarded = [];

    protected function casts(): array
    {
        return ['created_at' => 'datetime'];
    }

    // data lebih dari 12 bulan dihapus otomatis
    public function prunable()
    {
        return static::where('created_at', '<', now()->subMonths(12));
    }
}