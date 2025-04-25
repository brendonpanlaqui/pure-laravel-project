@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Messages with {{ $recipient->name }}</h3>

        <div class="messages">
            @foreach ($messages as $message)
                <div class="message {{ $message->is_read ? 'read' : 'unread' }}">
                    <p><strong>{{ $message->sender_id == auth()->id() ? 'You' : $recipient->name }}:</strong></p>
                    <p>{{ $message->body }}</p>
                    <p><small>Sent on: {{ $message->created_at->format('M d, Y H:i') }}</small></p>
                </div>
            @endforeach
        </div>

        <!-- Example of message form to send a new message -->
        <form method="POST" action="{{ route('messages.send', $recipient->id) }}">
            @csrf
            <textarea name="body" placeholder="Type your message..." required></textarea>
            <button type="submit">Send</button>
        </form>
    </div>

    <script>
        function sendMessage() {
            var message = document.getElementById('messageInput').value;
            var recipientId = {{ $recipient->id }};  // Use the recipient's ID from the server-side

            // Send message via AJAX
            fetch(`/messages/send/${recipientId}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ body: message })
            })
            .then(response => response.json())
            .then(data => {
                // Append the new message to the message list
                var messageList = document.getElementById('message-list');
                var newMessage = document.createElement('div');
                newMessage.classList.add('message');
                newMessage.innerHTML = `<strong>You:</strong> <p>${data.message.body}</p><small>${new Date(data.message.created_at).toLocaleTimeString()}</small>`;
                messageList.appendChild(newMessage);

                // Clear the input field
                document.getElementById('messageInput').value = '';
            })
            .catch(error => {
                console.error('Error sending message:', error);
            });
        }
    </script>
@endsection
