<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StatistikRombel extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'statistik_rombel';

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
        'id_rombel',
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
     * Get the rombel associated with this statistic.
     */
    public function rombel(): BelongsTo
    {
        return $this->belongsTo(Rombel::class, 'id_rombel', 'id_rombel');
    }

    /**
     * Get the periode associated with this statistic.
     */
    public function periode(): BelongsTo
    {
        return $this->belongsTo(Periode::class, 'id_periode', 'id_periode');
    }
}
