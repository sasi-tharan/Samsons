<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Throwable;
use Log;

class ProductImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        try {
            return new Product([
                'department_id' => $row['department_id'],
                'group_id' => $row['group_id'],
                'sub_group_id' => $row['sub_group_id'],
                'sub_group_id_1' => $row['sub_group_id_1'],
                'sub_group_id_2' => $row['sub_group_id_2'],
                'sub_group_id_3' => $row['sub_group_id_3'],
                'si_upc' => $row['si_upc'],
                'barcode_sku' => $row['barcode_sku'],
                'b_m' => $row['b_m'],
                'product_name' => $row['product_name'],
                'product_description' => $row['product_description'],
                'kg_ml' => $row['kg_ml'],
                'units' => $row['units'],
                'ps' => $row['ps'],
                'case' => $row['case'],
                'dimensions' => $row['dimensions'],
                'cp_vat' => $row['cp_vat'],
                'is' => $row['is'],
                'lo' => $row['lo'],
                'ar' => $row['ar'],
                'vat' => $row['vat'],
                'wscp_vat' => $row['wscp_vat'],
                'samson_percent' => $row['samson_percent'],
                'unit_rrp' => $row['unit_rrp'],
                'rupm' => $row['rupm'],
                'bcqty_1' => $row['bcqty_1'],
                'bcp_1' => $row['bcp_1'],
                'b_percent_1' => $row['b_percent_1'],
                'bcqty_2' => $row['bcqty_2'],
                'bcp_2' => $row['bcp_2'],
                'b_percent_2' => $row['b_percent_2'],
                'bcqty_3' => $row['bcqty_3'],
                'bcp_3' => $row['bcp_3'],
                'b_percent_3' => $row['b_percent_3'],
                'linked_item_1' => $row['linked_item_1'],
                'linked_item_2' => $row['linked_item_2'],
                'linked_item_3' => $row['linked_item_3'],
                'status' => $row['status'],
                'trending' => $row[38] ?? 0, // Default to 0 if not provided
                'featured' => $row[39] ?? 0, // Default to 0 if not provided
            ]);
        } catch (Throwable $e) {
            // Log any errors that occur during import
            Log::error('Error importing product: ' . $e->getMessage());
        }

        return null;
    }
}
