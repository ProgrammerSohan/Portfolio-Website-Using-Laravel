@extends('admin.layouts.layout')

@section('content')

<section class="section">
  <div class="section-header">
    <h1>Profile</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
      <div class="breadcrumb-item">Profile</div>
    </div>
  </div>

  <div class="section-body">
    <h2 class="section-title">Hi, {{ $user->name }}!</h2>
    <p class="section-lead">
      Change information about yourself on this page.
    </p>

    <div class="row mt-sm-4">
      <div class="col-12 col-md-12 col-lg-12">
        <div class="card">

          <!-- SINGLE FORM -->
          <form method="post" action="{{ route('profile.update') }}" class="needs-validation" novalidate>
            @csrf
            @method('patch')

            <div class="card-header">
              <h4>Profile Information</h4>
            </div>

            <div class="card-body">
              <div class="row">

                <div class="form-group col-md-6 col-12">
                  <label>Name</label>
                 <input type="text" class="form-control" name="name" value="{{old('name',$user->name)}}" required="">
                 @if ($errors->has('name'))
                    <code>{{$errors->first('name')}}</code>
                 @endif

                </div>

                <div class="form-group col-md-6 col-12">
                  <label>Email</label>
                  <input type="email" class="form-control" name="email" value="{{old('email',$user->email)}}" required="">
                 @if ($errors->has('email'))
                    <code>{{$errors->first('email')}}</code>
                 @endif
                </div>

              </div>
            </div>

            <div class="card-footer text-right">
              <button type="submit" class="btn btn-primary">
                Save Changes
              </button>
            </div>

          </form>
          <!-- END FORM -->

        </div>

        <div class="card">

          <!-- SINGLE FORM -->
          <form method="post" action="{{ route('password.update') }}" class="needs-validation" novalidate>
            @csrf
           @method('patch')

            <div class="card-header">
              <h4>Update Password</h4>
            </div>

            <div class="card-body">
              <div class="row">

                <div class="form-group col-md-6 col-12">
                  <label>Current Password</label>
                  <input type="password"
                         class="form-control @error('current_password') is-invalid @enderror"
                         name="current_password"
                         autocomplete="current-password">

                  @error('current_password')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>

                 <div class="form-group col-md-6 col-12">
                  <label>New Password</label>
                  <input type="password"
                         class="form-control @error('password') is-invalid @enderror"
                         name="password"
                         autocomplete="new-password">

                  @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>

                  <div class="form-group col-md-6 col-12">
                  <label>Confirm Password</label>
                  <input type="password"
                         class="form-control @error('password_confirmation') is-invalid @enderror"
                         name="password_confirmation"
                         autocomplete="new-password">

                  @error('password_confirmation')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>

             

              </div>
            </div>

            <div class="card-footer text-right">
              <button type="submit" class="btn btn-warning">
                Save Changes
              </button>
            </div>

          </form>
          <!-- END FORM -->

        </div>

      </div>
    </div>
  </div>
</section>

@endsection
