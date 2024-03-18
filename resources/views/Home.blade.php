<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="ie=edge" http-equiv="X-UA-Compatible">
        <link href="{{ asset("images/Student Club Logo.png") }}" rel="icon" type="image/png" />
        <link href="{{ asset("css/home.css") }}" rel="stylesheet">
        <link href="{{ asset("css/progressBars.css") }}" rel="stylesheet">
        <link href="{{ asset("css/bootstrap.min.css") }}" rel="stylesheet">
        {{-- <link href="{{ asset("css/progressCharts.css") }}" rel="stylesheet"> --}}
        <title>{{ env("APP_NAME") }}</title>
    </head>

    <body>
        <div class="body">
            <div class="first_part">
                @livewire("State")
                @livewire("Productivity")

            </div>
            <div class="rank">

                @livewire("homeRank")
            </div>

        </div>
        <script src="https://code.jquery.com/jquery-3.7.1.slim.js"></script>
    </body>

</html>
