@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif

            <div class="card">
                <div class="card-header">
                    <h4>
                        Add Product
                        <a href="{{ url('admin/products') }}" class="btn btn-danger btn-sm text-white float-end">Back</a>
                    </h4>
                </div>

                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-warning">
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        </div>
                    @endif
                    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="">SI / UPC</label>
                                <input type="text" name="si_upc" class="form-control" />
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="">Barcode / SKU</label>
                                <input type="text" name="barcode_sku" class="form-control" />
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="">B / M</label>
                                <input type="text" name="b_m" class="form-control" />
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="">Product Name</label>
                                <input type="text" name="product_name" class="form-control" />
                            </div>
                            <div class="col-md-8 mb-3">
                                <label for="">Product Description</label>
                                <textarea name="product_description" class="form-control" rows="3"></textarea>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="department_id">Department</label>
                                <select name="department_id" id="department_id" class="form-control">
                                    <option value="">Select Department</option>
                                    @foreach ($departments as $department)
                                        <option value="{{ $department->id }}">{{ $department->department_title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="group_id">Group</label>
                                <select name="group_id" id="group_id" class="form-control">
                                    <option value="">Select Group</option>
                                    @foreach ($groups as $group)
                                        <option value="{{ $group->id }}">{{ $group->group_title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="sub_group_id">Sub Group 1</label>
                                <select name="sub_group_id" id="sub_group_id" class="form-control">
                                    <option value="">Select Sub Group</option>
                                    @foreach ($subGroups as $subGroup)
                                        <option value="{{ $subGroup->id }}">{{ $subGroup->sub_group_title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="sub_group_id">Sub Group 2</label>
                                <select name="sub_group_id_1" id="sub_group_id_1" class="form-control">
                                    <option value="">Select Sub Group</option>
                                    @foreach ($subGroups as $subGroup)
                                        <option value="{{ $subGroup->id }}">{{ $subGroup->sub_group_title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="sub_group_id">Sub Group 3</label>
                                <select name="sub_group_id_2" id="sub_group_id_2" class="form-control">
                                    <option value="">Select Sub Group</option>
                                    @foreach ($subGroups as $subGroup)
                                        <option value="{{ $subGroup->id }}">{{ $subGroup->sub_group_title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="sub_group_id">Sub Group 4</label>
                                <select name="sub_group_id_3" id="sub_group_id_3" class="form-control">
                                    <option value="">Select Sub Group</option>
                                    @foreach ($subGroups as $subGroup)
                                        <option value="{{ $subGroup->id }}">{{ $subGroup->sub_group_title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="">Kg / ml</label>
                                <input type="text" name="kg_ml" class="form-control" />
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="">Units</label>
                                <input type="text" name="units" class="form-control" />
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="">PS</label>
                                <input type="text" name="ps" class="form-control" />
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="">Case</label>
                                <input type="text" name="case" class="form-control" />
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="">Dimensions</label>
                                <input type="text" name="dimensions" class="form-control" />
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="">CP + Vat</label>
                                <input type="text" name="cp_vat" class="form-control" />
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="">IS</label>
                                <input type="text" name="is" class="form-control" />
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="">Lo</label>
                                <input type="text" name="lo" class="form-control" />
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="">AR</label>
                                <input type="text" name="ar" class="form-control" />
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="">Vat</label>
                                <input type="text" name="vat" class="form-control" />
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="">WSCP + Vat</label>
                                <input type="text" name="wscp_vat" class="form-control" />
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="">Samson %</label>
                                <input type="text" name="samson_percent" class="form-control" />
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="">Unit RRP</label>
                                <input type="text" name="unit_rrp" class="form-control" />
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="">RUPM</label>
                                <input type="text" name="rupm" class="form-control" />
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="">1 BCQTY</label>
                                <input type="text" name="bcqty_1" class="form-control" />
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="">1 BCP</label>
                                <input type="text" name="bcp_1" class="form-control" />
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="">1B %</label>
                                <input type="text" name="b_percent_1" class="form-control" />
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="">2 BCQTY</label>
                                <input type="text" name="bcqty_2" class="form-control" />
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="">2 BCP</label>
                                <input type="text" name="bcp_2" class="form-control" />
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="">2B %</label>
                                <input type="text" name="b_percent_2" class="form-control" />
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="">3 BCQTY</label>
                                <input type="text" name="bcqty_3" class="form-control" />
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="">3 BCP</label>
                                <input type="text" name="bcp_3" class="form-control" />
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="">3B %</label>
                                <input type="text" name="b_percent_3" class="form-control" />
                            </div>
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="linked_item_1">Linked Item 1</label>
                                    <select name="linked_item_1" class="form-control">
                                        <option value="">Select Linked Item</option>
                                        @foreach($products as $linkedProduct)
                                            <option value="{{ $linkedProduct->id }}">{{ $linkedProduct->product_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="linked_item_2">Linked Item 2</label>
                                    <select name="linked_item_2" class="form-control">
                                        <option value="">Select Linked Item</option>
                                        @foreach($products as $linkedProduct)
                                            <option value="{{ $linkedProduct->id }}">{{ $linkedProduct->product_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="linked_item_3">Linked Item 3</label>
                                    <select name="linked_item_3" class="form-control">
                                        <option value="">Select Linked Item</option>
                                        @foreach($products as $linkedProduct)
                                            <option value="{{ $linkedProduct->id }}">{{ $linkedProduct->product_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                    <label for="">Trending</label>
                                    <input type="checkbox" name="trending" style="width: 50px; height: 50px;">
                            </div>
                            <div class="col-md-4 mb-3">
                                    <label for="">Featured</label>
                                    <input type="checkbox" name="featured" style="width: 50px; height: 50px;">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="">Select Status</option>
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="">Upload Product Thumbnail Images</label>
                                    <input type="file" multiple name="image[]" class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="">Upload Product Images</label>
                                    <input type="file"  name="large_image" class="form-control" />
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12 text-end">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
