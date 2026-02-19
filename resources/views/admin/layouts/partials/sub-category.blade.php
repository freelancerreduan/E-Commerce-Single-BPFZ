
@foreach ($subCategories as $category)
    <option {{ old('category') == $category->id ? 'selected' : '' }} value="{{ $category->id }}">
        {{ $category->subcategory_name }}
    </option>
@endforeach
