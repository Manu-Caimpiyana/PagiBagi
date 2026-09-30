<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Periode extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'periode';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_periode';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'minggu_ke',
        'tanggal_mulai',
        'tanggal_selesai',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'minggu_ke' => 'integer',
            'tanggal_mulai' => 'date',
            'tanggal_selesai' => 'date',
        ];
    }

    /**
     * Get the pemasukan records in this periode.
     */
    public function pemasukan(): HasMany
    {
        return $this->hasMany(Pemasukan::class, 'id_periode', 'id_periode');
    }

    /**
     * Get the statistik rombel records for this periode.
     */
    public function statistikRombel(): HasMany
    {
        return $this->hasMany(StatistikRombel::class, 'id_periode', 'id_periode');
    }

    /**
     * Get the statistik rayon records for this periode.
     */
    public function statistikRayon(): HasMany
    {
        return $this->hasMany(StatistikRayon::class, 'id_periode', 'id_periode');
    }
}
