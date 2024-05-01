@extends('admin.base')

@section('title', '行きたい施設を登録')
@section('css')

@endsection

@section('content')
<form action="{{ route('admin.plans.store') }}" method="POST" >
  @csrf
  @include('admin.plans.form-controls', ['readOnly' => false])
  <div class="form-group row">
    <div class="col-3">
      <a href="{{ route('admin.plans.index') }}" class="btn btn-secondary">一覧へ</a>
    </div>
    <div class="col-9 text-right">
      <button type="submit" class="btn btn-primary">登録</button>
    </div>
  </div>
</form>
@endsection

@section('script')

@endsection
