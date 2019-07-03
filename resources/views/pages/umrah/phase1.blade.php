@extends('eadmin.layouts.material')

@section('content')
<div class="row">
    <div class="col-lg-12">
    	<div class="white-box">
	        <h3 class="box-title m-b-0">Create New Proposal</h3>
	        <p class="text-muted m-b-30 font-13"></p>
	        <div class="row">
	            <div class="col-sm-12 col-xs-12">
	            	
	            	@if(\Request::route()->getName() == 'dashboard.umrah.phase1.edit')
	            		{!! Form::model($proposedForm, ['route' => ['dashboard.umrah.phase1.update', 'id'=>$proposedForm->id], 'method' => 'post', 'files'=>false]) !!}
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

	            	@if(\Request::route()->getName() == 'dashboard.umrah.phase2.create')
	            		@include('partials/umrah/payment-details')
	            	@endif
	            	{{-- @include('partials/umrah/terms-and-conditions') --}}
	            	{{-- @include('partials/umrah/signature') --}}

	            	
	            	<div class="row">
	            		@if(\Request::route()->getName() == 'dashboard.umrah.phase1.edit')
		            		<div class="col-sm-6">
		            			<button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Update</button>
		            		</div>

		            		<div class="col-sm-6 text-right">
		            			<a href="{{ route('dashboard.umrah.phase2.create', ['id'=>$proposedForm->id]) }}" class="btn btn-primary waves-effect waves-light m-r-10">Next ></a>
		            		</div>
		            	@else
		            		<div class="col-sm-6">
		            			<button type="button" class="btn btn-success waves-effect waves-light m-r-10 submit-form">Submit</button>
		            		</div>
		            	@endif
	            	</div>
	            	{!! Form::close() !!}
	            </div>
            </div><!-- ./ row -->
        </div><!-- ./ white-box -->
    </div><!-- ./ col-lg-12 -->
</div>
@stop