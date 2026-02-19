<option value="">Select an option…</option>
@foreach ($districts as $district)
    <option {{ old('district') == $district->id ? 'selected' : '' }} value="{{ $district->id }}">{{ $district->name }}</option>
@endforeach
