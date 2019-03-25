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
	            		{!! Form::model($hotel, ['route' => ['dashboard.umrah.phase1.update', 'id'=>$hotel->id], 'method' => 'post', 'files'=>false]) !!}
	            	@else
	            		{!! Form::open(['route' => 'dashboard.umrah.phase1.store', 'method' => 'post', 'files'=>false]) !!}
	            	@endif

	            	@include('partials/umrah/basic-details')
	            	@include('partials/umrah/iternary-details')
	            	{{-- @include('partials/umrah/personal-details') --}}
	            	@include('partials/umrah/total-package-price-details')
	            	{{-- @include('partials/umrah/terms-and-conditions') --}}
	            	@include('partials/umrah/signature')

	            	<button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
	            	{!! Form::close() !!}
	            </div>
            </div><!-- ./ row -->
        </div><!-- ./ white-box -->
    </div><!-- ./ col-lg-12 -->
</div>
@stop