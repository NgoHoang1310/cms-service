@php
    use App\Facades\Firebase;
    use App\Helpers\CUtils;

    /* @var $season app\models\Season */
    /* @var $series_id integer */
    /* @var $formType string */
@endphp

<div class="section-form">
    <fieldset>
        <legend>Mùa phim</legend>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group px-3 ">
                    <label class="form-label flex-grow-1" for="title">
                        <strong>Mùa hiện tại</strong> <span class="text-danger">*</span>:
                    </label>

                    <!-- textarea input -->
                    <!-- toggle switch -->
                    <!-- common inputs -->
                    <input id="season_number" name="season_number" type="text" class="form-control "
                           placeholder="Mùa hiện tại" value="{{ $season->season_number }}" min="" multiple=""
                           {{ $formType === 'show' ? 'disabled' : '' }} required/>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group px-3 ">
                    <label class="form-label flex-grow-1" for="title">
                        <strong>Tiêu đề</strong> <span class="text-danger">*</span>:
                    </label>

                    <!-- textarea input -->
                    <!-- toggle switch -->
                    <!-- common inputs -->
                    <input id="title" name="title" type="text" class="form-control "
                           placeholder="Tiêu đề" value="{{ $season->title }}" min="" multiple=""
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
                              {{ $formType === 'show' ? 'disabled' : '' }}>{{ $season->description }}</textarea>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group px-3">
                    <label class="form-label flex-grow-1" for="release"><strong>Ngày phát hành</strong><span
                            class="text-danger">*</span>:</label>
                    <input id="release" name="release" class="form-control flatpickr_humandate" type="text"
                           value="{{ $season->release }}"
                           placeholder="Ngày phát hành" data-id="multiple" readonly="readonly"
                           {{ $formType === 'show' ? 'disabled' : '' }} required>
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
                           placeholder="Trailer Link" value="{{ $season->trailer_url }}" min="" multiple=""
                        {{ $formType === 'show' ? 'disabled' : '' }}/>
                    @if($formType === 'show' && !empty($season->trailer_url))
                    <div class="video-container mt-3">
                        <iframe
                            class="video-js vjs-default-skin"
                            src="{{ CUtils::normalizeYouTubeLink($season->trailer_url) }}"
                            allowfullscreen
                        >
                        </iframe>
                    </div>
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
                    @if($formType !== 'show' || !empty(Firebase::getPublicFileUrl($season->poster_url)))
                        <input id="poster_url" type="file" name="file" class="filepond" placeholder=""
                               value="" accept="image/png, image/jpeg, image/gif"
                               data-url="{{ Firebase::getPublicFileUrl($season->poster_url) }}"
                               data-path="{{ $season->poster_url }}"
                            {{ $formType === 'show' ? 'disabled' : '' }}
                        />
                        <input type="hidden" name="poster_url" value="{{ $season->poster_url }}"/>
                    @endif
                    @if($formType === 'show' && empty(Firebase::getPublicFileUrl($season->poster_url)))
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
            <a class="btn btn-outline-primary d-block" href="{{ route('series.seasons.index', $series_id) }}" aria-label="Close">
                <i class="fa-solid fa-angles-left me-2"></i>Hủy
            </a>
        @else
            <a class="btn btn-outline-primary d-block" href="{{ route('series.seasons.index', $series_id) }}" aria-label="Close">
                <i class="fa-solid fa-angles-left me-2"></i>Quay lại
            </a>
        @endif
    </div>
</div>

