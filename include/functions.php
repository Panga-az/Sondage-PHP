<?php



function getData(array $data): array
{
    $data_ = [];
    foreach ($data as $dat) {
        $data_ = 
        [
            "id"=> $dat["id"],
        ];
    }

    return $data_;
   
}
