@extends('layouts.app')
@section('title', 'User List')
@section('content')
<div class="content-inner container-fluid pb-0" id="page_layout">
    <div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div
                        class="card-header border-bottom d-flex justify-content-between align-items-center py-3">
                        <div class="d-flex align-items-center pt-3 gap-2">
                            <div class="form-group mb-0">
                                <select type="select" class="form-control select2-basic-multiple"
                                    placeholder="No Action">
                                    <option>No Action</option>
                                    <option>Status</option>
                                    <option>Delete</option>
                                </select>
                            </div>
                            <button class="btn btn-primary ">Apply</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive rounded py-4 table-space">
                            <table id="user-list-table" class="table custom-table" role="grid"
                                data-toggle="data-table">
                                <thead>
                                    <tr class="ligth">
                                        <th>Profile</th>
                                        <th>Name</th>
                                        <th>Contact</th>
                                        <th>Email</th>
                                        <th>Country</th>
                                        <th>Status</th>
                                        <th>Company</th>
                                        <th>Join Date</th>
                                        <th style="min-width: 100px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($model as $user)
                                    <tr>
                                        <td><img class="bg-primary-subtle rounded img-fluid avatar-40 me-3"
                                                src="{{ $user['avatar'] }}" alt="profile" loading="lazy">
                                        </td>
                                        <td>{{ $user['name'] }}</td>
                                        <td>{{ $user['phone'] }}</td>
                                        <td>{{ $user['email'] }}</td>
                                        <td>{{ $user['country'] }}</td>
                                        <td><span class="badge bg-primary">{{ $user['status'] }}</span></td>
                                        <td>{{ $user['company'] }}</td>
                                        <td>{{ $user['joinDate'] }}</td>
                                        <td>
                                            <div class="flex align-items-center list-user-action">
                                                <a class="btn btn-sm btn-icon btn-success rounded"
                                                    data-bs-toggle="tooltip" data-placement="top" title=""
                                                    data-bs-original-title="Add" href="#">
                                                    <span class="btn-inner">
                                                        <i class="fa-solid fa-user-plus fa-xs"></i>
                                                    </span>
                                                </a>
                                                <a class="btn btn-sm btn-icon btn-danger rounded delete-btn"
                                                    data-bs-toggle="tooltip" data-placement="top" title=""
                                                    data-bs-original-title="Delete" href="#">
                                                    <span class="btn-inner">
                                                        <i class="fa-solid fa-trash fa-xs"></i>
                                                    </span>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection