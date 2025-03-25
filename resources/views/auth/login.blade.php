<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <label>Email:</label>
        <input type="email" name="email" placeholder="Enter your email" required />
        
        <label>Password:</label>
        <input type="password" name="password" placeholder="Enter your password" required />
        
        <button type="submit">Login</button>
    </form>

    @if ($errors->any())
        <p style="color: red;">
            @foreach ($errors->all() as $error)
                {{ $error }} <br>
            @endforeach
        </p>
    @endif
</body>
</html>
