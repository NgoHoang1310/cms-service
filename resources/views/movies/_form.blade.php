@php
use App\Models\Category;
use App\Models\Genres;
use App\Facades\Firebase;
/* @var $movie app\models\Movie */

$categories = Category::all();
$genres = Genres::all();
@endphp

<div class="section-form">
    <fieldset>
        <legend>Phim</legend>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group px-3 ">
                    <label class="form-label flex-grow-1" for="title">
                        <strong>Tên phim</strong> <span class="text-danger">*</span>:
                    </label>

                    <!-- textarea input -->
                    <!-- toggle switch -->
                    <!-- common inputs -->
                    <input id="title" name="title" type="text" class="form-control "
                           placeholder="Tên phim" value="" min="" multiple="" required/>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group px-3 ">
                    <label class="form-label flex-grow-1" for="description">
                        <strong>Mô tả</strong> :
                    </label>

                    <!-- textarea input -->
                    <textarea id="description" name="description" class="form-control"
                              placeholder="Mô tả"></textarea>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group px-3">
                    <label class="form-label flex-grow-1" for="release"><strong>Ngày phát hành</strong><span
                            class="text-danger">*</span>:</label>
                    <input id="release" name="release" class="form-control flatpickr_humandate" type="text"
                           value=""
                           placeholder="Ngày phát hành" data-id="multiple" readonly="readonly" required>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group px-3 ">
                    <label class="form-label flex-grow-1" for="duration">
                        <strong>Thời lượng</strong> <span class="text-danger">*</span>:
                    </label>

                    <!-- textarea input -->
                    <!-- toggle switch -->
                    <!-- common inputs -->
                    <input id="duration" name="duration" type="text" class="form-control "
                           placeholder="Thời lượng" value="" min="" multiple="" required/>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group px-3 ">
                    <label class="form-label flex-grow-1" for="directors">
                        <strong>Đạo diễn</strong>:
                    </label>

                    <!-- textarea input -->
                    <!-- toggle switch -->
                    <!-- common inputs -->
                    <input id="directors" name="directors" type="text" class="form-control "
                           placeholder="Đạo diễn" value="" min="" multiple=""/>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group px-3 ">
                    <label class="form-label flex-grow-1" for="actors">
                        <strong>Diễn viên</strong>:
                    </label>

                    <!-- textarea input -->
                    <!-- toggle switch -->
                    <!-- common inputs -->
                    <input id="actors" name="actors" type="text" class="form-control "
                           placeholder="Diễn viên" value="" min="" multiple=""/>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group px-3">
                    <label class="form-label flex-grow-1"
                           for="category"><strong>Danh mục phim:</strong></label>
                    <select id="category" type="select"
                            name="categories[]"
                            multiple
                            class="form-control select2-basic-multiple"
                            placeholder="Chọn danh mục">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group px-3">
                    <label class="form-label flex-grow-1"
                           for="genres"><strong>Thể loại phim:</strong></label>
                    <select id="genres" type="select"
                            name="genres[]"
                            multiple
                            class="form-control select2-basic-multiple"
                            placeholder="Chọn thể loại">
                        @foreach($genres as $genre)
                            <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </fieldset>
    <fieldset>
        <legend>Tệp đa phương tiện</legend>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group px-3 ">
                    <label class="form-label flex-grow-1" for="backdrop_url">
                        <strong>Ảnh nền</strong>:
                    </label>

                    <!-- textarea input -->
                    <!-- toggle switch -->
                    <!-- common inputs -->
                    <input id="backdrop_url" type="file" name="file" class="filepond" placeholder=""
                           accept="image/png, image/jpeg, image/gif"
                           data-url="{{ Firebase::getPublicFileUrl($movie->backdrop_url) }}" data-path="{{ $movie->poster_url }}"
                    />
                    <input type="hidden" name="backdrop_url" />
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group px-3 ">
                    <label class="form-label flex-grow-1" for="Poster">
                        <strong>Poster</strong>:
                    </label>

                    <!-- textarea input -->
                    <!-- toggle switch -->
                    <!-- common inputs -->
                    <input id="poster_url" type="file" name="file" class="filepond" placeholder=""
                           value="" accept="image/png, image/jpeg, image/gif"/>
                    <input type="hidden" name="poster_url" />
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group px-3 ">
                    <label class="form-label flex-grow-1" for="trailer_url">
                        <strong>Trailer Url</strong>:
                    </label>

                    <!-- textarea input -->
                    <!-- toggle switch -->
                    <!-- common inputs -->
                    <input id="trailer_url" name="trailer_url" type="text" class="form-control"
                           placeholder="Trailer Link" value="" min="" multiple=""/>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group px-3 ">
                    <label class="form-label flex-grow-1" for="video">
                        <strong>Video</strong>:
                    </label>

                    <!-- textarea input -->
                    <!-- toggle switch -->
                    <!-- common inputs -->
                    <input id="video" type="file" name="file" class="filepond" placeholder=""
                           value="" accept="video/mp4"/>
                    <input type="hidden" name="temp_path" />
                </div>
            </div>
        </div>

    </fieldset>
    <div class="d-grid d-flex gap-3 p-3">
        <button type="submit" class="btn btn-primary d-block">
            <i class="fa-solid fa-floppy-disk me-2"></i>Lưu
        </button>
        <a class="btn btn-outline-primary d-block" href="{{ route('movies.index') }}" aria-label="Close">
            <i class="fa-solid fa-angles-left me-2"></i>Hủy
        </a>
    </div>
</div>
