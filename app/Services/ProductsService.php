<?php


namespace App\Services;


class ProductsService
{
    protected $category;

    public function __construct($category)
    {
        $this->category = $category;
    }

    public function getAll()
    {
        // commented to test mocking
//        return [
//            [
//                'id'       => 1,
//                'name'     => 'pro_1',
//                'category' => $this->category
//            ],
//            [
//                'id'       => 2,
//                'name'     => 'pro_2',
//                'category' => $this->category
//            ]
//        ];
    }
}
