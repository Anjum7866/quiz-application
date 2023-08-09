  <title>Quiz History</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
    <style>
        .card{
        width:80%;
        margin:auto;
        font-size: medium !important;
        padding:2rem;
        }
    </style>
  @include('navbar')
    <div class="card">
        <div class="recent-sales box">
       <div class="title">Answered Quiz History</div>  
        <div class="sales-details">
            @if (count($QuizResult ) > 0)
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th> # </th>
                            <th>Quiz</th>
                            <th>Score</th>
                            <th>Time Taken</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $rowNumber = 1;
                        @endphp
                        @foreach ($QuizResult as $result)
                        <tr class="topic">
                            <td class="font-weight-medium"> {{$rowNumber}} </td>
                            <td>{{ $result->quiz->title }}</td>
                            <td>{{ $result->score }}/  {{ $result->quiz->questions->count() }}</td>
                            @if ($result->answered_at)
                            <?php
                            $answeredAt = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $result->answered_at);
                            $hoursAgo = $answeredAt->diffInHours(now());
                            ?>
                            <td><span class="timestamp">@if ($hoursAgo === 0) just now
                                @else
                                    {{ $hoursAgo }} hours ago
                                @endif
                            </span></td>
                            @else
                            <td><span class="timestamp">Unknown</span></td>
                            @endif
                        </tr>
                                @php
                                $rowNumber++;
                                @endphp
                                @endforeach

                    </tbody>
                </table>
            @else
            <p>No Quiz History found.</p>
            @endif         
            </div>
        </div>   
    </div>       
    