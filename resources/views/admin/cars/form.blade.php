<div class="row">
    {{-- Car Make --}}
    <div class="col-12 col-md-6">
        <div class="form-group {{ $errors->has('car_make_id') ? 'has-error' : ''}}">
            <label for="car_make_id" class="control-label">{{ 'Car Make' }}</label>
            {{-- Car Make Options Component --}}
            <car-make-options :carmodel="{{ $carModel }}">
            </car-make-options>
            {!! $errors->first('car_make_id', '<p class="help-block">:message</p>') !!}
        </div>


        {{-- Add car-make component --}}
        <div class="new-car-make-modal">
            <new-car-make-modal>
                <new-car-make-modal />
        </div>
    </div>
    {{-- Car Make end --}}

    {{-- Car Model --}}
    <div class="col-12 col-md-6">
        <div class="form-group {{ $errors->has('car_model_id') ? 'has-error' : ''}}">
            <label for="car_model_id" class="control-label">{{ 'Car Model' }}</label>
            {{-- Car Make Options Component --}}
            <car-model-options :car="{{ $car }}">
            </car-model-options>
        </div>
        {{-- Add car-model component --}}
        <div class="new-car-model-modal">
            <new-car-model-modal :carmodel="{{ $carModel }}">
                <new-car-model-modal />
        </div>
    </div>
    {{-- Car Model end --}}
</div>

<div class="row">
    {{-- Car Year --}}
    <div class="col-12 col-md-4">
        <div class="form-group {{ $errors->has('year') ? 'has-error' : ''}}">
            <label for="year" class="control-label">{{ 'Year' }}</label>
            <input class="form-control" name="year" type="text" id="datepicker" placeholder="e.g 2021"
                value="{{ isset($car->year) ? $car->year : old('year')}}">
            {!! $errors->first('year', '<p class="help-block">:message</p>') !!}
        </div>
    </div>

    {{-- Car Mileage --}}
    <div class="col-12 col-md-4">
        <div class="form-group {{ $errors->has('mileage') ? 'has-error' : ''}}">
            <label for="mileage" class="control-label">{{ 'Mileage (km)' }}</label>
            <input class="form-control" name="mileage" type="number" id="mileage" placeholder="e.g 12000"
                value="{{ isset($car->mileage) ? $car->mileage : old('mileage')}}">
            {!! $errors->first('mileage', '<p class="help-block">:message</p>') !!}
        </div>
    </div>

    {{-- Car Body Type --}}
    <div class="col-12 col-md-4">
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
    </div>
</div>

<div class="row">
    {{-- Car Condition Type --}}
    <div class="col-12 col-md-4">
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
    </div>

    {{-- Car Transmission Type --}}
    <div class="col-12 col-md-4">
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
    </div>

    {{-- Car Fuel Type --}}
    <div class="col-12 col-md-4">
        <div class="form-group {{ $errors->has('fuel_type') ? 'has-error' : ''}}">
            <label for="fuel_type" class="control-label">{{ 'Fuel Type' }}</label>
            <select name="fuel_type" class="form-control" id="fuel_type">
                @foreach ($car->fuelTypes() as $optionKey => $optionValue)
                <option value="{{ $optionKey }}"
                    {{ (isset($car->fuel_type) && $car->fuel_type == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}
                </option>
                @endforeach
            </select>
            {!! $errors->first('fuel_type', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="row">
    {{-- Car Price --}}
    <div class="col-12 col-md-4">
        <div class="form-group {{ $errors->has('price') ? 'has-error' : ''}}">
            <label for="price" class="control-label">{{ 'Price (KSH)' }}</label>
            <input class="form-control" name="price" type="number" id="price" placeholder="e.g 500000"
                value="{{ isset($car->price) ? $car->price : old('price')}}">
            {!! $errors->first('price', '<p class="help-block">:message</p>') !!}
        </div>
    </div>

    {{-- Car Duty --}}
    <div class="col-12 col-md-4">
        <div class="form-group {{ $errors->has('duty') ? 'has-error' : ''}}">
            <label for="duty" class="control-label">{{ 'Duty' }}</label>
            <select name="duty" class="form-control" id="duty">
                @foreach ($car->dutyTypes() as $optionKey => $optionValue)
                <option value="{{ $optionKey }}" {{ (isset($car->duty) && $car->duty == $optionKey) ? 'selected' : ''}}>
                    {{ $optionValue }}</option>
                @endforeach
            </select>
        </div>
    </div>

    {{-- Car Negotiability --}}
    <div class="col-12 col-md-4">
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
    </div>
</div>

<div class="row">
    {{-- Car Interior Type --}}
    <div class="col-12 col-md-4">
        <div class="form-group {{ $errors->has('interior_type') ? 'has-error' : ''}}">
            <label for="interior_type" class="control-label">{{ 'Interior Type' }}</label>
            <select name="interior_type" class="form-control" id="interior_type">
                @foreach ($car->interiorTypes() as $optionKey => $optionValue)
                <option value="{{ $optionKey }}"
                    {{ (isset($car->interior_type) && $car->interior_type == $optionKey) ? 'selected' : ''}}>
                    {{ $optionValue }}
                </option>
                @endforeach
            </select>
            {!! $errors->first('interior_type', '<p class="help-block">:message</p>') !!}
        </div>
    </div>

    {{-- Car Color Type --}}
    <div class="col-12 col-md-4">
        <div class="form-group {{ $errors->has('color_type') ? 'has-error' : ''}}">
            <label for="color_type" class="control-label">{{ 'Color Type' }}</label>
            <select name="color_type" class="form-control" id="color_type">
                @foreach ($car->colorTypes() as $optionKey => $optionValue)
                <option value="{{ $optionKey }}"
                    {{ (isset($car->color_type) && $car->color_type == $optionKey) ? 'selected' : ''}}>
                    {{ $optionValue }}
                </option>
                @endforeach
            </select>
            {!! $errors->first('color_type', '<p class="help-block">:message</p>') !!}
        </div>
    </div>

    {{-- Car Engine Size --}}
    <div class="col-12 col-md-4">
        <div class="form-group {{ $errors->has('engine_size') ? 'has-error' : ''}}">
            <label for="engine_size" class="control-label">{{ 'Engine Size (cc)' }}</label>
            <input class="form-control" name="engine_size" type="number" id="engine_size" placeholder="e.g 2500cc"
                value="{{ isset($car->engine_size) ? $car->engine_size : old('engine_size')}}">
            {!! $errors->first('engine_size', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

{{-- Car Description --}}
<div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
    <label for="description" class="control-label">{{ 'Description' }}</label>
    <textarea class="form-control" rows="5" name="description" type="textarea" placeholder="Vehicle's description..."
        id="description">{{ isset($car->description) ? $car->description : old('description')}}</textarea>
    {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
</div>

{{-- Vehicle Features --}}
<div class="form-group {{ $errors->has('features') ? 'has-error' : ''}}">
    <label for="features" class="control-label">{{ 'Vehicle Features' }}</label>
    <select name="features[]" class="form-control selectpicker" id="features" multiple data-live-search="true"
        data-actions-box="true" data-header="Select features of the car" data-dropup-auto="false">

        {{-- Common Vehicle Features --}}
        {{-- @foreach ($car->features as $carFeature) --}}
        <optgroup label="Common Vehicle Features">
            @foreach ($features as $feature)
            @if ($feature->type === 'Common')
            <option data-tokens="{{ $feature->type }}" value="{{ $feature->id }}" @if ($car->features)
                @foreach ($car->features as $item)
                {{ ($feature->id === $item->id) ? 'selected' : '' }}
                @endforeach
                @endif
                >
                {{ $feature->name }}
            </option>
            @endif
            @endforeach
        </optgroup>
        {{-- @endforeach --}}

        {{-- Extra Vehicle Features --}}
        <optgroup label="Extra Vehicle Features">
            @foreach ($features as $feature)
            @if ($feature->type === 'Extra')
            <option data-tokens="{{ $feature->type }}" value="{{ $feature->id }}" @if ($car->features)
                @foreach ($car->features as $item)
                {{ ($feature->id === $item->id) ? 'selected' : '' }}
                @endforeach
                @endif
                >
                {{ $feature->name }}
            </option>
            @endif
            @endforeach
        </optgroup>

        {{-- Uncommon Vehicle Features --}}
        <optgroup label="Uncommon Vehicle Features">
            @foreach ($features as $feature)
            @if ($feature->type === 'Uncommon')
            <option data-tokens="{{ $feature->type }}" value="{{ $feature->id }}" @if ($car->features)
                @foreach ($car->features as $item)
                {{ ($feature->id === $item->id) ? 'selected' : '' }}
                @endforeach
                @endif
                >
                {{ $feature->name }}
            </option>
            @endif
            @endforeach
        </optgroup>

    </select>
</div>

{{-- Car Images --}}
<div class="form-group {{ $errors->has('images') ? 'has-error' : ''}}">
    <label for=" images" class="control-label">{{ 'Vehicle Images' }}</label>
    <div class="needsclick dropzone" id="image-dropzone"></div>
    {!! $errors->first('images', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>

@section('scripts')
<script>
    var uploadedImageMap = {}
    Dropzone.options.imageDropzone = {
        url: '{{ route('cars.storeMedia') }}',
        maxFilesize: 2, // MB
        addRemoveLinks: true,
        resizeWidth: 650,
        acceptedFiles: 'image/jpeg,image/png,image/jpg',
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
        },
        success: function (file, response) {
            $('form').append('<input type="hidden" name="images[]" alt="'+ response.original_name +'" value="' + response.name + '">')
            uploadedImageMap[file.name] = response.name
        },
        removedfile: function (file) {
            file.previewElement.remove()
            var name = ''
            if (typeof file.file_name !== 'undefined') {
                name = file.file_name
            } else {
                name = uploadedImageMap[file.name]
            }
            $('form').find('input[name="images[]"][value="' + name + '"]').remove()
        },
        init: function () {
            @if(isset($car) && $car->images())
                var files = {!! json_encode($car->images()) !!}
                for (var i in files) {
                    var file = files[i]
                    this.options.addedfile.call(this, file)
                    file.previewElement.classList.add('dz-complete')
                    $('form').append('<input type="hidden" name="images[]" alt="'+ file.file_name +'" value="' + file.file_name + '">')
                }
            @endif
        }
    }
</script>
@endsection