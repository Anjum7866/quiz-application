<div class="sales-boxes">
        <div class="recent-sales box">
            <div class="title">{{ $topicWithQuizzes->name }} Quizzes</h2>
            <!-- @if(in_array(Auth::user()->role, ['admin', 'superadmin']))
                <div class="button"><a class="btn btn-primary" href="{{ route('topics.show', $topic->id) }}"> Back</a></div>
               @endif -->
           
            </div>

            <div class="sales-details">
                <div class="row">
         
                @if ($topicWithQuizzes->quizzes->isEmpty())
                    <p>No quizzes available </p><br>
                @else
               
                    @if (session()->has('score') && session()->has('totalQuestions') && session()->has('quizId'))
                        <p><strong>Results</strong></p><br/>
                        <p>Your score: {{ session('score') }}/{{ session('totalQuestions') }}</p><br>
                        <?php  $quizid= session('quizId'); ?>
                        <a class="btn btn-primary"href="{{ route('quiz.generate',$quizid)}}">Try Again</a>
                        <br>
                        @endif

                    
                @endif
                </div>
            </div>   
        </div>
</div>

