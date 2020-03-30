<?php

namespace App\Http\Controllers;

use App\Order;
use App\Liqueur;
use Carbon\Carbon;
use App\OrderDetail;
use App\LiqueurStory;
use App\LiqueurMethod;
use App\LiqueurProduct;
use App\LiqueurAttitude;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use TsaiYiHua\ECPay\Checkout;
use Illuminate\Support\Facades\DB;
use TsaiYiHua\ECPay\Services\StringService;

class FrontController extends Controller
{
    protected $checkout;

    public function __construct(Checkout $checkout)
    {
        $this->checkout = $checkout;
    }
    public function index()
    {
        return view('front/index');
    }

    public function product_list()
    {
        $products_data = LiqueurProduct::orderBy('sort', 'desc')->get();
        return view('fronts/product_list', compact('products_data'));
    }

    public function checkout()
    {$data = \Cart::getContent();
        // $img = LiqueurProduct::find($data['id']);
        return view('fronts/check_out', compact('data'));
    }
    public function post_checkout(Request $request)
    {
        $data = $request->all();
        if ($data["g-recaptcha-response"] == null) {
            return redirect("/checkout");
        }

        $Recipient_name = $data['Recipient_name'];
        $Recipient_phone = $data['Recipient_phone'];
        $dealer_address = $data['dealer_address'];
        $order = new Order();
        $order_ary = [];
        //主要訂單建立

        $order->Recipient_name = $Recipient_name;
        $order->Recipient_phone = $Recipient_phone;
        $order->dealer_address = $dealer_address;
        $order->totalPrice = \Cart::getTotal();
        $order->save();
        $order->order_no = 'suntory' . Carbon::now()->format('Ymd') . $order->id;
        $order->save();
        //訂單詳細建立

        $items = \Cart::getContent();

        foreach ($items as $row) {
            $order_detial = new OrderDetail();
            $order_detial->order_id = $order->id;
            $order_detial->product_id = $row->id;
            $order_detial->qty = $row->quantity;
            $order_detial->price = $row->price;
            $order_detial->save();
            $product = LiqueurProduct::find($row->id);

            $product_name = $product->title;

            $new_ary = [
                'name' => $product_name,
                'qty' => $row->quantity,
                'price' => $row->price,
                'unit' => '個',
            ];

            array_push($order_ary, $new_ary);
        }

        //送出第三方支付
        $formData = [
            'UserId' => "", // 用戶ID , Optional
            'Items' => $order_ary,
            'ItemDescription' => '產品簡介',
            'OrderId' => $order->order_no,
            // 'ItemName' => 'Product Name',
            'TotalAmount' => $order->totalPrice,
            'PaymentMethod' => 'Credit', // ALL, Credit, ATM, WebATM
        ];
        //清空購物車
        \Cart::clear();
        return $this->checkout->setNotifyUrl(route('notify'))->setReturnUrl(route('return'))->setPostData($formData)->send();

    }

    public function notifyUrl(Request $request)
    {
        $serverPost = $request->post();
        $checkMacValue = $request->post('CheckMacValue');
        unset($serverPost['CheckMacValue']);
        $checkCode = StringService::checkMacValueGenerator($serverPost);
        if ($checkMacValue == $checkCode) {
            return '1|OK';
        } else {
            return '0|FAIL';
        }
    }

    public function returnUrl(Request $request)
    {
        $serverPost = $request->post();
        $checkMacValue = $request->post('CheckMacValue');
        unset($serverPost['CheckMacValue']);
        $checkCode = StringService::checkMacValueGenerator($serverPost);
        if ($checkMacValue == $checkCode) {
            if (!empty($request->input('redirect'))) {
                return redirect($request->input('redirect'));
            } else {

                //付款完成，下面接下來要將購物車訂單狀態改為已付款
                //目前是顯示所有資料將其DD出來
                //dd($this->checkoutResponse->collectResponse($serverPost));

                $new_order = Order::where('order_no', $serverPost['MerchantTradeNo'])->first();
                $new_order->payment_status = "已結帳";
                $new_order->save();
                $message = '付款完成';
                return view('fronts.orderfinish', compact('message', 'new_order'));
            }
        }
    }
    //白州頁面
    public function hak_his()
    {

        $product = LiqueurProduct::with('sure')->where('liqueur_id', 3)->get();
        $store = LiqueurStory::where('liqueur_id', 3)->get();
        $attitude = LiqueurAttitude::where('liqueur_id', 3)->get();
        $method = LiqueurMethod::where('liqueur_id', 3)->get();
        return view('hak_his', compact('product', 'store', 'attitude', 'method'));
    }

    //響讀取資料
    public function hibiki()
    {
        $liqueurId = 3;
        $nav_data = Liqueur::with('imgs')->find($liqueurId);
        $story_data = LiqueurStory::with('name')->where('liqueur_id', $liqueurId)->orderBy('sort', 'desc')->get();
        $attitude_data = LiqueurAttitude::with('name')->where('liqueur_id', $liqueurId)->orderBy('sort', 'desc')->get();
        // $sure_data = LiqueurSure::with(array('liqueur_product', 'liqueur_product.liqueur'))->orderBy('year', 'desc')->get();
        $product_data = LiqueurProduct::with('liqueur')->where('liqueur_id', $liqueurId)->orderBy('sort', 'desc')->get();

        $sure_data = DB::table('liqueur_sures')
            ->join('liqueur_products', function ($join) use ($liqueurId) {
                $join->on('liqueur_sures.liqueur_product_id', '=', 'liqueur_products.id')
                    ->join('liqueurs', function ($join) use ($liqueurId) {
                        $join->on('liqueur_products.liqueur_id', '=', 'liqueurs.id')
                            ->where('liqueurs.id', '=', $liqueurId);
                    });
            })->select('liqueur_sures.*', 'liqueur_products.title')->orderBy('year', 'desc')->get();
        // dd($sure_data);
        return view('hibiki', compact('nav_data', 'story_data', 'attitude_data', 'sure_data', 'product_data'));
    }


    public function Dealer()
    {
        return view('fronts.Dealer');
    }
}
