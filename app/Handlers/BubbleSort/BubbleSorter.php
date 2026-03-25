<?php

namespace App\Handlers\BubbleSort;

class BubbleSorter
{
    public function sort(array &$list): void
    {
        $n = count($list);
        if ($n <= 1) return;

        for ($i = 0; $i < $n - 1; $i++) {
            $swapped = false;
            for ($j = 0; $j < $n - 1 - $i; $j++) {
                if ($list[$j] > $list[$j + 1]) {
                    $temp = $list[$j];
                    $list[$j] = $list[$j + 1];
                    $list[$j + 1] = $temp;
                    $swapped = true;
                }
            }
            if (!$swapped) break;
        }
    }
}