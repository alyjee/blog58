<style type="text/css" media="screen">
hr.p-hr {
    border-top: 2px solid #060606;
}    
</style>
<div class="row">
	<div class="col-sm-12 text-center">
		<h3>PERSONAL DETAILS</h3>
	</div>
</div>


@foreach($personalDetails as $i => $pd)
    <div class="personal-detail-holder">
        <div class="row">
            <div class="col-sm-2">
                <div class="form-group {{ $errors->has('persons['.$i.'][sur_name]') ? ' has-error' : '' }}">
                    {!! Form::label('persons['.$i.'][sur_name]', 'Surname') !!}
                    {!! Form::text('persons['.$i.'][sur_name]', $pd->sur_name,['placeholder'=>'Mr./Mrs./Ms.', 'class'=>'form-control']) !!}
                    @if ($errors->has('persons['.$i.'][sur_name]'))
                        <div class="form-control-feedback">{{ $errors->first('persons['.$i.'][sur_name]') }}</div>
                    @endif
                </div>
            </div>

            <div class="col-sm-5">
                <div class="form-group {{ $errors->has('given_name') ? ' has-error' : '' }}">
                    {!! Form::label('persons['.$i.'][given_name]', 'Given Name') !!}
                    {!! Form::text('persons['.$i.'][given_name]', $pd->given_name,['placeholder'=>'Enter Given Name here', 'class'=>'form-control']) !!}
                    @if ($errors->has('given_name'))
                        <div class="form-control-feedback">{{ $errors->first('given_name') }}</div>
                    @endif
                </div>
            </div>

            <div class="col-sm-5">
                <div class="form-group {{ $errors->has('middle_name') ? ' has-error' : '' }}">
                    {!! Form::label('middle_name', 'Middle Name') !!}
                    {!! Form::text('persons['.$i.'][middle_name]', $pd->middle_name,['placeholder'=>'Enter Middle Name', 'class'=>'form-control']) !!}
                    @if ($errors->has('middle_name'))
                        <div class="form-control-feedback">{{ $errors->first('middle_name') }}</div>
                    @endif
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group {{ $errors->has('dob') ? ' has-error' : '' }}">
                    {!! Form::label('dob', 'Date of Birth:') !!}
                    {!! Form::text('persons['.$i.'][dob]', $pd->dob,['placeholder'=>'Date', 'class'=>'form-control']) !!}
                    @if ($errors->has('dob'))
                        <div class="form-control-feedback">{{ $errors->first('dob') }}</div>
                    @endif
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group {{ $errors->has('passport_num') ? ' has-error' : '' }}">
                    {!! Form::label('passport_num', 'Passport') !!}
                    {!! Form::text('persons['.$i.'][passport_num]', $pd->passport_num,['placeholder'=>'99999-9999999-9.', 'class'=>'form-control']) !!}
                    @if ($errors->has('passport_num'))
                        <div class="form-control-feedback">{{ $errors->first('passport_num') }}</div>
                    @endif
                </div>
            </div>

            <div class="col-sm-3">
                <div class="form-group {{ $errors->has('passport_issue_date') ? ' has-error' : '' }}">
                    {!! Form::label('passport_issue_date', 'Passport Issue Date') !!}
                    {!! Form::text('persons['.$i.'][passport_issue_date]', $pd->passport_issue_date,['placeholder'=>'Date', 'class'=>'form-control']) !!}
                    @if ($errors->has('passport_issue_date'))
                        <div class="form-control-feedback">{{ $errors->first('passport_issue_date') }}</div>
                    @endif
                </div>
            </div>

            <div class="col-sm-3">
                <div class="form-group {{ $errors->has('passport_expiry_date') ? ' has-error' : '' }}">
                    {!! Form::label('passport_expiry_date', 'Passport Expiry Date') !!}
                    {!! Form::text('persons['.$i.'][passport_expiry_date]', $pd->passport_expiry_date,['placeholder'=>'Date.', 'class'=>'form-control passport_expiry_date']) !!}
                    @if ($errors->has('passport_expiry_date'))
                        <div class="form-control-feedback">{{ $errors->first('passport_expiry_date') }}</div>
                    @endif
                </div>
            </div>
        </div>

        <?php
            $docs = json_decode($pd->docs);
        ?>

        <div class="row">
            <div class="col-sm-6">
                <label class="custom-control custom-checkbox">
                    @if( in_array('passport', $docs) )
                        {!! Form::checkbox('persons['.$i.'][docs][]', 'passport', null, ['class' => 'custom-control-input', 'checked'=>'checked']) !!}
                    @else
                        {!! Form::checkbox('persons['.$i.'][docs][]', 'passport', null, ['class' => 'custom-control-input']) !!}
                    @endif
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description">Passport</span>
                </label>

                <label class="custom-control custom-checkbox">
                    @if( in_array('cnic', $docs) )
                        {!! Form::checkbox('persons['.$i.'][docs][]', 'cnic', null, ['class' => 'custom-control-input', 'checked'=>'checked']) !!}
                    @else
                        {!! Form::checkbox('persons['.$i.'][docs][]', 'cnic', null, ['class' => 'custom-control-input']) !!}
                    @endif
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description">CNIC</span>
                </label>

                <label class="custom-control custom-checkbox">
                    @if( in_array('biometrics', $docs) )
                        {!! Form::checkbox('persons['.$i.'][docs][]', 'biometrics', null, ['class' => 'custom-control-input', 'checked'=>'checked']) !!}
                    @else
                        {!! Form::checkbox('persons['.$i.'][docs][]', 'biometrics', null, ['class' => 'custom-control-input']) !!}
                    @endif
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description">Biometrics</span>
                </label>
            </div>
        </div>
    </div><!-- ./personal-detail-holder -->
    <hr class="p-hr" />
@endforeach

@if($personalDetails->count() == 0)
@for($i=1; $i<=$proposedForm->total_passengers; $i++)
    <div class="personal-detail-holder">
        <div class="row">
            <div class="col-sm-12">
                <h4 class="btn btn-primary waves-effect waves-light m-r-10">Person#{{$i}}</h4>
            </div>
            <div class="col-sm-2">
                <div class="form-group {{ $errors->has('persons['.$i.'][sur_name]') ? ' has-error' : '' }}">
                    {!! Form::label('persons['.$i.'][sur_name]', 'Surname') !!}
                    {!! Form::text('persons['.$i.'][sur_name]', null,['placeholder'=>'Mr./Mrs./Ms.', 'class'=>'form-control']) !!}
                    @if ($errors->has('persons['.$i.'][sur_name]'))
                        <div class="form-control-feedback">{{ $errors->first('persons['.$i.'][sur_name]') }}</div>
                    @endif
                </div>
            </div>

            <div class="col-sm-5">
                <div class="form-group {{ $errors->has('given_name') ? ' has-error' : '' }}">
                    {!! Form::label('persons['.$i.'][given_name]', 'Given Name') !!}
                    {!! Form::text('persons['.$i.'][given_name]', null,['placeholder'=>'Enter Given Name here', 'class'=>'form-control']) !!}
                    @if ($errors->has('given_name'))
                        <div class="form-control-feedback">{{ $errors->first('given_name') }}</div>
                    @endif
                </div>
            </div>

            <div class="col-sm-5">
                <div class="form-group {{ $errors->has('middle_name') ? ' has-error' : '' }}">
                    {!! Form::label('middle_name', 'Middle Name') !!}
                    {!! Form::text('persons['.$i.'][middle_name]', null,['placeholder'=>'Enter Middle Name', 'class'=>'form-control']) !!}
                    @if ($errors->has('middle_name'))
                        <div class="form-control-feedback">{{ $errors->first('middle_name') }}</div>
                    @endif
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group {{ $errors->has('dob') ? ' has-error' : '' }}">
                    {!! Form::label('dob', 'Date of Birth:') !!}
                    {!! Form::text('persons['.$i.'][dob]', null,['placeholder'=>'Date', 'class'=>'form-control mydatepicker']) !!}
                    @if ($errors->has('dob'))
                        <div class="form-control-feedback">{{ $errors->first('dob') }}</div>
                    @endif
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group {{ $errors->has('passport_num') ? ' has-error' : '' }}">
                    {!! Form::label('passport_num', 'Passport') !!}
                    {!! Form::text('persons['.$i.'][passport_num]', null,['placeholder'=>'99999-9999999-9.', 'class'=>'form-control']) !!}
                    @if ($errors->has('passport_num'))
                        <div class="form-control-feedback">{{ $errors->first('passport_num') }}</div>
                    @endif
                </div>
            </div>

            <div class="col-sm-3">
                <div class="form-group {{ $errors->has('passport_issue_date') ? ' has-error' : '' }}">
                    {!! Form::label('passport_issue_date', 'Passport Issue Date') !!}
                    {!! Form::text('persons['.$i.'][passport_issue_date]', null,['placeholder'=>'Date', 'class'=>'form-control passport_issue_date mydatepicker']) !!}
                    @if ($errors->has('passport_issue_date'))
                        <div class="form-control-feedback">{{ $errors->first('passport_issue_date') }}</div>
                    @endif
                </div>
            </div>

            <div class="col-sm-3">
                <div class="form-group {{ $errors->has('passport_expiry_date') ? ' has-error' : '' }}">
                    {!! Form::label('passport_expiry_date', 'Passport Expiry Date') !!}
                    {!! Form::text('persons['.$i.'][passport_expiry_date]', null,['placeholder'=>'Date.', 'class'=>'form-control passport_expiry_date mydatepicker']) !!}
                    @if ($errors->has('passport_expiry_date'))
                        <div class="form-control-feedback">{{ $errors->first('passport_expiry_date') }}</div>
                    @endif
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <label class="custom-control custom-checkbox">
                    {!! Form::checkbox('persons['.$i.'][docs][]', 'passport', null, ['class' => 'custom-control-input']) !!}
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description">Passport</span>
                </label>

                <label class="custom-control custom-checkbox">
                    {!! Form::checkbox('persons['.$i.'][docs][]', 1, null, ['class' => 'custom-control-input']) !!}
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description">CNIC</span>
                </label>

                <label class="custom-control custom-checkbox">
                    {!! Form::checkbox('persons['.$i.'][docs][]', 1, null, ['class' => 'custom-control-input']) !!}
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description">Biometrics</span>
                </label>
            </div>
        </div>
    </div><!-- ./personal-detail-holder -->
    <hr class="p-hr" />
@endfor
@endif