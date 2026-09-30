<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Rombel extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'rombel';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_rombel';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'nama_kelas',
        'tingkat',
    ];

    /**
     * Get the siswa belonging to this rombel.
     */
    public function siswa(): HasMany
    {
        return $this->hasMany(Siswa::class, 'id_rombel', 'id_rombel');
    }

    /**
     * Get the users assigned to this rombel.
     */
    public function users(): HasMany
    {
        return $this->hasMany(User::class, 'id_rombel', 'id_rombel');
    }

    /**
     * Get the statistik records for this rombel.
     */
    public function statistikRombel(): HasMany
    {
        return $this->hasMany(StatistikRombel::class, 'id_rombel', 'id_rombel');
    }
}
