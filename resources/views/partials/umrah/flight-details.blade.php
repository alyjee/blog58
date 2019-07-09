<div class="row airline-details">
    <div class="col-sm-1">
        <div class="form-group form-group {{ $errors->has('day') ? ' has-error' : '' }}">
            {!! Form::label('day', 'Day') !!}
            {!! Form::text('day[]', (isset($day)) ? $day : null, ['placeholder'=>'Day', 'class'=>'form-control flight-day', 'readonly'=>'readonly']) !!}
            @if ($errors->has('day'))
                <div class="form-control-feedback">{{ $errors->first('day') }}</div>
            @endif
        </div>
    </div>

    <div class="col-sm-1">
        <div class="form-group {{ $errors->has('date') ? ' has-error' : '' }}">
            {!! Form::label('date', 'Date') !!}
            {!! Form::text('date[]', (isset($date)) ? $date : null, ['placeholder'=>'Date', 'class'=>'form-control mydatepicker flight-date']) !!}
            @if ($errors->has('date'))
                <div class="form-control-feedback">{{ $errors->first('date') }}</div>
            @endif
        </div>
    </div>

    <div class="col-sm-2">
        <div class="form-group {{ $errors->has('flight_status') ? ' has-error' : '' }}">
            {!! Form::label('flight_status', 'DEP/ARR') !!}
            {!! Form::select('flight_status[]', $flightStatusSelect, (isset($flight_status)) ? $flight_status : null,  ['placeholder'=>'Select Flight Status', 'class'=>'form-control']) !!}
            @if ($errors->has('flight_status'))
                <div class="form-control-feedback">{{ $errors->first('flight_status') }}</div>
            @endif
        </div>
    </div>

    <div class="col-sm-2">
        <div class="form-group {{ $errors->has('city_terminal_stopover') ? ' has-error' : '' }}">
            {!! Form::label('city_terminal_stopover', 'City/Terminal/Stopover City') !!}
            {!! Form::textarea('city_terminal_stopover[]', (isset($city_terminal_stopover)) ? $city_terminal_stopover : null, ['placeholder'=>'', 'rows'=>'1', 'class'=>'form-control readonly']) !!}
            @if ($errors->has('city_terminal_stopover'))
                <div class="form-control-feedback">{{ $errors->first('city_terminal_stopover') }}</div>
            @endif
        </div>
    </div>

    <div class="col-sm-1">
        <div class="form-group {{ $errors->has('time') ? ' has-error' : '' }}">
            {!! Form::label('time', 'Time') !!}
            {!! Form::text('time[]', (isset($time)) ? $time : null, ['placeholder'=>'Time', 'class'=>'form-control']) !!}
            @if ($errors->has('time'))
                <div class="form-control-feedback">{{ $errors->first('time') }}</div>
            @endif
        </div>
    </div>

    <div class="col-sm-2">
        <div class="form-group {{ $errors->has('flight_class_status') ? ' has-error' : '' }}">
            {!! Form::label('flight_class_status', 'Fligt/Class/Status') !!}
            {!! Form::textarea('flight_class_status[]', (isset($flight_class_status)) ? $flight_class_status : null, ['placeholder'=>'', 'rows'=>'1', 'class'=>'form-control readonly']) !!}
            @if ($errors->has('flight_class_status'))
                <div class="form-control-feedback">{{ $errors->first('flight_class_status') }}</div>
            @endif
        </div>
    </div>

    <div class="col-sm-2">
        <div class="form-group {{ $errors->has('stop_eqp_flts') ? ' has-error' : '' }}">
            {!! Form::label('stop_eqp_flts', 'STOP/EQP/FLYING TIME/SERVICES') !!}
            {!! Form::textarea('stop_eqp_flts[]', (isset($stop_eqp_flts)) ? $stop_eqp_flts : null, ['placeholder'=>'', 'rows'=>'1', 'class'=>'form-control readonly']) !!}
            @if ($errors->has('stop_eqp_flts'))
                <div class="form-control-feedback">{{ $errors->first('stop_eqp_flts') }}</div>
            @endif
        </div>
    </div>
</div>