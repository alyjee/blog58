<div class="label-holder" id={{$index}}>
	<div class="input-group mb-25">
		<input type="text" name="VL[{{ $index }}][text]" placeholder='Enter variation label e.g. Choose Pizza Size' class='form-control' required="required" value="{{ (isset($label)) ? $label->text : '' }}" />
		@isset($label)
			<span class="input-group-addon closed hide-ops" >+</span>
		@else
			<span class="input-group-addon opened hide-ops" >-</span>
		@endisset
		<span class="input-group-addon btn-info copy-label" ><i class="fa fa-clipboard"></i></span>
		@if($removeable)
			<span class="input-group-addon remove-label" >X</span>
		@endif
	</div>

	<div class="ops-holder {{ (isset($label)) ? 'hide' : '' }}" >

		<p><b>Options</b> <span>Leave Price Blank if not required*</span></p>
		
		<div class="form-group row">
    		{!! Form::label('VL[select_multiple]', 'Multiple Selection?', ['class'=>'col-md-12']) !!}
    		<div class="form-check col-md-6">
                <label class="custom-control custom-radio">
                    <input type="radio" name="VL[{{ $index }}][select_multiple]" class='custom-control-input' value="1" required="required" {{ (isset($label) && $label->select_multiple) ? 'checked="checked"' : '' }} />
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description">Yes</span>
                </label>
            </div>

            <div class="form-check col-md-6">
                <label class="custom-control custom-radio">
                    <input type="radio" name="VL[{{ $index }}][select_multiple]" class='custom-control-input' value="0" {{ (isset($label) && !$label->select_multiple) ? 'checked="checked"' : '' }} />
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description">No</span>
                </label>
            </div>
		</div>

		@isset($label)
			@foreach($label->options as $okey => $option)
    			<div class="input-group mb-25 option-holder">
				  <span class="input-group-addon">Text</span>
				  <input type="text" name="VO[{{ $index }}][label][]" class="form-control" placeholder="Option Text..." style="width: 75%;"  required="required" value="{{ $option->label }}" />
				  <span class="input-group-addon" style="border-left: 0; border-right: 0;">Price</span>
				  <input type="text" name="VO[{{ $index }}][price][]" class="form-control" placeholder="0.00" value="{{ $option->price }}"/>
				  @if($okey > 1)
				  	<span class="input-group-addon remove-op" >X</span>
				  @endif
				</div>
    		@endforeach
		@else
			<div class="input-group mb-25 option-holder">
			  <span class="input-group-addon">Text</span>
			  <input type="text" name="VO[{{ $index }}][label][]" class="form-control" placeholder="Option Text..." style="width: 75%;"  required="required" />
			  <span class="input-group-addon" style="border-left: 0; border-right: 0;">Price</span>
			  <input type="text" name="VO[{{ $index }}][price][]" class="form-control" placeholder="0.00" />
			</div>

			<div class="input-group mb-25 option-holder">
			  <span class="input-group-addon">Text</span>
			  <input type="text" name="VO[{{ $index }}][label][]" class="form-control" placeholder="Option Text..." style="width: 75%;"  required="required" />
			  <span class="input-group-addon" style="border-left: 0; border-right: 0;">Price</span>
			  <input type="text" name="VO[{{ $index }}][price][]" class="form-control" placeholder="0.00" />
			</div>
		@endisset

		<div class="form-group">
			<button type="button" class="btn btn-primary waves-effect waves-light add-ops">+ Options</button>
		</div>
	</div>

	<hr />
</div>{{-- label-holder --}}