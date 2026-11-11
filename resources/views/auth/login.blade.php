<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login - Laundry App</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>
<body>
    <div class="container" style="max-width: 400px; margin-top: 100px;">
        <header>
            <h1>Login Aplikasi</h1>
            <p>Silakan masuk untuk mengelola data</p>
        </header>

        <section class="form-section">
            @if($errors->any())
                <div style="color: red; margin-bottom: 15px; font-weight: bold;">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('login.proses') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Email:</label>
                    <input type="email" name="email" value="{{ old('email') }}" required>
                </div>
                <div class="form-group">
                    <label>Password:</label>
                    <input type="password" name="password" required>
                </div>
                <button type="submit" class="btn-submit">Masuk</button>
            </form>
        </section>
    </div>
</body>
</html>