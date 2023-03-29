@extends('layout')



@section('content')
<div class="frm">
<form method="POST" action="{{ route('owner.store') }}">

    @csrf

    <div class="mb-3">
      <label for="firstName" class="form-label">First Name</label>
      <input type="text" class="form-control" name="firstName" placeholder="Your first name">
      @error('firstName')
            <span class="error">{{ $message }}</span>
    @enderror
    </div>
    <div class="mb-3">
        <label for="lastName" class="form-label">First Name</label>
        <input type="text" class="form-control" name="lastName" placeholder="Your last name">
        @error('lastName')
            <span class="error">{{ $message }}</span>
    @enderror
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">E-Mail</label>
        <input type="text" class="form-control" name="email" placeholder="example@example.com">
        @error('email')
            <span class="error">{{ $message }}</span>
        @enderror
      </div>
      <div class="mb-3">
        <label for="phoneNumber" class="form-label">Phone Number</label>
        <input type="text" class="form-control" name="phoneNumber" placeholder="060000000">
        @error('phoneNumber')
            <span class="error">{{ $message }}</span>
        @enderror
      </div>

    <button type="submit" class="submit">Submit</button>
</form>

</div>


@endsection
