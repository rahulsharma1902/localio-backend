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
<div class="nk-block nk-block-lg">
    <div class="nk-block-head d-flex justify-content-between">
        <div class="nk-block-head-content">
            <h4 class="title nk-block-title">Expert Guide</h4>
        </div>
    </div>
    <div class="card card-bordered">
        <div class="card-inner">
            <form action="{{ route('expertGuide.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Title Field -->
                <div>
                    <div>
                        <label for="title"><strong>Title</strong></label>

                        <input type="text" name="title" id="title" class="form-control"
                            value="{{ $expertGuide->title ?? '' }}" required>

                    </div>
                    <br>
                    <!-- Description Field -->
                    <div>
                        <label for="description"><strong>Description</strong></label>
                        <textarea name="description" id="description" class="form-control" value=""
                            required>{{ $expertGuide->description ?? '' }}</textarea>
                    </div>
                    <br>
                    <!-- Education Title Field -->
                    <div>
                        <label for="education_title"><strong>Education Title</strong></label>
                        <input type="text" name="education_title" id="education_title" class="form-control"
                            value="{{ $expertGuide->education_title ?? '' }}" required>
                    </div>
                    <br>
                    <!-- Education Description Field -->
                    <div>
                        <label for="education_description"><strong>Education Description</strong></label>
                        <textarea name="education_description" id="education_description" value="" class="form-control"
                            required>{{ $expertGuide->education_description ?? '' }}</textarea>
                    </div>
                    <br>
                    <div class="col-md-12">
                        <div class="card border">
                            <div class="card-header mt-3">
                            <strong> Education </strong>
                                <button type="button" class="btn btn-success btn-sm float-end"
                                    id="add-education-item">Add
                                    Item</button>
                            </div>
                            <div class="card-body">

                                <div class="form-group col-lg-12">
                                    <label class="form-label" for="image">Image</label>
                                    <div class="form-control-wrap">
                                        <input type="file" class="form-control" id="edu_image" />

                                    </div>
                                </div>

                                <div class="form-group col-lg-12">
                                    <label class="form-label" for="title">Title</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="edu_title"
                                            placeholder="Enter Here Title.." />

                                    </div>
                                </div>

                                <div class="form-group col-lg-12">
                                    <label class="form-label" for="description">Description</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control site_text_input" id="edu_desc"
                                            placeholder="Enter Here Description..." />

                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                    <br>
                    <div id="education-items-list" class="popular-items-container">
                        <!-- Popular items will be appended here -->
                    </div>
                    
                    <div id="education-items" class="popular-items-container">
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
                                        <tbody>
                                            @forelse ($pageTileTranslationEducation as $index => $pageTile)
                                            
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>
                                                    @if ( $pageTile->translations->first()->image)
                                                    <img src="{{ asset( $pageTile->translations->first()->image) }}"
                                                        alt="Item Image" style="width: 100px; height: auto;">
                                                    @else
                                                    No Image
                                                    @endif
                                                </td>
                                                <td>{{ $pageTile->translations->first()->title ?? 'No Title' }}</td>
                                                <td>{{ $pageTile->translations->first()->description ?? 'No Description' }}
                                                </td>
                                                <td>
                                                    <a class="btn btn-danger btn-sm"
                                                        href="{{ route('admin.page_tile_translation.delete', $pageTile->id) }}">Delete</a>
                                                </td>
                                                <td>
                                                    <button type="button"
                                                        class="btn btn-success btn-sm update-education-item"
                                                        data-id="{{ $pageTile->translations->first()->id }}"
                                                        data-title="{{ $pageTile->translations->first()->title }}"
                                                        data-des="{{ $pageTile->translations->first()->description }}"
                                                        data-image="{{ asset($pageTile->translations->first()->image) }}">Edit</button>
                                                </td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="5">No popular items available.</td>
                                            </tr>
                                            @endforelse
                                        </tbody>

                                    </table>
                                </div>


                                <div id="updated-item-details" class="mt-4" style="display: none;">
                                    <p><strong>Title:</strong></p>
                                    <input type="hidden" class="form-control" id="updated-es-id" name="ES[id]"
                                        value="{{ old('id', $pageTileTranslation->id ?? '') }}" />


                                    <input type="text" class="form-control" id="updated-es-title" name="ES[title]"
                                        value="{{ old('title', $pageTileTranslation->title ?? '') }}" />

                                    <p><strong>Description:</strong></p>
                                    <input type="text" class="form-control" id="updated-es-description"
                                        name="ES[description]"
                                        value="{{ old('description', $pageTileTranslation->description ?? '') }}" />


                                    <p><strong>Image:</strong></p>
                                    <img id="updated-es-image" style="width: 100px; height: auto;" />
                                    <input type="file" id="update-es-image-input" name="ES[image]" />

                                    <button type="button" id="save-es-button" style="display: none;">Save</button>
                                </div>
                            </div>
                        </div>
                        <br>
                        <!-- Smart Search Title -->
                        <div>
                            <label for="smart_search"><strong>Smart Search Title</strong></label>
                            <input type="text" name="smart_search" id="smart_search" class="form-control"
                                value="{{ $expertGuide->smart_search ?? '' }}" required>
                        </div>
                        <br>
                        <!-- Smart Search Description -->
                        <div>
                            <label for="smart_search_description"><strong>Smart Search Description</strong></label>
                            <textarea name="smart_search_description" id="smart_search_description" value=""
                                class="form-control"
                                required>{{ $expertGuide->smart_search_description ?? '' }}</textarea>
                        </div>
                        <br>
                        <!-- How To Check Email (CKEditor) -->
                        <div>
                            <label for="how_to_check_email"><strong>How To Check Email</strong></label>
                            <input type="text" name="how_to_check_email" id="how_to_check_email" class="form-control"
                                value="{{ $expertGuide->how_to_check_email ?? '' }}" required>
                        </div>
                        <br>
                        <!-- Overview -->
                        <div>
                            <label for="overview"><strong>Overview Heading</strong></label>
                            <input type="text" name="overview" id="overview" class="form-control"
                                value="{{ $expertGuide->overview ?? '' }}" required>
                        </div>
                        <br>
                        <div>
                            <label for="email_description"><strong>Email Description</strong></label>
                            <textarea name="email_description" id="email_description" class="description form-control"
                                value="" required>{{ $expertGuide->email_description ?? '' }}</textarea>
                        </div>
                        <br>
                        <!-- Webmail -->
                        <div>
                            <label for="webmail"><strong>Webmail</strong></label>
                            <input type="text" name="webmail" id="webmail" class="form-control"
                                value="{{ $expertGuide->webmail ?? '' }}" required>
                        </div>
                        <br>
                        <div>
                            <label for="webmail_description"><strong>webmail Description</strong></label>
                            <textarea name="webmail_description" id="webmail_description"
                                class="description form-control"

                                value="">{{ $expertGuide->webmail_description ?? '' }}</textarea>
                        </div>
                        <br>
                        <!-- Email Application -->
                        <div>
                            <label for="email_application"><strong>Email Application</strong></label>
                            <input type="text" name="email_application" id="email_application" class="form-control"
                                value="{{ $expertGuide->email_application ?? '' }}" required>
                        </div>
                        <br>
                        <div>
                            <label for="email_app_description"><strong>Email Application Description</strong></label>
                            <textarea name="email_app_description" id="email_app_description"
                                class="description form-control"
                                value="">{{ $expertGuide->email_app_description ?? '' }}</textarea>
                        </div>
                        <br>
                        <!-- IMAP and POP -->
                        <div>
                            <label for="imap"><strong>IMAP and POP</strong></label>
                            <input type="text" name="imap" id="imap" class="form-control"
                                value="{{ $expertGuide->imap ?? '' }}" required>
                        </div>
                        <br>
                        <div>
                            <label for="imap_pop"><strong>IMAP & POP Description</strong></label>
                            <textarea name="imap_pop" id="imap_pop"
                                class="description form-control">{{ $expertGuide->imap_pop ?? '' }}</textarea>

                                @error('description')
                                            <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                        </div>
                        
  <br>
                        </div>

                     
                        <!-- Submit Button -->
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary"><strong>Update</strong></button>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    </form>

   
    <script>
    $(document).ready(function() {
        let educationItems = [];

        $('#add-education-item').on('click', function() {
            const title = $('#edu_title').val();
            const description = $('#edu_desc').val();
            const imageInput = $('#edu_image')[0];
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
                    $('#education-items-list').append(itemCard);

                    const hiddenTitleInput = $(
                        '<input type="hidden" name="education_items[title][]" value="' + title +
                        '">');
                    const hiddenDescriptionInput = $(
                        '<input type="hidden" name="education_items[description][]" value="' +
                        description + '">');
                    const hiddenImageInput = $(
                        '<input type="hidden" name="education_items[image][]" value="' + e
                        .target
                        .result + '">');

                    $('#education-items-list').append(hiddenTitleInput, hiddenDescriptionInput,
                        hiddenImageInput);

                    educationItems.push({
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

        $('#education-items').on('click', '.update-education-item', function() {
            let itemId = $(this).data('id'); // Assuming each item-card has a data-id attribute
            console.log(itemId);
            let title = $(this).data('title');
            let description = $(this).data('des');
            let imageSrc = $(this).data('image');

            console.log(title, description);

            // Populate the form fields with current data
            $('#updated-es-id').val(itemId);
            $('#updated-es-title').val(title);
            $('#updated-es-description').val(description);
            console.log(imageSrc);

            $('#updated-es-image').attr('src', imageSrc);

            // Show the update form
            $('#updated-item-details').show();
            $('#save-es-button').show();
        });

        $('#save-es-button').on('click', function() {
            let itemId = $('#updated-es-id').val(); // Assuming you're saving the item ID in the form

            let title = $('#updated-es-title').val(); // Get updated title
            let description = $('#updated-es-description').val(); // Get updated description
            let imageFile = $('#update-es-image-input')[0].files[
            0]; // Get updated image source (base64 or URL)
            let formData = new FormData();
            formData.append('_token', $('meta[name="csrf-token"]').attr('content'));
            formData.append('id', itemId);
            formData.append('title', title);
            formData.append('des', description);

            if (imageFile) {
                formData.append('image', imageFile); // Append the image file
            }

            $.ajax({
                url: '{{ url("/admin/page-education-translation/update") }}',
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
            $('#update-es-image-input').on('change', function(event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function() {
                        $('#updated-es-image').attr('src', reader.result);
                    };
                    reader.readAsDataURL(file);
                }
            });

            // Update item in the array
            $('#save-es-button').on('click', function() {
                const updatedTitle = $('#updated-es-title').val().trim();
                const updatedDescription = $('#updated-es-description').val().trim();
                const updatedImage = $('#updated-es-image').attr('src');

                // Find the item in the array by ID and update it
            });

        });
        $('#education-items-list').on('click', '.remove-item', function() {
            const itemCard = $(this).closest('.item-card');
            const itemIndex = educationItems.findIndex(item => item.card[0] === itemCard[0]);

            if (itemIndex > -1) {
                educationItems[itemIndex].removed = true;
                itemCard.remove();
                educationItems[itemIndex].hiddenInputs.forEach(input => input.remove());
            }
        });

        function clearForm() {
            $('#edu_title, #edu_desc, #edu_image').val('');
        }
    });
    </script>
    @endsection