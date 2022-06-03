<x-app-layout>
  <x-slot name="header">{{$quiz->title}} Sonucu</x-slot>

  <div class="card">
    <div class="card-body">
      <p class="card-text">
        <h3>Puan : <strong>{{$quiz->my_result->point}}</strong> </h3>
        <div class="alert alert-warning">
          <i class="fa fa-circle">Verdiğin Cevap </i>
          <i class="fa fa-check text-success"> Doğru Cevap </i>
          <i class="fa fa-times text-danger">Yanlış Cevap </i>

        </div>

          @foreach ($quiz->questions as  $question)
            <small>Sorunun Başarı Oranı <b>%{{$question->true_percent}}</b></small>
            <br>
              @if($question->correct_answer == $question->my_answer->answer)
                <i class="fa fa-check text-success"></i>
              @else
                <i class="fa fa-times text-danger"></i>
                @endif
            <strong> # {{$loop->iteration}} </strong>
             {{$question->question}}
             @if($question->image)
             <img src="{{asset($question->image)}}" style="width:10%" class="img-responsive">
             @endif
            <div class="form-check">
              @if('answer1' == $question->correct_answer)
                <i class="fa fa-check text-success"></i>
              @elseif ('answer1' == $question->my_answer->answer)
                <i class="fa fa-circle"></i>
              @endif
              <label class="form-check-label" for="quiz{{$question->id}}1">
                {{$question->answer1}}
              </label>
            </div>
            <div class="form-check">
              @if('answer2' == $question->correct_answer)
                <i class="fa fa-check text-success"></i>
              @elseif ('answer2' == $question->my_answer->answer)
                <i class="fa fa-circle"></i>
              @endif
              <label class="form-check-label" for="quiz{{$question->id}}2">
                {{$question->answer2}}
              </label>
            </div>
            <div class="form-check">
              @if('answer3' == $question->correct_answer)
                <i class="fa fa-check text-success"></i>
              @elseif ('answer3' == $question->my_answer->answer)
                <i class="fa fa-circle"></i>
              @endif
              <label class="form-check-label" for="quiz{{$question->id}}3">
                {{$question->answer3}}
              </label>
            </div>
            <div class="form-check">
              @if('answer4' == $question->correct_answer)
                <i class="fa fa-check text-success"></i>
              @elseif ('answer4' == $question->my_answer->answer)
                <i class="fa fa-circle"></i>
              @endif
              <label class="form-check-label" for="quiz {{$question->id}}4">
                {{$question->answer4}}
              </label>
            </div>
            @if(!$loop->last)
            <hr>
          @endif
          @endforeach
          <br>

      </p>
    </div>
  </div>

</x-app-layout>
