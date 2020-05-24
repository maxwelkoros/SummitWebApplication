@extends('layouts.admin')

@section('title','Industry Management')




@section('content')

    <div class="row user-add-button">
        <a href="{{route('industry.create')}}" class="btn btn-primary btn-icon-split" style="margin-right: 15px;">
            <span class="icon"><i class="fas fa-plus"></i></span>
            <span class="text">New Industry</span> </a>
    </div>

    <div class="card mb-5">
        <div class="card-header tab-form-header">
            My Industries
        </div>
        <div class="card-body">
            <table class="table" id="DataTable" width="100%">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Parent</th>
                    <th>Name</th>
                    <th>Details</th>
                    <th>Tool</th>
                </tr>
                </thead>

                <tbody>

                @foreach($industries as $industry)

                    <tr>
                        <td>{{$industry->ID}}</td>
                        <td>{{$industry->Name}}</td>
                        <td>{{$industry->Parent}}</td>
                        <td>{{$industry->Details}}</td>
                        <td>
                            <span style="overflow: visible; position: relative; width: 110px;">
                                <a title="View details" class="btn btn-sm btn-clean btn-icon btn-icon-sm"
                                   href="{{route('industry.show',$industry->ID)}}">
                                   <i class="fas fa-eye"></i>
                                  </a>
                                  <a title="Edit details" class="btn btn-sm btn-clean btn-icon btn-icon-sm"
                                     href="{{route('industry.edit',$industry->ID)}}">
                                    <i class="fas fa-edit"></i>
                                  </a>
                                  
                                <form  id="delete"
                                      action="{{route('industry.destroy',[$industry->ID])}}"
                                      method="post">

                                    @method('POST')
                                    {{csrf_field()}}

                                    <input type="hidden" name="_method" value="delete">
                                    <button type="submit" class="btn btn-sm btn-clean btn-icon btn-icon-sm"> <i class="fas fa-trash"></i></button>



                                </form>
                              </span>
                        </td>


                    </tr>

                @endforeach


                </tbody>
            </table>
        </div>
    </div>

@endsection



@section('footer-js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"
            integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>


    <script type="text/javascript" src="{{asset('admin-assets/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin-assets/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <script>
        $(document).ready(function(){
            $('#DataTable').DataTable({

            });
        });
    </script>

@endsection


