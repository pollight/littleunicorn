<?php

namespace App\Jobs;

use App\Models\Modification;
use App\Models\Product;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Services\MoySkladServices;
use Illuminate\Support\Facades\App;
use Ixudra\Curl\Facades\Curl;

class AddModificationMoySklad implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(MoySkladServices $moySkladServices)
    {
        dd($moySkladServices->getModification());
        foreach($moySkladServices->getModification() as $key=>$modification){
            dd($modification);
//            if($hrefProduct = $modification->product->meta->href){
//                $IDProduct = explode('/',$hrefProduct);
//                $product = Product::where('productId',$IDProduct[8])->firstOrFail();
//                $moy_sklad_services = new MoySkladServices;
//                if( !$modelModification = Modification::where('modificationId',$modification->id)->first() ){
//                    $modelModification = new Modification();
//                    $modelModification->modificationId = $modification->id;
//                    $modelModification->accountId = $modification->accountId;
//                }
//                $modelModification->description = isset($modification->description) ? $modification->description : null;
//                $modelModification->image = $moy_sklad_services->downloadImage($modification);
//                $modelModification->shared = isset($modification->shared) ? $modification->shared : null;
//                $modelModification->version = isset($modification->version) ? $modification->version : null;
//                $modelModification->updated = isset($modification->updated) ? $modification->updated : null;
//                $modelModification->name = $modification->name;
//                $modelModification->code = isset($modification->code) ? $modification->code : null;
//                $modelModification->externalCode = isset($modification->externalCode) ? $modification->externalCode : null;
//                $modelModification->archived = isset($modification->archived) ? $modification->archived : null;
//                $modelModification->pathName = isset($modification->pathName) ? $modification->pathName : null;
//                $modelModification->minPrice = isset($modification->minPrice) ? $modification->minPrice : null;
//                $modelModification->salePrices = isset($modification->salePrices) ? json_encode($modification->salePrices) : null;
//                $modelModification->buyPriceValue = isset($modification->buyPrice ) ? $modification->buyPrice->value : null;
//               $modelModification->buyPriceCurrency = isset($modification->buyPrice ) ? $moy_sklad_services->getCurrencyBuyPrice($modification->buyPrice->currency->meta->href) : null;
//                $modelModification->article = isset($modification->article) ? $modification->article : null;
//                $modelModification->weight = isset($modification->weight) ? $modification->weight : null;
//                $modelModification->volume = isset($modification->volume) ? $modification->volume : null;
//                $modelModification->barcodes = isset($modification->barcodes) ? json_encode($modification->barcodes) : null;
//                $modelModification->modificationsCount = isset($modification->modificationsCount) ? $modification->modificationsCount : null;
//                $modelModification->isSerialTrackable = isset($modification->isSerialTrackable) ? $modification->isSerialTrackable : null;
//                $modelModification->characteristics = isset($modification->characteristics) ? json_encode($modification->characteristics) : null;
//
//                $store = $moy_sklad_services->getStore($modification->id);
//                $modelModification->store = isset($store->rows) ? json_encode($store->rows) : null;
//                $modelModification->save();
//                $modelModification->products()->detach($product->id);
//                $modelModification->products()->attach($product->id);
//            }
        }
    }
}
