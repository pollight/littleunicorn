<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

use App\Models\Product;
use App\Models\Category;
use MoySklad\Entities\Country;
use App\Services\MoySkladServices;


class SetProductMoySklad implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $list;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($list)
    {
        //
        $this->list = $list;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(MoySkladServices $moySkladServices)
    {
        //        Добавить товар
        foreach ($moySkladServices->getProducts() as $product){
            $moySkladServices->addProduct($product);
        }
        //        Добавить модификации.

//        foreach($moySkladServices->getModification() as $key=>$modification) {
//            $moySkladServices->addModification($modification);
//        }
    }
}


//        if($list->fields->pathName != null){
//            $categoryLists = explode('/',$list->fields->pathName);
//            foreach ($categoryLists as $key=>$categoryList){
//                if($key == 0){
//                    $parent = 0;
//                    if(!$category = Category::where('name',$categoryList)->first() ){
//                        $category = Category::create(['name' => $categoryList,'category_id'=>$parent]);
//                    }
//                    $parent = $category->id;
//                }
//                if(!$category = Category::where('name',$categoryList)->first() ){
//                    $category = Category::create(['name' => $categoryList,'category_id'=>$parent]);
//                }
//                $parent = $category->id;
//                $assortment->category_id = $parent;
//                $assortment->save();
//            }
//        }