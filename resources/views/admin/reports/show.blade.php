@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('Reports')</h3>

    {!! Form::open(array('name' => 'comparision','route' => ['admin.vender_payments_comparision'], 'method' => 'GET')) !!}
    <div class="panel panel-default">
        <div class="panel-heading">
            Comparission Report
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-2">
                    <div style="font-weight: bolder; font-size:14">
                    Vendor Wise <input type="radio" checked name="wise" value="{{route('admin.vender_payments_comparision')}}">
                    </div>
                </div>
                <div class="col-md-2">
                    <div style="font-weight: bolder; font-size:14">
                        Country Wise <input type="radio" name="wise" value="{{route('admin.country_payments_comparision')}}">
                    </div>
                </div>
                <div class="col-md-2">
                    <div style="font-weight: bolder; font-size:14">
                        Speciality Wise <input type="radio" name="wise" value="{{route('admin.speciality_payments_comparision')}}">
                    </div>
                </div>
                <div class="col-md-2">
                    <div style="font-weight: bolder; font-size:14">
                        Doctor Wise <input type="radio" name="wise" value="{{route('admin.doctor_payments_comparision')}}">
                    </div>
                </div>
            </div>
            <div class="row"></div>
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>
                                    Select Months Range1
                                </th>
                                <th>
                                    Select Months Range2
                                </th>
                            </tr>
                        </thead>
                        <tr>
                            <td>
                                <select id="date_range1" name="date_range1[]" multiple size="12">
                                    <option value="Apr-18">Apr-18</option>
                                    <option value="May-18">May-18</option>
                                    <option value="Jun-18">Jun-18</option>
                                    <option value="Jul-18">Jul-18</option>
                                    <option value="Aug-18">Aug-18</option>
                                    <option value="Sep-18">Sep-18</option>
                                    <option value="Oct-18">Oct-18</option>
                                    <option value="Nov-18">Nov-18</option>
                                    <option value="Dec-18">Dec-18</option>
                                    <option value="Jan-19">Jan-19</option>
                                    <option value="Feb-19">Feb-19</option>
                                    <option value="Mar-19">Mar-19</option>
                                    <option value="Apr-19">Apr-19</option>
                                    <option value="May-19">May-19</option>
                                    <option value="Jun-19">Jun-19</option>
                                    <option value="Jul-19">Jul-19</option>
                                    <option value="Aug-19">Aug-19</option>
                                    <option value="Sep-19">Sep-19</option>
                                    <option value="Oct-19">Oct-19</option>
                                    <option value="Nov-19">Nov-19</option>
                                    <option value="Dec-19">Dec-19</option>
                                    <option value="Jan-20">Jan-20</option>
                                    <option value="Feb-20">Feb-20</option>
                                    <option value="Mar-20">Mar-20</option>
                                </select>
                            </td>
                            <td>
                                <select id="date_range2" name="date_range2[]" multiple size="12">
                                    <option value="Apr-18">Apr-18</option>
                                    <option value="May-18">May-18</option>
                                    <option value="Jun-18">Jun-18</option>
                                    <option value="Jul-18">Jul-18</option>
                                    <option value="Aug-18">Aug-18</option>
                                    <option value="Sep-18">Sep-18</option>
                                    <option value="Oct-18">Oct-18</option>
                                    <option value="Nov-18">Nov-18</option>
                                    <option value="Dec-18">Dec-18</option>
                                    <option value="Jan-19">Jan-19</option>
                                    <option value="Feb-19">Feb-19</option>
                                    <option value="Mar-19">Mar-19</option>
                                    <option value="Apr-19">Apr-19</option>
                                    <option value="May-19">May-19</option>
                                    <option value="Jun-19">Jun-19</option>
                                    <option value="Jul-19">Jul-19</option>
                                    <option value="Aug-19">Aug-19</option>
                                    <option value="Sep-19">Sep-19</option>
                                    <option value="Oct-19">Oct-19</option>
                                    <option value="Nov-19">Nov-19</option>
                                    <option value="Dec-19">Dec-19</option>
                                    <option value="Jan-20">Jan-20</option>
                                    <option value="Feb-20">Feb-20</option>
                                    <option value="Mar-20">Mar-20</option>
                                </select>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>
            {!! Form::button('Generate Report', ['class' => 'btn btn-danger', 'onclick' => 'validate_comparision()']) !!}
            {!! Form::close() !!}
        </div>
    </div>

    {!! Form::open(array('name' => 'detail','route' => ['admin.vender_payments_details'], 'method' => 'GET')) !!}
    <div class="panel panel-default">
        <div class="panel-heading">
            Bill Wise Detailed Report
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <td>
                                {!! Form::label('vendor', trans('quickadmin.referral-data-final.fields.vendor').'', ['class' => 'control-label']) !!}
                                {!! Form::select('avip_oracle_code', $avips, old('vendor'), ['class' => 'form-control select2']) !!}
                                <p class="help-block"></p>
                                @if($errors->has('vendor'))
                                    <p class="help-block">
                                        {{ $errors->first('vendor') }}
                                    </p>
                                @endif
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <td>
                                <select id="date_range" name="date_range[]" multiple size="12">
                                    <option value="Apr-18">Apr-18</option>
                                    <option value="May-18">May-18</option>
                                    <option value="Jun-18">Jun-18</option>
                                    <option value="Jul-18">Jul-18</option>
                                    <option value="Aug-18">Aug-18</option>
                                    <option value="Sep-18">Sep-18</option>
                                    <option value="Oct-18">Oct-18</option>
                                    <option value="Nov-18">Nov-18</option>
                                    <option value="Dec-18">Dec-18</option>
                                    <option value="Jan-19">Jan-19</option>
                                    <option value="Feb-19">Feb-19</option>
                                    <option value="Mar-19">Mar-19</option>
                                    <option value="Apr-19">Apr-19</option>
                                    <option value="May-19">May-19</option>
                                    <option value="Jun-19">Jun-19</option>
                                    <option value="Jul-19">Jul-19</option>
                                    <option value="Aug-19">Aug-19</option>
                                    <option value="Sep-19">Sep-19</option>
                                    <option value="Oct-19">Oct-19</option>
                                    <option value="Nov-19">Nov-19</option>
                                    <option value="Dec-19">Dec-19</option>
                                    <option value="Jan-20">Jan-20</option>
                                    <option value="Feb-20">Feb-20</option>
                                    <option value="Mar-20">Mar-20</option>
                                </select>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>
            {!! Form::submit('Generate Report', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
        </div>
    </div>

    {!! Form::open(array('name' => 'pivot','route' => ['admin.vender_payments_pivot'], 'method' => 'GET')) !!}
    <div class="panel panel-default">
        <div class="panel-heading">
            Vendor Monthly Pivot Report
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <td>
                                <select id="date_range" name="date_range[]" multiple size="12">
                                    <option value="Apr-18">Apr-18</option>
                                    <option value="May-18">May-18</option>
                                    <option value="Jun-18">Jun-18</option>
                                    <option value="Jul-18">Jul-18</option>
                                    <option value="Aug-18">Aug-18</option>
                                    <option value="Sep-18">Sep-18</option>
                                    <option value="Oct-18">Oct-18</option>
                                    <option value="Nov-18">Nov-18</option>
                                    <option value="Dec-18">Dec-18</option>
                                    <option value="Jan-19">Jan-19</option>
                                    <option value="Feb-19">Feb-19</option>
                                    <option value="Mar-19">Mar-19</option>
                                    <option value="Apr-19">Apr-19</option>
                                    <option value="May-19">May-19</option>
                                    <option value="Jun-19">Jun-19</option>
                                    <option value="Jul-19">Jul-19</option>
                                    <option value="Aug-19">Aug-19</option>
                                    <option value="Sep-19">Sep-19</option>
                                    <option value="Oct-19">Oct-19</option>
                                    <option value="Nov-19">Nov-19</option>
                                    <option value="Dec-19">Dec-19</option>
                                    <option value="Jan-20">Jan-20</option>
                                    <option value="Feb-20">Feb-20</option>
                                    <option value="Mar-20">Mar-20</option>
                                </select>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>
            {!! Form::submit('Generate Report', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
        </div>
    </div>

    {!! Form::open(array('name' => 'pivot','route' => ['admin.vender_payments'], 'method' => 'GET')) !!}
    <div class="panel panel-default">
        <div class="panel-heading">
            Monthly Vendor Payments
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <td>
                                <select id="month" name="month">
                                    <option value="">----- Select Month ------</option>
                                    <option value="Apr-18">Apr-18</option>
                                    <option value="May-18">May-18</option>
                                    <option value="Jun-18">Jun-18</option>
                                    <option value="Jul-18">Jul-18</option>
                                    <option value="Aug-18">Aug-18</option>
                                    <option value="Sep-18">Sep-18</option>
                                    <option value="Oct-18">Oct-18</option>
                                    <option value="Nov-18">Nov-18</option>
                                    <option value="Dec-18">Dec-18</option>
                                    <option value="Jan-19">Jan-19</option>
                                    <option value="Feb-19">Feb-19</option>
                                    <option value="Mar-19">Mar-19</option>
                                    <option value="Apr-19">Apr-19</option>
                                    <option value="May-19">May-19</option>
                                    <option value="Jun-19">Jun-19</option>
                                    <option value="Jul-19">Jul-19</option>
                                    <option value="Aug-19">Aug-19</option>
                                    <option value="Sep-19">Sep-19</option>
                                    <option value="Oct-19">Oct-19</option>
                                    <option value="Nov-19">Nov-19</option>
                                    <option value="Dec-19">Dec-19</option>
                                    <option value="Jan-20">Jan-20</option>
                                    <option value="Feb-20">Feb-20</option>
                                    <option value="Mar-20">Mar-20</option>
                                </select>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>
            {!! Form::submit('Generate Report', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop



@section('javascript')
    @parent
    <script>
        $('input[name="wise"]').click(function(){
            $('form[name="comparision"]').attr('action',$(this).val());
        })

        function validate_comparision(){
            if($('#date_range1').val() == null) {
                alert("Please select month from range 1");
            }
            else if($('#date_range2').val() == null) {
                alert("Please select month from range 2");
            }
            else if($('#date_range1').val().length != $('#date_range2').val().length) {
                alert("No of Month should be same in range 1 and range 2");
            }
            else {
                $('form[name="comparision"]').submit();
            }
        }
    </script>=
@stop
