<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Billing;
use DB;

class GenerateBilling extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'GenerateBilling';

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
    public function handle()
    {
        $caSql = "SELECT * from users where user_type_id=1";
        $caUsers = DB::select(DB::raw($caSql));
        foreach ($caUsers as $user) {
            $caSql = "SELECT * from users where p_id=$user->id";
            $caUsers = DB::select(DB::raw($caSql));
            $found_users = count($caUsers);
            //$found_users = 765;
            $curDate = date('Y-m-d');

            $beforeDate = date('d', strtotime($curDate));
            $startDate = date('d', strtotime($user->service_start_date));

            //$from = date_create($curDate);
            //$to = date_create($curDate);
            $to = date_modify(date_create($curDate), '-1 day');
            $from = date_modify(date_create($curDate), '-1 month');

            $toDate = date_format($to, 'd M Y');
            $fromDate = date_format($from, 'd M Y');


            if ($startDate == $beforeDate) {
                $userSql = "SELECT id, amount from plans where users_to>$found_users and users_from<=$found_users";
                $Users = DB::select(DB::raw($userSql));

                $insertArray = [
                    'u_id' => $user->id,
                    'invoice' => "INV-" . mt_rand(10000000, 99999999),
                    'user_count' => $found_users,
                    'plan_id' => $Users[0]->id,
                    'amount' => $Users[0]->amount,
                    'status' => 0,
                    'bill_between' => $fromDate . " - " . $toDate,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ];
                Billing::insert($insertArray);


                //SMS API CODE=======
                $authKey = "5623AF5coFujT46r5a000503";

                $mobileNumber = $user->mobile;
                //$senderId = "METROO";
                //$mobileNumber = '9891785631';
                $senderId = "CATOOL";
                $message = "Bill Generated for " . $fromDate . " - " . $toDate . ". Total Amount need to be pay is " . $Users[0]->amount;

                $message = urlencode($message);

                $postData = array(
                    'authkey' => $authKey,
                    'mobiles' => $mobileNumber,
                    'message' => $message,
                    'sender' => $senderId
                );

                $url = "http://54.254.187.140/api/sendhttp.php";

                // init the resource
                $ch = curl_init();
                curl_setopt_array($ch, array(
                    CURLOPT_URL => $url,
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_POST => true,
                    CURLOPT_POSTFIELDS => $postData
                ));

                //Ignore SSL certificate verification
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

                //get response
                $output = curl_exec($ch);

                //Print error if any
                if (curl_errno($ch)) {
                    echo 'error:' . curl_error($ch);
                }

                curl_close($ch);

                echo "IN";
            } else {
                echo "OUT";
            }
        }
    }

}
