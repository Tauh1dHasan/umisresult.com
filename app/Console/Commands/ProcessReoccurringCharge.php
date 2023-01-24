<?php

namespace App\Console\Commands;

use DateTime;
use Carbon\Carbon;
use Illuminate\Console\Command;
use App\Models\Backend\Transaction;
use Illuminate\Support\Facades\Log;
use App\Models\Backend\ReoccurringCharge;

class ProcessReoccurringCharge extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:ProcessReoccurringCharge {type}';

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
     * @return int
     */
    public function handle()
    {
        $commandType = $this->argument('type');
        // $this->info('Processing Charge ...' . $commandType);

            if($commandType == 'daily'){
                // $this->info('Processing Charge ...' . $commandType);
                $this->dayWiseReoccurringChargeInTransaction();
            }
            
            if($commandType == 'weekly'){

                $this->weeklyWiseReoccurringChargeInTransaction();
            }
            if($commandType == 'biweekly'){
                $this->biWeeklyWiseReoccurringChargeInTransaction();
            }
            if($commandType == 'monthly'){
                $this->monthlyWiseReoccurringChargeInTransaction();
            }
            if($commandType == 'yearly'){
                $this->yearlyWiseReoccurringChargeInTransaction();
            }

    }

    /**
     * @TODO  
     * DAILY REOCCURRING CHARGE WILL BE ADDED (DAILY IN EVERY MONTH)
     * 
     * @FREQUENCY - 1 = DAILY
     * 
     * @FREQUENCY - 1 = DAILY, 2 = WEEKLY, 3 = BI-WEEKLY, 4 = MONTHLY, 5 = ANNUALLY
     *
     * @return void
     */
    public function dayWiseReoccurringChargeInTransaction()
    {
        // Fetch the reoccurring data from database
        return ReoccurringCharge::where('frequency',1)->chunk(99, function($reoccurringCharges){
        
            foreach( $reoccurringCharges as $charge ) {
                // Set Debit and Credit
                if( $charge->ledger_type == 1 ) {
                    $Credit = $charge->transaction_amount;
                } else {
                    $Dedit = $charge->transaction_amount;
                }
    
                $today = date("Y-m-d");
    
                if( $charge->start_date <= $today ) {
                    // Need to set time
                    $transaction = new Transaction();
                    $transaction->account_id        = $charge->account_id;
                    $transaction->ledger_type       = $charge->ledger_type;
                    $transaction->credit            = $Credit ?? 0;
                    $transaction->debit             = $Dedit ?? 0;
                    $transaction->balance           = 0;
                    $transaction->tr_issue_date     = $today;
                    $transaction->transaction_type  = $charge->transaction_type;
                    $transaction->captured_from     = 2;
                    $transaction->status            = 2;
                    $transaction->created_by        = 1;
                    $transaction->save();
                }
    
            }
    
        });

    }



    
    /**
     * @TODO  
     * WEEKLY REOCCURRING CHARGE WILL BE ADDED (ONE TIME IN EVERY WEEK)
     * 
     * @FREQUENCY - 2 = WEEKLY
     * 
     * @FREQUENCY - 1 = DAILY, 2 = WEEKLY, 3 = BI-WEEKLY, 4 = MONTHLY, 5 = ANNUALLY
     *
     * @return void
     */
    public function weeklyWiseReoccurringChargeInTransaction()
    {
        // Fetch the reoccurring data from database
        return ReoccurringCharge::where('frequency',2)->chunk(99, function($reoccurringCharges){
        
            foreach( $reoccurringCharges as $charge ) {
                // Set Debit and Credit
                if( $charge->ledger_type == 1 ) {
                    $Credit = $charge->transaction_amount;
                } else {
                    $Dedit = $charge->transaction_amount;
                }
    
                $today = date("Y-m-d");
                $d = new DateTime($today);
                $currentDay =  $d->format('l');

                if( $charge->start_date <= $today  && ucfirst($charge->charge_day) == $currentDay ) {
                    // Need to set time
                    $transaction = new Transaction();
                    $transaction->account_id        = $charge->account_id;
                    $transaction->ledger_type       = $charge->ledger_type;
                    $transaction->credit            = $Credit ?? 0;
                    $transaction->debit             = $Dedit ?? 0;
                    $transaction->balance           = 0;
                    $transaction->tr_issue_date     = $today;
                    $transaction->transaction_type  = $charge->transaction_type;
                    $transaction->captured_from     = 2;
                    $transaction->status            = 2;
                    $transaction->created_by        = 1;
                    $transaction->save();
                }
    
            }
    
        });

    }



    /**
     * @TODO  
     * BI-WEEKLY REOCCURRING CHARGE WILL BE ADDED (TWO TIME IN EVERY MONTH - AFTER 14 DAYS)
     * 
     * @FREQUENCY - 3 = BI-WEEKLY
     * 
     * @FREQUENCY - 1 = DAILY, 2 = WEEKLY, 3 = BI-WEEKLY, 4 = MONTHLY, 5 = ANNUALLY
     *
     * @return void
     */
    public function biWeeklyWiseReoccurringChargeInTransaction()
    {
        // Fetch the reoccurring data from database
        return ReoccurringCharge::where('frequency',3)->chunk(99, function($reoccurringCharges){
        
            foreach( $reoccurringCharges as $charge ) {
                // Set Debit and Credit
                if( $charge->ledger_type == 1 ) {
                    $Credit = $charge->transaction_amount;
                } else {
                    $Dedit = $charge->transaction_amount;
                }
    
                $today = date("Y-m-d");
    
                if( $charge->start_date <= $today ) {
                    // Need to set time
                    $transaction = new Transaction();
                    $transaction->account_id        = $charge->account_id;
                    $transaction->ledger_type       = $charge->ledger_type;
                    $transaction->credit            = $Credit ?? 0;
                    $transaction->debit             = $Dedit ?? 0;
                    $transaction->balance           = 0;
                    $transaction->tr_issue_date     = $today;
                    $transaction->transaction_type  = $charge->transaction_type;
                    $transaction->captured_from     = 2;
                    $transaction->status            = 2;
                    $transaction->created_by        = 1;
                    $transaction->save();
                }
    
            }
    
        });

    }



    /**
     * @TODO  
     * MONTHLY REOCCURRING CHARGE WILL BE ADDED (ONE TIME IN EVERY MONTH)
     * 
     * @FREQUENCY - 4 = MONTHLY
     * 
     * @FREQUENCY - 1 = DAILY, 2 = WEEKLY, 3 = BI-WEEKLY, 4 = MONTHLY, 5 = ANNUALLY
     *
     * @return void
     */
    public function monthlyWiseReoccurringChargeInTransaction()
    {
        // Fetch the reoccurring data from database
        return ReoccurringCharge::where('frequency',4)->chunk(99, function($reoccurringCharges){
        
            foreach( $reoccurringCharges as $charge ) {
                // Set Debit and Credit
                if( $charge->ledger_type == 1 ) {
                    $Credit = $charge->transaction_amount;
                } else {
                    $Dedit = $charge->transaction_amount;
                }
    
                $today = date("Y-m-d");

                $currentDayNumberOfThisMonth = Carbon::now()->daysInMonth;
    
                if( $charge->start_date <= $today && $charge->charge_day == $currentDayNumberOfThisMonth) {
                    
                    // Need to set time
                    $transaction = new Transaction();
                    $transaction->account_id        = $charge->account_id;
                    $transaction->ledger_type       = $charge->ledger_type;
                    $transaction->credit            = $Credit ?? 0;
                    $transaction->debit             = $Dedit ?? 0;
                    $transaction->balance           = 0;
                    $transaction->tr_issue_date     = $today;
                    $transaction->transaction_type  = $charge->transaction_type;
                    $transaction->captured_from     = 2;
                    $transaction->status            = 2;
                    $transaction->created_by        = 1;
                    $transaction->save();
                }
    
            }
    
        });

    }




    /**
     * @TODO  
     * YEARLY REOCCURRING CHARGE WILL BE ADDED (ONE TIME IN EVERY YEAR)
     * 
     * @FREQUENCY - 5 = YEARLY
     * 
     * @FREQUENCY - 1 = DAILY, 2 = WEEKLY, 3 = BI-WEEKLY, 4 = MONTHLY, 5 = ANNUALLY
     *
     * @return void
     */
    public function yearlyWiseReoccurringChargeInTransaction()
    {
        // Fetch the reoccurring data from database
        return ReoccurringCharge::where('frequency',5)->chunk(99, function($reoccurringCharges){
        
            foreach( $reoccurringCharges as $charge ) {
                // Set Debit and Credit
                if( $charge->ledger_type == 1 ) {
                    $Credit = $charge->transaction_amount;
                } else {
                    $Dedit = $charge->transaction_amount;
                }
    
                $today = date("Y-m-d");
                $currentMonthDay = Carbon::parse($today)->format('m-d');
                $chargeMonthDay = Carbon::parse($charge->charge_day)->format('m-d');

                if( $charge->start_date <= $today && $chargeMonthDay == $currentMonthDay ) {
                    // Need to set time
                    $transaction = new Transaction();
                    $transaction->account_id        = $charge->account_id;
                    $transaction->ledger_type       = $charge->ledger_type;
                    $transaction->credit            = $Credit ?? 0;
                    $transaction->debit             = $Dedit ?? 0;
                    $transaction->balance           = 0;
                    $transaction->tr_issue_date     = $today;
                    $transaction->transaction_type  = $charge->transaction_type;
                    $transaction->captured_from     = 2;
                    $transaction->status            = 2;
                    $transaction->created_by        = 1;
                    $transaction->save();
                }
    
            }
    
        });

    }























}
