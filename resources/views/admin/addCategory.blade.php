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
                    <form id="addCategory_form" name="addCategory_form" enctype="multipart/form-data" method="post"
                          action="" novalidate>
                        <div class="news-content-right pd-20">
                            <div class="form-group">
                                <label class="form-label has-float-label validate-input"
                                       data-validate="Please enter category name">
                                    <input type="text" class="form-control validate-field" placeholder="Category Name"
                                           id="Name" name="Name">
                                    <span>Category Name</span>
                                </label>
                                <label class="form-label has-float-label validate-input"
                                       data-validate="Please select Status">
                                    <select id="Activate" name="Activate" class="form-control validate-field">
                                        <option value="">Status</option>
                                        <option value="Y">Activat</option>
                                        <option value="N">In-Active</option>
                                    </select>
                                </label>
                                <div class="custom-file">
                                    <label class="form-label has-float-label">
                                        <input type="file" class="custom-file-input" id="Image"
                                               name="Image"
                                               aria-describedby="CategoryImage">
                                    </label>
                                    <label class="custom-file-label" for="inputGroupFile04">Choose Image</label>
                                </div>
                                <div class="add-cate-img">
                                    <img src="{{asset('images/category/icon-1.svg')}}" alt="" id="categoryImagePreview">
                                </div>
                                <label class="form-label has-float-label validate-input"
                                       data-validate="Please select Parent Category">
                                    <select id="ParentCategory" name="ParentCategory"
                                            class="form-control validate-field">
                                        <option value="">Parent Category</option>
                                        <option value="1">Mobiles</option>
                                        <option value="2">Computers</option>
                                    </select>
                                </label>
                                <div class="card card-editor">
                                    <div class="content-editor">
                                        <label class="form-label has-float-label validate-input"
                                               data-validate="Please enter description">
                                            <textarea class="text-control validate-field"
                                                      placeholder="Enter Description"
                                                      id="Description"></textarea>
                                            <span>Category Description</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <button class="save-btn hover-btn w-25" type="button" id="addCategory_btn">Add New Category
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
