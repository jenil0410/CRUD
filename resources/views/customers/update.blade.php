@extends('layouts/contentNavbarLayout')

@section('title', ' Customer Update')

@section('content')

<div class="col-xxl">
  <div class="card mb-4">
    <div class="card-header d-flex align-items-center justify-content-between">
      <h5 class="mb-0">update Customer</h5> <small class="text-muted float-end"></small>
    </div>
    <div class="card-body">
      <form action="{{route('customer.update', $id)}}" method="POST">
        @csrf
        <div class="row mb-3">
          <label class="col-sm-2 col-form-label" for="first_name">First Name</label>
          <div class="col-sm-10">
              <input type="text" id="first_name" class="form-control" placeholder="Enter first name" aria-label="Enter first name" name="fname" value="{{$customer->fname}}">
          </div>
      </div>

      <div class="row mb-3">
          <label class="col-sm-2 col-form-label" for="last_name">Last Name</label>
          <div class="col-sm-10">
              <input type="text" id="last_name" class="form-control" placeholder="Enter last name" aria-label="Enter last name" name="lname" value="{{$customer->lname}}">
          </div>
      </div>

      <div class="row mb-3">
          <label class="col-sm-2 col-form-label" for="email">Email Address</label>
          <div class="col-sm-10">
              <input type="email" id="email" class="form-control" placeholder="Enter email address" aria-label="Enter email address" name="email" value="{{$customer->email}}">
          </div>
      </div>

      <div class="row mb-3">
          <label class="col-sm-2 col-form-label" for="phone_number">Phone Number</label>
          <div class="col-sm-10">
              <input type="tel" id="phone_number" class="form-control" placeholder="Enter phone number" aria-label="Enter phone number" name="phone" value="{{$customer->phone}}">
          </div>
      </div>

      <div class="row mb-3">
          <label class="col-sm-2 col-form-label" for="address">Address</label>
          <div class="col-sm-10">
              <input type="text" id="address" class="form-control" placeholder="Enter address" aria-label="Enter address" name="address" value="{{$customer->address}}">
          </div>
      </div>

      <div class="row mb-3">
          <label class="col-sm-2 col-form-label" for="city">City</label>
          <div class="col-sm-10">
              <input type="text" id="city" class="form-control" placeholder="Enter city" aria-label="Enter city" name="city" value="{{$customer->city}}">
          </div>
      </div>

      <div class="row mb-3">
          <label class="col-sm-2 col-form-label" for="state">State</label>
          <div class="col-sm-10">
              <input type="text" id="state" class="form-control" placeholder="Enter state" aria-label="Enter state" name="state" value="{{$customer->state}}">
          </div>
      </div>

      <div class="row mb-3">
          <label class="col-sm-2 col-form-label" for="postal_code">Postal Code</label>
          <div class="col-sm-10">
              <input type="text" id="postal_code" class="form-control" placeholder="Enter postal code" aria-label="Enter postal code" name="pcode" value="{{$customer->pcode}}">
          </div>
      </div>

      <div class="row mb-3">
          <label class="col-sm-2 col-form-label" for="customer_type">Customer Type</label>
          <div class="col-sm-10">
              <select id="customer_type" class="form-control" aria-label="Select customer type" name="ctype">
                  <option value="regular" @if ($customer->ctype == "regular") selected @endif>Regular</option>
                  <option value="wholesale" @if ($customer->ctype == "wholesale") selected @endif>Wholesale</option>
                  <!-- Add other options as needed -->
              </select>
          </div>
      </div>
        <div class="row justify-content-end">
          <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">Send</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
