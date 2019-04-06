@extends('eadmin.layouts.print_material')

@section('content')
<div class="row">
    <div class="col-sm-12 col-xs-12">
    	@if(\Request::route()->getName() == 'dashboard.umrah.phase1.edit')
    		{!! Form::model($proposedForm, ['route' => ['dashboard.umrah.phase1.update', 'id'=>$proposedForm->id], 'method' => 'post', 'files'=>false]) !!}
    	@elseif(\Request::route()->getName() == 'dashboard.umrah.phase1.print')
    		{!! Form::model($proposedForm, ['route' => ['dashboard.umrah.phase2.store', 'id'=>$proposedForm->id], 'method' => 'post', 'files'=>false]) !!}
		@elseif(\Request::route()->getName() == 'dashboard.umrah.phase2.create')
    		{!! Form::model($proposedForm, ['route' => ['dashboard.umrah.phase2.store', 'id'=>$proposedForm->id], 'method' => 'post', 'files'=>false]) !!}
    	@else
    		{!! Form::open(['route' => 'dashboard.umrah.phase1.store', 'method' => 'post', 'files'=>false]) !!}
    	@endif

    	@include('partials/umrah/basic-details')
    	@include('partials/umrah/iternary-details')

    	@if(\Request::route()->getName() == 'dashboard.umrah.phase2.create')
    		@include('partials/umrah/personal-details')
    	@endif

    	@include('partials/umrah/total-package-price-details')
    	@include('partials/umrah/terms-and-conditions')
    	<hr />
    	@include('partials/umrah/signature')

    	{!! Form::close() !!}
    </div>
</div><!-- ./ row -->
@stop