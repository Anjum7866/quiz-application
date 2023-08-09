<!DOCTYPE html>
<html>
<head>
    <title>Certificate of Completion</title>
    <style>
        @charset "UTF-8";

        @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;1,400&display=swap');

        body {
            margin: 0;
            padding: 0;
            color: black;
            font-family: 'Montserrat', sans-serif;
            font-size: 24px;
            text-align: center !important;
        }

        .container {
            border: 20px solid #E4B363;
            width: 750px;
            height: 563px;
            margin: 0 auto; /* Use margin to horizontally center the container */
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
        }

        .logo {
            color: #E4B363;
            font-size: 32px;
            font-weight: bold;
            margin-top: 20px;
            text-align:center;
        }

        .marquee {
            color: #E4B363;
            font-size: 48px;
            font-weight: bold;
            margin: 20px;
            text-align:center;
        }

        .assignment {
            margin: 20px;
            font-size: 28px;
            text-align:center;
        }

        .person {
            border-bottom: 2px solid #000;
            font-size: 32px;
            font-style: italic;
            margin: 20px auto;
            width: 400px;
        }

        .reason {
            margin: 20px;
            font-size: 28px;
            text-align:center;
        }

        .signature {
            font-size: 24px;
            margin-top: 50px;
            text-align: right;
            margin-right: 50px;
        }

        .signature span {
            border-bottom: 2px solid #000;
            padding-bottom: 5px;
        }

        .logo img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            border: 5px solid #E4B363;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo">
            TecnolynxGlobal
        </div>

        <div class="marquee">
            Certificate of Completion of {{$subject->name}}
        </div>

        <div class="assignment">
            This certificate is presented to
        </div>

        <div class="person">
        {{Auth::user()->name }}
           
           with Score:  {{$score}}/{{$totalQuestions}}
      </div>

        <div class="reason">
            @php
            $percentage = ($score / $totalQuestions) * 100;
                if ($percentage >= 90) {
                    $reason = "which is Excellent!";
                } elseif ($percentage >= 70) {
                    $reason = "which is Very good!";
                } elseif ($percentage >= 50) {
                    $reason = "which is Good!";
                } else {
                    $reason = "Keep practicing!";
                }
            @endphp
            {{ $reason }}
        </div>


        <div class="signature">
            <span>Geo</span><br><br>
            CEO, TecnolynxGlobal
        </div>
    </div>
</body>
</html>
