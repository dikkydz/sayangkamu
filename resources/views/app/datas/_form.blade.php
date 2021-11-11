<div class="form-group">
    <label for="registration_number">Registration Number</label>
    <input type="text" name="registration_number" id="registration_number" class="form-control @if ($errors->has('registration_number')) is-invalid @endif" @isset($data) value="{{$data->registration_number}}" @endisset>
    @if ($errors->has('registration_number')) <p class="invalid-feedback">{{ $errors->first('registration_number') }}</p> @endif
</div>

<div class="form-group">
    <label for="author">Author</label>
    <input type="text" name="author" id="author" class="form-control @if ($errors->has('author')) is-invalid @endif" @isset($data) value="{{$data->author}}" @endisset>
    @if ($errors->has('author')) <p class="invalid-feedback">{{ $errors->first('author') }}</p> @endif
</div>

<div class="form-group">
    <label for="address">Address</label>
    <input type="text" name="address" id="address" class="form-control @if ($errors->has('address')) is-invalid @endif" @isset($data) value="{{$data->address}}" @endisset>
    @if ($errors->has('address')) <p class="invalid-feedback">{{ $errors->first('address') }}</p> @endif
</div>

<div class="form-group">
    <label for="model">Model</label>
    <input type="text" name="model" id="model" class="form-control @if ($errors->has('model')) is-invalid @endif" @isset($data) value="{{$data->model}}" @endisset>
    @if ($errors->has('model')) <p class="invalid-feedback">{{ $errors->first('model') }}</p> @endif
</div>

<div class="form-group">
    <label for="type">Type</label>
    <input type="text" name="type" id="type" class="form-control @if ($errors->has('type')) is-invalid @endif" @isset($data) value="{{$data->type}}" @endisset>
    @if ($errors->has('type')) <p class="invalid-feedback">{{ $errors->first('type') }}</p> @endif
</div>

<div class="form-group">
    <label for="production_year">Production Year</label>
    <input type="text" name="production_year" id="production_year" class="form-control @if ($errors->has('production_year')) is-invalid @endif" @isset($data) value="{{$data->production_year}}" @endisset>
    @if ($errors->has('production_year')) <p class="invalid-feedback">{{ $errors->first('production_year') }}</p> @endif
</div>

<div class="form-group">
    <label for="silinder">Silinder</label>
    <input type="text" name="silinder" id="silinder" class="form-control @if ($errors->has('silinder')) is-invalid @endif" @isset($data) value="{{$data->silinder}}" @endisset>
    @if ($errors->has('silinder')) <p class="invalid-feedback">{{ $errors->first('silinder') }}</p> @endif
</div>

<div class="form-group">
    <label for="chassis_number">No. Rangka</label>
    <input type="text" name="chassis_number" id="chassis_number" class="form-control @if ($errors->has('chassis_number')) is-invalid @endif" @isset($data) value="{{$data->chassis_number}}" @endisset>
    @if ($errors->has('chassis_number')) <p class="invalid-feedback">{{ $errors->first('chassis_number') }}</p> @endif
</div>

<div class="form-group">
    <label for="engine_number">Engine Number</label>
    <input type="text" name="engine_number" id="engine_number" class="form-control @if ($errors->has('engine_number')) is-invalid @endif" @isset($data) value="{{$data->engine_number}}" @endisset>
    @if ($errors->has('engine_number')) <p class="invalid-feedback">{{ $errors->first('engine_number') }}</p> @endif
</div>

<div class="form-group">
    <label for="bpkb_number">BPKB Number</label>
    <input type="text" name="bpkb_number" id="bpkb_number" class="form-control @if ($errors->has('bpkb_number')) is-invalid @endif" @isset($data) value="{{$data->bpkb_number}}" @endisset>
    @if ($errors->has('bpkb_number')) <p class="invalid-feedback">{{ $errors->first('bpkb_number') }}</p> @endif
</div>

<div class="form-group">
    <label for="service_type">Service Type</label>
    <select name="service_type" id="service_type" class="form-control">
        <option value="PKB" @isset($data) @if ($data->service_type === 'PKB') selected @endif @endisset>PKB</option>
        <option value="BBNKB"  @isset($data) @if ($data->service_type === 'BBNKB') selected @endif @endisset>BBNKB</option>
    </select>
    @if ($errors->has('service_type')) <p class="invalid-feedback">{{ $errors->first('service_type') }}</p> @endif
</div>