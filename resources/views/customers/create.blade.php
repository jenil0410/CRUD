@extends('layouts/contentNavbarLayout')

@section('title', 'Customer Form')

@section('content')
<style>
    .text-red{
        color: red;
    }
</style>
<div class="col-xxl">
  <div class="card mb-4">
    <div class="card-header d-flex align-items-center justify-content-between">
      <h5 class="mb-0">Add Customer</h5> <small class="text-muted float-end"></small>
    </div>
    <div class="card-body">
      <form action="{{route('customer.store')}}" method="POST">
        @csrf
        <div class="row mb-3">
          <label class="col-sm-2 col-form-label" for="first_name">First Name</label>
          <div class="col-sm-10">
              <input type="text" id="first_name" class="form-control" placeholder="Enter first name" aria-label="Enter first name" name="fname">
                @foreach ($errors->get('fname') as $error)
                    <small class="text-red">*{{$error}}</small>
                @endforeach
            </div>
      </div>
      

      <div class="row mb-3">
          <label class="col-sm-2 col-form-label" for="last_name">Last Name</label>
          <div class="col-sm-10">
              <input type="text" id="last_name" class="form-control" placeholder="Enter last name" aria-label="Enter last name" name="lname">
                @foreach ($errors->get('lname') as $error)
                    <small class="text-red">*{{$error}}</small>
                @endforeach
            </div>
      </div>
      

      <div class="row mb-3">
          <label class="col-sm-2 col-form-label" for="email">Email Address</label>
          <div class="col-sm-10">
              <input type="email" id="email" class="form-control" placeholder="Enter email address" aria-label="Enter email address" name="email">
                @foreach ($errors->get('email') as $error)
                    <small class="text-red">*{{$error}}</small>
                @endforeach
            </div>
      </div>
      

      <div class="row mb-3">
          <label class="col-sm-2 col-form-label" for="phone_number">Phone Number</label>
          <div class="col-sm-10">
              <input type="tel" id="phone_number" class="form-control" placeholder="Enter phone number" aria-label="Enter phone number" name="phone">
                @foreach ($errors->get('phone') as $error)
                    <small class="text-red">*{{$error}}</small>
                @endforeach
            </div>
      </div>
      

      <div class="row mb-3">
          <label class="col-sm-2 col-form-label" for="address">Address</label>
          <div class="col-sm-10">
              <input type="text" id="address" class="form-control" placeholder="Enter address" aria-label="Enter address" name="address">
                @foreach ($errors->get('address') as $error)
                    <small class="text-red">*{{$error}}</small>
                @endforeach
          </div>
      </div>
      

      <div class="row mb-3">
          <label class="col-sm-2 col-form-label" for="city">City</label>
          <div class="col-sm-10">
              <input type="text" id="city" class="form-control" placeholder="Enter city" aria-label="Enter city" name="city">
                @foreach ($errors->get('city') as $error)
                    <small class="text-red">*{{$error}}</small>
                @endforeach
            </div>
      </div>
     

      <div class="row mb-3">
          <label class="col-sm-2 col-form-label" for="state">State</label>
          <div class="col-sm-10">
              <input type="text" id="state" class="form-control" placeholder="Enter state" aria-label="Enter state" name="state">
                @foreach ($errors->get('state') as $error)
                    <small class="text-red">*{{$error}}</small>
                @endforeach
        </div>
      </div>
      

      <div class="row mb-3">
          <label class="col-sm-2 col-form-label" for="postal_code">Postal Code</label>
          <div class="col-sm-10">
              <input type="text" id="postal_code" class="form-control" placeholder="Enter postal code" aria-label="Enter postal code" name="pcode">
              @foreach ($errors->get('pcode') as $error)
                <small class="text-red">*{{$error}}</small>
             @endforeach
            </div>
      </div>
      

      <div class="row mb-3">
          <label class="col-sm-2 col-form-label" for="customer_type">Customer Type</label>
          <div class="col-sm-10">
              <select id="customer_type" class="form-control" aria-label="Select customer type" name="ctype">
                  <option value="regular">Regular</option>
                  <option value="wholesale">Wholesale</option>
                  <!-- Add other options as needed -->
              </select>
                @foreach ($errors->get('ctype') as $error)
                    <small class="text-red">*{{$error}}</small>
                @endforeach
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
