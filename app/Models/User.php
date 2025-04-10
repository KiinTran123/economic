<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;


class User extends Authenticatable implements FilamentUser
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */

    public function canAccessPanel(Panel $panel): bool
    {
        return $this->role === 1 && $this->is_active === 1;
    }


    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'is_active',
        'phone',
        'avatar',
        'phone',

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

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
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    // Quan hệ với Giỏ hàng
    public function cart()
    {
        return $this->hasMany(Cart::class);
    }

    // Quan hệ với Địa chỉ giao hàng
    public function shippingAddresses()
    {
        return $this->hasMany(ShippingAddress::class);
    }

    // Quan hệ với Thanh toán
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
