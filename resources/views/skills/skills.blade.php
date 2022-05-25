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
                        <div class="row">
                            <div class="h3 text-center mb-4 title">Professional Skills</div>
                            <div class="edit-btn">
                                <button type="button" class="btn btn-inverse-danger btn-fw embed-responsive btn-rounded" href="#add_modal"  data-toggle="modal">Add New Skill</button>
                            </div>
                            <div class="edit-btn">
                                <button type="button" class="btn btn-inverse-primary btn-fw embed-responsive btn-rounded" href="#edit_modal" data-toggle="modal">Update Your Skills</button>
                            </div>
                            <?php $i=0?>
                            @foreach($skills as $one)
                                <?php $i++?>
                                @if($i%2 != 0)
                                    <div class="col-md-6">
                                        <div class="progress-container progress-danger "><span class="progress-badge" style="color: #808080">{{$one->skill_name}}</span>
                                            <div class="progress">
                                                <div class="progress-bar bg-danger progress-bar-primary" data-aos="progress-full" data-aos-offset="10" data-aos-duration="2000" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: {{$one->skill_percentage}}%;"></div><span style="color: #808080" class="progress-value">{{$one->skill_percentage}}%</span>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="col-md-6">
                                        <div class="progress-container progress-danger "><span class="progress-badge" style="color: #808080">{{$one->skill_name}}</span>
                                            <div class="progress">
                                                <div class="progress-bar bg-danger progress-bar-primary" data-aos="progress-full" data-aos-offset="10" data-aos-duration="2000" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: {{$one->skill_percentage}}%;"></div><span style="color: #808080" class="progress-value">{{$one->skill_percentage}}%</span>
                                            </div>
                                        </div>
                                    </div>
                                @endif
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
                            <h4 class="modal-title">Add New Skill</h4>
                            <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('skills.store')}}" method="post" autocomplete="off">
                                {{csrf_field()}}
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="exampleInputName1">Skill Name</label>
                                        <input type="text" class="form-control" id="skill_name" name="skill_name" style="color: #6C7293">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName1">Skill Percentage</label>
                                        <input type="number" class="form-control" id="skill_percentage" name="skill_percentage" style="color: #6C7293">
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

            <!--Start Edit Modal -->
            <div class="modal fade" id="edit_modal">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content modal-content-demo">
                        <div class="modal-header">
                            <h4 class="modal-title ">Update Your Skills</h4>
                            <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>Skill</th>
                                            <th>Percentage</th>
                                            <th>Operations</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($skills as $one)
                                        <tr>
                                            <td>{{$one->skill_name}}</td>
                                            <td>{{$one->skill_percentage}}%</td>
                                            <td>
                                                <button class="btn btn-sm btn-rounded btn-primary" href="#edit_modal2" title="Edit" data-id="{{$one->id}}" data-skill_name="{{$one->skill_name}}" data-skill_percentage="{{$one->skill_percentage}}" data-toggle="modal">Edit</button>
                                                <button class="btn btn-sm btn-rounded btn-danger" title="Delete" href="#delete_modal" data-id="{{$one->id}}" data-skill_name="{{$one->skill_name}}" data-toggle="modal">Delete</button>
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-md btn-outline-secondary btn-rounded" data-dismiss="modal">Cancel</button>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Edit Modal -->

            {{--  Start Edit Modal 2  --}}
            <div class="modal fade" id="edit_modal2" style="margin-left: 30px">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content modal-content-demo">
                        <div class="modal-header">
                            <h4 class="modal-title">Edit Skill</h4>
                            <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <form action="skills/update" method="post" autocomplete="off">
                                {{method_field('patch')}}
                                {{csrf_field()}}
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="exampleInputName1">Skill Name</label>
                                        <input type="hidden" class="form-control" id="id" name="id">
                                        <input type="text" class="form-control" id="skill_name" name="skill_name" style="color: #6C7293">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName1">Skill Percentage</label>
                                        <input type="number" class="form-control" id="skill_percentage" name="skill_percentage" style="color: #6C7293">
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
            {{--  End Edit Modal 2  --}}

            {{--  Start Delete Modal  --}}
            <div class="modal fade" id="delete_modal" style="margin-left: 30px">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content modal-content-demo">
                        <div class="modal-header">
                            <h4 class="modal-title">Are You Sure About Delete This Skill ?</h4>
                            <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <form action="skills/destroy" method="post" >
                                {{method_field('delete')}}
                                {{csrf_field()}}
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="exampleInputName1">Skill Name</label>
                                        <input type="hidden" class="form-control" id="id" name="id">
                                        <input type="text" class="form-control" id="skill_name" name="skill_name" style="color: #6C7293; background: #2A3038" readonly>
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
    {{--  Edit Modal Script  --}}
    <script>
        $('#edit_modal2').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var skill_name = button.data('skill_name')
            var skill_percentage = button.data('skill_percentage')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #skill_name').val(skill_name);
            modal.find('.modal-body #skill_percentage').val(skill_percentage);
        })
    </script>
    {{--  Delete Modal Script  --}}
    <script>
        $('#delete_modal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var skill_name = button.data('skill_name')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #skill_name').val(skill_name);
        })
    </script>
@endsection
