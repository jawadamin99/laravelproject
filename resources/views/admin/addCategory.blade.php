@extends('admin.layouts.app')
@section('main_content')
    <h2 class="mt-30 page-title">Categories</h2>
    <ol class="breadcrumb mb-30">
        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{route('admin.categories')}}">Categories</a></li>
        <li class="breadcrumb-item active">Add Category</li>
    </ol>
    <div class="row">
        <div class="col-lg-6 col-md-6">
            <div class="card card-static-2 mb-30">
                <div class="card-title-2">
                    <h4>Add New Category</h4>
                </div>
                <div class="card-body-table">
                    <div class="news-content-right pd-20">
                        <div class="form-group">
                            <label class="form-label">Name*</label>
                            <input type="text" class="form-control" placeholder="Category Name">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Status*</label>
                            <select id="status" name="status" class="form-control">
                                <option selected>Active</option>
                                <option value="1">Inactive</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Category Image*</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="inputGroupFile04"
                                           aria-describedby="inputGroupFileAddon04">
                                    <label class="custom-file-label" for="inputGroupFile04">Choose Image</label>
                                </div>
                            </div>
                            <div class="add-cate-img">
                                <img src="{{asset('images/category/icon-1.svg')}}" alt="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Description*</label>
                            <div class="card card-editor">
                                <div class="content-editor">
                                    <textarea class="text-control" placeholder="Enter Description"></textarea>
                                </div>
                            </div>
                        </div>
                        <button class="save-btn hover-btn" type="submit">Add New Category</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
