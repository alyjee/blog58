<div class="col-lg-3 col-md-6">
	<img class="img-responsive" alt="Platinum Partners" title="{{ $category->name }}" src="{{ asset('storage/app/'.$category->image) }}">
    <div class="white-box">
        <div class="text-muted"><span class="m-r-10">{{ date('M d', strtotime($category->created_at)) }}</span> <a class="text-muted m-l-10" href="#"><i class="fa fa-coffee"></i> 0</a></div>
        <h5 class="m-t-20 m-b-10">{{ $category->name }}</h5>
        <p>Radius: {{ $category->radius }} Miles</p>
        <p>Delivery Fee: ${{ $category->delivery_fee }}</p>

        <a href="{{ route('dashboard.archivePartnerCategory', ['id'=>$category->id]) }}" class="sa-warning">
        	<button class="btn btn-danger m-t-10">Delete</button>
        </a>

        <a href="{{ route('dashboard.editPartnerCategory', ['id'=>$category->id]) }}">
        	<button class="btn btn-success m-t-10">Edit</button>
    	</a>
    </div>
</div>