@extends('layout')



@section('content')

<div class="sbcontainer2">
    <div class="counter">
        <h3>Total Pets</h3>
        <span>{{ $totalPet }}</span>
    </div>
    <div class="owners">
        <h3>Total Owners</h3>
        <span>{{ $totalOwner }}</span>
    </div>
    <div class="juges">
        <h3>Total Juges</h3>
        <span>{{ $totalJuge }}</span>
    </div>
    <div class="tests">
        <h3>Total Tests</h3>
        <span>{{ $totalTest }} </span>
    </div>


</div>
<div class="tcont">
    <table class="tab">
        <thead>
            <tr>
                <th>Juge</th>
                <th>Pet</th>
                <th>Score</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tests as $test )

                <tr  onclick="window.location='test/{{  $test->id }}/edit';" data-href>
                    <td>{{ $test->juges->firstName }} {{ $test->juges->lastName }}</td>
                    <td>{{ $test->animals->name }}</td>
                    <td>{{ $test->score }}.00</td>
                </tr>


            @endforeach
        </tbody>

    </table>
</div>

@endsection
