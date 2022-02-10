<x-app-layout>
  <x-slot name="header">Quiz Oluştur</x-slot>
    <div class="card">
      <div class="card-body">
        <form action="{{route('quizzes.store') }}" method="post">
          @csrf
            <div class="form-group">
              <label>Quiz Başlığı</label>
              <input type="text" name="title" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Quiz Açıklama</label>
              <textarea name="desciptin" class="form-control" rows="4"></textarea>
            </div>
            <div class="form-group">
              <input id="isFinished" type="checkbox" >
              <label>Bitiş Tarihi Olacak Mı?</label>
            </div>
            <div id="finishedDate" style="display:none" class="form-group">
              <label>Bitiş Tarihi</label>
              <input type="datetime-local" name="finished_at" class="form-control">
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-success btn-sm btn-block form-control"> Quiz Oluştur </button>
            </div>
        </form>
      </div>
    </div>
    <x-slot name="js">
      <script>
        $('#isFinished').change(function(){
            if($('#isFinished').is(':checked')) {
              $('#finishedDate').show();
            }else {
              $('#finishedDate').hide();
            }
        });
      </script>
    </x-slot>
</x-app-layour>
