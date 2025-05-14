@php
    use App\Facades\Firebase;
    use App\Helpers\CUtils;

    /* @var $serie app\models\Series */
    /* @var $categories app\models\Category[] */
    /* @var $genres app\models\Genres[] */
    /* @var $selectedCategories array */
    /* @var $selectedGenres array */
    /* @var $formType string */
@endphp

@push('styles')
    <style>
        .video-container {
            position: relative;
            padding-top: 56.25%; /* 16:9 Aspect Ratio */
            height: 0;
            border-radius: 10px;
        }

        .video-container .video-js.vjs-default-skin {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border-radius: 12px;
            overflow: hidden;
            z-index: 1;
        }

        .video-container .btn.btn-close-white {
            position: absolute;
            color: white;
            top: 0;
            left: 0;
            z-index: 2;
        }
    </style>
@endpush
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
                           placeholder="Tên phim" value="{{ $serie->title }}" min="" multiple=""
                           {{ $formType === 'show' ? 'disabled' : '' }} required/>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group px-3 ">
                    <label class="form-label flex-grow-1" for="description">
                        <strong>Mô tả</strong> :
                    </label>

                    <!-- textarea input -->
                    <textarea id="description" name="description" class="form-control"
                              placeholder="Mô tả"
                              {{ $formType === 'show' ? 'disabled' : '' }}>{{ $serie->description }}</textarea>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group px-3">
                    <label class="form-label flex-grow-1" for="release"><strong>Ngày phát hành</strong><span
                            class="text-danger">*</span>:</label>
                    <input id="release" name="release" class="form-control flatpickr_humandate" type="text"
                           value="{{ $serie->release }}"
                           placeholder="Ngày phát hành" data-id="multiple" readonly="readonly"
                           {{ $formType === 'show' ? 'disabled' : '' }} required>
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
                           placeholder="Thời lượng" value="{{ $serie->duration }}" min="" multiple=""
                           {{ $formType === 'show' ? 'disabled' : '' }} required/>
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
                           placeholder="Đạo diễn" value="{{ $serie->directors }}" min="" multiple=""
                        {{ $formType === 'show' ? 'disabled' : '' }}/>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group px-3 ">
                    <label class="form-label flex-grow-1" for="actors">
                        <strong>Diễn viên</strong>
                    </label>

                    <!-- textarea input -->
                    <!-- toggle switch -->
                    <!-- common inputs -->
                    <input id="actors" name="actors" type="text" class="form-control "
                           placeholder="Diễn viên" value="{{ $serie->actors }}" min="" multiple=""
                        {{ $formType === 'show' ? 'disabled' : '' }}/>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group px-3">
                    <label class="form-label flex-grow-1"
                           for="age"><strong>Độ tuổi</strong></label>
                    <select id="age" type="select"
                            name="age"
                            class="form-control select2-basic-multiple"
                        {{ $formType === 'show' ? 'disabled' : '' }}>
                        @foreach(\App\Models\Movie::$arrAge as $key => $age)
                            <option value="{{ $key }}" {{ $serie->age == $key ? 'selected' : '' }}>
                                {{ $age }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group px-3 ">
                    <label class="form-label flex-grow-1" for="country">
                        <strong>Quốc gia</strong>:
                    </label>

                    <!-- textarea input -->
                    <!-- toggle switch -->
                    <!-- common inputs -->
                    <input id="country" name="country" type="text" class="form-control "
                           placeholder="Quốc gia" value="{{ $serie->country }}" min="" multiple=""
                        {{ $formType === 'show' ? 'disabled' : '' }}/>
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
                            {{ $formType === 'show' ? 'disabled' : '' }}
                            placeholder="Chọn danh mục">
                        @foreach($categories as $category)
                            <option
                                value="{{ $category->id }}" {{ in_array($category->id, old('categories', $selectedCategories ?? [])) ? 'selected' : '' }}
                            >
                                {{ $category->name }}
                            </option>
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
                            {{ $formType === 'show' ? 'disabled' : '' }}
                            placeholder="Chọn thể loại">
                        @foreach($genres as $genre)
                            <option
                                value="{{ $genre->id }}" {{ in_array($genre->id, old('categories', $selectedGenres ?? [])) ? 'selected' : '' }}
                            >
                                {{ $genre->name }}
                            </option>
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
                    <label class="form-label flex-grow-1" for="trailer_url">
                        <strong>Trailer Url</strong>:
                    </label>

                    <!-- textarea input -->
                    <!-- toggle switch -->
                    <!-- common inputs -->
                    <input id="trailer_url" name="trailer_url" type="text" class="form-control"
                           placeholder="Trailer Link" value="{{ $serie->trailer_url }}" min="" multiple=""
                        {{ $formType === 'show' ? 'disabled' : '' }}/>
                    @if($formType === 'show' && !empty($serie->trailer_url))
                        <div class="video-container mt-3">
                            <iframe
                                class="video-js vjs-default-skin"
                                src="{{ CUtils::normalizeYouTubeLink($serie->trailer_url) }}"
                                allowfullscreen
                            >
                            </iframe>
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group px-3 ">
                    <label class="form-label flex-grow-1" for="backdrop_url">
                        <strong>Ảnh nền</strong>:
                    </label>

                    <!-- textarea input -->
                    <!-- toggle switch -->
                    <!-- common inputs -->
                    @if($formType !== 'show' || !empty(Firebase::getPublicFileUrl($serie->backdrop_url)))
                        <input id="backdrop_url" type="file" name="file" class="filepond" placeholder=""
                               accept="image/png, image/jpeg, image/gif"
                               data-url="{{ Firebase::getPublicFileUrl($serie->backdrop_url) }}"
                               data-path="{{ $serie->backdrop_url }}"
                            {{ $formType === 'show' ? 'disabled' : '' }}
                        />
                        <input type="hidden" name="backdrop_url" value="{{ $serie->backdrop_url }}"/>
                    @endif
                    @if($formType === 'show' && empty(Firebase::getPublicFileUrl($serie->backdrop_url)))
                        <br>
                        <img class="img-thumbnail rounded-3" src="{{ asset('images/no-image-banner.png') }}">
                    @endif
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
                    @if($formType !== 'show' || !empty(Firebase::getPublicFileUrl($serie->poster_url)))
                        <input id="poster_url" type="file" name="file" class="filepond" placeholder=""
                               value="" accept="image/png, image/jpeg, image/gif"
                               data-url="{{ Firebase::getPublicFileUrl($serie->poster_url) }}"
                               data-path="{{ $serie->poster_url }}"
                            {{ $formType === 'show' ? 'disabled' : '' }}
                        />
                        <input type="hidden" name="poster_url" value="{{ $serie->poster_url }}"/>
                    @endif
                    @if($formType === 'show' && empty(Firebase::getPublicFileUrl($serie->poster_url)))
                        <br>
                        <img class="img-thumbnail rounded-3" src="{{ asset('images/no-image-poster.png') }}">
                    @endif
                </div>
            </div>
        </div>
    </fieldset>
    <div class="d-grid d-flex gap-3 p-3">
        @if($formType !== 'show')
            <button type="submit" class="btn btn-primary d-block">
                <i class="fa-solid fa-floppy-disk me-2"></i>Lưu
            </button>
            <a class="btn btn-outline-primary d-block" href="{{ route('series.index') }}" aria-label="Close">
                <i class="fa-solid fa-angles-left me-2"></i>Hủy
            </a>
        @else
            <a class="btn btn-outline-primary d-block" href="{{ route('series.index') }}" aria-label="Close">
                <i class="fa-solid fa-angles-left me-2"></i>Quay lại
            </a>
        @endif
    </div>
</div>
