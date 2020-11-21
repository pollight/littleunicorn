<?php

namespace App\Console\Commands;

use App\Models\Order;
use App\Services\SberServices;
use Illuminate\Console\Command;

class CheckStatusSber extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sber:status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(SberServices $sberServices)
    {
        //
        $orders = Order::where('status','!=',2)->get();
       foreach ($orders as $order){
           $status = $sberServices->getStatus($order);
       }

    }
}
