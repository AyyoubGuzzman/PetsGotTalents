@extends('layout')



@section('content')
<div class="frm">
<form method="POST" action="{{ route('animal.update', $animal )}}">

    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" name="name" placeholder="Sezar" value="{{ $animal->name }}">
        @error('name')
            <span class="error">{{ $message }}</span>
        @enderror
    </div>
    <div class="mb-3">
        <label for="type" class="form-label">Type</label>
        <select class="form-select" name="type" aria-label="Default select example">
            <option value="{{ $animal->type }}" selected hidden>{{ $animal->type }}</option>
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
        <input type="number" class="form-control" name="age" placeholder="10" value="{{ $animal->age }}">
        @error('age')
            <span class="error">{{ $message }}</span>
        @enderror
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description of the pet</label>
        <textarea class="form-control" id="description" name="description" rows="3" >{{ $animal->description }}</textarea>
        @error('description')
        <span class="error">{{ $message }}</span>
    @enderror
    </div>
    <div class="mb-3">
        <label for="owner" class="form-label">Owner</label>
        <select class="form-select" name="owner" aria-label="Default select example" disabled>
            <option value="{{ $animal->ownerID }}" selected hidden>{{ $animal->owner->firstName }} {{ $animal->owner->lastName }}</option>
        </select>
        @error('owner')
            <span class="error">{{ $message }}</span>
    @enderror
      </div>

    <button type="submit" class="submit">Submit</button>
</form>
<form action="{{ route('animal.destroy', $animal) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class="delete">Delete Owner</button>
</form>
</div>

<div class="anlist">
    <h2>His Owner</h2>
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
                         <tr  onclick="window.location='http://127.0.0.1:8000/owner/{{  $animal->ownerID }}/edit';" data-href>
                             <td>{{ $animal->owner->id }}</td>
                             <td>{{ $animal->owner->firstName }} {{ $animal->owner->lastName }} </td>
                             <td>{{ $animal->owner->email }} </td>
                             <td>{{ $animal->owner->phoneNumber }} </td>
                         </tr>
                 </tbody>

             </table>
         </div>


@endsection
