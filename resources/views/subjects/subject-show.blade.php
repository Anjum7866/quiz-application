<div class="sales-boxes">
        <div class="recent-sales box">
            <div class="title">{{ $quizName }} Quizzes</h2>
            <!-- @if(in_array(Auth::user()->role, ['admin', 'superadmin']))
                <div class="button"><a class="btn btn-primary" href="{{ route('subjects.show', $subject->id) }}"> Back</a></div>
               @endif -->
           
            </div>

            <div class="sales-details" >
                <div class="row"  id="quizResult">
         
                @if ($quizId)
                <p>Your score: {{ $score }}/{{ $totalQuestions }}</p>
                @php
                    $percentage = ($score / $totalQuestions) * 100;
                @endphp

                <p>Your percentage: {{ $percentage }}%</p>

                @if ($percentage == 100)
                    <p>You are perfect!</p>
                @elseif ($percentage >= 75)
                    <p>You're doing great!</p>
                @elseif ($percentage >= 50)
                    <p>You need to learn more.</p>
                    <a href='#' style="color:black;" class="try-again-button"  data-quiz-id="{{ $quizId }}"><strong>Try Again</strong></a>
             
                @else
                    <p>You need to work harder.</p>
                    <a href='#' style="color:black;" class="try-again-button"  data-quiz-id="{{ $quizId }}"><strong>Try Again</strong></a>
             
                @endif


                <a style="color:black" href="{{ route('certificate.download', ['subject' => $subjectId, 'score' =>$score, 'totalQuestions' => $totalQuestions]) }}"><strong>Download Certificate</strong></a>   
                @endif
                </div>
            </div>   
        </div>
</div>

