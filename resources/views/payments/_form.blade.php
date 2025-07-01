@php
    /* @var $payment app\models\Payment */
@endphp
<div class="section-form">
    <fieldset>
        <legend>Giao dịch</legend>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group px-3 ">
                    <label class="form-label flex-grow-1" for="name">
                        <strong>Tên tài khoản</strong>:
                    </label>

                    <!-- textarea input -->
                    <!-- toggle switch -->
                    <!-- common inputs -->
                    <input id="name" name="name" type="text" class="form-control "
                           placeholder="Tên tài khoản" value="{{ $payment->user->user_name }}" min="" multiple=""
                           disabled/>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group px-3 ">
                    <label class="form-label flex-grow-1" for="name">
                        <strong>Gói cước</strong>:
                    </label>

                    <!-- textarea input -->
                    <!-- toggle switch -->
                    <!-- common inputs -->
                    <input id="name" name="name" type="text" class="form-control "
                           placeholder="Gói cước" value="{{ $payment->subscription->plan->name }}" min="" multiple=""
                           disabled/>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group px-3 ">
                    <label class="form-label flex-grow-1" for="name">
                        <strong>Số tiền</strong>:
                    </label>

                    <!-- textarea input -->
                    <!-- toggle switch -->
                    <!-- common inputs -->
                    <input id="name" name="name" type="text" class="form-control "
                           placeholder="Số tiền" value="{{ $payment->amount }}" min="" multiple=""/>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group px-3">
                    <label class="form-label flex-grow-1" for="birthday"><strong>Ngày thanh toán:</strong></label>
                    <input name="birthday" class="form-control flatpickr_humandate" type="text"
                           value="{{ $payment->payment_date }}"
                           placeholder="Ngày thanh toán" data-id="multiple" disabled>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group px-3 ">
                    <label class="form-label flex-grow-1" for="name">
                        <strong>Mã giao dịch</strong>:
                    </label>

                    <!-- textarea input -->
                    <!-- toggle switch -->
                    <!-- common inputs -->
                    <input id="name" name="name" type="text" class="form-control "
                           placeholder="Mã giao dịch" value="{{ $payment->transaction_id }}" min="" multiple=""
                           disabled/>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group px-3 ">
                    <label class="form-label flex-grow-1" for="name">
                        <strong>Trạng thái</strong>:
                    </label>

                    <!-- textarea input -->
                    <!-- toggle switch -->
                    <!-- common inputs -->
                    <input id="name" name="name" type="text" class="form-control "
                           placeholder="Trạng thái" value="{{ $payment->getStatusTextAttribute() }}" min="" multiple=""
                           disabled/>
                </div>
            </div>
        </div>
    </fieldset>
    <div class="d-grid d-flex gap-3 p-3">
        <a class="btn btn-outline-primary d-block" href="{{ route('payments.index') }}" aria-label="Close">
            <i class="fa-solid fa-angles-left me-2"></i>Quay lại
        </a>
    </div>
</div>

