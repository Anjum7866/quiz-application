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
.btn-primary{
    background: #007BFF !important;
font-size: 1.3rem;
}
        /* Card Header */
        .card-header {
            font-size: 20px;
            font-weight: bold;
        }

        /* Card Content */
        .card-content {
            margin-top: 10px;
        }

        /* Card Footer */
        .card-footer {
            margin-top: 20px;
            text-align: right;
        }

        /* Button Styles (for Card Footer) */
        .btn {
            padding: 8px 12px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        p{
font-size:medium;
        }
        .option-box{
            width:480px;
        }
        @media (max-width:767px){
            .option-box{
            width:95%;
        }
        }
  </style>


        <div class="card-header">
      <strong>{{ $quiz->title }} Quiz</strong>
    </div>
    <div class="card-content">
                <form method="POST"  id="quizForm" data-quiz-id="{{ $quiz->id }}">
                    @csrf
                    @foreach ($quizQuestions as $key => $question)
                        <div class="question" id="question{{ $key + 1 }}" style="{{ $key === 0 ? '' : 'display: none' }}">
                            <p>Question {{ $key + 1 }} of {{ count($quizQuestions) }}: <br><br><strong>{{ $question->text }}</strong></p>
                            <div >
                                @foreach ($question->options as $option)
                                <div class="option-box">
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
                    <!-- <input type="submit"  class="btn btn-primary submit-btn" data-quiz-id="{{ $quiz->id }}" value="Submit Quiz" id="submitQuizButton" style="display: none"> -->

                    <button class="btn btn-primary submit-btn" type="button" data-quiz-id="{{ $quiz->id }}" id="submitQuizButton" style="display: none">Submit Quiz</button>
                </form>
        </div>
        
   
 <script>
   $(document).ready(function () {
    let currentQuestion = 1;
    const totalQuestions = {{ count($quizQuestions) }};

    $('.next-btn').click(function () {
        showNextQuestion();
    });

    function showNextQuestion() {
        $(`#question${currentQuestion}`).hide();
        currentQuestion++;

        if (currentQuestion <= totalQuestions) {
            $(`#question${currentQuestion}`).show();
        }

        if (currentQuestion === totalQuestions) {
            $('.next-btn').hide();
            $('.submit-btn').show();
        }
    }
});

    </script> 
