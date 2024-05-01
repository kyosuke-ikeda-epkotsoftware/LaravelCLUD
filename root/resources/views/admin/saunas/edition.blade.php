<div class="form-group row">
  <label for="inputName" class="col-sm-2 col-form-label">施設名</label>
  <div class="col-sm-10">
    <input type="text" class="form-control @error('name') is-invalid @enderror" id="inputName" name="name" placeholder="施設名を入力してください。" value="{{ old('name', $sauna->name ?? '') }}"{{ $readOnly ? ' readonly="readonly"' : '' }}>
    @error('name')
    <div class="invalid-feedback">{{$message}}</div>
    @enderror
  </div>
</div>

<div class="form-group row">
<label for="inputBath" class="col-sm-2 col-form-label">水風呂</label>
<select name="bath" class="form-select form-select-lg mb-3" aria-label=".form-select-lg evaluation" >
  <option selected>{{$sauna->bath}}</option>
  <option value="☆">☆</option>
  <option value="☆☆">☆☆</option>
  <option value="☆☆☆">☆☆☆</option>
  <option value="☆☆☆☆">☆☆☆☆</option>
  <option value="☆☆☆☆☆">☆☆☆☆☆</option>
</select>
</div>

<div class="form-group row">
<label for="inputSauna" class="col-sm-2 col-form-label">サウナ</label>
<select name="sauna" class="form-select form-select-lg mb-3" aria-label=".form-select-lg evaluation">
  <option selected>{{$sauna->sauna}}</option>
  <option value="☆">☆</option>
  <option value="☆☆">☆☆</option>
  <option value="☆☆☆">☆☆☆</option>
  <option value="☆☆☆☆">☆☆☆☆</option>
  <option value="☆☆☆☆☆">☆☆☆☆☆</option>
</select>
</div>

<div class="form-group row">
<label for="inputOutdoor" class="col-sm-2 col-form-label">外気浴</label>
<select name="outdoor" class="form-select form-select-lg mb-3" aria-label=".form-select-lg evaluation">
  <option selected>{{$sauna->outdoor}}</option>
  <option value="☆">☆</option>
  <option value="☆☆">☆☆</option>
  <option value="☆☆☆">☆☆☆</option>
  <option value="☆☆☆☆">☆☆☆☆</option>
  <option value="☆☆☆☆☆">☆☆☆☆☆</option>
</select>
</div>

<div class="form-group row">
<label for="inputEvaluation" class="col-sm-2 col-form-label">総合評価</label>
<select name="evaluation" class="form-select form-select-lg mb-3" aria-label=".form-select-lg evaluation">
  <option selected>{{$sauna->evaluation}}</option>
  <option value="☆">☆</option>
  <option value="☆☆">☆☆</option>
  <option value="☆☆☆">☆☆☆</option>
  <option value="☆☆☆☆">☆☆☆☆</option>
  <option value="☆☆☆☆☆">☆☆☆☆☆</option>
</select>
</div>

<div class="form-group row">
  <label for="commentFormControlTextarea" class="form-label">コメント</label>
  <textarea name="comment" class="form-control" id="commentFormControlTextarea" rows="8">{{$sauna->comment}}</textarea>
</div>

<div class="form-group row">
  <h6><font color="red">※画像は更新確認画面で登録してください。</font></h6>
  <input type="file" class="form-control" id="inputGroupFile02" name="img_path" >
</div>