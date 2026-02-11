<?php
use App\Jobs\ProcessUserTokens;
use App\Models\Employee;
use App\Models\manager;
use App\Models\User;
use Illuminate\Support\Facades\Schedule;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Schedule::call(function () {
   //reload tokens
   $employes = DB::table('employees')->get();
   $managers = DB::table('managers')->get();
   DB::table('employees')
        ->update(array('tokens' => 1000));  
  DB::table('managers')
        ->update(array('tokens' => 1000));

})->everyFiveSeconds();
