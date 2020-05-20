@extends('layouts.admin')

@section('title','JobAds')


@section('content')

    <div class="kt-portlet">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                    Add a new Industry
                </h3>
            </div>
        </div>


        <form class="kt-form" method="POST" action="{{ route('industry.store') }}"  enctype="multipart/form-data">
            <div class="kt-portlet__body">

                @csrf

                <div class="form-group">
                    <label for="job_category">Parent</label>
                    <select id="parent" name="parent" class="form-control" required>
                        <option disabled selected>Select Parent</option>
                        <option>Accounting|Finance|Audit</option>


                    </select>

                </div>


                <div class="form-group">
                    <label for="job_title">Name</label>
                    <input id="job_title" type="text" class="form-control" name="name"  required>


                </div>

                <div class="form-group">
                    <label for="email">Details</label>
                    <textarea name="description" row="50" cols="80" class="form-control"></textarea>


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
