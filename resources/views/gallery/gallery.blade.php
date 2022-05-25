@extends('master')
@section('CSS')
    <!---Internal Fileupload css-->
    <link href="{{ URL::asset('assets/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css" />
@endsection
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
                <div class="card">
                    <div class="card-body">
                        <div class="h2 text-center mb-4 title">Projects Gallery</div>
                        <div class="edit-btn">
                            <button type="button" class="btn btn-inverse-danger btn-fw embed-responsive btn-rounded" href="#add_modal"  data-toggle="modal">Add New Project</button>
                        </div>
                        <div class="gallery">
                            <div class="row">
                                <?php $i=0?>
                                @foreach($projects as $one)
                                    <?php $i++?>
                                    @if($i%2 == 0)
                                        <div class="col-md-6">
                                            <div class="card">
                                                <div class="cc-porfolio-image img-raised" class="card-body" data-aos="fade-up" data-aos-anchor-placement="top-bottom"><a href="{{$one->project_link}}">
                                                    <figure class="cc-effect"><img class="img-responsive" src="Attachments/Projects/{{$one->project_image}}" alt="Image" style="height: 300px; width: 450px;"/>
                                                        <figcaption>
                                                            <div class="h4">{{$one->project_title}}</div>
                                                            <p>Web Development</p>
                                                        </figcaption>
                                                    </figure></a>
                                                </div>
                                                <div class="text-center" style="margin-bottom: 10px;">
                                                    <button class="btn btn-sm btn-rounded btn-primary" href="#edit_modal" title="Edit" data-id="{{$one->id}}" data-project_title="{{$one->project_title}}" data-project_link="{{$one->project_link}}" data-project_image="{{$one->project_image}}" data-toggle="modal">Edit</button>
                                                    <button class="btn btn-sm btn-rounded btn-danger" title="Delete" href="#delete_modal" data-id="{{$one->id}}" data-project_title="{{$one->project_title}}" data-toggle="modal">Delete</button>
                                                </div>
                                            </div>
                                      </div>
                                    @else
                                        <div class="col-md-6">
                                            <div class="card">
                                                <div class="cc-porfolio-image img-raised" class="card-body" data-aos="fade-up" data-aos-anchor-placement="top-bottom"><a href="{{$one->project_link}}">
                                                    <figure class="cc-effect"><img class="img-responsive" src="Attachments/Projects/{{$one->project_image}}" alt="Image" style="height: 300px; width: 450px;"/>
                                                        <figcaption>
                                                            <div class="h4">{{$one->project_title}}</div>
                                                            <p>Web Development</p>
                                                        </figcaption>
                                                    </figure></a>
                                                </div>
                                                <div class="text-center" style="margin-bottom: 10px;">
                                                    <button class="btn btn-sm btn-rounded btn-primary" href="#edit_modal" title="Edit" data-id="{{$one->id}}" data-project_title="{{$one->project_title}}" data-project_link="{{$one->project_link}}" data-project_image="{{$one->project_image}}" data-toggle="modal">Edit</button>
                                                    <button class="btn btn-sm btn-rounded btn-danger" title="Delete" href="#delete_modal" data-id="{{$one->id}}" data-project_title="{{$one->project_title}}" data-toggle="modal">Delete</button>
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
                                <h4 class="modal-title">Add New Project</h4>
                                <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{route('gallery.store')}}" method="post" enctype="multipart/form-data" autocomplete="off">
                                    {{csrf_field()}}
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="project_title">Project Title</label>
                                            <input type="text" class="form-control" id="project_title" name="project_title" style="color: #6C7293">
                                        </div>
                                        <div class="form-group">
                                            <label for="project_link">Project Link</label>
                                            <input type="text" class="form-control" id="project_link" name="project_link" style="color: #6C7293">
                                        </div>
                                        <div class="form-group">
                                            <label>Project Photo</label>
                                            <div class="col-sm-12 col-md-12">
                                                <input type="file" id="project_image" name="project_image" class="dropify" accept=".pdf,.jpg, .png, image/jpeg, image/png" data-height="60" />
                                            </div>
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
                                <h4 class="modal-title">Edit Project</h4>
                                <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <form action="gallery/update" method="post" enctype="multipart/form-data" autocomplete="off">
                                    {{method_field('patch')}}
                                    {{csrf_field()}}
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="project_title">Project Title</label>
                                            <input type="hidden" class="form-control" id="id" name="id">
                                            <input type="text" class="form-control" id="project_title" name="project_title" style="color: #6C7293">
                                        </div>
                                        <div class="form-group">
                                            <label for="project_link">Project Link</label>
                                            <input type="text" class="form-control" id="project_link" name="project_link" style="color: #6C7293">
                                        </div>
                                        <div class="form-group">
                                            <label>Project Photo</label>
                                            <div class="col-sm-12 col-md-12">
                                                <input type="file" id="project_image" name="project_image" class="dropify" accept=".jpg, .png, image/jpeg, image/png" data-height="60" />
                                            </div>
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
                                <h4 class="modal-title">Are You Sure About Delete This Project ?</h4>
                                <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <form action="gallery/destroy" method="post" >
                                    {{method_field('delete')}}
                                    {{csrf_field()}}
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="project_title">Project Title</label>
                                            <input type="hidden" class="form-control" id="id" name="id">
                                            <input type="text" class="form-control" id="project_title" name="project_title" readonly style="color: #6C7293">
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
    <!--Internal Fileuploads js-->
        <script src="{{ URL::asset('assets/plugins/fileuploads/js/fileupload.js') }}"></script>
        <script src="{{ URL::asset('assets/plugins/fileuploads/js/file-upload.js') }}"></script>

    {{--  Edit Modal Script  --}}
    <script>
        $('#edit_modal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var project_title = button.data('project_title')
            var project_link = button.data('project_link')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #project_title').val(project_title);
            modal.find('.modal-body #project_link').val(project_link);
        })
    </script>
    {{--  Delete Modal Script  --}}
    <script>
        $('#delete_modal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var project_title = button.data('project_title')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #project_title').val(project_title);
        })
    </script>
@endsection
