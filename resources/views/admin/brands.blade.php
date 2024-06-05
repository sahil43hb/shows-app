@extends('admin.layouts.master')

@section('title')
Footcase - Brands
@endsection

@section('css')

@endsection

@section('content')

    <div class="d-flex flex-row justify-content-end">
        <button class="btn btn-primary my-4" data-bs-toggle="modal" data-bs-target="#basicModal">Add
            brand</button>
    </div>

    <div class="modal fade" id="basicModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">New Brand</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" id="addBrand">
                    <div class="modal-body">
                        @csrf
                        <div class="mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Title</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="title" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-12">
                                <select class="form-select" name="activeStatus" aria-label="Default select example" required>
                                    <option selected>Select status</option>
                                    <option value="1">Active</option>
                                    <option value="0">Disable</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn btn-primary">
                            Add
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="categoryEdit" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Brand</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" id="editBrand">
                    <div class="modal-body">
                        @csrf
                        <div class="mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Title</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="brandTitle" name="title" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-12">
                                <select class="form-select" id="brandStatus" name="active_status" aria-label="Default select example" required>
                                    <option selected>Select status</option>
                                    <option value="1">Active</option>
                                    <option value="0">Disable</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn btn-danger">
                            Edit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="delateModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Brand</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" id="deleteBrand">
                    <div class="modal-body">
                        @method('DELETE')
                        @csrf
                        <div class="mb-3">
                            <h5>Are you sure you want to delete the brand?</h5>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            No
                        </button>
                        <button type="submit" class="btn btn-danger">
                            Yes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <table id="brand_table" class="display text-center">
        <thead>
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>


    </table>
@endsection
@section('script')
@endsection