@php
    /* @var $user app\models\User */
@endphp

<div class="user-edit">
    <form method="POST" action="{{ route('users.update', $user) }}" class="needs-validation" novalidate enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        @include('users._form', ['user' => $user, 'formType' => 'edit'])
    </form>
</div>

