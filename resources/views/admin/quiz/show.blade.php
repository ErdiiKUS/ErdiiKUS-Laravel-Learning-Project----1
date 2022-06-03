<x-app-layout>
    <x-slot name="header">{{$quiz->title}}</x-slot>

    <div class="card">
      <div class="card-body">

        <h5 class="card-title float-right">
          <a href="{{route('quizzes.index')}}" class="btn btn-sm bt-primary"> <i class="fa fa-arrow-left"></i>Quizlere Dön </a>
        </h5>


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

              {{$quiz->description}}

              <table class="table table-bordered mt-3">
  <thead>
    <tr>
      <th scope="col">Ad Soyad</th>
      <th scope="col">Puan</th>
      <th scope="col">Doğru</th>
      <th scope="col">Yanlış </th>
    </tr>
  </thead>
  <tbody class="table-group-divider">
    @foreach ($quiz->results as $result)
    <tr>
      <td>{{$result->user->name}}</td>
      <td>{{$result->point}}</td>
      <td>{{$result->correct}}</td>
      <td>{{$result->wrong}}</td>

    </tr>
      @endforeach
    </tr>
  </tbody>
</table>


            </p>


            </div>


          </div>

      </div>
    </div>

</x-app-layout>
