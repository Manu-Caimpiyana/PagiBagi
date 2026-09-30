<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

#[Fillable(['password', 'id_rayon', 'id_rombel', 'username', 'role'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, HasRoles, Notifiable;

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_user';

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Get the rayon associated with the user.
     */
    public function rayon(): BelongsTo
    {
        return $this->belongsTo(Rayon::class, 'id_rayon', 'id_rayon');
    }

    /**
     * Get the rombel associated with the user.
     */
    public function rombel(): BelongsTo
    {
        return $this->belongsTo(Rombel::class, 'id_rombel', 'id_rombel');
    }

    /**
     * Get the pemasukan records recorded by the user.
     */
    public function pemasukan(): HasMany
    {
        return $this->hasMany(Pemasukan::class, 'id_user', 'id_user');
    }

    /**
     * Get the pengeluaran records recorded by the user.
     */
    public function pengeluaran(): HasMany
    {
        return $this->hasMany(Pengeluaran::class, 'id_user', 'id_user');
    }
}
