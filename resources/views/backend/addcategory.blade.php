@extends('Layout.dashboard')
@section('content')
<!-- middle wrapper start -->
<div class="col-md-8 col-xl-8 middle-wrapper">
    <div class="row">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Add Amenities</h6>

                <form action="" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="exampleInputUsername1" class="form-label">Amenities Name</label>
                        <input type="text" name="amenities_name" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-primary me-2">Save Chenges</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- middle wrapper end -->
@endsection