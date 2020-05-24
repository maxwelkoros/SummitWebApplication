@extends('layouts.admin')

@section('title','JobAds')


@section('content')




    <form class="kt-form" method="POST" action="{{ route('sd.update',$industry->id) }}"
          enctype="multipart/form-data">
        <div class="kt-portlet__body">
            @method('PUT')

            @csrf




            <div class="form-group">
                <label for="job_title">Title</label>
                <input id="job_title" value="{{$industry->title}}" type="text" class="form-control" name="name"  required>

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
