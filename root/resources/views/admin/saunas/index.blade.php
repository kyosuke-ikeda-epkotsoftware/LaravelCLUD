@extends('admin.base')

@section('title', '行ったことある施設')
@section('css')

@endsection

@section('content')
<div>
  <div class="container">
    <div class="mt-5">
      <x-alert type="success" :session="session('success')" />
      <h4><span data-feather="smile"></span>こんにちは{{ Auth::user()->name }}さん</h4>
      <div class="row">
        <div class="col text-right">
          <a href="{{ route('admin.saunas.create') }}" class="btn btn-primary">新規</a>
          <div class="search-form">
            <form action="{{route('admin.saunas.search')}}" method="GET">
              @csrf
              <input type='text' name="keyword" />
              <input type="submit" value="検索" />
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="table-responsive">
    <p>{{ $saunas->total() }}&nbsp;件</p>
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th>施設名</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach ($saunas as $sauna)
        <tr>
          <td><a href="{{ route('admin.saunas.show', ['sauna' => $sauna]) }}">{{ $sauna->name }}</a></td>
          <td>
            <button type="button" class="btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal" data-action="{{ route('admin.saunas.destroy', ['sauna' => $sauna]) }}" data-text="{{ $sauna->id . ':' . $sauna->name }}">
              <span data-feather="trash"></span>
            </button>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    {{ $saunas->links() }}
    <!-- Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">削除確認</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="alert alert-danger" role="alert">
              <span id="deleteTargetText"></span> を削除してもよろしいですか？
            </div>
          </div>
          <div class="modal-footer">
            <form method="POST">
              @method('DELETE')
              @csrf
              <button type="submit" class="btn btn-danger">OK</button>
            </form>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">キャンセル</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection

  @section('script')
  <script>
    $(function() {
      // Modal
      $('#deleteModal').on('show.bs.modal', function(event) {
        const button = $(event.relatedTarget);
        const modal = $(this);

        modal.find('#deleteTargetText').text(button.data('text'));
        modal.find('form').attr('action', button.data('action'));
      })
    });
  </script>
  @endsection