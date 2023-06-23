
<div id="editCategoryModal{{ $category->id }}" class="modal fade" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Edit form fields here -->
                <form id="editCategoryForm{{ $category->id }}">
                    <div class="mb-3">
                        <label for="edit-category-name{{ $category->id }}" class="form-label">Name</label>
                        <input type="text" id="edit-category-name{{ $category->id }}" class="form-control" value="{{ $category->name }}">
                    </div>
                    <div class="mb-3">
                        <label for="edit-category-photo{{ $category->id }}" class="form-label">Current Photo</label>
                        <div class="d-flex align-items-center">
                            <img src="{{ asset("images/category/$category->path") }}" alt="Category Photo" class="img-thumbnail">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="edit-category-new-photo{{ $category->id }}" class="form-label">Upload New Photo</label>
                        <input type="file" id="edit-category-new-photo{{ $category->id }}" class="form-control-file" >
                    </div>
                    <div class="text-end">
                        <button type="button" class="btn btn-primary" onclick="updateCategory({{ $category->id }})">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


