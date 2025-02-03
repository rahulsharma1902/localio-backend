@extends('admin_layout.master')
@section('content')

@if(session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif
@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
<div id="update-message" style="display: none; color: green; font-weight: bold;"></div>

<div class="nk-block nk-block-lg">
    <div class="nk-block-head d-flex justify-content-between">
        <div class="nk-block-head-content">
            <h4 class="title nk-block-title">Who We Are</h4>
        </div>
    </div>
    <div class="card card-bordered">
        <div class="card-inner">
            <form action="{{ route('admin.who_we_are.update') }}" method="POST" enctype="multipart/form-data"
                class="form-validate">
                @csrf

                <div class="row g-3">
                    <!-- Main Heading -->
                    <div class="col-md-12">
                        <label class="form-label" for="main_heading">Main Heading</label>
                        <input type="text" class="form-control" id="main_heading" name="main_heading"
                            value="{{ $whoWeAre->main_heading ?? '' }}" />
                    </div>

                    <!-- Sub Heading -->
                    <div class="col-md-12">
                        <label class="form-label" for="sub_heading">Sub Heading</label>
                        <input type="text" class="form-control" id="sub_heading" name="sub_heading"
                            value="{{ $whoWeAre->sub_heading ?? '' }}" />
                    </div>

                    <!-- Background Top Image -->
                    <div class="col-md-12">
                        <label class="form-label" for="bg_top_img">Background Top Image</label>
                        <input type="file" class="form-control" id="bg_top_img" name="bg_top_img" />
                        @if(isset($whoWeAre->bg_top_img))
                        <img src="{{ asset($whoWeAre->bg_top_img) }}" alt="Background Top Image" class="mt-2"
                            style="width: 100px; height: auto;">
                        @endif
                    </div>
                    <div class="col-md-12">
                        <label class="form-label" for="top_left_section_img">Top left Section Image</label>
                        <input type="file" class="form-control" id="top_left_section_img" name="top_left_section_img" />
                        @if(isset($whoWeAre->top_left_section_img))
                        <img src="{{ asset($whoWeAre->top_left_section_img) }}" alt="Top left Section Image"
                            class="mt-2" style="width: 100px; height: auto;">
                        @endif
                    </div>

                    <!-- Top Right Section Image -->
                    <div class="col-md-12">
                        <label class="form-label" for="top_right_section_img">Top Right Section Image</label>
                        <input type="file" class="form-control" id="top_right_section_img"
                            name="top_right_section_img" />
                        @if(isset($whoWeAre->top_right_section_img))
                        <img src="{{ asset($whoWeAre->top_right_section_img) }}" alt="Top Right Section Image"
                            class="mt-2" style="width: 100px; height: auto;">
                        @endif
                    </div>

                    <!-- Middle Page Heading -->
                    <div class="col-md-12">
                        <label class="form-label" for="mp_heading">Middle Page Heading</label>
                        <input type="text" class="form-control" id="mp_heading" name="mp_heading"
                            value="{{ $whoWeAre->mp_heading ?? '' }}" />
                    </div>

                    <!-- Middle Page Sub Heading -->
                    <div class="col-md-12">
                        <label class="form-label" for="mp_sub_heading">Middle Page Sub Heading</label>
                        <input type="text" class="form-control" id="mp_sub_heading" name="mp_sub_heading"
                            value="{{ $whoWeAre->mp_sub_heading ?? '' }}" />
                    </div>

                    <!-- Top Card Title -->
                    <div class="col-md-12">
                        <label class="form-label" for="top_card_title">Top Card Title</label>
                        <input type="text" class="form-control" id="top_card_title" name="top_card_title"
                            value="{{ $whoWeAre->top_card_title ?? '' }}" />
                    </div>

                    <!-- Top Card Image -->
                    <div class="col-md-12">
                        <label class="form-label" for="top_card_image">Top Card Image</label>
                        <input type="file" class="form-control" id="top_card_image" name="top_card_image" />
                        @if(isset($whoWeAre->top_card_image))
                        <img src="{{ asset($whoWeAre->top_card_image) }}" alt="Top Card Image" class="mt-2"
                            style="width: 100px; height: auto;">
                        @endif
                    </div>

                    <!-- Top Card Description -->
                    <div class="col-md-12">
                        <label class="form-label" for="top_card_desc">Top Card Description</label>
                        <textarea class="form-control" id="top_card_desc"
                            name="top_card_desc">{{ $whoWeAre->top_card_desc ?? '' }}</textarea>
                    </div>

                    <div class="col-md-12">
                        <div class="card border">
                            <div class="card-header mt-3">
                                Most Popular Section
                                <button type="button" class="btn btn-success btn-sm float-end" id="add-popular-item">Add
                                    Item</button>
                            </div>
                            <div class="card-body">

                                <div class="form-group col-lg-12">
                                    <label class="form-label" for="image">Image</label>
                                    <div class="form-control-wrap">
                                        <input type="file" class="form-control" id="image" />

                                    </div>
                                </div>

                                <div class="form-group col-lg-12">
                                    <label class="form-label" for="title">Title</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="title"
                                            placeholder="Enter Here Title.." />

                                    </div>
                                </div>

                                <div class="form-group col-lg-12">
                                    <label class="form-label" for="description">Description</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control site_text_input" id="description"
                                            placeholder="Enter Here Description..." />

                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                    <div id="popular-items-list" class="popular-items-container">
                        <!-- Popular items will be appended here -->
                    </div>
                    <div id="popular-items" class="popular-items-container">
                        <div class="col-md-12 mt-4">
                            <div class="card border">
                                <div class="card-header">
                                    Most Popular Items
                                </div>
                                <div class="card-body">


                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Image</th>
                                                <th>Title</th>
                                                <th>Description</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($pageTileTranslationPopular as $index => $item)
                                            @foreach ($item->translations as $translation)
                                            <tr>
                                                <td>{{ $loop->parent->iteration}}</td>
                                                <td>
                                                    @if ($translation->image)
                                                    <img src="{{ asset($translation->image) }}" alt="Item Image"
                                                        style="width: 100px; height: auto;">
                                                    @else
                                                    N/A
                                                    @endif
                                                </td>
                                                <td>{{ $translation->title ?? 'No Title' }}</td>
                                                <td>{{ $translation->description ?? 'No Description' }}</td>
                                                <td>
                                                    <a class="btn btn-danger btn-sm"
                                                        href="{{ route('admin.page_tile_translation.delete', $item->id) }}">Delete</a>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-success btn-sm update-item"
                                                        data-id="{{ $translation->id }}"
                                                        data-title="{{ $translation->title }}"
                                                        data-des="{{ $translation->description }}"
                                                        data-image="{{ asset($translation->image) }}">Edit</button>
                                                </td>
                                                @endforeach
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="5">No popular items available.</td>
                                            </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div id="updated-item-details" class="mt-4" style="display: none;">
                            <p><strong>Title:</strong></p>
                            <input type="hidden" class="form-control" id="updated-id" name="MPS[id]"
                                value="{{ old('title', $item->title ?? '') }}" />
                            <input type="text" class="form-control" id="updated-title" name="MPS[title]"
                                value="{{ old('title', $item->title ?? '') }}" />

                            <p><strong>Description:</strong></p>
                            <input type="text" class="form-control" id="updated-description" name="MPS[description]"
                                value="{{ old('description', $item->description ?? '') }}" />


                            <p><strong>Image:</strong></p>
                            <img id="updated-image" style="width: 100px; height: auto;" />
                            <input type="file" id="update-image-input" name="MPS[image]" />

                            <button type="button" id="save-mps-button" style="display: none;">Save</button>
                        </div>
                    </div>

                </div>
<br>

                <!-- Specialists Heading -->
                <div class="col-md-12">
                    <label class="form-label" for="specialists_heading">Specialists Heading</label>
                    <input type="text" class="form-control" id="specialists_heading" name="specialists_heading"
                        value="{{ $whoWeAre->specialists_heading ?? '' }}" />
                </div>
                <div class="card border mt-3">
                    <div class="card-header">
                        Specialists Section
                        <button type="button" class="btn btn-success btn-sm float-end" id="add-specialists-item">Add
                            Item</button>
                    </div>
                    <div class="card-body">
                        <div class="form-group col-lg-12">
                            <label class="form-label" for="specialists_title">Title</label>
                            <input type="text" class="form-control" id="specialists_title" name="specialists_title[]"
                                placeholder="Enter Title">
                        </div>

                        <div class="form-group col-lg-12">
                            <label class="form-label" for="specialists_description">Description</label>
                            <input type="text" class="form-control" id="specialists_description"
                                name="specialists_description[]" placeholder="Enter Description">
                        </div>

                        <div class="form-group col-lg-12">
                            <label class="form-label" for="specialists_img">Image</label>
                            <input type="file" class="form-control" id="specialists_img" name="specialists_img[]">
                        </div>

                        <div class="form-group col-lg-12">
                            <label class="form-label" for="specialists_small_img">small Image</label>
                            <input type="file" class="form-control" id="specialists_small_img"
                                name="specialists_small_img[]">
                        </div>
                    </div>
                </div>

                <div id="specialists-items-list">
                    <!-- Specialists items will be appended here -->
                </div>
                <div id="specialist-items" class="specialist-items-container">
                
                <div class="col-md-12 mt-4">
                    <div class="card border">
                        <div class="card-header">
                            Specialists Section
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Image</th>
                                        <th>Small Image</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($specilistTileTranslation as $index => $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            @if ($item->translations->first()->img)
                                            <img src="{{ asset($item->translations->first()->img) }}" alt="Item Image"
                                                style="width: 100px; height: auto;">
                                            @else
                                            N/A
                                            @endif
                                        </td>
                                        <td>
                                            @if ($item->translations->first()->small_img)
                                            <img src="{{ asset($item->translations->first()->small_img) }}" alt="Item Image"
                                                style="width: 100px; height: auto;">
                                            @else
                                            N/A
                                            @endif
                                        </td>
                                        <td>{{ $item->translations->first()->title ?? 'No title' }}</td>
                                        <td>{{ $item->translations->first()->description ?? 'No Description' }}</td>
                                        <td>
                                            <!-- Delete Button -->
                                            <a class="btn btn-danger btn-sm"
                                                href="{{ route('admin.page_tile_translation.delete', $item->id) }}">Delete</a>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-success btn-sm update-specialist-item"
                                                data-id="{{ $item->translations->first()->id }}"
                                                data-title="{{ $item->translations->first()->title }}"
                                                data-desc="{{ $item->translations->first()->description }}"
                                                data-img="{{ asset( $item->translations->first()->img ) }}" 
                                                data-small_img="{{ asset($item->translations->first()->small_img) }}">Edit</button>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="5" class="text-center">No popular items found.</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
              
                    <div id="updated-special-details" class="mt-4" style="display: none;">
                        <p><strong>Title:</strong></p>
                        <input type="hidden" class="form-control" id="updated-s-id" name="SS[id]"
                            value="{{ old('title', $item->translations->first()->title ?? '') }}" />
                        <input type="text" class="form-control" id="updated-s-title" name="SS[title]"
                            value="{{ old('title', $item->translations->first()->title ?? '') }}" />

                        <p><strong>Description:</strong></p>
                        <input type="text" class="form-control" id="updated-s-description" name="MPS[description]"
                            value="{{ old('description', $item->translations->first()->description ?? '') }}" />


                        <p><strong>Image:</strong></p>
                        <img id="updated-s-image" style="width: 100px; height: auto;" />
                        <input type="file" id="update-special-image-input" name="SS[img]" />

                        <p><strong>small Image:</strong></p>
                        <img id="updated-small-image" style="width: 100px; height: auto;" />
                        <input type="file" id="update-small-image-input" name="SS[small_img]" />

                        <button type="button" id="save-ss-button" style="display: none;">Save</button>
                    </div>
                </div>
               
                 </br>

                <!-- Service Software Heading -->
                <div class="col-md-12">
                    <label class="form-label" for="ss_heading">Service Software Heading</label>
                    <input type="text" class="form-control" id="ss_heading" name="ss_heading"
                        value="{{ $whoWeAre->ss_heading ?? '' }}" />
                </div>

                <!-- Service Software Description -->
                <div class="col-md-12">
                    <label class="form-label" for="ss_sub_desc">Service Software Description</label>
                    <textarea class="form-control" id="ss_sub_desc"
                        name="ss_sub_desc">{{ $whoWeAre->ss_sub_desc ?? '' }}</textarea>
                </div>

                <!-- Portfolio Button Text -->
                <div class="col-md-12">
                    <label class="form-label" for="protfolio_btn">Portfolio Button Text</label>
                    <input type="text" class="form-control" id="protfolio_btn" name="protfolio_btn"
                        value="{{ $whoWeAre->protfolio_btn ?? '' }}" />
                </div>

                <!-- Status -->
                <div class="col-md-12">
                    <label class="form-label" for="status">Status</label>
                    <select class="form-control" id="status" name="status">
                        <option value="1" {{ $whoWeAre->status == 1 ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ $whoWeAre->status == 0 ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>
                </br>
                <!-- Submit Button -->
                <div class="col-md-12 mt-4">
                        <div class="form-group">
                            <button type="submit" class="addCategory btn btn-primary btn-localio text-center"><em
                                    class="icon ni ni-plus"></em><span>Update
                                    Content</span></button>
                        </div>
                    </div>
                </div>
        </div>
        </form>
    </div>
</div>
</div>
<script>
$(document).ready(function() {
    let addedItems = [];

    $('#add-popular-item').on('click', function() {
        const title = $('#title').val();
        const description = $('#description').val();
        const imageInput = $('#image')[0];
        const imageFile = imageInput.files[0];

        if (title && description && imageFile) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const itemCard = $('<div class="item-card mt-2 p-2 border">');
                itemCard.html(`
                    <h5>${title}</h5>
                    <p>${description}</p>
                    <img src="${e.target.result}" alt="Image" style="width: 100px; height: auto;">
                    <button type="button" class="btn btn-danger btn-sm remove-item">Remove</button>
                `);
                const itemId = Date.now();
                $('#popular-items-list').append(itemCard);

                const hiddenTitleInput = $(
                    '<input type="hidden" name="popular_items[title][]" value="' + title + '">');
                const hiddenDescriptionInput = $(
                    '<input type="hidden" name="popular_items[description][]" value="' +
                    description + '">');
                const hiddenImageInput = $(
                    '<input type="hidden" name="popular_items[image][]" value="' + e.target
                    .result + '">');

                $('#popular-items-list').append(hiddenTitleInput, hiddenDescriptionInput,
                    hiddenImageInput);

                addedItems.push({
                    title: title,
                    description: description,
                    image: e.target.result,
                    card: itemCard,
                    hiddenInputs: [hiddenTitleInput, hiddenDescriptionInput,
                        hiddenImageInput
                    ]
                });

                clearForm();
            };
            reader.readAsDataURL(imageFile);
        } else {
            alert('Please fill in all fields and select an image.');
        }
    });

    $('#popular-items').on('click', '.update-item', function() {
        let itemId = $(this).data('id'); // Assuming each item-card has a data-id attribute

        let title = $(this).data('title');
        let description = $(this).data('des');
        let imageSrc = $(this).data('image');

        console.log(title, description);

        // Populate the form fields with current data
        $('#updated-id').val(itemId);
        $('#updated-title').val(title);
        $('#updated-description').val(description);
        $('#updated-image').attr('src', imageSrc);

        // Show the update form
        $('#updated-item-details').show();
        $('#save-mps-button').show();
    });

    $('#save-mps-button').on('click', function() {
        let itemId = $('#updated-id').val(); // Assuming you're saving the item ID in the form
        let title = $('#updated-title').val(); // Get updated title
        let description = $('#updated-description').val(); // Get updated description
        let imageFile = $('#update-image-input')[0].files[0]; // Get updated image source (base64 or URL)
        let formData = new FormData();
        formData.append('_token', $('meta[name="csrf-token"]').attr('content'));
        formData.append('id', itemId);
        formData.append('title', title);
        formData.append('des', description);

        if (imageFile) {
            formData.append('image', imageFile); // Append the image file
        }

        $.ajax({
            url: '{{ route("admin.page_tile_translation.update") }}',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                alert(response.success);
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error:', status, error);
                console.log(xhr.responseText); // Log the full error response
                alert('There was an error updating the popular item.');
            }
        });

        // Handle file input change for image preview
        $('#update-image-input').on('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function() {
                    $('#updated-image').attr('src', reader.result);
                };
                reader.readAsDataURL(file);
            }
        });

        // Update item in the array
        $('#save-button').on('click', function() {
            const updatedTitle = $('#updated-title').val().trim();
            const updatedDescription = $('#updated-description').val().trim();
            const updatedImage = $('#updated-image').attr('src');

            // Find the item in the array by ID and update it
        });

    });

    $('#popular-items-list').on('click', '.remove-item', function() {
        const itemCard = $(this).closest('.item-card');
        const itemIndex = addedItems.findIndex(item => item.card[0] === itemCard[0]);

        if (itemIndex > -1) {
            addedItems[itemIndex].removed = true;
            itemCard.remove();
            addedItems[itemIndex].hiddenInputs.forEach(input => input.remove());
        }
    });

    function clearForm() {
        $('#title, #description, #image').val('');
    }

    // Add specialists item logic
    let addedSpecialistsItems = [];

    $('#add-specialists-item').on('click', function() {
        const title = $('#specialists_title').val();
        const description = $('#specialists_description').val();
        const imgFile = $('#specialists_img')[0].files[0];
        const smallImgFile = $('#specialists_small_img')[0].files[0];

        if (title && description && imgFile && smallImgFile) {
            const reader1 = new FileReader();
            const reader2 = new FileReader();

            reader1.onload = function(e) {
                const imgFileData = e.target.result;
                reader2.onload = function(e) {
                    const smallImgFileData = e.target.result;
                    const itemCard = $('<div class="item-card mt-2 p-2 border">');
                    itemCard.html(`
                        <h5>${title}</h5>
                        <p>${description}</p>
                        <img src="${imgFileData}" alt="Image 1" style="width: 100px; height: auto;">
                        <img src="${smallImgFileData}" alt="Image 2" style="width: 100px; height: auto;">
                        <button type="button" class="btn btn-danger btn-sm remove-item">Remove</button>
                    `);
                    $('#specialists-items-list').append(itemCard);

                    const hiddenTitleInput = $(
                        '<input type="hidden" name="specialists_items[title][]" value="' +
                        title + '">');
                    const hiddenDescriptionInput = $(
                        '<input type="hidden" name="specialists_items[description][]" value="' +
                        description + '">');
                    const hiddenImageInput1 = $(
                        '<input type="hidden" name="specialists_items[img][]" value="' +
                        imgFileData + '">');
                    const hiddenImageInput2 = $(
                        '<input type="hidden" name="specialists_items[small_img][]" value="' +
                        smallImgFileData + '">');

                    $('#specialists-items-list').append(hiddenTitleInput,
                        hiddenDescriptionInput, hiddenImageInput1,
                        hiddenImageInput2);

                    addedSpecialistsItems.push({
                        title: title,
                        description: description,
                        image1: imgFileData,
                        image2: smallImgFileData,
                        card: itemCard,
                        hiddenInputs: [hiddenTitleInput,
                            hiddenDescriptionInput, hiddenImageInput1,
                            hiddenImageInput2
                        ]
                    });

                    clearForm();
                };
                reader2.readAsDataURL(smallImgFile);
            };
            reader1.readAsDataURL(imgFile);
        } else {
            alert('Please fill in all fields and select both images.');
        }
    });

    $('#specialist-items').on('click', '.update-specialist-item', function() {
        let itemId = $(this).data('id'); // Assuming each item-card has a data-id attribute
        console.log(itemId); 
        let title = $(this).data('title');
        let description = $(this).data('desc');
        let imageSrc1 = $(this).data('img');
        let imageSrc2 = $(this).data('small_img');

        console.log(title, description);

        // Populate the form fields with current data
        $('#updated-s-id').val(itemId);
        $('#updated-s-title').val(title);
        $('#updated-s-description').val(description);
        console.log(imageSrc1);
        console.log(imageSrc2); 
        $('#updated-s-image').attr('src', imageSrc1);
        $('#updated-small-image').attr('src', imageSrc2);

        // Show the update form
        $('#updated-special-details').show();
        $('#save-ss-button').show();
    });

    $('#save-ss-button').on('click', function() {
        let itemId = $('#updated-s-id').val(); // Assuming you're saving the item ID in the form
        console.log(itemId)
        let title = $('#updated-s-title').val(); // Get updated title
        let description = $('#updated-s-description').val(); // Get updated description
        let imageFile1 = $('#update-special-image-input')[0].files[0]; // Get updated image source (base64 or URL)
        let imageFile2 = $('#update-small-image-input')[0].files[0]; // Get updated image source (base64 or URL)
        let formData1 = new FormData();
        formData1.append('_token', $('meta[name="csrf-token"]').attr('content'));
        formData1.append('id', itemId);
        formData1.append('title', title);
        formData1.append('desc', description);
        console.log(imageFile1)
        if (imageFile1) {
            formData1.append('img', imageFile1); // Append the image file
        }
        if (imageFile2) {
            formData1.append('small_img', imageFile2); // Append the image file
        }

        $.ajax({
            url: '{{ route("admin.page_tile_specialist_translation.update") }}',
            type: 'POST',
            data: formData1,
            processData: false,
            contentType: false,
            success: function(response) {
                if (response.success) {
            $('#update-message').text(response.msg).css('color', 'green').show();

            // Hide the message after 3 seconds
            setTimeout(function() {
                $('#update-message').fadeOut();
            }, 3000);
        } else {
            $('#update-message').text(response.msg).css('color', 'red').show();
        }
    },
    error: function(xhr, status, error) {
        $('#update-message').text('There was an error updating the item.').css('color', 'red').show();
    }
        });

        // Handle file input change for image preview
        $('#update-special-image-input').on('change', function(event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function() {
            $('#updated-s-image').attr('src', reader.result);
        };
        reader.readAsDataURL(file);
    }
  });

            $('#update-small-image-input').on('change', function(event) {
            const file = event.target.files[0];
            if (file) {
            const reader = new FileReader();
            reader.onload = function() {
            $('#updated-small-image').attr('src', reader.result);
             };
             reader.readAsDataURL(file);
              }
             });


        // Update item in the array
        $('#save-button').on('click', function() {
            const updatedTitle = $('#updated-s-title').val().trim();
            const updatedDescription = $('#updated-s-description').val().trim();
            const updatedImg = $('#updated-s-img').attr('src');
            const updatedSmallImg = $('#updated-small-image').attr('src');

            // Find the item in the array by ID and update it
        });

    });

    $('#specialists-items-list').on('click', '.remove-item', function() {
        const itemCard = $(this).closest('.item-card');
        const itemIndex = addedSpecialistsItems.findIndex(item => item.card[0] === itemCard[
            0]);

        if (itemIndex > -1) {
            addedSpecialistsItems[itemIndex].removed = true;
            itemCard.remove();
            addedSpecialistsItems[itemIndex].hiddenInputs.forEach(input => input.remove());
        }
    });

    function clearForm() {
        $('#specialists_title, #specialists_description, #specialists_img, #specialists_small_img')
            .val('');
    }
});

</script>

@endsection