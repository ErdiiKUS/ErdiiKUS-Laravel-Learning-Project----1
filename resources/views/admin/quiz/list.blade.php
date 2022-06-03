<x-app-layout>
    <x-slot name="header">Quizler</x-slot>
    <div class="card">
      <div class="card-body">
        <h5 class="card-title float-right">
          <a href="{{route('quizzes.create')}}" class="btn btn-sm btn-primary"><i class='fa fa-plus'></i> Quiz Oluştur</a>
        </h5>
        <form action="" method="get">
          <div class="form-row">
            <div class="col-md-4">
              <input type="text" name="title"  placeholder="Quiz Adı" value="{{request()->get('title')}}" class="form-control">
            </div>
            <div class="col-md-4">
              <select class="form-control" onchange="this.form.submit()" name="status">
                <option value="">Durum Seçiniz</option>
                <option @if(request()->get('status')=='publis') selected @endif value="publis">Aktif</option>
                <option @if(request()->get('status')=='passive') selected @endif value="passive">Pasif</option>
                <option @if(request()->get('status')=='draft') selected @endif value="draft">Taslak</option>
              </select>
            </div>
            @if (request()->get('title') || request()->get('status'))
            <div class="col-md-2">
              <a href="{{route('quizzes.index')}}" class="btn btn-secondary btn-sm">Sırıfla</a>
            </div>
          @endif
          </div>
        </form>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th scope="col">Quiz</th>
              <th scope="col">Soru Sayısı</th>
              <th scope="col">Status</th>
              <th scope="col">Finish Date</th>
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
                  @if(!$quiz->finished_at)
                    <span class="badge btn-success">Aktif</span>
                  @elseif($quiz->finished_at>now())
                    <span class="badge btn-success">Aktif</span>
                  @else
                    <span class="badge bg-secondary">Tarihi Dolmuş</span>
                  @endif
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
                <a href="{{route('quizzes.details',$quiz->id)}}" class="btn btn-sm btn-secondary">
                  <i class="fa fa-info-circle"></i>
                </a>
                 <a href="{{route('questions.index',$quiz->id)}}" class="btn btn-sm btn-warning"><i class="fa fa-question"></i></a>
                 <a href="{{route('quizzes.edit',$quiz->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-pen"></i></a>
                 <a href="{{route('quizzes.destroy',$quiz->id)}}" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
              </td>
            </tr>
          @endforeach
          </tbody>
        </table>
        {{$quizzes->withQueryString()->links();}}
      </div>
    </div>
</x-app-layout>
