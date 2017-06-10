
<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SeederTableUser::class);
        $this->call(SeederTablePermission::class);
        $this->call(SeederTableStag::class);
        $this->call(SeederTableItag::class);

        $this->call(SeederTableShopOwner::class);
        $this->call(SeederTableShopLocation::class);

        $this->call(SeederTableShop::class);
        $this->call(SeederTableCustomer::class);
        $this->call(SeederTableItem::class);
        $this->call(SeederTableOrder::class);
        $this->call(SeederTableOrderedItem::class);
        
        
        

    }
}
