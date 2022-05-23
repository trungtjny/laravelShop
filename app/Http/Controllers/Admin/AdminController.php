<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index(){
        $list = $this->getListDayInMonth();
        /* $arrMoney = Order::where('status',4)->whereMonth('created_at',date('m'))
            ->select(DB::raw("sum(totalPrice) as totalMoney"), DB::raw("DATE(created_at) day"))
            ->groupBY("day")->get()->toArray(); */
        $arrMoney = DB::select('SELECT SUM(totalprice) as totalMoney, DATE(created_at) as day FROM orders WHERE status = ? AND month(created_at) = ? group by day',[4,Date('m')]);     
       /*   dd(($arrMoney) );  */
       $listMoney = [];
       $totalMoney =0;
        foreach($list as $day){
            $money =0;
            foreach($arrMoney as $revenue){
                if($revenue->day==$day){
                    $money = $revenue->totalMoney;
                    break;
                }
            }
           $totalMoney += $money;
           $listMoney[] = $money;
        }
        
        $this->data['title']            = "Trang quản trị";
        $this->data['newOrders']        = Order::where('status','<', 2)->get()->count();
        $this->data['totalProducts']    = Product::where('active', 1)->get()->count();
        $this->data['outOfStock']       = Product::where('amount','<', 20)->get()->count();
        $this->data['orderDestroy']     = Order::where('status', 6)->get()->count();
        $this->data['listDay']          = json_encode($list);
        $this->data['listMoney']          = json_encode($listMoney);
        $this->data['totalOrder']          = count(Order::whereMonth('created_at',date('m'))->where('status',4)->get()->toArray()) ;
        $this->data['totalMoney']       = $totalMoney;
        return view('Admin.dashboad',$this->data);
    }
    public function getListDayInMonth(){
        $arrDay = [];
        $month = date('m');
        $year = date('Y');
        for($day=1; $day<=31;$day++){
            $time = mktime(12,0,0,$month,$day,$year);
            if(date('m',$time)== $month){
                $arrDay[] = date('Y-m-d',$time);
            }
        }
        return $arrDay;
    }
}
