@extends('eadmin.layouts.material')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="white-box">
            <h3 class="box-title m-b-0">Add New Room</h3>
            <p class="text-muted m-b-30 font-13"></p>
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    {!! Form::model($setting, ['route' => ['dashboard.settings', 'id'=>$setting->id], 'method' => 'post', 'files'=>false]) !!}

                        <div class="form-group {{ $errors->has('visa_charges') ? ' has-error' : '' }}">
                            {!! Form::label('visa_charges', 'Visa Charges in SAR') !!}
                            {!! Form::text('visa_charges', null,['placeholder'=>'Enter Price for Visa in SAR', 'class'=>'form-control']) !!}
                            @if ($errors->has('visa_charges'))
                                <div class="form-control-feedback">{{ $errors->first('visa_charges') }}</div>
                            @endif
                        </div>

                        <div class="form-group {{ $errors->has('private_transport_charges') ? ' has-error' : '' }}">
                            {!! Form::label('private_transport_charges', 'Private Transport Charges in SAR') !!}
                            {!! Form::text('private_transport_charges', null,['placeholder'=>'Enter Price for private transport', 'class'=>'form-control']) !!}
                            @if ($errors->has('private_transport_charges'))
                                <div class="form-control-feedback">{{ $errors->first('private_transport_charges') }}</div>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Update</button>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@stop