<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Rayon extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'rayon';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_rayon';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'nama_rayon',
    ];

    /**
     * Get the siswa belonging to this rayon.
     */
    public function siswa(): HasMany
    {
        return $this->hasMany(Siswa::class, 'id_rayon', 'id_rayon');
    }

    /**
     * Get the users assigned to this rayon.
     */
    public function users(): HasMany
    {
        return $this->hasMany(User::class, 'id_rayon', 'id_rayon');
    }

    /**
     * Get the statistik records for this rayon.
     */
    public function statistikRayon(): HasMany
    {
        return $this->hasMany(StatistikRayon::class, 'id_rayon', 'id_rayon');
    }
}
