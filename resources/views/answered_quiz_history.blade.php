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
        @if (count($QuizResult) > 0)
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
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
                        @php
                        $answeredAt = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $result->answered_at);
                        $hoursAgo = $answeredAt->diffInHours(now());
                        @endphp
                        @if ($hoursAgo <= 72) {{-- Show results for the last 3 days --}}
                            <tr class="topic">
                                <td class="font-weight-medium">{{ $rowNumber }}</td>
                                <td>{{ $result->quiz->title }}</td>
                                <td>{{ $result->score }}/{{ $result->quiz->questions->count() }}</td>
                                <td>
                                    <span class="timestamp">
                                        @if ($hoursAgo === 0)
                                            just now
                                        @else
                                            {{ $hoursAgo }} hours ago
                                        @endif
                                    </span>
                                </td>
                            </tr>
                            @php
                            $rowNumber++;
                            @endphp
                        @endif
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No Quiz History found for last 3 days.</p>
        @endif
        </div>
       </div>   
    </div>       
    