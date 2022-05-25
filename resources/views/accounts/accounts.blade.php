@extends('master')
@section('contents')
    <!-- partial -->
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
                            <h3 class="card-title">Accounts</h3>
                            <div class="edit-btn">
                            <button type="button" class="btn btn-inverse-primary btn-fw embed-responsive btn-rounded" href="#edit_modal" data-id="{{ $accounts->id }}" data-email="{{ $accounts->email }}" data-facebook_link="{{ $accounts->facebook_link }}" data-linkedin_link="{{ $accounts->linkedin_link }}" data-twitter_link="{{ $accounts->twitter_link }}" data-instagram_link="{{ $accounts->instagram_link }}" data-github_link="{{ $accounts->github_link }}" data-toggle="modal">Update Accounts</button>
                            </div>
                            <form class="forms-sample">
                                <div class="form-group">
                                    <label for="exampleInputName1">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="{{$accounts->email}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Facebook Account</label>
                                    <input type="text" class="form-control" id="facebook_link" name="facebook_link" placeholder="{{$accounts->facebook_link}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">LinkedIn Account</label>
                                    <input type="text" class="form-control" id="linkedin_link" name="linkedin_link" placeholder="{{$accounts->linkedin_link}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Twitter Account</label>
                                    <input type="text" class="form-control" id="twitter_link" name="twitter_link" placeholder="{{$accounts->twitter_link}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Instagram Account</label>
                                    <input type="text" class="form-control" id=instagram_link"" name="instagram_link" placeholder="{{$accounts->instagram_link}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Github Account</label>
                                    <input type="text" class="form-control" id="github_link" name="github_link" placeholder="{{$accounts->github_link}}">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                {{--  Start Edit Modal  --}}
                <div class="modal fade" id="edit_modal">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content modal-content-demo">
                            <div class="modal-header">
                                <h4 class="modal-title">Update Your Accounts Link</h4>
                                <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <form action="accounts/update" method="post" autocomplete="off">
                                    {{method_field('patch')}}
                                    {{csrf_field()}}
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="exampleInputName1">Email</label>
                                        <input type="text" class="form-control" id="id" name="id">
                                        <input type="email" class="form-control" id="email" name="email" style="color: #6C7293">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName1">Facebook Account</label>
                                        <input type="text" class="form-control" id="facebook_link" name="facebook_link" style="color: #6C7293">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName1">LinkedIn Account</label>
                                        <input type="text" class="form-control" id="linkedin_link" name="linkedin_link" style="color: #6C7293">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName1">Twitter Account</label>
                                        <input type="text" class="form-control" id="twitter_link" name="twitter_link" style="color: #6C7293">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName1">Instagram Account</label>
                                        <input type="text" class="form-control" id="instagram_link" name="instagram_link" style="color: #6C7293">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName1">Github Account</label>
                                        <input type="text" class="form-control" id="github_link" name="github_link" style="color: #6C7293">
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
            {{--  End Edit Modal  --}}

@endsection
@section('JS')
<script>
    $('#edit_modal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var email = button.data('email')
        var facebook_link = button.data('facebook_link')
        var linkedin_link = button.data('linkedin_link')
        var twitter_link = button.data('twitter_link')
        var instagram_link = button.data('instagram_link')
        var github_link = button.data('github_link')
        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #email').val(email);
        modal.find('.modal-body #facebook_link').val(facebook_link);
        modal.find('.modal-body #linkedin_link').val(linkedin_link);
        modal.find('.modal-body #twitter_link').val(twitter_link);
        modal.find('.modal-body #instagram_link').val(instagram_link);
        modal.find('.modal-body #github_link').val(github_link);
    })
</script>
@endsection

