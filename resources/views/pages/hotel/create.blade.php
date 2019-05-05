@extends('eadmin.layouts.material')

@section('content')
<div class="row">
    <div class="col-lg-12">
    	<div class="white-box">
	        <h3 class="box-title m-b-0">Add/Edit Hotel</h3>
	        <p class="text-muted m-b-30 font-13"></p>
	        <div class="row">
	            <div class="col-sm-12 col-xs-12">
	            	@if(\Request::route()->getName() == 'dashboard.hotels.edit')
	            		{!! Form::model($hotel, ['route' => ['dashboard.hotels.update', 'id'=>$hotel->id], 'method' => 'post', 'files'=>false]) !!}
	            	@else
	            		{!! Form::open(['route' => 'dashboard.hotels.store', 'method' => 'post', 'files'=>false]) !!}
	            	@endif
	            		<div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
		            		{!! Form::label('name', 'Name') !!}
		            		{!! Form::text('name', null,['placeholder'=>'Enter Hotel Name here', 'class'=>'form-control']) !!}
		            		@if ($errors->has('name'))
	                            <div class="form-control-feedback">{{ $errors->first('name') }}</div>
	                        @endif
	            		</div>

	            		<div class="form-group {{ $errors->has('category') ? ' has-error' : '' }}">
		            		{!! Form::label('category', 'Category') !!}
		            		{!! Form::select('category', $categories, null, ['placeholder'=>'Select Hotel Category', 'class'=>'form-control']) !!}
		            		@if ($errors->has('category'))
	                            <div class="form-control-feedback">{{ $errors->first('category') }}</div>
	                        @endif
	            		</div>

	            		<div class="form-group {{ $errors->has('room_basis') ? ' has-error' : '' }}">
		            		{!! Form::label('room_basis', 'Room Basis') !!}
		            		{!! Form::text('room_basis', null,['placeholder'=>'Enter Room Basis e.g. BB, Room only Basis', 'class'=>'form-control']) !!}
		            		@if ($errors->has('room_basis'))
	                            <div class="form-control-feedback">{{ $errors->first('room_basis') }}</div>
	                        @endif
	            		</div>

	            		<div class="form-group {{ $errors->has('distance_from_haram') ? ' has-error' : '' }}">
		            		{!! Form::label('distance_from_haram', 'Haram Distance') !!}
		            		{!! Form::text('distance_from_haram', null,['placeholder'=>'Enter Room Basis e.g. BB, Room only Basis', 'class'=>'form-control']) !!}
		            		@if ($errors->has('distance_from_haram'))
	                            <div class="form-control-feedback">{{ $errors->first('distance_from_haram') }}</div>
	                        @endif
	            		</div>

	            		<button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>

	            	{!! Form::close() !!}

	            </div>
	            @if(\Request::route()->getName() == 'dashboard.hotels.edit')
            		<div class="col-sm-12 text-right">
		            	<a href="{{ route('dashboard.hotels.pricing_period.create', ['id'=>$hotel->id]) }}">
	            			<button type="button" class="btn btn-primary waves-effect waves-light m-r-10">Add New Pricing</button>
	        			</a>	
		            </div>
	            

	            <div class="col-sm-12 text-right">

	            	<div class="table-responsive">
                        <table class="table color-table info-table">
                            <thead>
                                <tr>
                                    <th>From Date</th>
                                    <th>To Date</th>
                                    <th>Double</th>
                                    <th>Triple</th>
                                    <th>Quad</th>
                                    <th>Quint</th>
                                    <th>Sharing</th>
                                    <th>Weekend</th>
                                    <th>H-View</th>
                                    <th>BF/pax/day</th>
                                    <th>FB/pax/day</th>
                                    <th>4-Nights</th>
                                    <th>Extra Bed</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            	@foreach($hotel->pricings()->get()  as $pp)
				            		<tr>
	                                    <td>{{ $pp->from_date }}</td>
	                                    <td>{{ $pp->to_date }}</td>
	                                    <td>{{ $pp->double }}</td>
	                                    <td>{{ $pp->triple }}</td>
	                                    <td>{{ $pp->quad }}</td>
	                                    <td>{{ $pp->quint }}</td>
	                                    <td>{{ $pp->sharing }}</td>
	                                    <td>{{ $pp->weekend_price }}</td>
	                                    <td>{{ $pp->haram_view_price }}</td>
	                                    <td>{{ $pp->bf_per_pax_per_day }}</td>
	                                    <td>{{ $pp->full_board_per_pax_per_day }}</td>
	                                    <td>{{ $pp->four_nights_price }}</td>
	                                    <td>{{ $pp->extra_bed_price }}</td>
	                                    <td>
	                                    	<a href="{{ route('dashboard.hotels.pricing_period.edit', ['hid'=>$pp->hotel_id, 'id'=>$pp->id]) }}">
							                    <span class="label label-info m-l-5"><i class="fa fa-eye"></i></span>
							                </a>
							                <a href="{{ route('dashboard.hotels.pricing_period.archive', ['hid'=>$pp->hotel_id, 'id'=>$pp->id]) }}">
							                    <span class="label label-danger m-l-5"><i class="fa fa-trash"></i></span>
							                </a>
	                                    </td>
	                                </tr>
				            	@endforeach
                            </tbody>
                        </table>
                    </div>
	            </div>
	            
            	@endif
	        </div>
	    </div>
    </div>
</div>
@stop