@extends('admin.base')

@section('title', '行きたい施設')
@section('subtitle', '一覧')
@section('css')

@endsection

@section('content')
<div>
  <div class="container">
    <div class="row">
      <div class="col text-right">
        <a href="{{ route('admin.plans.create') }}" class="btn btn-primary">新規</a>
      </div>
    </div>
  </div>
</div>
<div class="table-responsive">
  <p>{{ $plans->total() }}&nbsp;件</p>
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th>施設名</th>
        <th>都道府県</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($plans as $plan)
      <tr>
        <td>{{ $plan->name }}</td>
        <td>{{$plan->prefecture}}</td>
        <td>
          <button type="button" class="btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal" data-action="{{ route('admin.plans.destroy', ['plan' => $plan]) }}" data-text="{{ $plan->id . ':' . $plan->name }}">
            行った
          </button>
        </td>
      </tr>
    @endforeach
    </tbody>
  </table>
  {{ $plans->links() }}
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
            <span id="deleteTargetText"></span> この施設に行きましたか？
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
  $(function () {
    // Modal
    $('#deleteModal').on('show.bs.modal', function (event) {
      const button = $(event.relatedTarget);
      const modal = $(this);

      modal.find('#deleteTargetText').text(button.data('text'));
      modal.find('form').attr('action', button.data('action'));
    })
  });
</script>
@endsection
