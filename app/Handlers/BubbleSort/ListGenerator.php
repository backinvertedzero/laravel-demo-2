<?php

namespace App\Handlers\BubbleSort;

class ListGenerator
{
    public function generate(int $count = 200): array
    {
        $list = [];
        for ($i = 0; $i < $count; $i++) {
            $list[] = mt_rand(-1000000, 1000000);
        }

        return $list;
    }
}