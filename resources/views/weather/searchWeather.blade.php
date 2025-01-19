<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather App</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <style>
        /* Background image styling */
        .background-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
        }

        .background-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Content styling */
        .content {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: 1;
            background-color: rgba(0, 0, 0, 0.5);
        }

        h1 {
            color: whitesmoke;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        label {
            color: white;
            margin-bottom: 10px;
        }

        input[type="text"] {
            padding: 12px 25px;
            font-size: 1rem;
            border: none;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        button {
            padding: 12px 25px;
            font-size: 1rem;
            color: white;
            background-color: #007BFF;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }

        .error p {
            color: red;
        }
    </style>
</head>
<body>
    <div class="background-container">
        <img src="{{ asset('images/bg1.jpg') }}" alt="Background" class="background-image">
    </div>
    
    <div class="content">
        <h1>Check the Weather for Your City</h1>
        <form action="{{ route('weatherResult') }}" method="POST">
            @csrf
            <label for="city">Enter City:</label>
            <input type="text" id="city" name="city" required>
            <button type="submit">Submit</button>
        </form>

        @if($errors->any())
            <div class="error">
                <p>{{ $errors->first() }}</p>
            </div>
        @endif
    </div>
</body>
</html>
