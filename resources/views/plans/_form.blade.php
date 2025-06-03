@php
    /* @var $plan app\models\Plan */
@endphp
<div class="section-form">
    <fieldset>
        <legend>Gói cước</legend>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group px-3 ">
                    <label class="form-label flex-grow-1" for="name">
                        <strong>Tên gói cước</strong> <span class="text-danger">*</span>:
                    </label>

                    <!-- textarea input -->
                    <!-- toggle switch -->
                    <!-- common inputs -->
                    <input id="name" name="name" type="text" class="form-control "
                           placeholder="Tên danh mục" value="{{ $plan->name }}" min="" multiple="" required/>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group px-3 ">
                    <label class="form-label flex-grow-1" for="description">
                        <strong>Mô tả</strong> :
                    </label>

                    <!-- textarea input -->
                    <textarea id="description" name="description" class="form-control tiny-mce-editor"
                              placeholder="Mô tả">{{ $plan->description }}</textarea>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group px-3 ">
                    <label class="form-label flex-grow-1" for="price">
                        <strong>Giá (vnd)</strong> <span class="text-danger">*</span>:
                    </label>

                    <!-- textarea input -->
                    <!-- toggle switch -->
                    <!-- common inputs -->
                    <input id="price" name="price" type="text" class="form-control "
                           placeholder="Giá" value="{{ $plan->price }}" min="" multiple="" required/>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group px-3 ">
                    <label class="form-label flex-grow-1" for="duration_days">
                        <strong>Thời hạn (ngày)</strong> <span class="text-danger">*</span>:
                    </label>

                    <!-- textarea input -->
                    <!-- toggle switch -->
                    <!-- common inputs -->
                    <input id="duration_days" name="duration_days" type="text" class="form-control "
                           placeholder="Ngày" value="{{ $plan->duration_days }}" min="" multiple="" required/>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group px-3">
                    <label class="form-label flex-grow-1"
                           for="max_resolution"><strong>Độ phân giải tối đa</strong></label>
                    <select id="max_resolution" type="select"
                            name="max_resolution"
                            class="form-control select2-basic-multiple"
                            {{ $formType === 'show' ? 'disabled' : '' }}>
                        @foreach(\App\Models\Video_Quality::$arrQuality as $key => $item)
                            <option value="{{ $key }}" {{ $item == $key ? 'selected' : '' }}>
                                {{ $item }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </fieldset>
    <div class="d-grid d-flex gap-3 p-3">
        <button type="submit" class="btn btn-primary d-block">
            <i class="fa-solid fa-floppy-disk me-2"></i>Lưu
        </button>
        <a class="btn btn-outline-primary d-block" href="{{ route('plans.index') }}" aria-label="Close">
            <i class="fa-solid fa-angles-left me-2"></i>Hủy
        </a>
    </div>
</div>

@push('scripts')
    <script>
        tinymce.init({
            selector: 'textarea.tiny-mce-editor',
            height: 400,
            plugins: 'image link media code table lists',
            toolbar: 'undo redo | formatselect | bold italic | alignleft aligncenter alignright | bullist numlist | image media link | code',
        });
    </script>
@endpush
