<h1>New contact form message</h1>
<p><strong>Name:</strong> {{ $name }}</p>
<p><strong>Email:</strong> {{ $email }}</p>
<p><strong>Phone:</strong> {{ $phone ?: 'Not provided' }}</p>
<p><strong>Message:</strong></p>
<p>{{ $body }}</p>
