<div class="form-group {{ $errors->has('car_make_id') ? 'has-error' : ''}}">
    <label for="car_make_id" class="control-label">{{ 'Car Make' }}</label>
    {{-- Car Make Options Component --}}
    <car-make-options :car_makes="updatedCarMakes" :carmodel="{{ $carModel }}">
    </car-make-options>
    {!! $errors->first('car_make_id', '<p class="help-block">:message</p>') !!}
</div>

{{-- New Car Make Component --}}
<div class="new-car-make-modal">
    <new-car-make-modal>
        <new-car-make-modal />
</div>

<div class="form-group {{ $errors->has('car_model_id') ? 'has-error' : ''}}">
    <label for="car_model_id" class="control-label">{{ 'Car Model' }}</label>
    <select name="car_model_id" class="form-control" id="car_model_id">
        @foreach ($carMakes as $carMake)
        @foreach ($carMake->carModels as $carModel)
        <option value="{{ $carModel->id }}"
            {{ (isset($car->car_model_id) && $car->car_model_id == $carModel->id) ? 'selected' : ''}}>
            {{ $carModel->name }}</option>
        @endforeach
        @endforeach
    </select>
</div>

<div class="form-group {{ $errors->has('year') ? 'has-error' : ''}}">
    <label for="year" class="control-label">{{ 'Year' }}</label>
    <input class="form-control" name="year" type="text" id="year"
        value="{{ isset($car->year) ? $car->year : old('year')}}">
    {!! $errors->first('year', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('mileage') ? 'has-error' : ''}}">
    <label for="mileage" class="control-label">{{ 'Mileage (km)' }}</label>
    <input class="form-control" name="mileage" type="number" id="mileage"
        value="{{ isset($car->mileage) ? $car->mileage : old('mileage')}}">
    {!! $errors->first('mileage', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('body_type') ? 'has-error' : ''}}">
    <label for="body_type" class="control-label">{{ 'Body Type' }}</label>
    <select name="body_type" class="form-control" id="body_type">
        @foreach ($car->bodyTypes() as $optionKey => $optionValue)
        <option value="{{ $optionKey }}"
            {{ (isset($car->body_type) && $car->body_type == $optionKey) ? 'selected' : ''}}>
            {{ $optionValue }}</option>
        @endforeach
    </select>
    {!! $errors->first('body_type', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('condition_type') ? 'has-error' : ''}}">
    <label for="condition_type" class="control-label">{{ 'Condition Type' }}</label>
    <select name="condition_type" class="form-control" id="condition_type">
        @foreach ($car->conditionTypes() as $optionKey => $optionValue)
        <option value="{{ $optionKey }}"
            {{ (isset($car->condition_type) && $car->condition_type == $optionKey) ? 'selected' : ''}}>
            {{ $optionValue }}</option>
        @endforeach
    </select>
    {!! $errors->first('condition_type', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('transmission_type') ? 'has-error' : ''}}">
    <label for="transmission_type" class="control-label">{{ 'Transmission Type' }}</label>
    <select name="transmission_type" class="form-control" id="transmission_type">
        @foreach ($car->transmissionTypes() as $optionKey => $optionValue)
        <option value="{{ $optionKey }}"
            {{ (isset($car->transmission_type) && $car->transmission_type == $optionKey) ? 'selected' : ''}}>
            {{ $optionValue }}</option>
        @endforeach
    </select>
    {!! $errors->first('transmission_type', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('price') ? 'has-error' : ''}}">
    <label for="price" class="control-label">{{ 'Price' }}</label>
    <input class="form-control" name="price" type="number" id="price"
        value="{{ isset($car->price) ? $car->price : old('price')}}">
    {!! $errors->first('price', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('duty') ? 'has-error' : ''}}">
    <label for="duty" class="control-label">{{ 'Duty' }}</label>
    <select name="duty" class="form-control" id="duty">
        @foreach ($car->dutyTypes() as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ (isset($car->duty) && $car->duty == $optionKey) ? 'selected' : ''}}>
            {{ $optionValue }}</option>
        @endforeach
    </select>
</div>

<div class="form-group {{ $errors->has('negotiable') ? 'has-error' : ''}}">
    <label for="negotiable" class="control-label">{{ 'Negotiable' }}</label>
    <div class="radio">
        <label><input name="negotiable" type="radio" value="1"
                {{ (isset($car) && 1 == $car->negotiable) ? 'checked' : '' }}> Yes</label>
    </div>
    <div class="radio">
        <label><input name="negotiable" type="radio" value="0" @if (isset($car))
                {{ (0 == $car->negotiable) ? 'checked' : '' }} @else {{ 'checked' }} @endif> No</label>
    </div>
    {!! $errors->first('negotiable', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('fuel_type') ? 'has-error' : ''}}">
    <label for="fuel_type" class="control-label">{{ 'Fuel Type' }}</label>
    <select name="fuel_type" class="form-control" id="fuel_type">
        @foreach ($car->fuelTypes() as $optionKey => $optionValue)
        <option value="{{ $optionKey }}"
            {{ (isset($car->fuel_type) && $car->fuel_type == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
        @endforeach
    </select>
    {!! $errors->first('fuel_type', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('interior_type') ? 'has-error' : ''}}">
    <label for="interior_type" class="control-label">{{ 'Interior Type' }}</label>
    <select name="interior_type" class="form-control" id="interior_type">
        @foreach ($car->interiorTypes() as $optionKey => $optionValue)
        <option value="{{ $optionKey }}"
            {{ (isset($car->interior_type) && $car->interior_type == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}
        </option>
        @endforeach
    </select>
    {!! $errors->first('interior_type', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('color_type') ? 'has-error' : ''}}">
    <label for="color_type" class="control-label">{{ 'Color Type' }}</label>
    <select name="color_type" class="form-control" id="color_type">
        @foreach ($car->colorTypes() as $optionKey => $optionValue)
        <option value="{{ $optionKey }}"
            {{ (isset($car->color_type) && $car->color_type == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}
        </option>
        @endforeach
    </select>
    {!! $errors->first('color_type', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('engine_size') ? 'has-error' : ''}}">
    <label for="engine_size" class="control-label">{{ 'Engine Size (cc)' }}</label>
    <input class="form-control" name="engine_size" type="number" id="engine_size"
        value="{{ isset($car->engine_size) ? $car->engine_size : old('engine_size')}}">
    {!! $errors->first('engine_size', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
    <label for="description" class="control-label">{{ 'Description' }}</label>
    <textarea class="form-control" rows="5" name="description" type="textarea"
        id="description">{{ isset($car->description) ? $car->description : old('description')}}</textarea>
    {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>