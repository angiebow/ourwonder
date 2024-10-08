<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        @import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css');
        
        body {
            background-image: url('/images/background.png');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            margin: 0;
            font-family: Figtree, sans-serif;
        }
        *, ::after, ::before {
            box-sizing: border-box;
        }
        h1, h2, h3, h4, h5, h6, p {
            margin: 0;
            font-weight: inherit;
            color: #fff;
        }
        a {
            color: inherit;
            text-decoration: inherit;
        }
        button {
            font-family: inherit;
            background-color: transparent;
            cursor: pointer;
        }
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            padding: 1.5rem;
            text-align: center;
        }

        .card {
            background-color: rgba(255, 255, 255, 0.2); 
            backdrop-filter: blur(20px); 
            border-radius: 2rem;
            box-shadow: 0 25px 50px -12px rgb(0 0 0 / 0.25);
            padding: 5rem;
            max-width: 40rem;
            width: 100%;
            margin-top: 4rem;
        }

        .route-buttons-container {
            display: flex;
            justify-content: center;
            width: 100%;
            margin-top: 2rem;
        }

        .route-button {
            background-color: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(5px);
            border-radius: 2rem;
            box-shadow: 0 25px 50px -12px rgb(0 0 0 / 0.25);
            padding: 1.5rem;
            color: rgb(16, 16, 16);
            font-size: 1.2rem;
            text-align: center;
            cursor: pointer;
            border: none;
            transition: background-color 0.3s ease;
            width: 30%;
            margin: 0 10px; 
        }

        .route-button:hover {
            background-color: rgba(255, 255, 255, 0.3);
        }

        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            text-align: left;
            display: block;
            margin-bottom: 5px;
            color: purple;
        }
        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #fff;
            border-top: none;
            border-left: none;
            border-right: none;
            color: black;


        }
        .form-group input:focus {
            color: black;
            border-color: rgb(138, 25, 201); 
            outline: none;
        }
        .form-group-auth button {
            padding: 10px 20px;
            border-radius: 5px;
            border: none;
            background-color: rgb(138, 25, 201);
            color: whites;
            cursor: pointer;
            width: 100%;
        }
        .form-group-auth {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }
        .header {
            position: absolute;
            top: 1rem;
            right: 1rem;
        }
        .admin-button {
            background-color: rgb(138, 25, 201);
            color: #fff;
            border: none;
            border-radius: 50%;
            padding: 10px;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }
        .admin-button i {
            font-size: 18px;
        }
    </style>
    <title>NeuTrack</title>
</head>
<body>
    <div class="header">
        <button class="admin-button" onclick="window.location.href='{{ route('admin.login') }}'">
            <i class="fas fa-user"></i>
        </button>
    </div>
    <div class="container">
        <div class="card">
            <hr class="bg-gray-100 h-0.5 rounded-lg w-16 mx-auto">
            <img src="/images/logo.png" alt="Neutrack Logo" style="width: 400px;">
            @if(session('success'))
                <div>{{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div>{{ session('error') }}</div>
            @endif
            <form method="POST" action="{{ route('signin.submit') }}">
                @csrf
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div class="form-group-auth" style="display: flex; justify-content: space-between;">
                    <button type="submit" style="color: white">Sign In</button>
                </div>
            </form>
            <br>
            <p style="color: purple">Don't have an account?</p>
            <div class="form-group-auth" style="display: flex; justify-content: space-between;">
                <button><a href="{{ route('signup') }}" style="color: white">Sign Up</a></button>
            </div>
        </div>
        <div class="route-buttons-container">
            <a style="color: purple" href="https://memoryreboot.pythonanywhere.com/" class="route-button">Tracking</a>
            <a style="color: purple" href="https://app.smojo.org/firaniaputri23/neutrack-memobot-for-alzheimer" class="route-button">Memo Bot</a>
        </div>
    </div>
</body>
</html>