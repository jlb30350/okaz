<?php

function getListings(): array
{
    return  [
        ["title" => "Sniper Elite 5", "price" => 30, "image" => "jeux1.jpg","description" => "Test description1"],
        ["title" => "Test2", "price" => 20, "image" => "jeux2.jpg", "description" => "Test description2"],
        ["title" => "Test3", "price" => 10, "image" => "jeux3.jpg","description" => "Test description3"],
    ];
}
function getListingById(int $id): array 
{
    $listings = getListings();
    return $listings[$id];
}
