<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

//		 $this->call('UserTableSeeder');
//		$this->call('AnimalsTableSeeder');
		$this->call('DepartmentsTableSeeder');
		$this->call('UsersTableSeeder');
		$this->call('Job_titlesTableSeeder');
		$this->call('UsersTableSeeder');
		$this->call('Job_titlesTableSeeder');
		$this->call('System_logsTableSeeder');
		$this->call('VendorsTableSeeder');
		$this->call('DimensionsTableSeeder');
		$this->call('Paper_typesTableSeeder');
		$this->call('WeightsTableSeeder');
		$this->call('CallipersTableSeeder');
		$this->call('LocationsTableSeeder');
		$this->call('CallipersTableSeeder');
		$this->call('WarehousesTableSeeder');
		$this->call('RollsTableSeeder');
		$this->call('Machine_typesTableSeeder');
		$this->call('MachinesTableSeeder');
		$this->call('TrucksTableSeeder');
		$this->call('ContactsTableSeeder');
		$this->call('RemindersTableSeeder');
		$this->call('MemosTableSeeder');
		$this->call('Production_logsTableSeeder');
		$this->call('ClientsTableSeeder');
		$this->call('ProductsTableSeeder');
		$this->call('UnitsTableSeeder');
		$this->call('Purchase_ordersTableSeeder');
		$this->call('Recieving_reportsTableSeeder');
		$this->call('Sales_ordersTableSeeder');
		$this->call('Production_queuesTableSeeder');
		$this->call('Production_recordsTableSeeder');
//		$this->call('Delivery_queuesTableSeeder');
		$this->call('TermsTableSeeder');
//		$this->call('UnitsTableSeeder');
	}

}