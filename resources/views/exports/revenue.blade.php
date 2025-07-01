<?php
    /* @var $payments app\models\Payment[]*/
?>
<table>
    <thead>
    <tr class="ligth">
        <th>Tên tài khoản</th>
        <th>Gói cước</th>
        <th>Số tiền</th>
        <th>Ngày thanh toán</th>
        <th>Mã giao dịch</th>
        <th>Trạng thái</th>
    </tr>
    </thead>
    <tbody>
    @foreach($payments as $payment)
        <tr>
            <td>{{ $payment->user->user_name ?? $payment->user->email }}</td>
            <td>{{ $payment->subscription->plan->name }}</td>
            <td>{{ $payment->amount }}</td>
            <td>{{ $payment->payment_date }}</td>
            <td>{{ $payment->transaction_id }}</td>
            <td>{{ $payment->getStatusTextAttribute() }}</td>
        </tr>
    @endforeach
    </tbody>
</table>

