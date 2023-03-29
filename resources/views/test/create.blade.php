@extends('layout')



@section('content')
<div class="frm">
<form method="POST" action="{{ route('test.store') }}">

    @csrf

    <div class="mb-3">
      <label for="animal" class="form-label">Pets</label>
      <select class="form-select" name="pet" aria-label="Default select example">
        <option value="" disabled selected hidden>Please Choose...</option>
        @foreach ($animals as $animal)
                    <option value="{{ $animal->id }}">{{ $animal->name }}</option>
        @endforeach
      </select>
      @error('pet')
            <span class="error">{{ $message }}</span>
    @enderror
    </div>
    <div class="mb-3">
        <label for="juge" class="form-label">Juges</label>
        <select class="form-select" name="juge" aria-label="Default select example">
            <option value="" disabled selected hidden>Please Choose...</option>
            @foreach ($juges as $juge)
                    <option value="{{ $juge->id }}">{{ $juge->firstName }}</option>
            @endforeach
        </select>
        @error('juge')
            <span class="error">{{ $message }}</span>
    @enderror
      </div>
      <div class="mb-3">
        <label for="score" class="form-label">Score</label>
        <input type="number" class="form-control" name="score" placeholder="00">
        @error('score')
            <span class="error">{{ $message }}</span>
    @enderror
      </div>

    <button type="submit" class="submit">Submit</button>
</form>

</div>


@endsection
