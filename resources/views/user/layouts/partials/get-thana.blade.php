<option value="">Select an option…</option>
@foreach ($thanas as $thana)
    <option {{ old('thana') == $thana->id ? 'selected' : '' }} value="{{ $thana->id }}">{{ $thana->name }}</option>
@endforeach
