<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        // Fetch the product data from the database with eager loading of product images and thumbnails
        return Product::with('productImages', 'productThumbnails')->get();
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        // Define the column headings for the Excel file
        return [
            'id',
            'created_at',
            'updated_at',
            'si_upc',
            'barcode_sku',
            'b_m',
            'product_name',
            'product_description',
            'department_id',
            'group_id',
            'sub_group_id',
            'kg_ml',
            'units',
            'ps',
            'case',
            'dimensions',
            'cp_vat',
            'is',
            'lo',
            'ar',
            'vat',
            'wscp_vat',
            'samson_percent',
            'unit_rrp',
            'rupm',
            'bcqty_1',
            'bcp_1',
            'b_percent_1',
            'bcqty_2',
            'bcp_2',
            'b_percent_2',
            'bcqty_3',
            'bcp_3',
            'b_percent_3',
            'linked_item_1',
            'linked_item_2',
            'linked_item_3',
            'status',
            'sub_group_id_1',
            'sub_group_id_2',
            'sub_group_id_3',
            'trending',
            'featured',
            'image_urls', // New column for image URLs
            'thumbnail_urls', // New column for thumbnail URLs
        ];
    }
}
