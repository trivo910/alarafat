@extends('admin.layout', ['pageTitle' => 'SMTP Settings'])

@section('content')
    <section class="admin-panel form-panel">
        <form class="admin-form" method="POST" action="{{ route('admin.smtp.update') }}">
            @csrf
            @method('PUT')

            <div class="smtp-form-grid">
                <label for="mailer">Mailer
                    <select id="mailer" name="mailer" required>
                        @foreach(['smtp' => 'SMTP', 'sendmail' => 'Sendmail', 'log' => 'Log', 'array' => 'Array'] as $value => $label)
                            <option value="{{ $value }}" @selected(old('mailer', $mailer) === $value)>{{ $label }}</option>
                        @endforeach
                    </select>
                </label>
                <label for="encryption">Encryption
                    <select id="encryption" name="encryption" required>
                        <option value="tls" @selected(old('encryption', $encryption) === 'tls')>TLS</option>
                        <option value="ssl" @selected(old('encryption', $encryption) === 'ssl')>SSL</option>
                        <option value="none" @selected(old('encryption', $encryption) === 'none')>None</option>
                    </select>
                </label>
                <label for="host">SMTP host
                    <input id="host" type="text" name="host" value="{{ old('host', $host) }}" autocomplete="url">
                </label>
                <label for="port">SMTP port
                    <input id="port" type="number" name="port" min="1" max="65535" value="{{ old('port', $port) }}">
                </label>
                <label for="username">SMTP username
                    <input id="username" type="text" name="username" value="{{ old('username', $username) }}" autocomplete="username">
                </label>
                <label for="password">SMTP password
                    <input id="password" type="password" name="password" autocomplete="new-password">
                </label>
            </div>
            <p class="field-help">{{ $passwordIsSet ? 'A password is saved. Leave blank to keep the current password.' : 'Leave blank if your mail server does not require a password.' }}</p>

            <div class="smtp-form-grid">
                <label for="from_address">From address
                    <input id="from_address" type="email" name="from_address" value="{{ old('from_address', $fromAddress) }}" required autocomplete="email">
                </label>
                <label for="from_name">From name
                    <input id="from_name" type="text" name="from_name" value="{{ old('from_name', $fromName) }}" required>
                </label>
            </div>

            <div class="form-actions">
                <button class="button-primary" type="submit">Save settings</button>
            </div>
        </form>
    </section>
@endsection
