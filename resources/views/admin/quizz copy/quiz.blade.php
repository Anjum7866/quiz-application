@extends('admin.layout.master')
<style>
.radiocontainer {
  background-color: #E7E9EB;
  display: block;
  position: relative;
  padding: 10px 10px 10px 50px;
  margin-bottom: 1px;
  cursor: pointer;
  font-size: 18px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
  word-wrap: break-word;
}
.checkmark {
  position: absolute;
  top: 15px;
  left: 15px;
  height: 19px;
  width: 19px !important;
  background-color: #fff;
  border-radius: 50%;
}
  </style>

@section('content')
<div class="sales-boxes">
    <div class="recent-sales box">
        <div class="title"><strong>{{ $quiz->title }} Quiz</strong></div>
        <div class="sales-details">
            <div class="row">
                <form method="post" action="{{ route('quiz.submit') }}" id="quizForm">
                    @csrf
                    @foreach ($quizQuestions as $key => $question)
                        <div class="question" id="question{{ $key + 1 }}" style="{{ $key === 0 ? '' : 'display: none' }}">
                            <p>Question {{ $key + 1 }} of {{ count($quizQuestions) }}: <br><br><strong>{{ $question->text }}</strong></p>
                            <div >
                                @foreach ($question->options as $option)
                                <div style="width:600px;">
                                    <label class="radiocontainer">
                                        <input type="radio" class="checkmark" name="answers[{{ $question->id }}]" value="{{ $option }}">
                                       <p style="margin-top: 10px;"> {{ $option->text }}<p>
                                    </label>
                                </div>
                                @endforeach
                            </div>
                            <br><br>
                        </div>
                    @endforeach
                    <button class="btn btn-primary next-btn" type="button">Next</button>
                    <button class="btn btn-primary submit-btn" type="submit" style="display: none">Submit Quiz</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        let currentQuestion = 1;
        const totalQuestions = {{ count($quizQuestions) }};

        document.querySelector('.next-btn').addEventListener('click', function () {
            showNextQuestion();
        });

        function showNextQuestion() {
            document.querySelector(`#question${currentQuestion}`).style.display = 'none';
            currentQuestion++;

            if (currentQuestion <= totalQuestions) {
                document.querySelector(`#question${currentQuestion}`).style.display = 'block';
            }

            if (currentQuestion === totalQuestions) {
                document.querySelector('.next-btn').style.display = 'none';
                document.querySelector('.submit-btn').style.display = 'block';
            }
        }
    });
</script>
@endsection
