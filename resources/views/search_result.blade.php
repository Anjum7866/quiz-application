   
@if (!$query)
        <p>No search query provided.</p>
@else

    @if ($subjects->count() > 0)
    <div class="sales-boxes">
        <div class="recent-sales box">
            <div class="title" >Subjects
            </div>
            @foreach ($subjects as $subject)
                <strong>Subject Name:</strong>
                <a href="{{ route('subjects.show', $subject->id) }}">    {{ $subject->name }}</a><br/>
                    <strong>Subject Description:</strong>    
                        {{$subject->detail}}   
            @endforeach                
        </div>
    </div>
    <br/><br/>
    @endif

    @if ($topics->count() > 0)
    <div class="sales-boxes">
        <div class="recent-sales box">
            <div class="title" >Topics
            </div>
            @foreach ($topics as $topic)
                <strong>Topic Name:</strong>
                <a href="{{ route('topics.show', $topic->id) }}">    {{ $topic->name }}</a><br/>
                    <strong>Topic Description:</strong>    
                        {{$topic->description}}   
            @endforeach    
        
        </div>
    </div>
    <br/><br/>
    @endif

    @if ($quizzes->count() > 0)
    <div class="sales-boxes">
        <div class="recent-sales box">
            <div class="title" >Quizzes
            </div>
            @foreach ($quizzes as $quiz)
                <strong>Topic Name:</strong>
                <a href="{{ route('quizzes.show', $quiz->id) }}">    {{ $quiz->title }}</a><br/>
                    <strong>Topic Description:</strong>    
                        {{$quiz->description}}   
            @endforeach   
   
        </div>
    </div>
    <br/><br/>
    @endif

    
@endif

    @if ($subjects->count() === 0 && $topics->count() === 0 && $quizzes->count() === 0 && $questions->count() === 0)
        <p>No results found.</p>
    @endif
