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
                    {{$season->period}}'s Candidate
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
                                <th>District Name</th>
                                <th>Candidate Name</th>
                                <th>Identity</th>
                                <th>Date Of Birth</th>
                                <th>Party</th>
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
    <div class="modal " id="addModal" tabindex="-1" role="dialog" aria-labelledby="Survey">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header d-flex align-items-center">
                    <h4 class="modal-title" id="exampleModalLabel1">Add New Candidate</h4>
                    <button type="button" class="close ml-auto" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <form data-parsley-validate class="form-horizontal" method="POST" action="{{route('admin.saveCandidate')}}" id="frmSave" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div id="add-messages"></div>

                        <div class="form-group row">
                            <label for="recipient-name" class="control-label col-sm-3">Province</label>
                            <label class="col-sm-1 control-label">:</label>

                            <div class="col-sm-8">
                                <select required  name="province" id="add-province" class="form-control">
                                    <?php
                                    $provinces=\App\Province::all();
                                    ?>
                                    <option value="">-select Province--</option>
                                    @foreach($provinces as $province)
                                        <option value="{{ $province->id }}">{{ $province->name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger" id="tprovince" style="color: red"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="recipient-name" class="control-label col-sm-3">District</label>
                            <label class="col-sm-1 control-label">:</label>

                            <div class="col-sm-8">
                                <select required  name="district" id="add-district" class="form-control">
                                    <?php
                                    $districts=\App\District::all();
                                    ?>
                                    <option value="">-select District--</option>
                                    @foreach($districts as $district)
                                        <option value="{{ $district->id }}">{{ $district->name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger" id="tprovince" style="color: red"></span>
                            </div>
                        </div>
                        <div class="form-group row">

                            <label for="period" class="control-label col-sm-3">Candidate Name</label>
                            <label class="col-sm-1 control-label">:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="name" name="name" required autofocus>
                                <span class="text-danger" id="tname" style="color: red"></span>
                            </div>
                        </div>
                        <div class="form-group row">

                            <label for="nid" class="control-label col-sm-3">Candidate Nid</label>
                            <label class="col-sm-1 control-label">:</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="nid" name="nid" required autofocus>
                                <span class="text-danger" id="tnid" style="color: red"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="date1" class="control-label col-sm-3">Date of Birth</label>
                            <label class="col-sm-1 control-label">:</label>
                            <div class="col-sm-8">
                                <input type="date" class="form-control" id="date1" name="dob" required autofocus>
                                <span class="text-danger" id="tdate1" style="color: red"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="party" class="control-label col-sm-3">Party</label>
                            <label class="col-sm-1 control-label">:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="party" name="party"  >
                                <span class="text-danger" id="ps" style="color: red"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="strength" class="control-label col-sm-3">Strength</label>
                            <label class="col-sm-1 control-label">:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="strength" name="strength"  autofocus>
                                <span class="text-danger" id="str" style="color: red"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="photo" class="control-label col-sm-2">Photo</label>
                                    <label class="col-sm-1 control-label">:</label>
                                    <div class="col-sm-8">
                                        <input type="file" class="form-control" id="photo" name="photo" accept="image/*" >
                                        <span class="text-danger" id="ps" style="color: red"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="logo" class="control-label col-sm-2">Logo</label>
                                    <label class="col-sm-1 control-label">:</label>
                                    <div class="col-sm-8">
                                        <input type="file" class="form-control" id="logo" name="logo" accept="image/*" >
                                        <input type="hidden" class="form-control" value="{{$season->id}}" name="season"  >
                                        <span class="text-danger" id="addlog" style="color: red"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="add-messages"></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary" id="btnSave" data-loading-text="Loading..." value="Save Candidate"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{--/add modal--}}


@endsection
@section('js')

    <script>
        var defaultUrl = "{{ route('admin.season.getCandidate',['season'=>$season->id]) }}";
        var table;
        var manageTable = $("#manageTable");
        function myFunc() {
            table = manageTable.DataTable({
                ajax: {
                    url: defaultUrl,
                    dataSrc: 'candidates'
                },
                columns: [

                    {data: 'province.name'},
                    {data: 'district.name'},
                    {data: 'name'},
                    {data: 'identity'},
                    {data: 'dob'},
                    {data: 'party'},
                    {
                        data: 'id',
                        render: function (data, type, row) {
                            return"<button  data-url='/home/season/show/" + row.id + "' class='btn btn-info btn-sm btn-flat js-edit' data-id='" + data +
                                "' > <i class='fa fa-edit'></i>Edit</button>" +
                                "<button class='btn btn-danger btn-sm btn-flat js-delete ' data-id='" + data +
                                "' data-url='/home/seasons/delete/" + row.id + "'> <i class='fa fa-trash'></i>Delete</button>";


                        }
                    }
                ]
            });
        }


        $(document).ready(function () {
            $(".add_survey").click(function () {
                $("#addModal").modal({
                    backdrop: 'static',
                    keyboard: false
                });
            });
//initialize data table
            myFunc();

            $('#frmSave').submit(function (e) {
                e.preventDefault();
                var form = $(this);
                var btn = $('#btnSave');
                btn.button('loading');
                $.ajax({
                    url: form.attr('action'),
                    method: form.attr('method'),
                    data: new FormData(this),
                    dataType: "JSON",
                    contentType: false,
                    cashe: false,
                    processData: false,
                }).done(function (data) {
                    console.log(data);

                    if (data.candidate == "ok") {
                        table.destroy();
                        myFunc();
                        btn.button('reset');
                        form[0].reset();
                        // reload the table

                        $('#add-messages').html('<div class="alert alert-success flat">' +
                            '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> Candidate successfully Uploaded. </div>');

                        $(".alert-success").delay(500).show(10, function () {
                            $(this).delay(3000).hide(10, function () {
                                $(this).remove();
                            });
                        });
                    }else {
                        btn.button('reset');
                        $('#add-messages').html('<div class="alert alert-warning flat">' +
                            '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> There is Error. </div>');

                        $(".alert-success").delay(500).show(10, function () {
                            $(this).delay(3000).hide(10, function () {
                                $(this).remove();
                            });
                        });
                    }
                }).fail(function (response) {
                    console.log(response.responseJSON);

                    btn.button('reset');
//                    showing errors validation on pages

                    var option = "";
                    option += response.responseJSON.message;
                    var data = response.responseJSON.errors;
                    $.each(data, function (i, value) {
                        console.log(value);
                        if (i == 'name') {
                            $('#tname').html(value[0])
                        }
                        $.each(value, function (j, values) {
                            option += '<p>' + values + '</p>';
                        });
                    });
                    $('#add-messages').html('<div class="alert alert-danger flat">' +
                        '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                        '<strong><i class="glyphicon glyphicon-remove"></i></strong><b>oops:</b>' + option + '</div>');

                    $(".alert-success").delay(500).show(10, function () {
                        $(this).delay(3000).hide(10, function () {
                            $(this).remove();
                        });
                    });

                    //alert("Internal server error");
                });
                return false;
            });

        });
    </script>


    <script src="{{asset('/backend/dashboard/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('/backend/dashboard/assets/extra-libs/datatables.net-bs4/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('/backend/dashboard/dist/js/pages/datatable/datatable-basic.init.js')}}"></script>
    <script src="{{asset('/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('/backend/dashboard/js/dataTables.min.js')}}"></script>
@endsection
