<?php
Route::get('/', function () { return redirect('/admin/home'); });

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('auth.login');
Route::post('logout', 'Auth\LoginController@logout')->name('auth.logout');

// Change Password Routes...
Route::get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
Route::patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('auth.password.reset');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('auth.password.reset');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('auth.password.reset');

// Social Login Routes..
Route::get('login/{driver}', 'Auth\LoginController@redirectToSocial')->name('auth.login.social');
Route::get('{driver}/callback', 'Auth\LoginController@handleSocialCallback')->name('auth.login.social_callback');

Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/home', 'HomeController@index');

    Route::resource('roles', 'Admin\RolesController');
    Route::post('roles_mass_destroy', ['uses' => 'Admin\RolesController@massDestroy', 'as' => 'roles.mass_destroy']);
    Route::resource('users', 'Admin\UsersController');
    Route::post('users_mass_destroy', ['uses' => 'Admin\UsersController@massDestroy', 'as' => 'users.mass_destroy']);
    Route::resource('user_actions', 'Admin\UserActionsController');
    Route::resource('sms_imports', 'Admin\SmsImportsController');
    Route::post('sms_imports_mass_destroy', ['uses' => 'Admin\SmsImportsController@massDestroy', 'as' => 'sms_imports.mass_destroy']);
    Route::post('sms_imports_restore/{id}', ['uses' => 'Admin\SmsImportsController@restore', 'as' => 'sms_imports.restore']);
    Route::delete('sms_imports_perma_del/{id}', ['uses' => 'Admin\SmsImportsController@perma_del', 'as' => 'sms_imports.perma_del']);
    Route::resource('patient_registrations', 'Admin\PatientRegistrationsController');
    Route::get('patient_registrations_search', ['uses' => 'Admin\PatientRegistrationsController@searchByNameAndDate', 'as' => 'patient_registrations.search']);
    Route::post('patient_registrations_mass_destroy', ['uses' => 'Admin\PatientRegistrationsController@massDestroy', 'as' => 'patient_registrations.mass_destroy']);
    Route::post('patient_registrations_restore/{id}', ['uses' => 'Admin\PatientRegistrationsController@restore', 'as' => 'patient_registrations.restore']);
    Route::delete('patient_registrations_perma_del/{id}', ['uses' => 'Admin\PatientRegistrationsController@perma_del', 'as' => 'patient_registrations.perma_del']);
    Route::resource('opds', 'Admin\OpdsController');
    Route::post('opds_mass_destroy', ['uses' => 'Admin\OpdsController@massDestroy', 'as' => 'opds.mass_destroy']);
    Route::post('opds_restore/{id}', ['uses' => 'Admin\OpdsController@restore', 'as' => 'opds.restore']);
    Route::delete('opds_perma_del/{id}', ['uses' => 'Admin\OpdsController@perma_del', 'as' => 'opds.perma_del']);
    Route::resource('ips', 'Admin\IpsController');
    Route::post('ips_mass_destroy', ['uses' => 'Admin\IpsController@massDestroy', 'as' => 'ips.mass_destroy']);
    Route::post('ips_restore/{id}', ['uses' => 'Admin\IpsController@restore', 'as' => 'ips.restore']);
    Route::delete('ips_perma_del/{id}', ['uses' => 'Admin\IpsController@perma_del', 'as' => 'ips.perma_del']);
    Route::resource('avips', 'Admin\AvipsController');
    Route::get('avips_search', ['uses' => 'Admin\AvipsController@searchByName', 'as' => 'avips.search']);
    Route::post('avips_mass_destroy', ['uses' => 'Admin\AvipsController@massDestroy', 'as' => 'avips.mass_destroy']);
    Route::post('avips_restore/{id}', ['uses' => 'Admin\AvipsController@restore', 'as' => 'avips.restore']);
    Route::delete('avips_perma_del/{id}', ['uses' => 'Admin\AvipsController@perma_del', 'as' => 'avips.perma_del']);
    Route::resource('referral_datas', 'Admin\ReferralDatasController');
    Route::post('referral_datas_mass_destroy', ['uses' => 'Admin\ReferralDatasController@massDestroy', 'as' => 'referral_datas.mass_destroy']);
    Route::post('referral_datas_restore/{id}', ['uses' => 'Admin\ReferralDatasController@restore', 'as' => 'referral_datas.restore']);
    Route::delete('referral_datas_perma_del/{id}', ['uses' => 'Admin\ReferralDatasController@perma_del', 'as' => 'referral_datas.perma_del']);
    Route::resource('system_settings', 'Admin\SystemSettingsController');
    Route::post('system_settings_mass_destroy', ['uses' => 'Admin\SystemSettingsController@massDestroy', 'as' => 'system_settings.mass_destroy']);
    Route::post('system_settings_restore/{id}', ['uses' => 'Admin\SystemSettingsController@restore', 'as' => 'system_settings.restore']);
    Route::delete('system_settings_perma_del/{id}', ['uses' => 'Admin\SystemSettingsController@perma_del', 'as' => 'system_settings.perma_del']);
    Route::resource('message_mappings', 'Admin\MessageMappingsController');
    Route::post('message_mappings_mass_destroy', ['uses' => 'Admin\MessageMappingsController@massDestroy', 'as' => 'message_mappings.mass_destroy']);
    Route::post('message_mappings_restore/{id}', ['uses' => 'Admin\MessageMappingsController@restore', 'as' => 'message_mappings.restore']);
    Route::post('message_mappings_search', ['uses' => 'Admin\MessageMappingsController@search', 'as' => 'message_mappings.search']);
    Route::post('message_mappings_patient_list', ['uses' => 'Admin\MessageMappingsController@search', 'as' => 'message_mappings.patient_list']);
    Route::delete('message_mappings_perma_del/{id}', ['uses' => 'Admin\MessageMappingsController@perma_del', 'as' => 'message_mappings.perma_del']);
    Route::resource('whats_app_imports', 'Admin\WhatsAppImportsController');
    Route::post('whats_app_imports_mass_destroy', ['uses' => 'Admin\WhatsAppImportsController@massDestroy', 'as' => 'whats_app_imports.mass_destroy']);
    Route::post('whats_app_imports_restore/{id}', ['uses' => 'Admin\WhatsAppImportsController@restore', 'as' => 'whats_app_imports.restore']);
    Route::delete('whats_app_imports_perma_del/{id}', ['uses' => 'Admin\WhatsAppImportsController@perma_del', 'as' => 'whats_app_imports.perma_del']);
    Route::resource('email_imports', 'Admin\EmailImportsController');
    Route::post('email_imports_mass_destroy', ['uses' => 'Admin\EmailImportsController@massDestroy', 'as' => 'email_imports.mass_destroy']);
    Route::post('email_imports_restore/{id}', ['uses' => 'Admin\EmailImportsController@restore', 'as' => 'email_imports.restore']);
    Route::delete('email_imports_perma_del/{id}', ['uses' => 'Admin\EmailImportsController@perma_del', 'as' => 'email_imports.perma_del']);
    Route::resource('referral_data_finals', 'Admin\ReferralDataFinalsController');
    Route::post('referral_data_finals_mass_destroy', ['uses' => 'Admin\ReferralDataFinalsController@massDestroy', 'as' => 'referral_data_finals.mass_destroy']);
    Route::post('referral_data_finals_restore/{id}', ['uses' => 'Admin\ReferralDataFinalsController@restore', 'as' => 'referral_data_finals.restore']);
    Route::delete('referral_data_finals_perma_del/{id}', ['uses' => 'Admin\ReferralDataFinalsController@perma_del', 'as' => 'referral_data_finals.perma_del']);
    Route::resource('ppn_payments', 'Admin\PpnPaymentsController');
    Route::post('ppn_payments_mass_destroy', ['uses' => 'Admin\PpnPaymentsController@massDestroy', 'as' => 'ppn_payments.mass_destroy']);
    Route::post('ppn_payments_restore/{id}', ['uses' => 'Admin\PpnPaymentsController@restore', 'as' => 'ppn_payments.restore']);
    Route::delete('ppn_payments_perma_del/{id}', ['uses' => 'Admin\PpnPaymentsController@perma_del', 'as' => 'ppn_payments.perma_del']);
    Route::resource('gstimports', 'Admin\GstimportsController');
    Route::post('gstimports_mass_destroy', ['uses' => 'Admin\GstimportsController@massDestroy', 'as' => 'gstimports.mass_destroy']);
    Route::resource('venderpayments', 'Admin\VenderpaymentsController');

    Route::get('referral_data_finals_process_month/{month}', ['uses' => 'Admin\ReferralDataFinalsController@processMonth', 'as' => 'referral_data_finals_process_month']);
    Route::get('referral_data_finals_process_one/{id}', ['uses' => 'Admin\ReferralDataFinalsController@processOne', 'as' => 'referral_data_finals_process_one']);
    Route::post('referral_data_finals_update_vendor_code', ['uses' => 'Admin\ReferralDataFinalsController@update_vendor_code', 'as' => 'referral_data_finals_update_vendor_code']);

    Route::get('vender_payments_comparision', ['uses' => 'Admin\ReportsController@getQuaterlyComparison', 'as' => 'vender_payments_comparision']);
    Route::get('vender_payments_details', ['uses' => 'Admin\ReportsController@getVendorPayments', 'as' => 'vender_payments_details']);
    Route::get('country_payments_comparision', ['uses' => 'Admin\ReportsController@getQuaterlyComparisonCountryWise', 'as' => 'country_payments_comparision']);
    Route::get('speciality_payments_comparision', ['uses' => 'Admin\ReportsController@getQuaterlyComparisonSpecialityWise', 'as' => 'speciality_payments_comparision']);
    Route::get('doctor_payments_comparision', ['uses' => 'Admin\ReportsController@getQuaterlyComparisonDoctorWise', 'as' => 'doctor_payments_comparision']);
    Route::get('vender_payments_pivot', ['uses' => 'Admin\ReportsController@getMonthlyPivot', 'as' => 'vender_payments_pivot']);
    Route::get('vender_payments', ['uses' => 'Admin\ReportsController@getMonthlyPayments', 'as' => 'vender_payments']);
    Route::get('message_mappings_update_names', ['uses' => 'Admin\MessageMappingsController@updateNames', 'as' => 'message_mappings_update_names']);

    Route::resource('referralcompletes', 'Admin\ReferralcompletesController');
    Route::post('referralcompletes_mass_destroy', ['uses' => 'Admin\ReferralcompletesController@massDestroy', 'as' => 'referralcompletes.mass_destroy']);
    Route::post('referralcompletes_restore/{id}', ['uses' => 'Admin\ReferralcompletesController@restore', 'as' => 'referralcompletes.restore']);
    Route::delete('referralcompletes_perma_del/{id}', ['uses' => 'Admin\ReferralcompletesController@perma_del', 'as' => 'referralcompletes.perma_del']);

    Route::resource('reports', 'Admin\ReportsController');

    Route::post('csv_parse', 'Admin\CsvImportController@parse')->name('csv_parse');
    Route::post('validate_csv', 'Admin\CsvImportController@validateCsv')->name('validate_csv');
    Route::post('csv_process', 'Admin\CsvImportController@process')->name('csv_process');


});
