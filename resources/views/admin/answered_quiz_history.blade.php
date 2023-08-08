  <title>Quiz History</title>
  @extends('admin.layout.master')
  
  @section('content')
    <div class="sales-boxes">
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
    @endsection
   