@php
    /* @var $user app\models\User */
@endphp

<div class="user-create">
    <form method="POST" action="{{ route('users.store') }}" class="needs-validation" novalidate>
        @csrf
        @include('users._form', ['user' => $user, 'formType' => 'create'])
    </form>
</div>

