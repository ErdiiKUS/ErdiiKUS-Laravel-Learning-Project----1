<x-app-layout>
    <x-slot name="header">{{$quiz->title}}</x-slot>

    <div class="card">
      <div class="card-body">


        <p class="card-text">
          <div class="row">
            <div class="col-md-4">
              <ul class="list-group">
                @if($quiz->my_rank)
                  <li class="list-group-item d-flex justify-content-between align-items-center">
                    Sıralama
                    <span class="badge btn-success badge-pill">{{$quiz->my_rank}}</span>
                  </li>


                @endif
                @if($quiz->my_result)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  Puan
                  <span class="badge btn-primary badge-pill">{{$quiz->my_result->point}}</span>
                </li>

                <li class="list-group-item d-flex justify-content-between align-items-center">
                  Doğru / Yanlış Sayısı
                  <div class="float-right">
                    <span class="badge btn-success badge-pill">{{$quiz->my_result->correct}} Doğru</span>
                    <span class="badge btn-danger badge-pill">{{$quiz->my_result->wrong}} Yanlış</span>
                  </div>
                </li>
                 @endif
                @if($quiz->finished_at)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  Son Katılım Tarihi
                  <span title="{{$quiz->finished_at}}" class="badge btn-info badge-pill">{{$quiz->finished_at->diffForHumans();}}</span>
                </li>
                @endif
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  Soru Sayısı
                  <span class="badge btn-secondary badge-pill">{{$quiz->questions_count}}</span>
                </li>
                @if($quiz->details)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  Katılımcı Sayısı
                  <span class="badge btn-primary badge-pill">{{$quiz->details['join_count']}}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  Ortalama Puan
                  <span class="badge btn-secondary badge-pill">{{$quiz->details['average']}}</span>
                </li>
              @endif
              </ul>
              @if(count($quiz->topTen) > 0)
              <div class="card mt-3">
                <div class="card-body">
                  <h5 class="card-title">İlk 10</h5>
                  <ul class="list-group">
                    @foreach ($quiz->topTen as $result)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      <strong>{{$loop->iteration}}.</strong>
                      <img class="h-8 w-8 rounded-full" src="{{$result->user->profile_photo_url}}">
                      <span @if(auth()->user()->id==$result->user_id)  class="text-success"  @endif>{{$result->user->name}}</span>
                      <span class="badge btn-success badge-pill">{{$result->point}}</span>
                    </li>
                    @endforeach
                  </ul>

                </div>

              </div>
            @endif


            </div>
            <div class="col-md-8">
              {{$quiz->description}}</p>

            @if($quiz->my_result)
            <a href="{{route('quiz.join',$quiz->slug)}}" class="btn btn-success btn-block btn-sm">Sunucu Görüntüle</a>
          @elseif($quiz->finished_at > now())
            <a href="{{route('quiz.join',$quiz->slug)}}" class="btn btn-primary btn-block btn-sm">Quiz'e Katıl</a>
            @endif
            </div>


          </div>

      </div>
    </div>

</x-app-layout>
