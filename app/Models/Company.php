<?php

namespace App\Models;

use Filament\Models\Contracts\HasAvatar;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Wallo\FilamentCompanies\Company as FilamentCompaniesCompany;
use Wallo\FilamentCompanies\Events\CompanyCreated;
use Wallo\FilamentCompanies\Events\CompanyDeleted;
use Wallo\FilamentCompanies\Events\CompanyUpdated;

class Company extends FilamentCompaniesCompany implements HasAvatar
{
    use HasFactory;

    public function getFilamentAvatarUrl(): string
    {
        return $this->owner->profile_photo_url;
    }

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'personal_company' => 'boolean',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'personal_company',
    ];

    /**
     * The event map for the model.
     *
     * @var array<string, class-string>
     */
    protected $dispatchesEvents = [
        'created' => CompanyCreated::class,
        'updated' => CompanyUpdated::class,
        'deleted' => CompanyDeleted::class,
    ];
}
