<?php

namespace App\Http\Controllers\Admin;

use App\Models\Group;
use App\Models\Product;
use App\Models\SubGroup;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Exports\ProductExport;
use App\Imports\ProductImport;
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
        // Create a new product with the validated data
        $product = Product::create([
            'department_id' => $request->department_id,
            'group_id' => $request->group_id,
            'sub_group_id' => $request->sub_group_id,
            'sub_group_id_1' => $request->sub_group_id_1,
            'sub_group_id_2' => $request->sub_group_id_2,
            'sub_group_id_3' => $request->sub_group_id_3,
            'si_upc' => $request->si_upc,
            'barcode_sku' => $request->barcode_sku,
            'b_m' => $request->b_m,
            'product_name' => $request->product_name,
            'product_description' => $request->product_description,
            'kg_ml' => $request->kg_ml,
            'units' => $request->units,
            'ps' => $request->ps,
            'case' => $request->case,
            'dimensions' => $request->dimensions,
            'cp_vat' => $request->cp_vat,
            'is' => $request->is,
            'lo' => $request->lo,
            'ar' => $request->ar,
            'vat' => $request->vat,
            'wscp_vat' => $request->wscp_vat,
            'samson_percent' => $request->samson_percent,
            'unit_rrp' => $request->unit_rrp,
            'rupm' => $request->rupm,
            'bcqty_1' => $request->bcqty_1,
            'bcp_1' => $request->bcp_1,
            'b_percent_1' => $request->b_percent_1,
            'bcqty_2' => $request->bcqty_2,
            'bcp_2' => $request->bcp_2,
            'b_percent_2' => $request->b_percent_2,
            'bcqty_3' => $request->bcqty_3,
            'bcp_3' => $request->bcp_3,
            'b_percent_3' => $request->b_percent_3,
            'linked_item_1' => $request->linked_item_1,
            'linked_item_2' => $request->linked_item_2,
            'linked_item_3' => $request->linked_item_3,
            'status' => $request->status,
            'trending' => $request->trending == true ? '1' : '0',
            'featured' => $request->featured == true ? '1' : '0',
        ]);

        // Handle product thumbnails upload
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $image) {
                $path = $image->store('uploads/product_thumbnail');
                $product->productThumbnails()->create(['image' => $path]);
            }
        }

        // Handle large image upload
        if ($request->hasFile('large_image')) {
            $file = $request->file('large_image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/product_large/', $filename);
            $product->productImages()->create(['large_image' => "uploads/product_large/$filename"]);
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

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        $file = $request->file('file');

        // Import Excel file data using Maatwebsite Excel
        Excel::import(new ProductImport, $file);

        return redirect('/admin/products')->with('success', 'Product data imported successfully');
    }

    public function export()
    {
        return Excel::download(new ProductExport(), 'products.xlsx');
    }

    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

}
