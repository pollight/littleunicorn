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

class UpdateProductMoySklad implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $list;
    protected $product;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Product $product, $list)
    {
        //
        $this->list = $list;
        $this->product = $product;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        $list = $this->list;
        $assortment = $this->product;
        $moy_sklad_services = new MoySkladServices;
        echo "update id-{$list->id}, name-{$list->fields->name} \n";
        $assortment->productId = $list->fields->id;
        $assortment->description = isset($list->fields->description) ? $list->fields->description : null;
        $assortment->image = $moy_sklad_services->downloadImage($list);
        $assortment->accountId = $list->fields->accountId;
        $assortment->shared = isset($list->fields->shared) ? $list->fields->shared : null;
        $assortment->version = isset($list->fields->version) ? $list->fields->version : null;
        $assortment->updated = isset($list->fields->updated) ? $list->fields->updated : null;
        $assortment->name = $list->fields->name;
        $assortment->code = isset($list->fields->code) ? $list->fields->code : null;
        $assortment->externalCode = isset($list->fields->externalCode) ? $list->fields->externalCode : null;
        $assortment->archived = isset($list->fields->archived) ? $list->fields->archived : null;
        $assortment->pathName = $list->fields->pathName;
        $assortment->minPrice = isset($list->fields->minPrice) ? $list->fields->minPrice : null;
        $assortment->salePrices = isset($list->fields->salePrices) ? json_encode($list->fields->salePrices) : null;
        $assortment->buyPriceValue = isset($list->fields->buyPrice->value) ? $list->fields->buyPrice->value : null;
        $assortment->buyPriceCurrency = $moy_sklad_services->getCurrencyBuyPrice($list->fields->buyPrice->currency->meta->href);
        $assortment->article = isset($list->fields->article) ? $list->fields->article : null;
        $assortment->weight = isset($list->fields->weight) ? $list->fields->weight : null;
        $assortment->volume = isset($list->fields->volume) ? $list->fields->volume : null;
        $assortment->barcodes = isset($list->fields->barcodes) ? json_encode($list->fields->barcodes) : null;
        $assortment->modificationsCount = isset($list->fields->modificationsCount) ? $list->fields->modificationsCount : null;
        $assortment->isSerialTrackable = isset($list->fields->isSerialTrackable) ? $list->fields->isSerialTrackable : null;
        $assortment->country = $list->relations->find(Country::class) != null ? $moy_sklad_services->getCountry($list->relations->find(Country::class)->fields->meta->href) : null;
        $store = $moy_sklad_services->getStore($list->fields->id);
        $assortment->store = isset($store->rows) ? json_encode($store->rows) : null;
        $assortment->save();
        if($list->fields->pathName != null){
            $categoryLists = explode('/',$list->fields->pathName);
            foreach ($categoryLists as $key=>$categoryList){
                if($key == 0){
                    $parent = 0;
                    if(!$category = Category::where('name',$categoryList)->first() ){
                        $category = Category::create(['name' => $categoryList,'category_id'=>$parent]);
                    }
                    $parent = $category->id;
                }
                if(!$category = Category::where('name',$categoryList)->first() ){
                    $category = Category::create(['name' => $categoryList,'category_id'=>$parent]);
                }
                $parent = $category->id;
                $assortment->category_id = $parent;
                $assortment->save();
            }
        }
    }
}
