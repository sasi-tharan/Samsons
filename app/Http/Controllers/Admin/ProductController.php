<?php

namespace App\Http\Controllers\Admin;

use App\Models\Group;
use App\Models\Product;
use App\Models\SubGroup;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        // Retrieve all products from the database
        $products = Product::all();

        // Pass the products to the view
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $departments = Department::all();
        $groups = Group::all();
        $subGroups = SubGroup::all();
        $products = Product::all(); // Fetch all products

        return view('admin.products.create', compact('departments', 'groups', 'subGroups', 'products'));
    }

    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'department_id' => 'required|exists:departments,id',
            'group_id' => 'required|exists:groups,id',
            'sub_group_id' => 'required|exists:sub_groups,id',
            'sub_group_id_1' => 'nullable|exists:sub_groups,id',
            'sub_group_id_2' => 'nullable|exists:sub_groups,id',
            'sub_group_id_3' => 'nullable|exists:sub_groups,id',
            'si_upc' => 'nullable',
            'barcode_sku' => 'nullable',
            'b_m' => 'nullable',
            'product_name' => 'required',
            'product_description' => 'required',
            'kg_ml' => 'nullable',
            'units' => 'nullable|integer',
            'ps' => 'nullable',
            'case' => 'nullable',
            'dimensions' => 'nullable',
            'cp_vat' => 'nullable',
            'is' => 'nullable',
            'lo' => 'nullable',
            'ar' => 'nullable',
            'vat' => 'nullable',
            'wscp_vat' => 'nullable',
            'samson_percent' => 'nullable',
            'unit_rrp' => 'nullable',
            'rupm' => 'nullable',
            'bcqty_1' => 'nullable|integer',
            'bcp_1' => 'nullable',
            'b_percent_1' => 'nullable',
            'bcqty_2' => 'nullable|integer',
            'bcp_2' => 'nullable',
            'b_percent_2' => 'nullable',
            'bcqty_3' => 'nullable|integer',
            'bcp_3' => 'nullable',
            'b_percent_3' => 'nullable',
            'linked_item_1' => 'nullable',
            'linked_item_2' => 'nullable',
            'linked_item_3' => 'nullable',
            'image.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Assuming max file size is 2MB
            'large_image.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'nullable|in:active,inactive',
        ]);

        // Create a new product with the validated data
        $product = Product::create($request->all());

        // Handle product thumbnails upload
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $image) {
                $path = $image->store('uploads/product_thumbnail');
                $product->productThumbnails()->create(['image' => $path]);
            }
        }

        // Handle product images upload
        if ($request->hasFile('large_image')) {
            foreach ($request->file('large_image') as $largeImage) {
                $path = $largeImage->store('uploads/product_large');
                $product->productImages()->create(['large_image' => $path]);
            }
        }

        // Store a success message in the session
        session()->flash('success', 'Product created successfully');

        return redirect('/admin/products');
    }

    public function edit(Product $product)
    {
        $departments = Department::all(); // Assuming you have a Department model
        $groups = Group::all(); // Assuming you have a Group model
        $subGroups = SubGroup::all(); // Assuming you have a SubGroup model

        return view('admin.products.edit', compact('product', 'departments', 'groups', 'subGroups'));
    }

  

}
