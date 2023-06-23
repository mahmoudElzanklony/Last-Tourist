<!--begin::Modal - Invite Friends-->
<div class="modal fade" id="kt_modal_service" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header pb-0 border-0 justify-content-end">
                <!--begin::Close-->
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal"><i
                        class="ki-duotone ki-cross fs-1">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                </div>
                <!--end::Close-->
            </div>
            <!--begin::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y mx-5 mx-xl-18 pt-0 pb-15">

                <form id="createServiceForm" action="{{ route('services.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="name">Name</label>
                        <input name="name" type="text" class="form-control" id="name" placeholder="Name">
                    </div>

                    <div class="mb-3">
                        <label for="description">Description</label>
                        <textarea name="description" class="form-control" id="description" placeholder="Description"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="price">Price</label>
                        <input name="price" type="number" class="form-control" id="price" placeholder="Price">
                    </div>

                    <div class="mb-3">
                        <label for="category_id">Category</label>
                        <select name="category_id" class="form-control" id="category_id">
                            <option value="">Select Category</option>
                            <!-- Add options dynamically based on your categories -->
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                            <!-- Add more options as needed -->
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="photos">Photos</label>
                        <input type="file" name="path[]" id="path" class="form-control" multiple>
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
                {{-- <div class="fv-row mb-8">
                    <!--begin::Image input-->
                    <div class="image-input image-input-outline" data-kt-image-input="true"
                        style="background-image: url('assets/media/svg/avatars/blank.svg')">
                        <!--begin::Preview existing avatar-->
                        <div class="image-input-wrapper w-125px h-125px"
                            style="background-image: url(assets/media/svg/avatars/blank.svg)"></div>
                        <!--end::Preview existing avatar-->
                        <!--begin::Label-->
                        <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                            data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                            <i class="ki-duotone ki-pencil fs-7">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                            <!--begin::Inputs-->
                            <input type="file" name="avatar" accept=".png, .jpg, .jpeg" />
                            <input type="hidden" name="avatar_remove" />
                            <!--end::Inputs-->
                        </label>
                        <!--end::Label-->
                        <!--begin::Cancel-->
                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                            data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                            <i class="ki-duotone ki-cross fs-2">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </span>
                        <!--end::Cancel-->
                        <!--begin::Remove-->
                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                            data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                            <i class="ki-duotone ki-cross fs-2">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </span>
                        <!--end::Remove-->
                    </div>
                    <!--end::Image input-->
                    <!--begin::Hint-->
                    <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                    <!--end::Hint-->
                </div> --}}
                <!--begin::Users-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
<!--end::Modal - Invite Friend-->
