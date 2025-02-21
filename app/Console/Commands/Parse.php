<?php

namespace App\Console\Commands;

use App\Actions\ArticleActions;
use App\Actions\CategoryActions;
use Illuminate\Console\Command;

class Parse extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'parse';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Parse data.xml and insert into database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $xml = simplexml_load_file(storage_path('app/data.xml'));

        foreach ($xml->children() as $categoryElement) {
            $category = CategoryActions::create((string)$categoryElement->Category->Name);

            foreach ($categoryElement->Category->Elements->children() as $postElement) {
                $images = [];

                foreach ($postElement->children() as $child) {
                    $tagName = $child->getName();
                    if (strpos($tagName, 'Pict') === 0) {
                        $images[] = trim((string)$child);
                    }
                }

                ArticleActions::create(
                    $postElement->Name,
                    $postElement->Description,
                    $category->id,
                    $images,
                );
            }
        }
    }
}
