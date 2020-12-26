@extends('backend.shared.master')

@section('title','Candidate')
@section('css')
    <link href="{{asset('/backend/dashboard/assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
    <link href="{{asset('/backend/dashboard/css/dataTables.checkboxes.css')}}" rel="stylesheet">
    <link href="{{asset('/backend/dashboard/css/datatables.min.css')}}" rel="stylesheet">
   <link  type="text/css"
          href="{{asset('/backend/dashboard/assets/extra-libs/datatables.net-bs4/css/responsive.dataTables.min.css')}}" rel="stylesheet">

@endsection
@section('items','Candidate')
@section('content')

    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12">
            <div class="card material-card">
                <h5 class="card-title text-uppercase p-3 bg-info text-white mb-0">
                    Province's Candidate
                    <button class="btn btn-success btn-flat btn-sm add_survey" style="float: right">
                        <i class="fa fa-plus"></i>Add Candidate</button>
                </h5>

                <div class="p-3">

                    <div class="table-responsive">
                        <table id="manageTable" class="table table-striped table-bordered "
                               style="width:100%;">
                            <thead>
                            <tr>
                                <th>Province Name</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>


                </div>
            </div>
        </div>
    </div>
    {{--add modal--}}


@endsection
@section('js')
<script>

</script>


    <script src="{{asset('/backend/dashboard/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('/backend/dashboard/assets/extra-libs/datatables.net-bs4/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('/backend/dashboard/dist/js/pages/datatable/datatable-basic.init.js')}}"></script>
    <script src="{{asset('/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('/backend/dashboard/js/dataTables.min.js')}}"></script>
@endsection
