<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StatistikRayon extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'statistik_rayon';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_statistik';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'id_rayon',
        'id_periode',
        'total_nominal',
        'jumlah_siswa_bayar',
        'total_siswa',
        'presentase_partisipasi',
        'presentase_perubahan',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'total_nominal' => 'decimal:2',
            'jumlah_siswa_bayar' => 'integer',
            'total_siswa' => 'integer',
            'presentase_partisipasi' => 'decimal:2',
            'presentase_perubahan' => 'decimal:2',
        ];
    }

    /**
     * Get the rayon associated with this statistic.
     */
    public function rayon(): BelongsTo
    {
        return $this->belongsTo(Rayon::class, 'id_rayon', 'id_rayon');
    }

    /**
     * Get the periode associated with this statistic.
     */
    public function periode(): BelongsTo
    {
        return $this->belongsTo(Periode::class, 'id_periode', 'id_periode');
    }
}
