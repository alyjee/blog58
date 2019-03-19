<div class="input-group mb-25 option-holder">
  <span class="input-group-addon">Text</span>
  <input type="text" name="VO[{{$index}}][label][]" class="form-control" placeholder="Option Text..." style="width: 75%;"  required="required" />
  <span class="input-group-addon" style="border-left: 0; border-right: 0;">Price</span>
  <input type="text" name="VO[{{$index}}][price][]" class="form-control" placeholder="0.00" />
  @if($removeable)
  	<span class="input-group-addon remove-op" >X</span>
  @endif
</div>