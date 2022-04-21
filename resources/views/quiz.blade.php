<x-app-layout>
    <x-slot name="header">{{$quiz->title}}</x-slot>

    <div class="card">
      <div class="card-body">
        <p class="card-text">
          <form class="" action="" method="post">


            @foreach ($quiz->questions as  $question)
               #{{$loop->iteration}} <strong> {{$question->question}}</strong>
               @if($question->image)
               <img src="{{asset($question->image)}}" style="width:10%" class="img-responsive">
               @endif
              <div class="form-check">
                <input class="form-check-input" type="radio" name="{{$question->id}}" id="quiz{{$question->id}}" value="{{$question->answer1}}" required>
                <label class="form-check-label" for="quiz{{$question->id}}1">
                  {{$question->answer1}}
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="{{$question->id}}" id="quiz{{$question->id}}" value="{{$question->answer2}}" required>
                <label class="form-check-label" for="quiz{{$question->id}}2">
                  {{$question->answer2}}
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="{{$question->id}}" id="quiz{{$question->id}}" value="{{$question->answer3}}" required>
                <label class="form-check-label" for="quiz{{$question->id}}3">
                  {{$question->answer3}}
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="{{$question->id}}" id="quiz{{$question->id}}" value="{{$question->answer4}}" required>
                <label class="form-check-label" for="quiz {{$question->id}}4">
                  {{$question->answer4}}
                </label>
              </div>
              @if(!$loop->last)
              <hr>
            @endif
            @endforeach
            <br>
            <button class="btn btn-success btn-sm btn-block" type="submit" name="button">Sınavı Bitir</button>

          </form>
        </p>
      </div>
    </div>

</x-app-layout>
