<?php

Route::group(['prefix' => '/v1', 'namespace' => 'Api\V1', 'as' => 'api.'], function () {

        Route::resource('system_settings', 'SystemSettingsController', ['except' => ['create', 'edit']]);

        Route::resource('avips', 'AvipsController', ['except' => ['create', 'edit']]);

        Route::resource('patient_registrations', 'PatientRegistrationsController', ['except' => ['create', 'edit']]);

        Route::resource('message_mappings', 'MessageMappingsController', ['except' => ['create', 'edit']]);

        Route::resource('ips', 'IpsController', ['except' => ['create', 'edit']]);

        Route::resource('referral_data_finals', 'ReferralDataFinalsController', ['except' => ['create', 'edit']]);

        Route::resource('venderpayments', 'VenderpaymentsController', ['except' => ['create', 'edit']]);

        Route::resource('bonus_payments', 'BonusPaymentsController', ['except' => ['create', 'edit']]);

        Route::resource('referralcompletes', 'ReferralcompletesController', ['except' => ['create', 'edit']]);

});
