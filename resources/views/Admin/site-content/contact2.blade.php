@extends('admin_layout.master')
@section('content')
<div class="nk-block nk-block-lg">
    <div class="nk-block-head d-flex justify-content-between">
        <div class="nk-block-head-content">
            <h4 class="title nk-block-title">Contact</h4>
        </div>
    </div>

    <div class="card card-bordered">
        <div class="card-inner">
            <div class="nk-block">
                <form action="{{ route('admin.page-contact-content.update') ?? '' }}" class="form-validate"
                    novalidate="novalidate" method="POST" enctype="multipart/form-data">
                    @csrf


                    <div class="card border">
                        <div class="card-header mt-3">
                            Contact page
                        </div>
                        <div class="card-body">

                            <div class="form-group col-lg-12">
                                <label class="form-label" for="contact_heading">Contact heading</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="contact_heading" name="contact_heading"
                                        value="{{ $contact->contact_heading ?? '' }}" />
                                </div>
                            </div>

                            <div class="form-group col-lg-12">
                                <label class="form-label" for="image_first">Image frist</label>
                                <div class="form-control-wrap">
                                    @if(isset($contact->image_first))
                                    <input type="file" class="form-control" id="image_first" name="image_first" />
                                    <img src="{{asset($contact->image_first)}}" alt="image_first" class="mt-2"
                                        style="width: 100px; height: auto;">
                                    @endif
                                </div>
                            </div>


                            <div class="form-group col-lg-12">
                                <label class="form-label" for="image_second">Image second</label>
                                <div class="form-control-wrap">
                                    @if(isset($contact->image_second))
                                    <input type="file" class="form-control" id="image_second" name="image_second" />
                                    <img src="{{asset($contact->image_second)}}" alt="image_second" class="mt-2"
                                        style="width: 100px; height: auto;">
                                    @endif
                                </div>
                            </div>

                            <div class="form-group col-lg-12">
                                <label class="form-label" for="footer_heading">Footer
                                    Heading</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="footer_heading" name="footer_heading"
                                        value="{{ $contact->footer_heading ?? '' }}" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="card border">
                                    <div class="card-header mt-3">
                                        Right Tools
                                        <button type="button" class="btn btn-success btn-sm float-end"
                                            id="add-Right-tool-item">Add
                                            Item</button>
                                    </div>
                                    <div class="card-body">

                                        <div class="form-group col-lg-12">
                                            <label class="form-label" for="image">Image</label>
                                            <div class="form-control-wrap">
                                                <input type="file" class="form-control" id="right_tool_image" />

                                            </div>
                                        </div>

                                        <div class="form-group col-lg-12">
                                            <label class="form-label" for="title">Title</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="right_tool_title"
                                                    placeholder="Enter Here Title.." />

                                            </div>
                                        </div>

                                        <div class="form-group col-lg-12">
                                            <label class="form-label" for="description">Description</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control site_text_input"
                                                    id="right_tool_description" placeholder="Enter Here Description..." />

                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                            <div id="right_tool_list" class="right-tools-container">
                                <!-- Popular items will be appended here -->
                            </div>
                            <div id="right_tool" class="right-tools-container">
                                <div class="col-md-12 mt-4">
                                    <div class="card border">
                                        <div class="card-header">
                                            Right Tools
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
                                                    @forelse ($pageTileTranslationRightTool as $index => $item)
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
                                                            <button type="button"
                                                                class="btn btn-success btn-sm update-rtt-item"
                                                                data-id="{{ $translation->id }}"
                                                                data-title="{{ $translation->title }}"
                                                                data-description="{{ $translation->description }}"
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

                                <div id="updated-rtt-item-details" class="mt-4" style="display: none;">
                                    <p><strong>Title:</strong></p>
                                    <input type="hidden" class="form-control" id="updated-rtt-id" name="RTT[id]"
                                        value="{{ old('title', $item->title ?? '') }}" />
                                    <input type="text" class="form-control" id="updated-rtt-title" name="RTT[title]"
                                        value="{{ old('title', $item->title ?? '') }}" />

                                    <p><strong>Description:</strong></p>
                                    <input type="text" class="form-control" id="updated-rtt-description"
                                        name="RTT[description]"
                                        value="{{ old('description', $item->description ?? '') }}" />


                                    <p><strong>Image:</strong></p>
                                    <img id="updated-rtt-image" style="width: 100px; height: auto;" />
                                    <input type="file" id="update-rtt-image-input" name="RTT[image]" />

                                    <button type="button" id="save-rtt-button" style="display: none;">Save</button>
                                </div>
                            </div>
                            <div class="form-group col-lg-12">
                                <label class="form-label" for="g_button">Get
                                    button</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="g_button" name="g_button"
                                        value="{{ $contact->g_button ?? '' }}" />
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-12 mt-4">
                        <div class="form-group">
                            <button class="addCategory btn btn-primary  text-center btn-localio"><em
                                    class=""></em><span>Update Content</span></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

<script>
$(document).ready(function() {
    let righttoolItems = [];

    $('#add-Right-tool-item').on('click', function() {
        const title = $('#right_tool_title').val();
        const description = $('#right_tool_description').val();
        const imageInput = $('#right_tool_image')[0];
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
                $('#right_tool_list').append(itemCard);

                const hiddenTitleInput = $(
                    '<input type="hidden" name="right_tool[title][]" value="' +
                    title +
                    '">');
                const hiddenDescriptionInput = $(
                    '<input type="hidden" name="right_tool[description][]" value="' +
                    description + '">');
                const hiddenImageInput = $(
                    '<input type="hidden" name="right_tool[image][]" value="' + e
                    .target
                    .result + '">');

                $('#right_tool_list').append(hiddenTitleInput, hiddenDescriptionInput,
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

    $('#right_tool').on('click', '.update-rtt-item', function() {
        let itemId = $(this).data('id'); // Assuming each item-card has a data-id attribute
        console.log(itemId);
        let title = $(this).data('title');
        let description = $(this).data('description');
        let imageSrc = $(this).data('image');

        console.log(title, description);

        // Populate the form fields with current data
        $('#updated-rtt-id').val(itemId);
        $('#updated-rtt-title').val(title);
        $('#updated-rtt-description').val(description);
        console.log(imageSrc);

        $('#updated-rtt-image').attr('src', imageSrc);

        // Show the update form
        $('#updated-rtt-item-details').show();
        $('#save-rtt-button').show();
    });

    $('#save-rtt-button').on('click', function() {
        let itemId = $('#updated-rtt-id')
            .val(); // Assuming you're saving the item ID in the form

        let title = $('#updated-rtt-title').val(); // Get updated title
        let description = $('#updated-rtt-description').val(); // Get updated description
        let imageFile = $('#update-rtt-image-input')[0].files[
            0]; // Get updated image source (base64 or URL)
        let formData = new FormData();
        formData.append('_token', $('meta[name="csrf-token"]').attr('content'));
        formData.append('id', itemId);
        formData.append('title', title);
        formData.append('description', description);

        if (imageFile) {
            formData.append('image', imageFile); // Append the image file
        }

        $.ajax({
            url: '{{ url("/admin/page-right-tool/update") }}',
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
        $('#update-rtt-image-input').on('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function() {
                    $('#updated-rtt-image').attr('src', reader.result);
                };
                reader.readAsDataURL(file);
            }
        });

        // Update item in the array
        $('#save-rtt-button').on('click', function() {
            const updatedTitle = $('#updated-rtt-title').val().trim();
            const updatedDescription = $('#updated-rtt-description').val().trim();
            const updatedImage = $('#updated-rtt-image').attr('src');

            // Find the item in the array by ID and update it
        });

    });
    $('#right_tool_list').on('click', '.remove-item', function() {
        const itemCard = $(this).closest('.item-card');
        const itemIndex = educationItems.findIndex(item => item.card[0] === itemCard[0]);

        if (itemIndex > -1) {
            educationItems[itemIndex].removed = true;
            itemCard.remove();
            educationItems[itemIndex].hiddenInputs.forEach(input => input.remove());
        }
    });

    function clearForm() {
        $('#right_tool_title, #right_tool_description, #right_tool_image').val('');
    }
});
</script>

@endsection
