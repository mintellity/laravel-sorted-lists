<div class="row">
    <div class="col-md-6">
        <div class="mb-7 form-group">
            <label class="fs-6 fw-bold form-label mt-3" for="name">
                Name
            </label>
            <input
                id="name"
                name="name"
                type="text"
                class="form-control form-control-solid"
                value="{{ $sortedListItem->name ?? '' }}">
            <div class="invalid-feedback"></div>
        </div>
    </div>
</div>
