@php
use App\Models\Category;
/* @var $movie app\models\Movie */

$categories = Category::all();
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
                    <textarea id="description" class="form-control"
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
                    <input id="duration" type="text" class="form-control "
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
                    <input id="directors" type="text" class="form-control "
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
                    <input id="actors" type="text" class="form-control "
                           placeholder="Diễn viên" value="" min="" multiple=""/>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group px-3">
                    <label class="form-label flex-grow-1"
                           for="category"><strong>Danh mục phim:</strong></label>
                    <select id="category" type="select"
                            name="category[]"
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
                        <option>Action</option>
                        <option>Adventure</option>
                        <option>Animation</option>
                        <option>Horror</option>
                        <option>Thriller</option>
                    </select>
                </div>
            </div>
        </div>
    </fieldset>
    <fieldset>
        <legend>Tệp đa phương tiện</legend>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group px-3 ">
                    <label class="form-label flex-grow-1" for="Thumbnail">
                        <strong>Thumbnail</strong>:
                    </label>

                    <!-- textarea input -->
                    <!-- toggle switch -->
                    <!-- common inputs -->
                    <input id="Thumbnail" type="file" class="form-control " placeholder=""
                           value="" min="" multiple=""/>
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
                    <input id="Poster" type="file" class="form-control " placeholder=""
                           value="" min="" multiple=""/>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group px-3 ">
                    <label class="form-label flex-grow-1" for="Trailer Url">
                        <strong>Trailer Url</strong>:
                    </label>

                    <!-- textarea input -->
                    <!-- toggle switch -->
                    <!-- common inputs -->
                    <input id="Trailer Url" type="text" class="form-control "
                           placeholder="Trailer Link" value="" min="" multiple=""/>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-between align-items-center my-4 px-3">
            <h5 class="mb-0">
                <strong>Video Quality</strong>
            </h5>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#video-modal">
                <i class="fa-solid fa-square-plus me-2"></i>Add Video
            </button>

            <div class="modal fade" id="video-modal" tabindex="-1" role="dialog"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="video-modal-label">Add Video</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close">
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="#" class="section-form">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group px-3 d-flex flex-column">
                                            <label class="form-label flex-grow-1"
                                                   for="quality"><strong>Quality:</strong></label>
                                            <select id="quality" type="select"
                                                    class="form-control select2-basic-multiple"
                                                    placeholder="Select Quality">
                                                <option>480p</option>
                                                <option>720p</option>
                                                <option>1080p</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group px-3 ">
                                            <label class="form-label flex-grow-1"
                                                   for="Video">
                                                <strong>Video</strong> :
                                            </label>

                                            <!-- textarea input -->
                                            <!-- toggle switch -->
                                            <!-- common inputs -->
                                            <input id="Video" type="file"
                                                   class="form-control " placeholder=""
                                                   value="" min="" multiple=""/>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div
                                            class="form-group px-3 d-flex justify-content-between">
                                            <label class="form-label flex-grow-1"
                                                   for="Download Link">
                                                <strong>Download Link</strong> :
                                            </label>

                                            <!-- textarea input -->
                                            <!-- toggle switch -->
                                            <div class="form-check form-switch ms-2">
                                                <input id="Download Link"
                                                       class="form-check-input"
                                                       type="checkbox"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Close
                            </button>
                            <button type="button" class="btn btn-primary">Save
                                changes
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row px-3">
            <div class="col-sm-12">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr class="text-center">
                            <th>Quality</th>
                            <th>Video URL</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="text-center">
                            <td>720P</td>
                            <td>video_720.mp4</td>
                            <td>
                                <div
                                    class="d-flex align-items-center justify-content-center">
                                    <a aria-current="page" href="#"
                                       class="active text-success" title="Edit">
                                        <i class="fa-solid fa-pen mx-4"></i>
                                    </a>
                                    <a aria-current="page" href="#"
                                       class="active text-danger" title="Delete">
                                        <i class="fa-solid fa-trash me-4"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-between align-items-center my-4 px-3">
            <h5 class="mb-0">
                <strong>Subtitles</strong>
            </h5>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#subtitle-modal">
                <i class="fa-solid fa-square-plus me-2"></i>Add Subtitle
            </button>

            <div class="modal fade" id="subtitle-modal" tabindex="-1" role="dialog"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="subtitle-modal-label">Add Subtitle
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close">
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="#" class="section-form">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group px-3 d-flex flex-column">
                                            <label class="form-label flex-grow-1"
                                                   for="subtitle-language"><strong>Subtitle:</strong></label>
                                            <select id="subtitle-language" type="select"
                                                    class="form-control select2-basic-multiple"
                                                    placeholder="select subtitle">
                                                <option>Hindi</option>
                                                <option>English</option>
                                                <option>French</option>
                                                <option>Marathi</option>
                                                <option>Gujrati</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group px-3 ">
                                            <label class="form-label flex-grow-1"
                                                   for="File">
                                                <strong>File</strong> :
                                            </label>

                                            <!-- textarea input -->
                                            <!-- toggle switch -->
                                            <!-- common inputs -->
                                            <input id="File" type="file"
                                                   class="form-control " placeholder=""
                                                   value="" min="" multiple=""/>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Close
                            </button>
                            <button type="button" class="btn btn-primary">Save
                                changes
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row px-3">
            <div class="col-sm-12">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr class="text-center">
                            <th>Language</th>
                            <th>URL</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="text-center">
                            <td>English</td>
                            <td>English.txt</td>
                            <td>
                                <div
                                    class="d-flex align-items-center justify-content-center">
                                    <a aria-current="page" href="#"
                                       class="active text-success" title="Edit">
                                        <i class="fa-solid fa-pen mx-4"></i>
                                    </a>
                                    <a aria-current="page" href="#"
                                       class="active text-danger" title="Delete">
                                        <i class="fa-solid fa-trash me-4"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
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
