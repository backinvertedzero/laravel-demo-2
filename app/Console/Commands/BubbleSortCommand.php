<?php

namespace App\Console\Commands;

use App\Handlers\BubbleSort\ListGenerator;
use App\Handlers\BubbleSort\BubbleSorter;
use Illuminate\Console\Command;

class BubbleSortCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:bubble-sort {--elements=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Bubble sort demo';

    /**
     * Execute the console command.
     */
    public function handle(ListGenerator $listGenerator, BubbleSorter $bubbleSorter)
    {
        $elements = $this->option('elements') ?? 200;

        try {
            $list = $listGenerator->generate($elements);
            $unsortedSlice = implode(', ', array_slice($list, 0, 10));
            $this->info("До сортировки");
            $this->info("Первые 10 элементов списка: $unsortedSlice");

            $bubbleSorter->sort($list);
            $sortedSlice = implode(', ', array_slice($list, 0, 10));
            $this->info("После сортировки");
            $this->info("Первые 10 элементов списка: $sortedSlice");
        } catch (\Throwable $exception) {
            $this->error($exception->getMessage());
        }

    }
}
