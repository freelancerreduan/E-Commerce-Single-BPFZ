@extends('admin.layouts.app_admin')
@section('styles')
    <style>
        .ck-editor__editable[role="textbox"] {
            min-height: 300px;
        }

        .ck .ck-sticky-panel .ck-sticky-panel__content_sticky {
            z-index: 99999 !important;
            margin-top: 0px;
        }

        @media only screen and (min-width: 320px) and (max-width: 768px) {

            .ck .ck-sticky-panel .ck-sticky-panel__content_sticky {
                margin-top: 0px;
            }
        }
    </style>
@endsection
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Product</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item">Product</li>
                    <li class="breadcrumb-item active">Edit Product</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section">

            <form method="POST" action="{{ route('product.update', $data->id) }}" enctype="multipart/form-data">
                @method('PATCH')
                <div class="row">
                    <div class="col-lg-8">

                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Edit Details</h5>
                                @csrf

                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="form-group mb-3">
                                    <label class="control-label pt-2" for="title">Title *</label>
                                    <input type="text" class="form-control" name="title" id="title"
                                        placeholder="Enter category name" value="{{ old('title') ?? $data->title }}" required>
                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group mb-3">
                                            <label class="control-label pt-2" for="category">Category *</label>
                                            <select name="category" id="category" class="form-control" required onchange="setSubCategory(this)">
                                                <option value="">Select Category</option>
                                                @foreach ($categories as $category)
                                                    <option {{ $category->id == $data->category_id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->category_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('category')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group mb-3">
                                            <label class="control-label pt-2" for="sub_category">Sub Category *</label>
                                            <select name="sub_category" id="sub_category" class="form-control" required >
                                                <option value="{{ $subCategory->id }}">{{ $subCategory->subcategory_name }}</option>
                                            </select>
                                            @error('sub_category')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="form-group mb-3">
                                            <label class="control-label pt-2" for="old_price">Old Price (Optional)</label>
                                            <input type="number" name="old_price" id="old_price"
                                                placeholder="Enter old price" class="form-control" value="{{ old('old_price') ?? $data->old_price }}">
                                            @error('old_price')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="form-group mb-3">
                                            <label class="control-label pt-2" for="price">Current Price *</label>
                                            <input type="number" name="price" id="price" placeholder="Enter price"
                                                class="form-control" required value="{{ old('price') ?? $data->price }}">
                                            @error('price')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="form-group mb-3">
                                            <label class="control-label pt-2" for="sku">Product SKU *</label>
                                            <input type="text" name="sku" id="sku" placeholder="Enter sku"
                                                class="form-control" required value="{{ old('sku') ?? $data->sku }}">
                                            @error('sku')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <label class="control-label pt-2" for="description">Product Description *</label>
                                    <textarea name="description" id="description" rows="5" class="form-control">{{ old('description') ?? $data->description }}</textarea>
                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label class="control-label pt-2" for="additional_info">Additional Info *</label>
                                    <textarea name="additional_info" id="additional_info" rows="5" class="form-control">{{ old('additional_info') ?? $data->additional_info }}</textarea>
                                    @error('additional_info')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Product Images</h5>
                                @csrf
                                <div class="form-group mb-3">
                                    <label class="control-label pt-2" for="thumbnails">Thumbnails *</label>
                                    <input type="file" class="form-control" name="thumbnails" id="thumbnails">
                                    @error('thumbnails')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                    <img src="{{ asset($data->thumbnails) }}" alt="" style="width: 80px;" class="m-2 border rounded p-1">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="control-label pt-2" for="featured_images[]">Featured Images *</label>
                                    <input type="file" class="form-control" name="featured_images[]"
                                        id="featured_images[]" multiple>
                                        @error('featured_images[]')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                    @foreach ($featureds as $image)
                                        <img src="{{ asset($image->featured_image) }}" alt="" style="width: 80px;" class="m-2 border rounded p-1">
                                    @endforeach
                                </div>


                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">

                                <div id="varient">
                                    <h5 class="card-title">Add Varient</h5>



                                    @if (old() && isset(old('varient')[0]) && count(old('varient')) > 0)
                                        @foreach (old('varient') as $key => $experience)
                                            <div id="removeStep{{ $key }}">
                                                <hr>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <h5 class="card-title">Add Varient</h5>

                                                    @if ($key != 0)
                                                        <button class="btn btn-danger btn-sm removeButton" id="{{ $key }}" type="button"><i class="bi bi-trash"></i></button>
                                                    @endif
                                                </div>

                                                <div class="form-group mb-3">
                                                    <label class="control-label pt-2" for="size">Size *</label>
                                                    <input type="text" class="form-control"
                                                        name="varient[{{ $key }}][size]" id="size"
                                                        placeholder="Enter size" value="{{ old('varient'.$key.'[size]') }}">
                                                    @error('varient'.$key.'size')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label class="control-label pt-2" for="stock">Stock *</label>
                                                    <input type="number" class="form-control"
                                                        name="varient[{{ $key }}][stock]" id="stock"
                                                        placeholder="Enter stock"
                                                        value="{{ old('varient'.$key.'[stock]') }}">
                                                    @error('varient'.$key.'stock')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        @if (isset($sizes) && count($sizes) > 0)
                                            @foreach ($sizes as $key2 => $size)
                                                <div id="removeStep{{ $key2 }}">
                                                    <hr>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <h5 class="card-title">Add Varient</h5>

                                                        @if ($key2 != 0)
                                                            <button class="btn btn-danger btn-sm removeButton" id="{{ $key2 }}" type="button"><i class="bi bi-trash"></i></button>
                                                        @endif
                                                    </div>

                                                    <div class="form-group mb-3">
                                                        <label class="control-label pt-2" for="size">Size *</label>
                                                        <input type="text" class="form-control"
                                                            name="varient[{{ $key2 }}][size]" id="size"
                                                            placeholder="Enter size" value="{{ old('varient'.$key2.'[size]') ?? $size->size }}">
                                                        @error('varient'.$key2.'size')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label class="control-label pt-2" for="stock">Stock *</label>
                                                        <input type="number" class="form-control"
                                                            name="varient[{{ $key2 }}][stock]" id="stock"
                                                            placeholder="Enter stock"
                                                            value="{{ old('varient'.$key2.'[stock]') ?? $size->stock }}">
                                                        @error('varient'.$key2.'stock')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="form-group mb-3">
                                                <label class="control-label pt-2" for="size">Size *</label>
                                                <input type="text" class="form-control" name="varient[0][size]"
                                                    id="size" placeholder="Enter size" value="{{ old('varient0size') }}">
                                                @error('varient.*.size')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group mb-3">
                                                <label class="control-label pt-2" for="stock">Stock *</label>
                                                <input type="number" class="form-control" name="varient[0][stock]"
                                                    id="stock" placeholder="Enter stock" value="{{ old('varient0stock') }}">
                                                @error('varient.*.stock')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        @endif
                                    @endif
                                </div>
                                <div class="text-center">
                                    <button class="btn btn-info" type="button" onclick="addStep()">+</button>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="text-center">
                        <button class="btn btn-success" type="submit">Save & Update</button>
                    </div>
                </div>
            </form>
        </section>
    </main>
@endsection
@section('scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.0/super-build/ckeditor.js"></script>
    <script>
        function setSubCategory(el){
            var catId = $(el).val();
            if (catId == '') {
                $('#sub_category').html(`
                <option value="">Select Category first </option>
                `);
            }
            $.ajax({
                type: 'POST',
                url: '{{ route('admin.getSubCategory') }}',
                data: {
                    catId: catId
                },
                success: function(data) {
                    $('#sub_category').html(data);
                },
            });
            // alert(catId);
        }
    </script>
    <script>
        var i = {{ old() ? count(old('varient'))-1 : (count($sizes)> 0 ? count($sizes)-1 : 1) }};

        function addStep() {
            i++;
            $.ajax({
                type: 'POST',
                url: '{{ route('admin.add.productVarient') }}',
                data: {
                    i: i
                },
                success: function(data) {
                    $('#varient').append(data);
                },
            });
        }
    </script>

    <script>
        $(document).on('click', '.removeButton', function() {
            var button_id = $(this).attr("id");
            $('#removeStep' + button_id + '').remove();
        });
    </script>
    <script>
        CKEDITOR.ClassicEditor.create(document.getElementById("description"), {
            toolbar: {
                items: [
                    'exportPDF', 'exportWord', '|',
                    'findAndReplace', 'selectAll', '|',
                    'heading', '|',
                    'bold', 'italic', 'strikethrough', 'underline', 'code', 'subscript', 'superscript',
                    'removeFormat', '|',
                    'bulletedList', 'numberedList', 'todoList', '|',
                    'outdent', 'indent', '|',
                    'undo', 'redo',
                    '-',
                    'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
                    'alignment', '|',
                    'link', 'insertImage', 'blockQuote', 'insertTable', 'mediaEmbed', 'codeBlock', 'htmlEmbed',
                    '|',
                    'specialCharacters', 'horizontalLine', 'pageBreak', '|',
                    'textPartLanguage', '|',
                    'sourceEditing'
                ],
                shouldNotGroupWhenFull: true
            },
            list: {
                properties: {
                    styles: true,
                    startIndex: true,
                    reversed: true
                }
            },
            heading: {
                options: [{
                        model: 'paragraph',
                        title: 'Paragraph',
                        class: 'ck-heading_paragraph'
                    },
                    {
                        model: 'heading1',
                        view: 'h1',
                        title: 'Heading 1',
                        class: 'ck-heading_heading1'
                    },
                    {
                        model: 'heading2',
                        view: 'h2',
                        title: 'Heading 2',
                        class: 'ck-heading_heading2'
                    },
                    {
                        model: 'heading3',
                        view: 'h3',
                        title: 'Heading 3',
                        class: 'ck-heading_heading3'
                    },
                    {
                        model: 'heading4',
                        view: 'h4',
                        title: 'Heading 4',
                        class: 'ck-heading_heading4'
                    },
                    {
                        model: 'heading5',
                        view: 'h5',
                        title: 'Heading 5',
                        class: 'ck-heading_heading5'
                    },
                    {
                        model: 'heading6',
                        view: 'h6',
                        title: 'Heading 6',
                        class: 'ck-heading_heading6'
                    }
                ]
            },
            placeholder: 'Enter description',
            fontFamily: {
                options: [
                    'default',
                    'Arial, Helvetica, sans-serif',
                    'Courier New, Courier, monospace',
                    'Georgia, serif',
                    'Lucida Sans Unicode, Lucida Grande, sans-serif',
                    'Tahoma, Geneva, sans-serif',
                    'Times New Roman, Times, serif',
                    'Trebuchet MS, Helvetica, sans-serif',
                    'Verdana, Geneva, sans-serif'
                ],
                supportAllValues: true
            },
            fontSize: {
                options: [10, 12, 14, 'default', 18, 20, 22],
                supportAllValues: true
            },
            htmlSupport: {
                allow: [{
                    name: /.*/,
                    attributes: true,
                    classes: true,
                    styles: true
                }]
            },
            htmlEmbed: {
                showPreviews: true
            },
            link: {
                decorators: {
                    addTargetToExternalLinks: true,
                    defaultProtocol: 'https://',
                    toggleDownloadable: {
                        mode: 'manual',
                        label: 'Downloadable',
                        attributes: {
                            download: 'file'
                        }
                    }
                }
            },
            mention: {
                feeds: [{
                    marker: '@',
                    feed: [
                        '@apple', '@bears', '@brownie', '@cake', '@cake', '@candy', '@canes',
                        '@chocolate', '@cookie', '@cotton', '@cream',
                        '@cupcake', '@danish', '@donut', '@dragée', '@fruitcake', '@gingerbread',
                        '@gummi', '@ice', '@jelly-o',
                        '@liquorice', '@macaroon', '@marzipan', '@oat', '@pie', '@plum', '@pudding',
                        '@sesame', '@snaps', '@soufflé',
                        '@sugar', '@sweet', '@topping', '@wafer'
                    ],
                    minimumCharacters: 1
                }]
            },
            removePlugins: [
                'CKBox',
                'CKFinder',
                'EasyImage',
                'RealTimeCollaborativeComments',
                'RealTimeCollaborativeTrackChanges',
                'RealTimeCollaborativeRevisionHistory',
                'PresenceList',
                'Comments',
                'TrackChanges',
                'TrackChangesData',
                'RevisionHistory',
                'Pagination',
                'WProofreader',
                'MathType'
            ]
        });
    </script>

<script>
    CKEDITOR.ClassicEditor.create(document.getElementById("additional_info"), {
        toolbar: {
            items: [
                'exportPDF', 'exportWord', '|',
                'findAndReplace', 'selectAll', '|',
                'heading', '|',
                'bold', 'italic', 'strikethrough', 'underline', 'code', 'subscript', 'superscript',
                'removeFormat', '|',
                'bulletedList', 'numberedList', 'todoList', '|',
                'outdent', 'indent', '|',
                'undo', 'redo',
                '-',
                'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
                'alignment', '|',
                'link', 'insertImage', 'blockQuote', 'insertTable', 'mediaEmbed', 'codeBlock', 'htmlEmbed',
                '|',
                'specialCharacters', 'horizontalLine', 'pageBreak', '|',
                'textPartLanguage', '|',
                'sourceEditing'
            ],
            shouldNotGroupWhenFull: true
        },
        list: {
            properties: {
                styles: true,
                startIndex: true,
                reversed: true
            }
        },
        heading: {
            options: [{
                    model: 'paragraph',
                    title: 'Paragraph',
                    class: 'ck-heading_paragraph'
                },
                {
                    model: 'heading1',
                    view: 'h1',
                    title: 'Heading 1',
                    class: 'ck-heading_heading1'
                },
                {
                    model: 'heading2',
                    view: 'h2',
                    title: 'Heading 2',
                    class: 'ck-heading_heading2'
                },
                {
                    model: 'heading3',
                    view: 'h3',
                    title: 'Heading 3',
                    class: 'ck-heading_heading3'
                },
                {
                    model: 'heading4',
                    view: 'h4',
                    title: 'Heading 4',
                    class: 'ck-heading_heading4'
                },
                {
                    model: 'heading5',
                    view: 'h5',
                    title: 'Heading 5',
                    class: 'ck-heading_heading5'
                },
                {
                    model: 'heading6',
                    view: 'h6',
                    title: 'Heading 6',
                    class: 'ck-heading_heading6'
                }
            ]
        },
        placeholder: 'Enter description',
        fontFamily: {
            options: [
                'default',
                'Arial, Helvetica, sans-serif',
                'Courier New, Courier, monospace',
                'Georgia, serif',
                'Lucida Sans Unicode, Lucida Grande, sans-serif',
                'Tahoma, Geneva, sans-serif',
                'Times New Roman, Times, serif',
                'Trebuchet MS, Helvetica, sans-serif',
                'Verdana, Geneva, sans-serif'
            ],
            supportAllValues: true
        },
        fontSize: {
            options: [10, 12, 14, 'default', 18, 20, 22],
            supportAllValues: true
        },
        htmlSupport: {
            allow: [{
                name: /.*/,
                attributes: true,
                classes: true,
                styles: true
            }]
        },
        htmlEmbed: {
            showPreviews: true
        },
        link: {
            decorators: {
                addTargetToExternalLinks: true,
                defaultProtocol: 'https://',
                toggleDownloadable: {
                    mode: 'manual',
                    label: 'Downloadable',
                    attributes: {
                        download: 'file'
                    }
                }
            }
        },
        mention: {
            feeds: [{
                marker: '@',
                feed: [
                    '@apple', '@bears', '@brownie', '@cake', '@cake', '@candy', '@canes',
                    '@chocolate', '@cookie', '@cotton', '@cream',
                    '@cupcake', '@danish', '@donut', '@dragée', '@fruitcake', '@gingerbread',
                    '@gummi', '@ice', '@jelly-o',
                    '@liquorice', '@macaroon', '@marzipan', '@oat', '@pie', '@plum', '@pudding',
                    '@sesame', '@snaps', '@soufflé',
                    '@sugar', '@sweet', '@topping', '@wafer'
                ],
                minimumCharacters: 1
            }]
        },
        removePlugins: [
            'CKBox',
            'CKFinder',
            'EasyImage',
            'RealTimeCollaborativeComments',
            'RealTimeCollaborativeTrackChanges',
            'RealTimeCollaborativeRevisionHistory',
            'PresenceList',
            'Comments',
            'TrackChanges',
            'TrackChangesData',
            'RevisionHistory',
            'Pagination',
            'WProofreader',
            'MathType'
        ]
    });
</script>
@endsection
