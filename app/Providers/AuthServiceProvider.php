<?php

namespace App\Providers;

use App\Role;
use App\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        $user = \Auth::user();

        
        // Auth gates for: User management
        Gate::define('user_management_access', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Users
        Gate::define('user_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: User actions
        Gate::define('user_action_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

        // Auth gates for: System settings
        Gate::define('system_setting_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('system_setting_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('system_setting_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('system_setting_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('system_setting_delete', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

        // Auth gates for: Avip
        Gate::define('avip_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('avip_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('avip_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('avip_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('avip_delete', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

        // Auth gates for: Patient registration
        Gate::define('patient_registration_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('patient_registration_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('patient_registration_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('patient_registration_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('patient_registration_delete', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

        // Auth gates for: Message mapping
        Gate::define('message_mapping_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('message_mapping_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('message_mapping_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('message_mapping_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('message_mapping_delete', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

        // Auth gates for: Ip
        Gate::define('ip_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('ip_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('ip_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('ip_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('ip_delete', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

        // Auth gates for: Referral data final
        Gate::define('referral_data_final_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('referral_data_final_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('referral_data_final_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('referral_data_final_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('referral_data_final_delete', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

        // Auth gates for: Gstimport
        Gate::define('gstimport_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('gstimport_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('gstimport_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('gstimport_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('gstimport_delete', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

        // Auth gates for: Venderpayment
        Gate::define('venderpayment_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('venderpayment_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

    }
}
