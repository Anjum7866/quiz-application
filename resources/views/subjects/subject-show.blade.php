<style>
     a .certificate{
    color: #007bff !important; 
    text-decoration: none; 
    font-weight: bold!important; 
}

 a:hover {
    color: #0056b3 !important; 
    text-decoration: underline; 
}
    </style>
<div class="sales-boxes">
        <div class="recent-sales box">
            <div class="title"><strong>{{ $quizName }} Quizzes</strong></h2>
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


                <a class="certificate" style="color:007bff;"href="{{ route('certificate.download', ['subject' => $subjectId, 'score' =>$score, 'totalQuestions' => $totalQuestions]) }}">Download Certificate</a>   
                @endif
                </div>
            </div>   
        </div>
</div>

