<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Model Name' }}</label>
    <input class="form-control" name="name" type="text" id="name" placeholder="e.g Note"
        value="{{ isset($carmodel->name) ? $carmodel->name : old('name')}}">
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('car_make_id') ? 'has-error' : ''}}">
    <label for="car_make_id" class="control-label">{{ 'Make' }}</label>
    {{-- Car Make Options Component --}}
    <car-make-options :carmodel="{{ $carmodel }}">
    </car-make-options>
    {!! $errors->first('car_make_id', '<p class="help-block">:message</p>') !!}
</div>

{{-- New Car Make Component --}}
<div class="new-car-make-modal">
    <new-car-make-modal>
        <new-car-make-modal />
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>