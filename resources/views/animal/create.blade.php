@extends('layout')



@section('content')
<div class="frm">
<form method="POST" action="{{ route('animal.store') }}">

    @csrf

    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" name="name" placeholder="Sezar">
        @error('name')
            <span class="error">{{ $message }}</span>
        @enderror
    </div>
    <div class="mb-3">
        <label for="type" class="form-label">Type</label>
        <select class="form-select" name="type" aria-label="Default select example">
            <option value="" disabled selected hidden>Please Choose...</option>
            <option value="dog">Dog</option>
            <option value="cat">Cat</option>
            <option value="Bird">Bird</option>
            <option value="Other">Other</option>
        </select>
        @error('type')
            <span class="error">{{ $message }}</span>
    @enderror
    </div>
    <div class="mb-3">
        <label for="age" class="form-label">Age</label>
        <input type="number" class="form-control" name="age" placeholder="10">
        @error('age')
            <span class="error">{{ $message }}</span>
        @enderror
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description of the pet</label>
        <textarea class="form-control" id="description" name="description" rows="3" ></textarea>
        @error('description')
        <span class="error">{{ $message }}</span>
    @enderror
    </div>
    <div class="mb-3">
        <label for="owner" class="form-label">Owner</label>
        <select class="form-select" name="owner" aria-label="Default select example">
            <option value="" disabled selected hidden>Please Choose...</option>
            @foreach ($owners as $owner)
                    <option value="{{ $owner->id }}">{{ $owner->firstName }} {{ $owner->lastName }}</option>
            @endforeach
        </select>
        @error('owner')
            <span class="error">{{ $message }}</span>
    @enderror
      </div>

    <button type="submit" class="submit">Submit</button>
</form>

</div>


@endsection
