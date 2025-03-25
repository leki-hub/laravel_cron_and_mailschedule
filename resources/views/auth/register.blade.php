<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <h1>Register</h1>
    <form action="{{ route('register') }}" method="POST">
        @csrf
        <label>Name:</label>
        <input type="text" name="name" placeholder="Enter your name" required />
        
        <label>Email:</label>
        <input type="email" name="email" placeholder="Enter your email" required />
        
        <label>Password:</label>
        <input type="password" name="password" placeholder="Enter your password" required />
        
        <button type="submit">Register</button>
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
