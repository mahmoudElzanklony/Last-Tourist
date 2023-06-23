<!-- Modal -->
<div class="modal fade" id="editCategoryModal{{ $service->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog mw-650px">
        <div class="modal-content">
            <!-- Modal content for editing the service -->
            <form class="editServiceForm" data-service-id="{{ $service->id }}">
                @csrf
                @method('PUT')

                <div class="modal-header pb-0 border-0 justify-content-end">
                    <!-- Close button -->
                </div>
                <div class="modal-body scroll-y mx-5 mx-xl-18 pt-0 pb-15">
                    <!-- Service edit form fields -->
                    <div class="mb-3">
                        <label for="edit_name">Name</label>
                        <input name="name" type="text" class="form-control" id="edit_name" placeholder="Name"
                            value="{{ $service->name }}">
                    </div>

                    <div class="mb-3">
                        <label for="edit_description">Description</label>
                        <textarea name="description" class="form-control" id="edit_description"
                            placeholder="Description">{{ $service->description }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="edit_price">Price</label>
                        <input name="price" type="number" class="form-control" id="edit_price" placeholder="Price"
                            value="{{ $service->price }}">
                    </div>

                    <div class="mb-3">
                        <label for="edit_category_id">Category</label>
                        <select name="category_id" class="form-control" id="edit_category_id">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ $category->id == $service->category_id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
