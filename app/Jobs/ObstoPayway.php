<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Models\Backend\DirectDebitWithPayway;

class ObstoPayway implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $account_id;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($account_id)
    {
        $this->account_id = $account_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $directDebitList = DirectDebitWithPayway::findOrFail($this->account_id);

        $account_number = $directDebitList->getAccountInformation->direct_debit_ac_number ?? '';
        $obs_account_number = $directDebitList->getAccountInformation->account_number ?? '';
        $account_bsb = $directDebitList->getAccountInformation->direct_debit_bsb ?? '';
        $account_name = getUsersByCustomerId($directDebitList->getAccountInformation->UserId[0]->customer_number)->name ?? '';

        /*************Demo Key******************/ 
        // $usernamePublishKey = "T16019_PUB_uxpksebczhn7wdy5n9njuckz4bkyi4ikz58zvmqf9ab64mj4wbp7fn3a9dcu";
        // $username = "T16019_SEC_6f27v7ceenb4ye9hcn58rzqyrt4ns98smicpztaqt3muqbwcztftv5a77ffc";
        
        /*************Live Key******************/ 
        $usernamePublishKey = "Q26823_PUB_xfm8x376zwptyqijc9znb6s6n8pnw3ya3ufdy8xuajcbaknznj2pch8e3a35";
        $username = "Q26823_SEC_gb4xzfq2y9vfj8rmq3xcguyfsa5s8xxdi3vy8rrb6kcdgxnzyukgg7hkhvtm";
        $password = "";



        $urlSingle = "https://api.payway.com.au/rest/v1/single-use-tokens";
        $dataSingle = [
            'paymentMethod' => 'bankAccount',
            'bsb' => $account_bsb,
            'accountNumber' => $account_number,
            'accountName' => $account_name
        ];


        // $dataSingle = [
        //     'paymentMethod' => 'bankAccount',
        //     'bsb' => '000-000',
        //     'accountNumber' => '213256456',
        //     'accountName' => 'MdTarikulAccount'
        // ];
        
        $curlSingle = curl_init($urlSingle); 
        curl_setopt($curlSingle, CURLOPT_POST, true);                                                             
        curl_setopt($curlSingle, CURLOPT_POSTFIELDS, http_build_query($dataSingle));                                    
        curl_setopt($curlSingle, CURLOPT_RETURNTRANSFER, true);                                                   
        curl_setopt($curlSingle, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded')); 
        curl_setopt($curlSingle, CURLOPT_HTTPHEADER, array(
                'Authorization: Basic ' . base64_encode($usernamePublishKey . ':' . $password)
            ));
        $responseSingle = curl_exec($curlSingle);                                                                       
        curl_close($curlSingle);

        $manage = json_decode($responseSingle, true);

        // return $manage['singleUseTokenId'];




        $url = "https://api.payway.com.au/rest/v1/customers";
        $data = [
            'singleUseTokenId' => $manage['singleUseTokenId'],
            // 'bankAccountId' => '0000000A',
            'bankAccountId' => '034001607897A',
            'customerName' => $account_name,
            'frequency' => 'weekly',
            'nextPaymentDate' => date('d M Y', strtotime($directDebitList->start_date)),
            'nextPrincipalAmount' => $directDebitList->transaction_amount,
            'regularPrincipalAmount' => $directDebitList->transaction_amount,
            'customField1' => $obs_account_number
        ];

        // $data = [
        //     'singleUseTokenId' => $manage['singleUseTokenId'],
        //     'bankAccountId' => '0000000A',
        //     'customerName' => 'MdTarikulAccount',
        //     'frequency' => 'weekly',
        //     'nextPaymentDate' => '2 Feb 2022',
        //     'nextPrincipalAmount' => 11,
        //     'regularPrincipalAmount' => 11
        // ];
        

        $curl = curl_init($url);                                                                            
        curl_setopt($curl, CURLOPT_POST, true);                                                             
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));                                    
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);                                                   
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));   
        
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'Authorization: Basic ' . base64_encode($username . ':' . $password)
        ));      

        $response = curl_exec($curl);                                                                       
        curl_close($curl);  
        
        $account_details = json_decode($response, true);


        if( !empty($account_details['customerNumber']) ) {
            $directDebitList->update(['payway_customer' => $account_details['customerNumber'],'status' => 1]);
        }
        // return $account_details['customerNumber']; 
        // return redirect()->back()->with('FlsMsg','You have successfully synced with Payway');
    }
}
