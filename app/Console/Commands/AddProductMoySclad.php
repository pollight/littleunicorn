<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use MoySklad\MoySklad;
use MoySklad\Entities\Products\Product as ProductMoySklad;
use App\Jobs\SetProductMoySklad;
use App\Models\Product;
//use App\Jobs\UpdateProductMoySklad;
use App\Jobs\AddModificationMoySklad;

class AddProductMoySclad extends Command
{
    protected $login;
    protected $password;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'moysklad:add';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Добавить товары м мой склад или обновить текущие';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->login = config('moy-sklad.auth.login');
        $this->password = config('moy-sklad.auth.password');

        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $sklad = MoySklad::getInstance($this->login,  $this->password);
        $lists = ProductMoySklad::query($sklad)->getList();
        foreach($lists as $list){
            if(!$product = Product::where('productId',$list->fields->id)->first() ){
                dispatch(new SetProductMoySklad($list));
            }
        }
//        dispatch(new AddModificationMoySklad());
    }
}