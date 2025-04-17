@php
    /* @var $user app\models\User */
@endphp

<div class="section-form">
    <fieldset>
        <legend>Người dùng</legend>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group px-3 ">
                    <label class="form-label flex-grow-1" for="user_name">
                        <strong>Tên đăng nhập</strong> <span class="text-danger">*</span>:
                    </label>

                    <!-- textarea input -->
                    <!-- toggle switch -->
                    <!-- common inputs -->
                    <input id="user_name" name="user_name" type="text" class="form-control "
                           placeholder="Tên đăng nhập" value="{{ $user->user_name }}" min="" multiple="" required/>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group px-3 ">
                    <label class="form-label flex-grow-1" for="email">
                        <strong>Email</strong> <span class="text-danger">*</span>:
                    </label>

                    <!-- textarea input -->
                    <!-- toggle switch -->
                    <!-- common inputs -->
                    <input {{ (!$user->isEditable() && $formType == 'edit') ? 'disabled' : '' }} id="email" name="email"
                           type="email"
                           class="form-control "
                           placeholder="Enter email" value="{{ $user->email }}" min="" multiple="" required/>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group px-3 ">
                    <label class="form-label flex-grow-1" for="password">
                        <strong>Mật khẩu</strong> <span class="text-danger">*</span>:
                    </label>

                    <!-- textarea input -->
                    <!-- toggle switch -->
                    <!-- common inputs -->
                    <input {{ (!$user->isEditable() && $formType == 'edit') ? 'disabled' : '' }} id="password"
                           name="password" type="password"
                           class="form-control "
                           placeholder="Mật khẩu" value="{{ $user->password }}" max="10" multiple="" required/>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group px-3 ">
                    <label class="form-label flex-grow-1" for="phone_number">
                        <strong>Số điện thoại</strong>:
                    </label>

                    <!-- textarea input -->
                    <!-- toggle switch -->
                    <!-- common inputs -->
                    <input id="phone" name="phone_number" type="text" class="form-control "
                           placeholder="Số điện thoại" value="{{ $user->phone_number }}" min="" multiple=""/>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group px-3">
                    <label class="form-label flex-grow-1" for="birthday"><strong>Ngày sinh:</strong></label>
                    <input name="birthday" class="form-control flatpickr_humandate" type="text"
                           value="{{ $user->birthday }}"
                           placeholder="Ngày sinh" data-id="multiple" readonly="readonly">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group px-3">
                    <label class="form-label flex-grow-1"
                           for="role"><strong>Quyền:</strong></label>
                    <select id="role" type="select"
                            name="role"
                            class="form-control select2-basic-multiple"
                            placeholder="select role">
                        <option
                            value="{{ \App\Models\User::ROLE_USER }}" {{ $user->role == \App\Models\User::ROLE_USER ? 'selected' : '' }}>
                            User
                        </option>
                        <option
                            value="{{ \App\Models\User::ROLE_ADMIN }}" {{ $user->role == \App\Models\User::ROLE_ADMIN ? 'selected' : '' }}>
                            Admin
                        </option>
                    </select>
                </div>
            </div>
            @if($formType == 'edit')
                <div class="col-sm-6">
                    <div class="form-group px-3">
                        <label class="form-label flex-grow-1"
                               for="status"><strong>Trạng thái:</strong></label>
                        <select id="status" type="select"
                                name="status"
                                class="form-control select2-basic-multiple"
                                >
                            @foreach(\App\Models\User::$arrStatus as $key => $status)
                                <option value="{{ $key }}" {{ $user->status == $key ? 'selected' : '' }}>
                                    {{ $status }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-9">
                            <div class="form-group px-3 ">
                                <label class="form-label flex-grow-1" for="avatar">
                                    <strong>Ảnh đai diện</strong>:
                                </label>

                                <!-- textarea input -->
                                <!-- toggle switch -->
                                <!-- common inputs -->
                                <input id="avatar" name="avatar_link" type="file" class="form-control " placeholder=""
                                       value="{{ $user->avatar_link }}" min="" multiple="" accept="image/*"/>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            @if($user->avatar_link)
                                <img src="{{ \App\services\FirebaseService::getFullLink($user->avatar_link) }}"
                                     alt="User-Profile"
                                     class="theme-color-default-img img-fluid mt-3 avatar avatar-100 avatar-rounded"
                                     loading="lazy">
                            @endif
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </fieldset>
</div>
<div class="d-grid d-flex gap-3 p-3">
    <button type="submit" class="btn btn-primary d-block">
        <i class="fa-solid fa-floppy-disk me-2"></i>Lưu
    </button>
    <button type="button" class="btn btn-outline-primary d-block" data-bs-dismiss="offcanvas"
            aria-label="Close">
        <i class="fa-solid fa-angles-left me-2"></i>Hủy
    </button>
</div>


