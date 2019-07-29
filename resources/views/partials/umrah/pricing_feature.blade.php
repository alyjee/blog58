<div class="form-group form-group col-sm-4 {{ $errors->has($inputName) ? ' has-error' : '' }}">
    {!! Form::label($inputName, $inputLabel) !!}
    {!! Form::$type('$inputName', $inputValue,['placeholder'=>'', 'class'=>$inputClass, $readonly]) !!}
    @if ($errors->has($inputName))
        <div class="form-control-feedback">{{ $errors->first($inputName) }}</div>
    @endif
</div>