@php
    /* @var $category app\models\Category */
@endphp
<div class="section-form">
    <fieldset>
        <legend>Danh mục phim</legend>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group px-3 ">
                    <label class="form-label flex-grow-1" for="name">
                        <strong>Tên danh mục</strong> <span class="text-danger">*</span>:
                    </label>

                    <!-- textarea input -->
                    <!-- toggle switch -->
                    <!-- common inputs -->
                    <input id="name" name="name" type="text" class="form-control "
                           placeholder="Tên danh mục" value="{{ $category->name }}" min="" multiple="" required/>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group px-3 ">
                    <label class="form-label flex-grow-1" for="description">
                        <strong>Mô tả</strong> :
                    </label>

                    <!-- textarea input -->
                    <textarea id="description" name="description" class="form-control"
                              placeholder="Mô tả">{{ $category->description }}</textarea>
                </div>
            </div>
        </div>
    </fieldset>
    <div class="d-grid d-flex gap-3 p-3">
        <button type="submit" class="btn btn-primary d-block">
            <i class="fa-solid fa-floppy-disk me-2"></i>Lưu
        </button>
        <a class="btn btn-outline-primary d-block" href="{{ route('categories.index') }}" aria-label="Close">
            <i class="fa-solid fa-angles-left me-2"></i>Hủy
        </a>
    </div>
</div>

