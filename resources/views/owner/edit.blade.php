@extends('layout')



@section('content')
<div class="frm">
<form method="POST" action="{{ route('owner.update',$owner) }}">

    @csrf
    @method('PUT')

    <div class="mb-3">
      <label for="firstName" class="form-label">First Name</label>
      <input type="text" class="form-control" name="firstName" placeholder="Your first name" value="{{ $owner->firstName }}">
      @error('firstName')
            <span class="error">{{ $message }}</span>
    @enderror
    </div>
    <div class="mb-3">
        <label for="lastName" class="form-label">First Name</label>
        <input type="text" class="form-control" name="lastName" placeholder="Your last name"  value="{{ $owner->lastName }}">
        @error('lastName')
            <span class="error">{{ $message }}</span>
    @enderror
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">E-Mail</label>
        <input type="text" class="form-control" name="email" placeholder="example@example.com"  value="{{ $owner->email }}">
        @error('email')
            <span class="error">{{ $message }}</span>
        @enderror
      </div>
      <div class="mb-3">
        <label for="phoneNumber" class="form-label">Phone Number</label>
        <input type="text" class="form-control" name="phoneNumber" placeholder="060000000"  value="{{ $owner->phoneNumber }}">
        @error('phoneNumber')
            <span class="error">{{ $message }}</span>
        @enderror
      </div>

    <button type="submit" class="submit">Submit</button>
</form>
<form action="{{ route('owner.destroy', $owner) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class="delete">Delete Test</button>
</form>
</div>

<div class="anlist">
   <h2>Pets List</h2>
        <div class="tcont">
            <table class="tab">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Age</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($owner->animals as $animal)
                        <tr  onclick="window.location='http://127.0.0.1:8000/animal/{{  $animal->id }}/edit';" data-href>
                            <td>{{ $animal->id }} </td>
                            <td>{{ $animal->name }} </td>
                            <td>{{ $animal->age }}</td>
                            <td>
                                <form action="{{ route('animal.destroy', $animal->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                      </svg></button>
                                </form>
                            </td>
                        </tr>

                    @endforeach
                </tbody>

            </table>
        </div>

@endsection
