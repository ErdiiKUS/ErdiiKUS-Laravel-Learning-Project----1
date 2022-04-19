<x-app-layout>
    <x-slot name="header">Quizler</x-slot>
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">
          <a href="{{route('quizzes.create')}}" class="btn btn-sm btn-primary"><i class='fa fa-plus'></i> Quiz Oluştur</a>
        </h5>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th scope="col">Quiz</th>
              <th scope="col">Soru Sayısı</th>
              <th scope="col">Status</th>
              <th scope="col">Finis Date</th>
              <th scope="col">Process</th>
            </tr>
          </thead>
          <tbody>
            @foreach( $quizzes as $quiz)
            <tr>
              <td>{{ $quiz->title }}</td>
              <th>{{ $quiz->questions_count }}</th>
              <td>
                @switch($quiz->status)
                  @case('publis')
                    <span class="badge btn-success">Aktif</span>
                  @break
                  @case('passive')
                    <span class="badge btn-danger">Pasif</span>
                  @break
                  @case('draft')
                    <span class="badge btn-warning">Taslak</span>
                  @break
                  @default

                @endswitch
              </td>
              <td>
                <span title="{{ $quiz->finished_at }}">
                  {{ $quiz->finished_at ? $quiz->finished_at->diffForHumans() : '-' }}
                </span>
              </td>
              <td>
                 <a href="{{route('questions.index',$quiz->id)}}" class="btn btn-sm btn-warning"><i class="fa fa-question"></i></a>
                 <a href="{{route('quizzes.edit',$quiz->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-pen"></i></a>
                 <a href="{{route('quizzes.destroy',$quiz->id)}}" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
              </td>
            </tr>
          @endforeach
          </tbody>
        </table>
        {{$quizzes->links();}}
      </div>
    </div>
</x-app-layout>
