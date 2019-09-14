@inject('request', 'Illuminate\Http\Request')
<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <ul class="sidebar-menu">

             

            <li class="{{ $request->segment(1) == 'home' ? 'active' : '' }}">
                <a href="{{ url('/') }}">
                    <i class="fa fa-wrench"></i>
                    <span class="title">@lang('quickadmin.qa_dashboard')</span>
                </a>
            </li>

            @can('user_management_access')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span>@lang('quickadmin.user-management.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @can('role_access')
                    <li>
                        <a href="{{ route('admin.roles.index') }}">
                            <i class="fa fa-briefcase"></i>
                            <span>@lang('quickadmin.roles.title')</span>
                        </a>
                    </li>@endcan
                    
                    @can('user_access')
                    <li>
                        <a href="{{ route('admin.users.index') }}">
                            <i class="fa fa-user"></i>
                            <span>@lang('quickadmin.users.title')</span>
                        </a>
                    </li>@endcan
                    
                    @can('user_action_access')
                    <li>
                        <a href="{{ route('admin.user_actions.index') }}">
                            <i class="fa fa-th-list"></i>
                            <span>@lang('quickadmin.user-actions.title')</span>
                        </a>
                    </li>@endcan
                    
                    @can('system_setting_access')
                    <li>
                        <a href="{{ route('admin.system_settings.index') }}">
                            <i class="fa fa-gears"></i>
                            <span>@lang('quickadmin.system-settings.title')</span>
                        </a>
                    </li>@endcan
                    
                </ul>
            </li>@endcan
            
            @can('avip_access')
            <li>
                <a href="{{ route('admin.avips.index') }}">
                    <i class="fa fa-gears"></i>
                    <span>@lang('quickadmin.avip.title')</span>
                </a>
            </li>@endcan
            
            @can('patient_registration_access')
            <li>
                <a href="{{ route('admin.patient_registrations.index') }}">
                    <i class="fa fa-gears"></i>
                    <span>@lang('quickadmin.patient-registration.title')</span>
                </a>
            </li>@endcan
            
            @can('message_mapping_access')
            <li>
                <a href="{{ route('admin.message_mappings.index') }}">
                    <i class="fa fa-file-text-o"></i>
                    <span>@lang('quickadmin.message-mapping.title')</span>
                </a>
            </li>@endcan
            
            @can('ip_access')
            <li>
                <a href="{{ route('admin.ips.index') }}">
                    <i class="fa fa-gears"></i>
                    <span>@lang('quickadmin.ip.title')</span>
                </a>
            </li>@endcan
            
            @can('referral_data_final_access')
            <li>
                <a href="{{ route('admin.referral_data_finals.index') }}">
                    <i class="fa fa-gears"></i>
                    <span>@lang('quickadmin.referral-data-final.title')</span>
                </a>
            </li>@endcan
            
            @can('gstimport_access')
            <li>
                <a href="{{ route('admin.gstimports.index') }}">
                    <i class="fa fa-gears"></i>
                    <span>@lang('quickadmin.gstimport.title')</span>
                </a>
            </li>@endcan
            
            @can('venderpayment_access')
            <li>
                <a href="{{ route('admin.venderpayments.index') }}">
                    <i class="fa fa-gears"></i>
                    <span>@lang('quickadmin.venderpayment.title')</span>
                </a>
            </li>@endcan
            

            

            



            <li class="{{ $request->segment(1) == 'change_password' ? 'active' : '' }}">
                <a href="{{ route('auth.change_password') }}">
                    <i class="fa fa-key"></i>
                    <span class="title">@lang('quickadmin.qa_change_password')</span>
                </a>
            </li>

            <li>
                <a href="#logout" onclick="$('#logout').submit();">
                    <i class="fa fa-arrow-left"></i>
                    <span class="title">@lang('quickadmin.qa_logout')</span>
                </a>
            </li>
        </ul>
    </section>
</aside>

