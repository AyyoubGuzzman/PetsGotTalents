@extends('layout')



@section('content')

    @if ($totalOwner == 0)
        <div class="alert1">
            <div class="textContent">
                <h3>0 Owner was found!</h3>
                <br>
                <p>You should have at least 1 owner to add a ne pets</p>
                <p>Click the button below to add a new owner</p>
                <br>
                <a href="{{ route('owner.create') }}"><button class="submit">Add Owner</button></a>
            </div>
        </div>
    @endif
<div class="sbcontainer">
    <div class="counter">
        <h3> Total Pets</h3>
        <span>{{ $totalPet }}</span>
    </div>
    <a href="animal/create">
    <div class="addTest">
        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-plus-square-fill" viewBox="0 0 16 16">
            <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z"/>
          </svg>
    </div>
</a>
</div>
<div class="tcont">
    <table class="tab">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Type</th>
                <th>Age</th>
                <th>Owner</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pets as $pet )

                <tr  onclick="window.location='animal/{{  $pet->id }}/edit';" data-href>
                    <td>{{ $pet->id }} </td>
                    <td>{{ $pet->name }} </td>
                    <td>{{ $pet->type }}</td>
                    <td>{{ $pet->age }} Yo</td>
                    <td>{{ $pet->owner->firstName ?? 'None'}}</td>

                </tr>


            @endforeach
        </tbody>

    </table>
</div>

@endsection
