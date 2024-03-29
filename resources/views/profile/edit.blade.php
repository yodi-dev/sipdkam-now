@extends('layouts.app', [
    'class' => '',
    'namePage' => 'User Profile',
    'activePage' => 'profile',
    'activeNav' => '',
])

@section('content')
  <div class="panel-header panel-header-sm">
  </div>
  <div class="content">
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">
            <h5 class="title">{{__(" Edit Profile")}}</h5>
          </div>
          <div class="card-body" id="profile">
            <form method="post" action="{{ route('profile.update') }}" autocomplete="off"
            enctype="multipart/form-data">
              @csrf
              @method('put')
              @include('alerts.success')
              @include('alerts.error_self_update', ['key' => 'not_allow_profile'])
              <div class="row">
                <div class="col-md-">
                  <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                    <div class="fileinput-new thumbnail img-circle">
                      <img src="{{asset('now')}}/img/placeholder.jpg" alt="...">
                    </div>
                    <div class="fileinput-preview fileinput-exists thumbnail img-circle"></div>
                    <div>
                      <span class="btn btn-round btn-rose btn-file">
                        <span class="fileinput-new">{{__('Add Photo')}}</span>
                        <span class="fileinput-exists">{{__('Change')}}</span>
                        <input type="file" name="photo">
                        @include('alerts.feedback', ['field' => 'photo'])
                      </span>
                      <br>
                      <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> {{__('Remove')}}</a>
                    </div>
                  </div>
                </div>
              </div>
                <div class="row">
                    <div class="col-md-7 pr-1">
                        <div class="form-group">
                            <label>{{__(" Name")}}</label>
                              <input type="text" name="name" class="form-control" value="{{ old('name', auth()->user()->name) }}">
                              @include('alerts.feedback', ['field' => 'name'])
                        </div>
                    </div>
                </div>
                <div class="row">
                  <div class="col-md-7 pr-1">
                    <div class="form-group">
                      <label for="exampleInputEmail1">{{__(" Email address")}}</label>
                      <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email', auth()->user()->email) }}">
                      @include('alerts.feedback', ['field' => 'email'])
                    </div>
                  </div>
                </div>
              <div class="card-footer ">
                <button type="submit" class="btn btn-primary btn-round">{{__('Save')}}</button>
              </div>
              <hr class="half-rule"/>
            </form>
          </div>
          <div class="card-header">
            <h5 class="title">{{__("Password")}}</h5>
          </div>
          <form method="post" action="{{ route('profile.password') }}" autocomplete="off">
            <div class="card-body">
                @csrf
                @method('put')
                @include('alerts.success', ['key' => 'password_status'])
                @include('alerts.error_self_update', ['key' => 'not_allow_password'])
                <div class="row">
                  <div class="col-md-7 pr-1">
                      <div class="form-group {{ $errors->has('password') ? ' has-danger' : '' }}">
                      <label>{{__(" Current Password")}}</label>
                      <input class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" name="old_password" placeholder="{{ __('Current Password') }}" type="password"  required>
                            @include('alerts.feedback', ['field' => 'old_password'])
                      </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-7 pr-1">
                    <div class="form-group {{ $errors->has('password') ? ' has-danger' : '' }}">
                      <label>{{__(" New password")}}</label>
                      <input class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('New Password') }}" type="password" name="password" required>
                      @include('alerts.feedback', ['field' => 'password'])
                    </div>
                  </div>
              </div>
              <div class="row">
                <div class="col-md-7 pr-1">
                  <div class="form-group {{ $errors->has('password') ? ' has-danger' : '' }}">
                    <label>{{__(" Confirm New Password")}}</label>
                    <input class="form-control" placeholder="{{ __('Confirm New Password') }}" type="password" name="password_confirmation" required>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer ">
              <button type="submit" class="btn btn-primary btn-round ">{{__('Change Password')}}</button>
            </div>
          </form>
        </div>
      </div>
      {{-- <div class="col-md-4">
        <div class="card card-user">
          <div class="image">
            <img src="{{asset('now')}}/img/bg5.jpg" alt="...">
          </div>
          <div class="card-body">
            <div class="author">
              <a href="#">
                <img class="avatar border-gray" src="{{ auth()->user()->profilePicture() }}" alt="...">
                <h5 class="title">{{ auth()->user()->name }}</h5>
              </a>
              <p class="description">
                  {{ auth()->user()->email }}
              </p>
            </div>
          </div>
          <hr>
          <div class="button-container">
            <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
              <i class="fab fa-facebook-square"></i>
            </button>
            <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
              <i class="fab fa-twitter"></i>
            </button>
            <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
              <i class="fab fa-google-plus-square"></i>
            </button>
          </div>
        </div>
      </div> --}}
    </div>
  </div>
@endsection
