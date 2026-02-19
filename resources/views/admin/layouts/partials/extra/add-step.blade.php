<div id="removeStep{{ $i }}">
    <hr>
    <div class="d-flex justify-content-between align-items-center">
        <h5 class="card-title">Add Varient {{ $i }}</h5>
        <button class="btn btn-danger btn-sm removeButton" id="{{ $i }}" type="button"><i class="bi bi-trash"></i></button>
    </div>

    <div class="form-group mb-3">
        <label class="control-label pt-2" for="size">Size *</label>
        <input type="text" class="form-control" name="varient[{{ $i }}][size]" id="size"
            placeholder="Enter size" value="{{ old('varient'.$i.'size') }}" >
        @error('varient.*.size')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group mb-3">
        <label class="control-label pt-2" for="stock">Stock *</label>
        <input type="number" class="form-control" name="varient[{{ $i }}][stock]" id="stock"
            placeholder="Enter stock" value="{{ old('varient'.$i.'stock') }}" >
        @error('varient.*.stock')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
</div>
