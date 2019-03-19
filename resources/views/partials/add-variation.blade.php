<div class="input-group mb-25 variation-holder">
  <span class="input-group-addon">Text</span>
  {!! Form::text('menu_variations[text][]', $variation->text ?? null, ['placeholder'=>'Text...', 'class'=>'form-control']) !!}
  <span class="input-group-addon" >Variation</span>
  {!! Form::select('menu_variations[variation_id][]', $restaurantMenuVariationsSelect, $variation->variation_id ?? null, ['placeholder'=>'Select Variation For Menu', 'class'=>'form-control']) !!}
  @if($removeable)
  	<span class="input-group-addon btn-danger remove-variation" >X</span>
  @endif
</div>