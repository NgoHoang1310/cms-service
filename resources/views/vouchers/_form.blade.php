@php
    /* @var $voucher app\models\Voucher */
    /* @var $formType string */

@endphp

<div class="section-form">
    <fieldset>
        <legend>Mã giảm gía</legend>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group px-3 ">
                    <label class="form-label flex-grow-1" for="code">
                        <strong>Mã</strong> <span class="text-danger">*</span>:
                    </label>

                    <!-- textarea input -->
                    <!-- toggle switch -->
                    <!-- common inputs -->
                    <input id="code" name="code" type="text" class="form-control "
                           placeholder="Mã giảm giá" value="{{ $voucher->code }}" min="" multiple="" required readonly/>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group px-3">
                    <label class="form-label flex-grow-1"
                           for="role"><strong>Loại giảm giá:</strong></label>
                    <select id="type" type="select"
                            name="type"
                            class="form-control select2-basic-multiple"
                            {{ $formType === 'show' ? 'disabled' : '' }}
                            placeholder="Chọn loại giảm giá">
                        <option
                            value="{{ \App\Models\Voucher::TYPE_PERCENTAGE }}" {{ $voucher->type == \App\Models\Voucher::TYPE_PERCENTAGE ? 'selected' : '' }}>
                            Phần trăm
                        </option>
                        <option
                            value="{{ \App\Models\Voucher::TYPE_FIXED_AMOUNT }}" {{ $voucher->type == \App\Models\Voucher::TYPE_FIXED_AMOUNT ? 'selected' : '' }}>
                            Số tiền cố định
                        </option>
                    </select>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group px-3 ">
                    <label class="form-label flex-grow-1" for="value">
                        <strong>Giá trị</strong><span class="text-danger">*</span>:
                    </label>

                    <!-- textarea input -->
                    <!-- toggle switch -->
                    <!-- common inputs -->
                    <input id="value"
                           name="value" type="text"
                           class="form-control "
                           placeholder="Giá trị" value="{{ $voucher->value }}" max="10" multiple=""
                           {{ $formType === 'show' ? 'disabled' : '' }} required/>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group px-3 ">
                    <label class="form-label flex-grow-1" for="max_uses">
                        <strong>Số lần tối đa sử dụng</strong><span class="text-danger">*</span>:
                    </label>

                    <!-- textarea input -->
                    <!-- toggle switch -->
                    <!-- common inputs -->
                    <input id="max_uses" name="max_uses" type="text" class="form-control "
                           placeholder="Số lần tối đa sử dụng" value="{{ $voucher->max_uses }}" min=""
                           multiple="" {{ $formType === 'show' ? 'disabled' : '' }} required/>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group px-3">
                    <label class="form-label flex-grow-1" for="start_at"><strong>Ngày bắt đầu:</strong><span class="text-danger">*</span></label>
                    <input name="start_at" class="form-control flatpickr_humandate" type="text"
                           value="{{ $voucher->start_at }}"
                           placeholder="Ngày bắt đầu" data-id="multiple"
                           readonly="readonly" {{ $formType === 'show' ? 'disabled' : '' }} required>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group px-3">
                    <label class="form-label flex-grow-1" for="end_at"><strong>Ngày kết thúc:</strong><span class="text-danger">*</span></label>
                    <input name="end_at" class="form-control flatpickr_humandate" type="text"
                           value="{{ $voucher->end_at }}"
                           placeholder="Ngày kết thúc" data-id="multiple"
                           readonly="readonly" {{ $formType === 'show' ? 'disabled' : '' }} required>
                </div>
            </div>
            <div class="col-lg-6" style="display: none">
                <div class="form-group px-3">
                    <label class="form-label flex-grow-1" for="only_for_new_users"><strong>Chỉ cho tài khoản
                            mới:</strong></label>
                    <div class="form-check form-switch ms-2">
                        <input type="hidden" name="only_for_new_users" value="0" />
                        <input
                            type="checkbox"
                            class="form-check-input"
                            name="only_for_new_users"
                            value="1"
                            {{ $voucher->only_for_new_users ? 'checked' : '' }}
                            {{ $formType === 'show' ? 'disabled' : '' }}
                        />
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group px-3">
                    <label class="form-label flex-grow-1" for="only_once_per_user"><strong>Chỉ dùng 1 lần / 1 tài
                            khoản:</strong></label>
                    <div class="form-check form-switch ms-2">
                        <input type="hidden" name="only_once_per_user" value="0" />
                        <input
                            type="checkbox"
                            class="form-check-input"
                            name="only_once_per_user"
                            value="1"
                            {{ $voucher->only_once_per_user ? 'checked' : '' }}
                            {{ $formType === 'show' ? 'disabled' : '' }}
                        />
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
            <a class="btn btn-outline-primary d-block" href="{{ route('vouchers.index') }}" aria-label="Close">
                <i class="fa-solid fa-angles-left me-2"></i>Hủy
            </a>
        @else
            <a class="btn btn-outline-primary d-block" href="{{ route('vouchers.index') }}" aria-label="Close">
                <i class="fa-solid fa-angles-left me-2"></i>Quay lại
            </a>
        @endif
    </div>
</div>
