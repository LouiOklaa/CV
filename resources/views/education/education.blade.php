@extends('master')
@section('contents')

    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="container">
                @if (session()->has('Add'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ session()->get('Add') }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                @if (session()->has('Edit'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ session()->get('Edit') }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                @if (session()->has('Delete'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>{{ session()->get('Delete') }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </strong>
                    </div>
                @endif
                <div class="card" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
                    <div class="card-body">
                        <div class="container cc-experience">
                            <div class="h3 text-center mb-4 title">Education</div>
                            <div class="edit-btn">
                                <button type="button" class="btn btn-inverse-danger btn-fw embed-responsive btn-rounded" href="#add_modal"  data-toggle="modal">Add New Degree</button>
                            </div>
                            @foreach($degrees as $one)
                            <div class="card border border-2 border-#808080">
                                <div class="row">
                                    <div class="bg-danger col-md-3 bg-primary" data-aos="fade-right" data-aos-offset="50" data-aos-duration="500">
                                        <div  class=" card-body bg-danger cc-experience-header">
                                            <p style="color: #f5f5f5 ">{{$one->start_date}} - {{$one->end_date}}</p>
                                            <div class="h5">{{$one->degree}}</div>
                                        </div>
                                    </div>
                                    <div class="col-md-9" data-aos="fade-left" data-aos-offset="50" data-aos-duration="500">
                                        <div class="card-body">
                                            <div class="h5">{{$one->specialization}}</div>
                                            <p class="category">{{$one->university}}</p>
                                            <p style="color: #808080"> {{$one->description}}</p>
                                            <button class="btn btn-sm btn-rounded btn-primary" href="#edit_modal" title="Edit" data-id="{{$one->id}}" data-degree="{{$one->degree}}" data-university="{{$one->university}}" data-specialization="{{$one->specialization}}" data-start_date="{{$one->specialization}}" data-end_date="{{$one->end_date}}" data-description="{{$one->description}}"  data-toggle="modal">Edit</button>
                                            <button class="btn btn-sm btn-rounded btn-danger" title="Delete" href="#delete_modal" data-id="{{$one->id}}" data-degree="{{$one->degree}}" data-toggle="modal">Delete</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            {{--  Start Add Modal  --}}
            <div class="modal fade" id="add_modal">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content modal-content-demo">
                        <div class="modal-header">
                            <h4 class="modal-title">Add New Degree</h4>
                            <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('education.store')}}" method="post" autocomplete="off">
                                {{csrf_field()}}
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="degree">Degree</label>
                                        <input type="text" class="form-control" id="degree" name="degree" style="color: #6C7293">
                                    </div>
                                    <div class="form-group">
                                        <label for="university">University / School</label>
                                        <input type="text" class="form-control" id="university" name="university" style="color: #6C7293">
                                    </div>
                                    <div class="form-group">
                                        <label for="specialization">Specialization</label>
                                        <input type="text" class="form-control" id="specialization" name="specialization" style="color: #6C7293">
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="end_date" style="margin-top: 10px;">Start Date</label>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <select name="start_date" class="form-control" id="dropdownYearStart" style="width: 80px; color: #6C7293; text-align: center;" onchange="getProjectReportFunc()">
                                                        <option value="" selected disabled>-Select-</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="end_date" style="margin-top: 10px;">End Date</label>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <select name="end_date" class="form-control" id="dropdownYearEnd" style="width: 80px; color: #6C7293; text-align: center;" onchange="getProjectReportFunc()">
                                                        <option value="" selected disabled>-Select-</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea class="form-control" id="description" name="description" rows="4" style="color: #6C7293; height:95px"></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-md btn-outline-danger btn-rounded ">Confirm</button>
                                    <button type="button" class="btn btn-md btn-outline-secondary btn-rounded" data-dismiss="modal">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            {{--  End ADD Modal  --}}
            {{--  Start Edit Modal --}}
            <div class="modal fade" id="edit_modal">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content modal-content-demo">
                        <div class="modal-header">
                            <h4 class="modal-title">Edit Degree</h4>
                            <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <form action="education/update" method="post" autocomplete="off">
                                {{method_field('patch')}}
                                {{csrf_field()}}
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="degree">Degree</label>
                                        <input type="hidden" class="form-control" id="id" name="id">
                                        <input type="text" class="form-control" id="degree" name="degree" style="color: #6C7293">
                                    </div>
                                    <div class="form-group">
                                        <label for="university">University / School</label>
                                        <input type="text" class="form-control" id="university" name="university" style="color: #6C7293">
                                    </div>
                                    <div class="form-group">
                                        <label for="specialization">Specialization</label>
                                        <input type="text" class="form-control" id="specialization" name="specialization" style="color: #6C7293">
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="start_date" style="margin-top: 10px;">Start Date</label>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <select name="start_date" class="form-control" id="dropdownYearStartEdit" style="width: 80px; color: #6C7293; text-align: center;" onchange="getProjectReportFunc()">
                                                        <option value="" selected disabled>-Select-</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="end_date" style="margin-top: 10px;">End Date</label>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <select name="end_date" class="form-control" id="dropdownYearEndEdit" style="width: 80px; color: #6C7293; text-align: center;" onchange="getProjectReportFunc()">
                                                        <option value="" selected disabled>-Select-</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea class="form-control" id="description" name="description" rows="4" style="color: #6C7293; height:95px"></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-md btn-outline-primary btn-rounded ">Confirm</button>
                                    <button type="button" class="btn btn-md btn-outline-secondary btn-rounded" data-dismiss="modal">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            {{--  End Edit Modal --}}
            {{--  Start Delete Modal  --}}
            <div class="modal fade" id="delete_modal">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content modal-content-demo">
                        <div class="modal-header">
                            <h4 class="modal-title">Are You Sure About Delete This Degree ?</h4>
                            <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <form action="education/destroy" method="post" >
                                {{method_field('delete')}}
                                {{csrf_field()}}
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="degree">Degree</label>
                                        <input type="hidden" class="form-control" id="id" name="id">
                                        <input type="text" class="form-control" id="degree" name="degree" readonly style="color: #6C7293; background: #2A3038">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-md btn-outline-danger btn-rounded ">Delete</button>
                                    <button type="button" class="btn btn-md btn-outline-secondary btn-rounded" data-dismiss="modal">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            {{--  End Delete Modal  --}}
        </div>
@endsection
@section('JS')
{{--  Start_Date YearPicker  --}}
    <script>
        var i, currentYear, startYear, endYear, newOption, dropdownYearStart;
        dropdownYearStart = document.getElementById("dropdownYearStart");
        currentYear = (new Date()).getFullYear();
        startYear = currentYear - 100;
        endYear = currentYear + 8;

        for (i=startYear;i<=endYear;i++) {
            newOption = document.createElement("option");
            newOption.value = i;
            newOption.label = i;

            dropdownYearStart.appendChild(newOption);
        }
    </script>
    {{--  End_Date YearPicker  --}}
    <script>
        var i, currentYear, startYear, endYear, newOption, dropdownYearEnd;
        dropdownYearEnd = document.getElementById("dropdownYearEnd");
        currentYear = (new Date()).getFullYear();
        startYear = currentYear - 100;
        endYear = currentYear + 8;

        for (i=startYear;i<=endYear;i++) {
            newOption = document.createElement("option");
            newOption.value = i;
            newOption.label = i;

            dropdownYearEnd.appendChild(newOption);
        }
    </script>
    {{--  Start_Date_Edit YearPicker  --}}
    <script>
        var i, currentYear, startYear, endYear, newOption, dropdownYearStartEdit;
        dropdownYearStartEdit = document.getElementById("dropdownYearStartEdit");
        currentYear = (new Date()).getFullYear();
        startYear = currentYear - 100;
        endYear = currentYear + 8;

        for (i=startYear;i<=endYear;i++) {
            newOption = document.createElement("option");
            newOption.value = i;
            newOption.label = i;

            dropdownYearStartEdit.appendChild(newOption);
        }
    </script>
    {{--  End_Date_Edit YearPicker  --}}
    <script>
        var i, currentYear, startYear, endYear, newOption, dropdownYearEndEdit;
        dropdownYearEndEdit = document.getElementById("dropdownYearEndEdit");
        currentYear = (new Date()).getFullYear();
        startYear = currentYear - 100;
        endYear = currentYear + 8;

        for (i=startYear;i<=endYear;i++) {
            newOption = document.createElement("option");
            newOption.value = i;
            newOption.label = i;

            dropdownYearEndEdit.appendChild(newOption);
        }
    </script>
    {{--  Edit Modal Script  --}}
    <script>
        $('#edit_modal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var degree = button.data('degree')
            var university = button.data('university')
            var specialization = button.data('specialization')
            var start_date = button.data('start_date')
            var end_date = button.data('end_date')
            var description = button.data('description')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #degree').val(degree);
            modal.find('.modal-body #university').val(university);
            modal.find('.modal-body #specialization').val(specialization);
            modal.find('.modal-body #start_date').val(start_date);
            modal.find('.modal-body #end_date').val(end_date);
            modal.find('.modal-body #description').val(description);
        })
    </script>
    {{--  Edit Modal Script  --}}
    <script>
        $('#delete_modal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var degree = button.data('degree')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #degree').val(degree);
        })
    </script>
@endsection
