@extends('layout')


@section('content')
<div class="frm">
<form action="{{ route('test.update', $test) }}" method="POST">

    @csrf
    @method('PUT')

    <div class="mb-3">
      <label for="animal" class="form-label">Pets</label>
      <select class="form-select" name="animalID" aria-label="Default select example">
        <option value="{{ $test->animals->id }}" selected hidden>{{ $test->animals->name }}</option>
        @foreach ($animals as $animal)
                    <option value="{{ $animal->id }}">{{ $animal->name }}</option>
        @endforeach
      </select>
      @error('judgeID')
            <span class="error">{{ $message }}</span>
    @enderror
    </div>
    <div class="mb-3">
        <label for="juge" class="form-label">Juges</label>
        <select class="form-select" name="jugeID" aria-label="Default select example">
            <option value="{{ $test->juges->id }}" selected hidden>{{ $test->juges->firstName }} {{ $test->juges->lastName }}</option>
            @foreach ($juges as $juge)
                    <option value="{{ $juge->id }}">{{ $juge->firstName }}</option>
            @endforeach
        </select>
        @error('animalID')
            <span class="error">{{ $message }}</span>
    @enderror
      </div>
      <div class="mb-3">
        <label for="score" class="form-label">Score</label>
        <input type="number" class="form-control" name="score" placeholder="00" value="{{ $test->score }}">
        @error('score')
            <span class="error">{{ $message }}</span>
    @enderror
      </div>

    <button type="submit" class="submit">Submit</button>
</form>
<form action="{{ route('test.destroy', $test) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class="delete">Delete Test</button>
</form>
</div>
@endsection
