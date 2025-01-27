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
                        <label class="form-label" for="top_lef  <img src="" alt=" Image" class="mt-2"
                            style="width: 100px; height: auto;">Top left Section Image</label>
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
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                @if ($item->translations->first() &&
                                                $item->translations->first()->image)
                                                <img src="{{ asset($item->translations->first()->image) }}"
                                                    alt="Item Image" style="width: 100px; height: auto;">
                                                @else
                                                N/A
                                                @endif
                                            </td>
                                            <td>{{ $item->translations->first()->title ?? 'No Title' }}</td>
                                            <td>{{ $item->translations->first()->description ?? 'No Description' }}</td>
                                            <td>
                                                <a class="btn btn-danger btn-sm"
                                                    href="{{ route('admin.page_tile_translation.delete', $item->id) }}">Delete</a>
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
                        </div>
                    </div>

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
                                <input type="text" class="form-control" id="specialists_title"
                                    name="specialists_title[]" placeholder="Enter Title">
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
                                                @if ($item->img)
                                                <img src="{{ asset($item->img) }}" alt="Item Image"
                                                    style="width: 100px; height: auto;">
                                                @else
                                                N/A
                                                @endif
                                            </td>
                                            <td>
                                                @if ($item->small_img)
                                                <img src="{{ asset($item->small_img) }}" alt="Item Image"
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

                    <!-- Submit Button -->
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
let addedItems = [];

// When you add an item to the list
document.getElementById('add-popular-item').addEventListener('click', function() {
    const title = document.getElementById('title').value;
    const description = document.getElementById('description').value;
    const imageInput = document.getElementById('image');
    const imageFile = imageInput.files[0];

    if (title && description && imageFile) {
        const reader = new FileReader();
        reader.onload = function(e) {
            // Create an item card
            const itemCard = document.createElement('div');
            itemCard.className = 'item-card mt-2 p-2 border';
            itemCard.innerHTML = `
                <h5>${title}</h5>
                <p>${description}</p>
                <img src="${e.target.result}" alt="Image" style="width: 100px; height: auto;">
                <button type="button" class="btn btn-danger btn-sm remove-item">Remove</button>
            `;
            document.getElementById('popular-items-list').appendChild(itemCard);

            // Create hidden inputs for the item
            const hiddenTitleInput = document.createElement('input');
            hiddenTitleInput.type = 'hidden';
            hiddenTitleInput.name = 'popular_items[title][]';
            hiddenTitleInput.value = title;

            const hiddenDescriptionInput = document.createElement('input');
            hiddenDescriptionInput.type = 'hidden';
            hiddenDescriptionInput.name = 'popular_items[description][]';
            hiddenDescriptionInput.value = description;

            const hiddenImageInput = document.createElement('input');
            hiddenImageInput.type = 'hidden';
            hiddenImageInput.name = 'popular_items[image][]';
            hiddenImageInput.value = e.target.result;

            // Append hidden inputs to the form
            document.getElementById('popular-items-list').appendChild(hiddenTitleInput);
            document.getElementById('popular-items-list').appendChild(hiddenDescriptionInput);
            document.getElementById('popular-items-list').appendChild(hiddenImageInput);

            // Add the item to the tracking array
            addedItems.push({
                title: title,
                description: description,
                image: e.target.result,
                card: itemCard,
                hiddenInputs: [hiddenTitleInput, hiddenDescriptionInput, hiddenImageInput]
            });

            clearForm();
        };
        reader.readAsDataURL(imageFile);
    } else {
        alert('Please fill in all fields and select an image.');
    }
});



// Remove item logic
document.getElementById('popular-items-list').addEventListener('click', function(e) {
    if (e.target.classList.contains('remove-item')) {
        const itemCard = e.target.closest('.item-card');
        // Find the index of the removed item
        const itemIndex = addedItems.findIndex(item => item.card === itemCard);

        if (itemIndex > -1) {
            // Mark the item as removed
            addedItems[itemIndex].removed = true;

            // Remove the item card and hidden inputs from the DOM
            itemCard.remove();
            addedItems[itemIndex].hiddenInputs.forEach(input => input.remove());
        }
    }
});

// Function to clear form inputs after adding an item
function clearForm() {
    document.getElementById('title').value = '';
    document.getElementById('description').value = '';
    document.getElementById('image').value = '';
}

// Before submitting the form, remove the hidden inputs of removed items
document.getElementById('popular-items-list').addEventListener('submit', function(e) {
    // e.preventDefault(); // Prevent form submission for testing purposes (remove this line in production)

    // Exclude removed items' hidden inputs from the form submission
    addedItems = addedItems.filter(item => !item.removed);

    // Clear the form of removed hidden inputs
    const allHiddenInputs = document.querySelectorAll('input[type="hidden"]');
    allHiddenInputs.forEach(input => input.remove());

    // Re-add only the valid (non-removed) hidden inputs
    addedItems.forEach(item => {
        document.getElementById('popular-items-list').appendChild(item.hiddenInputs[0]);
        document.getElementById('popular-items-list').appendChild(item.hiddenInputs[1]);
        document.getElementById('popular-items-list').appendChild(item.hiddenInputs[2]);
    });

    // Now, submit the form after updating the hidden inputs
    // Uncomment the following line when you're ready to submit the form
    // this.submit();
});
</script>


<script>
let addedSpecialistsItems = [];

document.getElementById('add-specialists-item').addEventListener('click', function() {
    const title = document.getElementById('specialists_title').value;
    const description = document.getElementById('specialists_description').value;
    const imgFile = document.getElementById('specialists_img').files[0];
    const smallImgFile = document.getElementById('specialists_small_img').files[0];

    if (title && description && imgFile && smallImgFile) {
        const reader1 = new FileReader();
        const reader2 = new FileReader();

        reader1.onload = function(e) {
            const imgFileData = e.target.result;

            reader2.onload = function(e) {
                const smallImgFileData = e.target.result;

                const itemCard = document.createElement('div');
                itemCard.className = 'item-card mt-2 p-2 border';
                itemCard.innerHTML = `
                    <h5>${title}</h5>
                    <p>${description}</p>
                    <img src="${imgFileData}" alt="Image 1" style="width: 100px; height: auto;">
                    <img src="${smallImgFileData}" alt="Image 2" style="width: 100px; height: auto;">
                    <button type="button" class="btn btn-danger btn-sm remove-item">Remove</button>
                `;

                document.getElementById('specialists-items-list').appendChild(itemCard);

                // Create hidden inputs for the item
                const hiddenTitleInput = document.createElement('input');
                hiddenTitleInput.type = 'hidden';
                hiddenTitleInput.name = 'specialists_items[title][]';
                hiddenTitleInput.value = title;

                const hiddenDescriptionInput = document.createElement('input');
                hiddenDescriptionInput.type = 'hidden';
                hiddenDescriptionInput.name = 'specialists_items[description][]';
                hiddenDescriptionInput.value = description;

                const hiddenImageInput1 = document.createElement('input');
                hiddenImageInput1.type = 'hidden';
                hiddenImageInput1.name = 'specialists_items[img][]';
                hiddenImageInput1.value = imgFileData;

                const hiddenImageInput2 = document.createElement('input');
                hiddenImageInput2.type = 'hidden';
                hiddenImageInput2.name = 'specialists_items[small_img][]';
                hiddenImageInput2.value = smallImgFileData;

                // Append hidden inputs to the list
                document.getElementById('specialists-items-list').appendChild(hiddenTitleInput);
                document.getElementById('specialists-items-list').appendChild(hiddenDescriptionInput);
                document.getElementById('specialists-items-list').appendChild(hiddenImageInput1);
                document.getElementById('specialists-items-list').appendChild(hiddenImageInput2);

                addedSpecialistsItems.push({
                    title: title,
                    description: description,
                    image1: imgFileData,
                    image2: smallImgFileData,
                    card: itemCard,
                    hiddenInputs: [hiddenTitleInput, hiddenDescriptionInput, hiddenImageInput1,
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

// Remove specialists item
document.getElementById('specialists-items-list').addEventListener('click', function(e) {
    if (e.target.classList.contains('remove-item')) {
        const itemCard = e.target.closest('.item-card');
        const itemIndex = addedSpecialistsItems.findIndex(item => item.card === itemCard);

        if (itemIndex > -1) {
            addedSpecialistsItems[itemIndex].removed = true;
            itemCard.remove();
            addedSpecialistsItems[itemIndex].hiddenInputs.forEach(input => input.remove());
        }
    }
});

// Clear form fields after adding item
function clearForm() {
    document.getElementById('specialists_title').value = '';
    document.getElementById('specialists_description').value = '';
    document.getElementById('specialists_img').value = '';
    document.getElementById('specialists_small_img').value = '';
}
</script>

@endsection