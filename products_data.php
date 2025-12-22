<?php
$product_data_array = [
    1 => [
        "id" => 1,
        "name" => "Fall Limited Edition Sneakers",
        "merk" => "Sneaker Company",
        "details" => "These low-profile sneakers are your perfect casual wear companion.",
        "price" => 150,
         "image_path" => "images/image-product-1.jpg",
        "images" => [
            "images/image-product-1.jpg",
            "images/image-product-2.jpg",
            "images/image-product-3.jpg",
            "images/image-product-4.jpg"
        ],
        "thumbnails" => [
            "images/image-product-1-thumbnail.jpg",
            "images/image-product-2-thumbnail.jpg",
            "images/image-product-3-thumbnail.jpg",
            "images/image-product-4-thumbnail.jpg"
        ],
        "discounts" => [
            [
                "is_active" => true,
                "type" => "percentage",
                "amount" => 50
            ]
        ]
    ],

    2 => [
        "id" => 2,
        "name" => "Luxe Glitter Buckle Belt - Bruin",
        "merk" => "Belt Company",
        "details" => "De Luxe Glitter Circular Buckle Belt in Bruin...",
        "price" => 30.99,
         "image_path" => "images/belt.jpg",
        "images" => [
            "images/belt.jpg",
            "images/belt.jpg"
        ],
        "thumbnails" => [
            "images/belt.jpg",
            "images/belt.jpg"
        ],
        "discounts" => [
            [
                "is_active" => true,
                "type" => "percentage",
                "amount" => 20
            ]
        ]
            ],
             3 => [
        "id" => 3,
        "name" => "Mooie Jurk",
        "merk" => "Dagi",
        "details" => "Vierkante hals, polyamide, gebreid, zonder beugels, vaste bandjes",
        "price" => 38,99,
        "image_path" => "images/red-dress.jpg",
         "images" => [
            "images/red-dress.jpg",
            "images/red-dress.jpg"
        ],
        "thumbnails" => [
            "images/red-dress.jpg",
            "images/red-dress.jpg"
        ],
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
function format_price ($price) {
  return number_format($price, 2, ',', '.');
}

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

    $formatted_price = format_price($product['price']);

    return [
        'original_price_formatted' => $formatted_price,
        'original_price' => $product['price']
    ];
}

function get_discounts($id, $formatted = false)
{
    $product = get_product_by_id($id);

    if (!$product) {
        echo "Product not found";
        return null;
    }

    $price = $product['price'];
    $discountPercentage = 0;
    $discount = 0;

    if (!empty($product['discounts'])) {
        $all_discounts = $product['discounts'];
        $active_discounts = array_filter($all_discounts, function ($v, $k) {
            return $v['is_active'] === true;
        }, ARRAY_FILTER_USE_BOTH);

        // echo '<pre>';
        // print_r($active_discounts);
        // echo '</pre>';

        foreach ($active_discounts as $d) {
            if($d['type'] === 'percentage') {
                $discountPercentage = $d['type'] === 'percentage' ? $d['amount'] : 0;
                $discount = ($discountPercentage / 100) * $price;
                break;
            } else {}
        }
    }

    $final_price = $price - $discount;
    if($formatted) {
        $final_price = format_price($final_price);
    }

    return [
        'final_price' => $final_price,
        'discount_percentage' => $discountPercentage
    ];
}