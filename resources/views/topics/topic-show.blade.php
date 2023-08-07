

<div class="sales-boxes">
        <div class="recent-sales box">
            <div class="title">{{ $quizName }} Quizzes</h2>
            <!-- @if(in_array(Auth::user()->role, ['admin', 'superadmin']))
                <div class="button"><a class="btn btn-primary" href="{{ route('subjects.show', $subject->id) }}"> Back</a></div>
               @endif -->
           
            </div>

            <div class="sales-details"  id="quizResult">
                <div class="row">
         
                @if ($quizId)
                <p><strong>Results</strong></p><br/>
                        <p>Your score: {{ $score }}/{{ $totalQuestions }}</p><br>
                 <a class="btn btn-primary" data-quiz-id="{{ $quizId }}"href="{{ route('quiz.generate',$quizId)}}">Try Again</a>
                @endif
                </div>
            </div>   
        </div>
</div>

