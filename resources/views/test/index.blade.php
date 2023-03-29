@extends('layout')



@section('content')

<div class="sbcontainer">
    <div class="counter">
        <h3>Test passed</h3>
        <span>{{ $totalTest }}</span>
    </div>
    <a href="test/create">
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
