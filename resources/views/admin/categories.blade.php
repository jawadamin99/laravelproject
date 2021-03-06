@extends('admin.layouts.app')
@section('main_content')
    <div class="container-fluid">
        <h2 class="mt-30 page-title">Categories</h2>
        <ol class="breadcrumb mb-30">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Categories</li>
        </ol>
        <div class="row justify-content-between">
            <div class="col-lg-12">
                <a href="{{route('admin.addCategory')}}" class="add-btn hover-btn">Add New</a>
            </div>
            <div class="col-lg-3 col-md-4">
                <div class="bulk-section mt-30">
                    <div class="input-group">
                        <select id="action" name="action" class="form-control">
                            <option selected>Bulk Actions</option>
                            <option value="1">Active</option>
                            <option value="2">Inactive</option>
                            <option value="3">Delete</option>
                        </select>
                        <div class="input-group-append">
                            <button class="status-btn hover-btn" type="submit">Apply</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-6">
                <div class="bulk-section mt-30">
                    <div class="search-by-name-input">
                        <input type="text" class="form-control" placeholder="Search">
                    </div>
                    <div class="input-group">
                        <select id="categeory" name="categeory" class="form-control">
                            <option selected>Active</option>
                            <option value="1">Inactive</option>
                        </select>
                        <div class="input-group-append">
                            <button class="status-btn hover-btn" type="submit">Search Category</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12">
                <div class="card card-static-2 mt-30 mb-30">
                    <div class="card-title-2">
                        <h4>All Categories</h4>
                    </div>
                    <div class="card-body-table">
                        <div class="table-responsive">
                            <table class="table ucp-table table-hover">
                                <thead>
                                <tr>
                                    <th style="width:60px"><input type="checkbox" class="check-all"></th>
                                    <th style="width:60px">ID</th>
                                    <th style="width:130px">Image</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><input type="checkbox" class="check-item" name="ids[]" value="11"></td>
                                    <td>1</td>
                                    <td>
                                        <div class="cate-img">
                                            <img src="images/category/icon-1.svg" alt="">
                                        </div>
                                    </td>
                                    <td>Fruits and Vegetables</td>
                                    <td></td>
                                    <td><span class="badge-item badge-status">Active</span></td>
                                    <td class="action-btns">
                                        <a href="#" class="edit-btn"><i class="fas fa-edit"></i> Edit</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" class="check-item" name="ids[]" value="10"></td>
                                    <td>2</td>
                                    <td>
                                        <div class="cate-img">
                                            <img src="images/category/icon-2.svg" alt="">
                                        </div>
                                    </td>
                                    <td>Grocery & Staples</td>
                                    <td></td>
                                    <td><span class="badge-item badge-status">Active</span></td>
                                    <td class="action-btns">
                                        <a href="#" class="edit-btn"><i class="fas fa-edit"></i> Edit</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" class="check-item" name="ids[]" value="9"></td>
                                    <td>3</td>
                                    <td>
                                        <div class="cate-img">
                                            <img src="images/category/icon-3.svg" alt="">
                                        </div>
                                    </td>
                                    <td>Dairy & Eggs</td>
                                    <td></td>
                                    <td><span class="badge-item badge-status">Active</span></td>
                                    <td class="action-btns">
                                        <a href="#" class="edit-btn"><i class="fas fa-edit"></i> Edit</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" class="check-item" name="ids[]" value="8"></td>
                                    <td>4</td>
                                    <td>
                                        <div class="cate-img">
                                            <img src="images/category/icon-4.svg" alt="">
                                        </div>
                                    </td>
                                    <td>Beverages</td>
                                    <td></td>
                                    <td><span class="badge-item badge-status">Active</span></td>
                                    <td class="action-btns">
                                        <a href="#" class="edit-btn"><i class="fas fa-edit"></i> Edit</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" class="check-item" name="ids[]" value="7"></td>
                                    <td>5</td>
                                    <td>
                                        <div class="cate-img">
                                            <img src="images/category/icon-5.svg" alt="">
                                        </div>
                                    </td>
                                    <td>Snacks</td>
                                    <td></td>
                                    <td><span class="badge-item badge-status">Active</span></td>
                                    <td class="action-btns">
                                        <a href="#" class="edit-btn"><i class="fas fa-edit"></i> Edit</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" class="check-item" name="ids[]" value="6"></td>
                                    <td>6</td>
                                    <td>
                                        <div class="cate-img">
                                            <img src="images/category/icon-6.svg" alt="">
                                        </div>
                                    </td>
                                    <td>Home Care</td>
                                    <td></td>
                                    <td><span class="badge-item badge-status">Active</span></td>
                                    <td class="action-btns">
                                        <a href="#" class="edit-btn"><i class="fas fa-edit"></i> Edit</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" class="check-item" name="ids[]" value="5"></td>
                                    <td>7</td>
                                    <td>
                                        <div class="cate-img">
                                            <img src="images/category/icon-7.svg" alt="">
                                        </div>
                                    </td>
                                    <td>Noodles & Sauces</td>
                                    <td></td>
                                    <td><span class="badge-item badge-status">Active</span></td>
                                    <td class="action-btns">
                                        <a href="#" class="edit-btn"><i class="fas fa-edit"></i> Edit</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" class="check-item" name="ids[]" value="4"></td>
                                    <td>8</td>
                                    <td>
                                        <div class="cate-img">
                                            <img src="images/category/icon-8.svg" alt="">
                                        </div>
                                    </td>
                                    <td>Personal Care</td>
                                    <td></td>
                                    <td><span class="badge-item badge-status">Active</span></td>
                                    <td class="action-btns">
                                        <a href="#" class="edit-btn"><i class="fas fa-edit"></i> Edit</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" class="check-item" name="ids[]" value="3"></td>
                                    <td>9</td>
                                    <td>
                                        <div class="cate-img">
                                            <img src="images/category/icon-9.svg" alt="">
                                        </div>
                                    </td>
                                    <td>Pet Care</td>
                                    <td></td>
                                    <td><span class="badge-item badge-status">Active</span></td>
                                    <td class="action-btns">
                                        <a href="#" class="edit-btn"><i class="fas fa-edit"></i> Edit</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" class="check-item" name="ids[]" value="2"></td>
                                    <td>10</td>
                                    <td>
                                        <div class="cate-img">
                                            <img src="images/category/icon-10.svg" alt="">
                                        </div>
                                    </td>
                                    <td>Meat & Seafood</td>
                                    <td></td>
                                    <td><span class="badge-item badge-status">Active</span></td>
                                    <td class="action-btns">
                                        <a href="#" class="edit-btn"><i class="fas fa-edit"></i> Edit</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" class="check-item" name="ids[]" value="1"></td>
                                    <td>11</td>
                                    <td>
                                        <div class="cate-img">
                                            <img src="images/category/icon-11.svg" alt="">
                                        </div>
                                    </td>
                                    <td>Electronics</td>
                                    <td></td>
                                    <td><span class="badge-item badge-status">Active</span></td>
                                    <td class="action-btns">
                                        <a href="#" class="edit-btn"><i class="fas fa-edit"></i> Edit</a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
