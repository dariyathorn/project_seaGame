<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    public static function store($request, $id = null){
        $user = $request->only(
            'name',
            'email',
            'password',
        );
        if($id){
            $user = self::updateOrCreate(['id'=>$id], $user);

        }
        else{
            $user = self::create($user);
            $id = $user->id;
        }
        return $user;
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

// one user can buy many tickets

    public function tickets():HasMany{
        return $this->hasMany(Ticket::class, 'buy_ticket', 'id');
    }

// one user can join many events

    public function events():HasMany{
        return $this->hasMany(Event::class);
    }



}
