<?php

namespace App\Models\User;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Area\Branch\Branch;
use App\Models\Area\Region\Region;
use App\Models\Widget\TextName;
use App\Models\Workflow\Position\PositionWorkflow;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\File;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $image
 * @property mixed|string $password
 * @property mixed|null $role
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'image',
    ];

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
        'password' => 'hashed',
    ];

    public function getImage(): string|null
    {
        if (isset($this->image) and File::exists(public_path('storage/' . $this->image))) {
            $files = explode('.', $this->image);
            if (in_array(end($files), ['jpg', 'jpeg', 'png', 'gif', 'svg'])) {
                return '<img src="/storage/' . $this->image . '" alt="' . $this->name . '" class="w-75">';
            }
        }

        return '<span class="badge bg-muted">' . TextName::getTextTranslation('no-image') . '</span>';
    }

    public function branches(): BelongsToMany
    {
        return $this->belongsToMany(Branch::class, 'user_branches', 'user_id', 'branch_id');
    }

    public function regions(): BelongsToMany
    {
        return $this->belongsToMany(Region::class, 'branches');
    }

    public function position_workflow(): BelongsToMany
    {
        return $this->belongsToMany(PositionWorkflow::class, 'position_workflow_users');
    }
}
