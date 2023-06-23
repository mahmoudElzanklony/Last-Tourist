<!--begin::Modal - Invite Friends-->
<div class="modal fade" id="kt_modal_categoey" tabindex="-1" aria-hidden="true">
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


                <form id="createCategoryForm" action="{{ route('categories.store') }}" method="post"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" >
                    </div>

                    <div class="mb-3">
                        <label for="photos">Photos</label>
                        <input type="file" name="path" id="path" class="form-control" multiple>
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

                </form>
                <!--begin::Textarea-->
                {{-- <textarea class="form-control form-control-solid mb-8" rows="3" placeholder="Type or paste emails here"></textarea> --}}
                <!--end::Textarea-->
                <!--begin::Users-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
<!--end::Modal - Invite Friend-->
