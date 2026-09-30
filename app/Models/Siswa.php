<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Siswa extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'siswa';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'nis';

    /**
     * Indicates if the model's ID is auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The data type of the primary key ID.
     *
     * @var string
     */
    protected $keyType = 'int';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'nis',
        'id_rombel',
        'id_rayon',
        'nama_siswa',
    ];

    /**
     * Get the rombel that the siswa belongs to.
     */
    public function rombel(): BelongsTo
    {
        return $this->belongsTo(Rombel::class, 'id_rombel', 'id_rombel');
    }

    /**
     * Get the rayon that the siswa belongs to.
     */
    public function rayon(): BelongsTo
    {
        return $this->belongsTo(Rayon::class, 'id_rayon', 'id_rayon');
    }

    /**
     * Get the pemasukan records for this siswa.
     */
    public function pemasukan(): HasMany
    {
        return $this->hasMany(Pemasukan::class, 'nis', 'nis');
    }
}
