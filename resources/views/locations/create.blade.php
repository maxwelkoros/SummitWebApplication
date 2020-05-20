@extends('layouts.admin')

@section('title','JobAds')


@section('content')

    <div class="kt-portlet">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                    Add a new Location
                </h3>
            </div>
        </div>


        <form class="kt-form" method="POST" action="{{ route('location.store') }}"  enctype="multipart/form-data">
            <div class="kt-portlet__body">

                @csrf




                <div class="form-group">
                    <label for="job_title">Location Name</label>
                    <input id="job_title"  type="text" class="form-control" name="name"  required>


                </div>





                <div>

                </div>
            </div>

            <div class="kt-portlet__foot">
                <div class="kt-form__actions">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-secondary">Cancel</button>
                </div>
            </div>

        </form>
@endsection
