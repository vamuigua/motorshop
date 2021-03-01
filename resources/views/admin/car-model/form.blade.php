<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Model Name' }}</label>
    <input class="form-control" name="name" type="text" id="name"
        value="{{ isset($carmodel->name) ? $carmodel->name : old('name')}}">
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('car_make_id') ? 'has-error' : ''}}">
    <label for="car_make_id" class="control-label">{{ 'Make' }}</label>
    <select name="car_make_id" class="form-control" id="car_make_id">
        @foreach ($car_makes as $car_make)
        <option value="{{ $car_make->id }}"
            {{ (isset($carmodel->name) && $carmodel->car_make_id == $car_make->id) ? 'selected' : ''}}>
            {{ $car_make->name }}
        </option>
        @endforeach
    </select>
    {!! $errors->first('car_make_id', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('year') ? 'has-error' : ''}}">
    <label for="year" class="control-label">{{ 'Year' }}</label>
    <input class="form-control" name="year" type="text" id="datepicker"
        value="{{ isset($carmodel->year) ? $carmodel->year : old('year')}}">
    {!! $errors->first('year', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>