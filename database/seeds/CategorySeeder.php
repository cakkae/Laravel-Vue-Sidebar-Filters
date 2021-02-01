<?php

use Illuminate\Database\Seeder;
use App\Category;
use App\Product;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $curl_handle=curl_init();
        curl_setopt($curl_handle, CURLOPT_URL,'http://localhost:8090/api/products');
        curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 2);
        curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl_handle, CURLOPT_USERAGENT, 'Your application name');
        $query = curl_exec($curl_handle);
        $products = json_decode($query, true);
        foreach($products as $key => $value)
        {
            if($value['acClassif'] != '' && !empty($value['acClassif']))
                $parent = Category::firstOrCreate(
                    ['name' => $value['acClassif']],
                        [
                            'parent_id' => 0
                        ]
                );

            if($value['acClassif2'] != '' && !empty($value['acClassif2']))
            $category = Category::firstOrCreate(
                ['name' => $value['acClassif2']],
                    [
                        'parent_id' => $parent->id
                    ]
            );
            
            $product = Product::firstOrCreate(
                ['code' => $value['acIdent']],
                    [
                        'name' => $value['acName'],
                        'category_id' => $category->id,
                        'quantity' => $value['anStock'],
                        'price' => $value['Mpc']    
                    ]
            );

        }
        curl_close($curl_handle);
    }
}
