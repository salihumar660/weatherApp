<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather Result</title>
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
            color: white;
            margin-bottom: 20px;
        }

        ul {
            color: whitesmoke;
            list-style-type: none;
            padding: 0;
        }

        ul li {
            font-size: 1.2rem;
            margin-bottom: 10px;
        }

        /* Button styling */
        a {
            color: #fff;
            font-size: 1rem;
            text-decoration: none;
            background-color: #28a745;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        a:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="background-container">
        <img src="{{ asset('images/bg2.jpg') }}" alt="Background" class="background-image">
    </div>
    <div class="content">
        <h1>Weather for {{ $city }}</h1>

        <ul>
            <li>Temperature: {{ $weatherData['main']['temp'] }}°C</li>
            <li>Weather: {{ $weatherData['weather'][0]['description'] }}</li>
            <li>Humidity: {{ $weatherData['main']['humidity'] }}%</li>
            <li>Wind Speed: {{ $weatherData['wind']['speed'] }} m/s</li>
        </ul>

        <a href="{{ route('weatherForm') }}">Search Another City</a>
    </div>
</body>
</html>
