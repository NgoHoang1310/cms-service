@php
    use App\Facades\Firebase;
    use App\Helpers\CUtils;

    /* @var $episode app\models\Episode */
    /* @var $series_id integer */
    /* @var $season_id integer */
    /* @var $formType string */

    $route = !empty($season_id) ? 'series.seasons.episodes.index' : 'series.episodes.index';
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
        <legend>Tập phim</legend>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group px-3 ">
                    <label class="form-label flex-grow-1" for="title">
                        <strong>Tập hiện tại</strong> <span class="text-danger">*</span>:
                    </label>

                    <!-- textarea input -->
                    <!-- toggle switch -->
                    <!-- common inputs -->
                    <input id="episode_number" name="episode_number" type="text" class="form-control "
                           placeholder="Tập hiện tại" value="{{ $episode->episode_number }}" min="" multiple=""
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
                           placeholder="Tiêu đề" value="{{ $episode->title }}" min="" multiple=""
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
                              {{ $formType === 'show' ? 'disabled' : '' }}>{{ $episode->description }}</textarea>
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
                           placeholder="Thời lượng" value="{{ $episode->duration }}" min="" multiple=""
                           {{ $formType === 'show' ? 'disabled' : '' }} required/>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group px-3">
                    <label class="form-label flex-grow-1" for="release"><strong>Ngày phát hành</strong><span
                            class="text-danger">*</span>:</label>
                    <input id="release" name="release" class="form-control flatpickr_humandate" type="text"
                           value="{{ $episode->release }}"
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
                           placeholder="Trailer Link" value="{{ $episode->trailer_url }}" min="" multiple=""
                        {{ $formType === 'show' ? 'disabled' : '' }}/>
                    @if($formType === 'show' && !empty($episode->trailer_url))
                    <div class="video-container mt-3">
                        <iframe
                            class="video-js vjs-default-skin"
                            src="{{ CUtils::normalizeYouTubeLink($episode->trailer_url) }}"
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
                    @if($formType !== 'show' || !empty(Firebase::getPublicFileUrl($episode->poster_url)))
                        <input id="poster_url" type="file" name="file" class="filepond" placeholder=""
                               value="" accept="image/png, image/jpeg, image/gif"
                               data-url="{{ Firebase::getPublicFileUrl($episode->poster_url) }}"
                               data-path="{{ $episode->poster_url }}"
                            {{ $formType === 'show' ? 'disabled' : '' }}
                        />
                        <input type="hidden" name="poster_url" value="{{ $episode->poster_url }}"/>
                    @endif
                    @if($formType === 'show' && empty(Firebase::getPublicFileUrl($episode->poster_url)))
                        <br>
                        <img class="img-thumbnail rounded-3" src="{{ asset('images/no-image-poster.png') }}">
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group px-3 ">
                        <label class="form-label flex-grow-1" for="video">
                            <strong>Video</strong>:
                        </label>
                        @if($formType !== 'show' || !empty($episode->videoQualities[3]->video_url))
                            <div id="video-wrapper"
                                 style="{{ ($formType !== 'create' && !empty($episode->videoQualities[3]->video_url)) ? '' : 'display: none;' }}"
                            >
                                <div class="video-container">
                                    <video
                                        id="video-preview"
                                        class="video-js vjs-default-skin"
                                        controls
                                        preload="auto"
                                        data-setup="{}">
                                        <source src="{{ $episode->videoQualities[0]->video_url ?? '' }}"
                                                type="application/x-mpegURL"/>
                                    </video>
                                    @if($formType !== 'show')
                                        <button type="button" class="btn btn-close-white">
                                            <i class="fa-regular fa-circle-xmark"></i>
                                        </button>
                                    @endif
                                </div>
                            </div>
                            <div id="video-upload-wrapper"
                                 style="{{ ($formType !== 'create' && !empty($episode->videoQualities[0]->video_url)) ? 'display: none;' : '' }}">
                                <input id="video" type="file" name="file" class="filepond" accept="video/mp4"/>
                                <input type="hidden" name="temp_path"/>
                            </div>
                        @endif
                        @if($formType === 'show' && empty($episode->videoQualities[0]->video_url))
                            <img class="img-thumbnail rounded-3" src="{{ asset('images/no-video.jpg') }}">
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </fieldset>
    <div class="d-grid d-flex gap-3 p-3">
        @if($formType !== 'show')
            <button type="submit" class="btn btn-primary d-block">
                <i class="fa-solid fa-floppy-disk me-2"></i>Lưu
            </button>
            <a class="btn btn-outline-primary d-block" href="{{ route($route, ['series_id' => $series_id, 'season_id' => $season_id]) }}" aria-label="Close">
                <i class="fa-solid fa-angles-left me-2"></i>Hủy
            </a>
        @else
            <a class="btn btn-outline-primary d-block" href="{{ route($route, ['series_id' => $series_id, 'season_id' => $season_id]) }}" aria-label="Close">
                <i class="fa-solid fa-angles-left me-2"></i>Quay lại
            </a>
        @endif
    </div>
</div>
@if($formType === 'edit')
    @push('scripts')
        <script>
            $(document).ready(function () {
                $('.btn-close-white').on('click', function () {
                    $('#video-wrapper').hide();
                    $('#video-upload-wrapper').show();
                    const id = @json($episode->id);
                    const uuid = @json($episode->uuid);
                    const content_type = @json($episode->videoQualities[0]->video_type);
                    fetch('/upload/video-s3/revert', {
                        method: 'DELETE',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        },
                        body: JSON.stringify({
                            id,
                            uuid,
                            content_type
                        })
                    })
                        .then(response => {
                            if (response.ok) {
                                console.log('Video reverted successfully');
                            } else {
                                console.error('Error reverting video:', response.statusText);
                            }
                        })
                });
            });
        </script>
    @endpush
@endif

