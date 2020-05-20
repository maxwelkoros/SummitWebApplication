@extends('layouts.admin')

@section('title','JobAds')


@section('content')




        <form class="kt-form" method="POST" action="{{ route('industry.update',$industry->ID) }}"  enctype="multipart/form-data">
            <div class="kt-portlet__body">
                @method('PUT')

                @csrf

                <div class="form-group">
                    <label for="job_category">Parent</label>
                    <select  id="parent" name="parent" class="form-control" required>
                        <option disabled selected>Select Parent</option>
                        <option>Accounting|Finance|Audit</option>
                        <option selected="selected">
                           {{$industry->Parent}}
                        </option>
                    </select>

                </div>


                <div class="form-group">
                    <label for="job_title">Name</label>
                    <input id="job_title" type="text" class="form-control" name="name" value="{{$industry->Name}}"  required>


                </div>

                <div class="form-group">
                    <label for="email">Description</label>
                    <input name="description" row="50" cols="80" class="form-control"   value="{{$industry->Details}}">


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
