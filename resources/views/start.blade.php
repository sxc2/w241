@extends('layouts.app')


@push('page-styles')
<script type="text/javascript">
    var max = 100;
    var numberquestions = 5;
    var variation = {{$variation}};

    var number1 = null;
    var number2 = null;
    var answer = null;

    var startTimeAll =  new Date($.now());
    var startTime = null;
    var endTime = null;

    var answers = [];
    var correct = 0;
    var total = 0;

    function getshortdate(dt) {
         return dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();
    }

    function calculateInput(newquestion) {
      var sign = $('#question-sign').text();

      if (sign == '+') {
        answer = number2 + number1;
      } else {
        answer = number2 * number1;  
      }

        var unit = {};
        unit['startTime'] = getshortdate(startTime);
        unit['endTime'] = getshortdate(new Date($.now()));
        unit['question'] = $('#question').text();
        unit['answer'] = $('#answer').val();

        if (answer == $('#answer').val()) {
            correct++;
        }

        total++;

        answers.push(unit);
        if (newquestion) {
          initializeInputTimers();
        }
    }

    function initializeInputTimers() {
      number1 = Math.floor(Math.random() * max) + 1;
      number2 = Math.floor(Math.random() * max) + 1;
      $('#question-sign').text('+');

      if (total >= (numberquestions - 2)) {
        number1 = Math.floor(Math.random() * 10) + 1;
        number2 = Math.floor(Math.random() * max) + 1;  
        $('#question-sign').text('*');
      }
        
      $('#number1').text(number1);
      $('#number2').text(number2);
      $('#answer').val("");
      startTime = new Date($.now());
      $('#submit').removeClass('disabled');
    }

    $(document).ready(function(){

        initializeInputTimers();

        $('#submit').click(function() {
            $('#submit').addClass('disabled');
            if (total < numberquestions) {
                calculateInput(true);
            } else {

                // push to db
                // you're done
                // cookie
                calculateInput(false);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: 'POST',
                    url: '/records_update',
                    data: {
                        answers: JSON.stringify(answers),
                        correct: correct,
                        total: total,
                        started_at: startTimeAll,
                        finished_at: new Date($.now()),
                        variation: variation,
                        test: 1
                    },
                    async: true,
                }).done(function(data, status, jqXHR) {
                  setTimeout("location.href = '/end';", 500);
                }).fail(function(jqXHR, status, err) {
                  console.log(status + " " + err);
                });
            }
        });
    });

</script>

@endpush

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if ($variation == 1)
                      <div class="alert alert-warning" role="alert">
                        90% of test taker answered all questions correctly.
                      </div>
                    @endif

                    <h1>
                        <div id="question" name="question"><span id="number1"></span> <span id="question-sign">+</span> <span id="number2"></span> = </div>
                        <div class="input-group mb-3">
                          <input type="number" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon2" id="answer" name="answer">
                          <div class="input-group-append">
                            <button class="btn btn-outline-secondary" id="submit" name="submit" type="button">Go</button>
                          </div>
                        </div>
                    </h1>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
