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
          <form method="POST" action="{{ route('profile.update') }}" class="needs-validation" novalidate>
            @csrf
            {{-- Use this ONLY if route is PATCH --}}
            {{-- @method('patch') --}}

            <div class="card-header">
              <h4>Edit Profile</h4>
            </div>

            <div class="card-body">
              <div class="row">

                <div class="form-group col-md-6 col-12">
                  <label>Name</label>
                  <input type="text"
                         class="form-control @error('name') is-invalid @enderror"
                         name="name"
                         value="{{ old('name', $user->name) }}"
                         required>

                  @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>

                <div class="form-group col-md-6 col-12">
                  <label>Email</label>
                  <input type="email"
                         class="form-control @error('email') is-invalid @enderror"
                         name="email"
                         value="{{ old('email', $user->email) }}"
                         required>

                  @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
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
      </div>
    </div>
  </div>
</section>

@endsection
