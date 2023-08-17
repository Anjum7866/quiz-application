

<div class="sales-boxes">
        <div class="recent-sales box">
            <div class="title">{{ $quizName }} Quizzes</h2>
           
            </div>

            <div class="sales-details"  >
                <div class="row" id="quizResult">
         
                @if ($quizId)
                <p><strong>Results</strong></p><br/>
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
                            <a class="try-again-button" style="color:black"  data-quiz-id="{{ $quizId }}" href="#"><strong>Try Again</strong></a>
                
                        @else
                            <p>You need to work harder.</p>
                            <a class="try-again-button" style="color:black"  data-quiz-id="{{ $quizId }}" href="#"><strong>Try Again</strong></a>
                
                        @endif

                @endif
                </div>
            </div>   
        </div>
</div>

