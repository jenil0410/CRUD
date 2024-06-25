@extends('layouts/contentNavbarLayout')

@section('title', 'Account settings - Account')

@section('page-script')
<script src="{{asset('assets/js/pages-account-settings-account.js')}}"></script>
@endsection

@section('content')
<h4 class="py-3 mb-4">
  <span class="text-muted fw-light">Account</span> Delete
</h4>
<div class="container">

  <div class="row">
    <div class="col-md-12">
      <ul class="nav nav-pills flex-column flex-md-row mb-4 gap-2 gap-lg-0">
        <li class="nav-item"><a class="nav-link active" href="javascript:void(0);"><i class="mdi mdi-account-outline mdi-20px me-1"></i>Delete</a></li>
        {{-- <li class="nav-item"><a class="nav-link" href="{{url('pages/account-settings-notifications')}}"><i class="mdi mdi-bell-outline mdi-20px me-1"></i>Notifications</a></li>
        <li class="nav-item"><a class="nav-link" href="{{url('pages/account-settings-connections')}}"><i class="mdi mdi-link mdi-20px me-1"></i>Connections</a></li> --}}
      </ul>
      </div>
    
      <div class="card">
        <h5 class="card-header fw-normal">Delete Account</h5>
        <div class="card-body">
          <div class="mb-3 col-12 ">
            <div class="alert alert-warning">
              <h6 class="alert-heading mb-1">Are you sure you want to delete your account?</h6>
              <p class="mb-0">Once you delete your account, there is no going back. Please be certain.</p>
            </div>
          </div>
          <form id="formAccountDeactivation" method="post" action="{{ route('profile.destroy') }}">
            @csrf
            @method('delete')
            <div class="form-check mb-3 ms-3">
              <input class="form-check-input" type="checkbox" name="accountActivation" id="accountActivation" />
              <label class="form-check-label" for="accountActivation">I confirm my account deactivation</label>
            </div>
            <button type="submit" class="btn btn-danger">Deactivate Account</button>
          </form>
        </div>
      </div>

      
    </div>
</div>
@endsection
