@extends('master')
@section('CSS')
    <!---Internal Fileupload css-->
    <link href="{{ URL::asset('assets/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('contents')
<div class="col-12 grid-margin stretch-card">
    <div class="main-panel">
        <div class="content-wrapper">
            @if (session()->has('edit'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session()->get('edit') }}</strong>
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
                    <h3 class="card-title">My Information</h3>
                    <div class="edit-btn">
                    <button type="button" class="btn btn-inverse-primary btn-fw embed-responsive btn-rounded" href="#editmodal" data-id="{{$information->id}}" data-name="{{$information->name}}" data-age="{{$information->age}}" data-phone_number="{{$information->phone_number}}" data-address="{{$information->address}}" data-language="{{$information->language}}" data-work="{{$information->work}}" data-about_me="{{$information->about_me}}" data-toggle="modal">Update Information</button>
                    </div>
                    <form class="forms-sample">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="{{$information->name}}" readonly style="background: #2A3038">
                        </div>
                        <div class="form-group">
                            <label for="age">Age</label>
                            <input type="number" class="form-control" id="age" name="age" placeholder="{{$information->age}}" readonly style="background: #2A3038">
                        </div>
                        <div class="form-group">
                            <label for="work">Work</label>
                            <input type="text" class="form-control" id="work" name="work" placeholder="{{$information->work}}" readonly style="background: #2A3038">
                        </div>
                        <div class="form-group">
                            <label for="phone_number">Number</label>
                            <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="{{$information->phone_number}}" readonly style="background: #2A3038">
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="{{$information->address}}" readonly style="background: #2A3038">
                        </div>
                        <div class="form-group">
                            <label for="language">Language</label>
                            <input type="text" class="form-control" id="language" name="language" placeholder="{{$information->language}}" readonly style="background: #2A3038">
                        </div>
                        <div class="form-group">
                            <label for="about_me">About Me</label>
                            <textarea class="form-control" id="about_me" name="about_me" class="" rows="4" placeholder="{{$information->about_me}}" readonly style="background: #2A3038; height:65px"></textarea>
                        </div>
                    </form>
                </div>
            </div>
        </div>

            <!--Start Edit Modal -->
            <div class="modal fade" id="editmodal">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content modal-content-demo">
                        <div class="modal-header">
                            <h4 class="modal-title">Update Your Information</h4>
                            <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <form action="information/update" method="post" enctype="multipart/form-data" autocomplete="off">
                                {{method_field('patch')}}
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="hidden" class="form-control" id="id" name="id">
                                    <input type="text" class="form-control" id="name" name="name" style="color: #6C7293">
                                </div>
                                <div class="form-group">
                                    <label for="age">Age</label>
                                    <input type="number" class="form-control" id="age" name="age" style="color: #6C7293">
                                </div>
                                <div class="form-group">
                                    <label for="phone_number">Number</label>
                                    <input type="text" class="form-control" id="phone_number" name="phone_number" style="color: #6C7293">
                                </div>
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control" id="address" name="address" style="color: #6C7293">
                                </div>
                                <div class="form-group">
                                    <label for="language">Language</label>
                                    <input type="text" class="form-control" id="language" name="language" style="color: #6C7293">
                                </div>
                                <div class="form-group">
                                    <label for="work">Work</label>
                                    <input type="text" class="form-control" id="work" name="work" style="color: #6C7293">
                                </div>
                                <div class="form-group">
                                    <label for="about_me">About Me</label>
                                    <textarea class="form-control" id="about_me" name="about_me" rows="4" style="color: #6C7293; height:95px"></textarea>
                                </div>
                                <p class="text-danger">* Attachment Format ( .pdf, .jpeg, .jpg, .png )</p>
                                <div class="form-group">
                                    <label>Profile Photo </label>
                                    <div class="col-sm-12 col-md-12">
                                        <input type="file" id="attachment1" name="attachment1" class="dropify" accept=".pdf,.jpg, .png, image/jpeg, image/png" data-height="60" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Cover Photo</label>
                                    <div class="col-sm-12 col-md-12">
                                        <input type="file" id="attachment2" name="attachment2" class="dropify" accept=".pdf,.jpg, .png, image/jpeg, image/png" data-height="60" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Contact Me Background</label>
                                    <div class="col-sm-12 col-md-12">
                                        <input type="file" id="attachment3" name="attachment3" class="dropify" accept=".pdf,.jpg, .png, image/jpeg, image/png" data-height="60" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Your CV File</label>
                                    <div class="col-sm-12 col-md-12">
                                        <input type="file" id="attachment4" name="attachment4" class="dropify" accept=".pdf,.jpg, .png, image/jpeg, image/png" data-height="60" />
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
            <!-- End Edit Modal -->

@endsection

@section('JS')

    {{--  Edit Modal Script  --}}
    <script>
        $('#editmodal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var name = button.data('name')
            var age = button.data('age')
            var phone_number = button.data('phone_number')
            var address = button.data('address')
            var language = button.data('language')
            var work = button.data('work')
            var about_me = button.data('about_me')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #name').val(name);
            modal.find('.modal-body #age').val(age);
            modal.find('.modal-body #phone_number').val(phone_number);
            modal.find('.modal-body #address').val(address);
            modal.find('.modal-body #language').val(language);
            modal.find('.modal-body #work').val(work);
            modal.find('.modal-body #about_me').val(about_me);
        })
    </script>
            <!--Internal Fileuploads js-->
            <script src="{{ URL::asset('assets/plugins/fileuploads/js/fileupload.js') }}"></script>
            <script src="{{ URL::asset('assets/plugins/fileuploads/js/file-upload.js') }}"></script>
@endsection
