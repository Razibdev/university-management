<?php

namespace App\Exports;

use App\Models\Category;
use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class ProductsExport implements WithHeadings, FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $productData = Product::select('category_id', 'product_name', 'product_code', 'product_color', 'price')->where('status', 1)->orderBy('id', 'Desc')->get();
        foreach ($productData as $key => $product){
            $catName = Category::select('category_name')->where('id', $product->category_id)->first();
            $productData[$key]->category_id = $catName->category_name;
        }
        return $productData;
    }

    public function headings(): array
    {
        // TODO: Implement headings() method.

        return['Category Name', 'Product Name', 'Product Code', 'Product Color', 'Price'];
    }

}
