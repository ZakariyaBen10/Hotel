<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room Detail</title>
    <link rel="stylesheet" href="../assets/css/your-custom-styles.css">
    <style>
        body {
            font-family: 'Source Sans Pro', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .room-detail-container {
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin: 20px;
            border-radius: 8px;
        }

        .room-img {
            width: 100%;
            height: auto;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .room-title {
            font-size: 24px;
            color: #333;
            margin-bottom: 10px;
        }

        .room-text {
            color: #666;
            margin-bottom: 20px;
        }

        .details-container {
            align-items: center;
            margin-bottom: 10px;
        }

        .list-icon {
            width: 20px;
            height: 20px;
            margin-right: 10px;
        }

        .list-text {
            color: #555;
        }

        .amount-text {
            font-size: 20px;
            color: #007BFF;
            margin-bottom: 20px;
        }

        form {
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-top: 20px;
            border-radius: 8px;
        }

        h3 {
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-size: 16px;
            color: #333;
            display: block;
            margin-bottom: 5px;
        }

        input {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            background-color: #007BFF;
            color: #fff;
            padding: 12px 20px;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
@if(session()->has('message'))

<div class="alert alert-success">
<button type="button" class="close" data-dismiss="alert">
x
</button>

{{session()->get('message')}}
</div>

@endif

    <div class="room-detail-container">
        <img  src="/roomimage/{{$room->image}}" alt="" class="room-img">
        <h3 class="room-title">Room number: {{$room->roomNumber}}</h3>
        <p class="room-text">{{$room->description}}</p>
        <div>
            <div class="details-container">
                <img src="../assets/img/check-square.svg" alt="tick" class="list-icon">
                <p class="list-text">{{$room->persons}} Persons</p>
            </div>
            <div class="details-container">
                <img src="../assets/img/check-square.svg" alt="tick" class="list-icon">
                <p class="list-text">{{$room->classRoom}}</p>
            </div>
        </div>
        <p class="amount-text">{{$room->price}}€ Per Night</p>

        <!-- Booking Form -->
        <form action="{{url('reservation')}}" method="POST">
            @csrf 

            <h3>Book Now</h3>



            <div class="form-group">
              <label for="room_number">Room number:</label>
              <input type="text" id="room_number" name="room_number" value="{{ $room->roomNumber }}" readonly>
            </div>

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
            </div>

            <div class="form-group">
                <label for="phone">Phone Number:</label>
                <input type="tel" id="phone" name="phone" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="start_date">Check-in:</label>
                <input type="date" id="start_date" name="start_date" required>
            </div>

            <div class="form-group">
                <label for="end_date">Check-out:</label>
                <input type="date" id="end_date" name="end_date" required>
            </div>

            <button type="submit">Submit Booking</button>
        </form>
    </div>
    <script defer async src="./assets/js/your-custom-scripts.js"></script>
</body>
</html>
