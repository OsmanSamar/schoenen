<?php

$product_data_array = [
    1 => [
        "id" => 1,
        "name" => "Fall Limited Edition Sneakers",
        "image_path" => "images/image-product-1.jpg",
        "price" => 250,
        "discounts" => [
            [
                "is_active" => true,
                "type" => "percentage", // percentage | static
                "amount" => 50
            ]
        ]
    ]
];

//The function get_product_by_id is used to fetch product details based on a given product ID, returning the corresponding data or null if the ID is not found. This is a common pattern for accessing data in associative arrays in PHP.

function get_product_by_id($id)
{
    global $product_data_array;

    return $product_data_array[$id] ?? null;
}

function get_original_price($id)
{
    $product = get_product_by_id($id);

    if (!$product) {
        echo "Product not found";
        return null;
    }

    return $product['price'];
}

function get_discount_price($id)
{
    $product = get_product_by_id($id);

    if (!$product) {
        echo "Product not found";
        return null;
    }

    $price = $product['price'];

    if (!empty($product['discounts'])) {
        $all_discounts = $product['discounts'];
        $active_discounts = array_filter($all_discounts, function ($v, $k) {
            return $v['is_active'] === true;
        }, ARRAY_FILTER_USE_BOTH);


        foreach ($active_discounts as $d) {
            // if ($d['is_active']) {
            //     $discountPercent = $d['type'] === 'percentage' ? $d['amount'] : 0;
            //     $discount = ($discountPercent / 100) * $price;
            //     break;
            // }
        }
    }

    return $price;
}