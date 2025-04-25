@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Your Conversations</h2>
    <ul class="list-group">
        @foreach ($conversations as $userId => $messages)
            @php
                // Get the user (either sender or recipient)
                $user = $messages->first()->sender_id == auth()->id()
                    ? $messages->first()->recipient
                    : $messages->first()->sender;
            @endphp
            <li class="list-group-item">
                <a href="{{ route('messages.show', $user->id) }}">
                    {{ $user->name }}
                </a>
            </li>
        @endforeach
    </ul>
</div>
@endsection
