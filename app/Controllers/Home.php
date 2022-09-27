<?php

namespace App\Controllers;

use App\Models\HomeModel;
use App\Models\admin\GeneralModel;
use Dompdf\Dompdf;

class Home extends BaseController
{
    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
        $this->model = new HomeModel();
        $this->gmodel = new GeneralModel();
    }
    public function index()
    {
        $data['rand_item'] = $this->model->get_randomitem_data();
        $data['rand_slider'] = $this->model->get_randomslider_data();
        $data['rand_brand'] = $this->model->get_randombrand_data();
        $data['rand_category'] = $this->model->get_randomcategory_data();
        $data['review'] = $this->model->get_randomreview_data();

        if (!session('guestid') && !session('uid')) {
            $guestid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
            $session = session();
            $session->set('guestid', $guestid);
        }
        return view('index', $data);
    }
    public function mail()
    {
        return view('mail');
    }
    public function login()
    {

        $msg = array('st' => '', 'msg' => '');
        $post = $this->request->getPost();
        if (!empty($post) && isset($post['email']) && isset($post['password'])) {
            $msg = $this->model->login($post);
        }
        $data['msg'] = $msg;
        if ($msg['st'] == 'success') {
            return redirect()->to(url('Home/index'));
        }
        return view('login', $data);
    }
    public function logout()
    {
        $session = session();
        $session->remove('uid');
        return redirect()->to(url('Home/login'));
    }
    public function otp()
    {
        $post = $this->request->getPost();

        if (!empty($post)) {
            $msg = $this->model->otp($post);
            return $this->response->setJSON($msg);
        }
        return view('demo');
    }
    public function verify()
    {
        $post = $this->request->getPost();

        if (!empty($post)) {
            $msg = $this->model->verify($post);
            return $this->response->setJSON($msg);
        }
        return view('verify');
    }
    public function register($id = '')
    {
        $post = $this->request->getPost();
        if (!empty($post)) {
            $msg = $this->model->insert_edit_data($post);
            return $this->response->setJSON($msg);
        }
        $data['data'] = $this->model->get_register_data();
        return view('register', $data);
    }
    public function change_password()
    {
        $post = $this->request->getPost();
        if (!empty($post)) {
            $msg = $this->model->change_password($post);
            return $this->response->setJSON($msg);
        }
        return view('change-password');
    }
    public function forgot_password()
    {
        $post = $this->request->getPost();
        if (!empty($post)) {
            $msg = $this->model->send_otp_mail($post);
            return $this->response->setJSON($msg);
        }
        return view('forgot_password');
    }
    public function verify_otp()
    {
        $post = $this->request->getPost();
        if (!empty($post)) {
            $result = $this->model->verify_otp($post);
            return $this->response->setJson($result);
        }
    }

    public function set_new_pass()
    {
        $post = $this->request->getPost();
        if (!empty($post)) {
            $result = $this->model->set_new_pass($post);
            return $this->response->setJson($result);
        }
        return view('set_password');
    }
    public function productdetail($id = '')
    {
        $data['product'] = $this->model->get_product_data($id);
        // echo"<pre>";print_r($data['product']['category']);exit;
        $data['related_product'] = $this->model->get_related_product_data($data['product']['category']);
        $data['review'] = $this->model->get_review($id);

        return view('productdetail', $data);
    }
    public function shoplist()
    {
        $data['rand_item'] = $this->model->get_randomitem_data();
        $data['max_value'] = $this->model->get_max_val();

        return view('shoplist', $data);
    }
    public function faq()
    {
        return view('faq');
    }
    public function about()
    {
        return view('about-us');
    }
    public function privacy()
    {
        return view('privacy');
    }
    public function errorpage()
    {
        return view('404page');
    }
    public function blog()
    {
        return view('blog');
    }
    public function contact()
    {
        $post = $this->request->getPost();
        if (!empty($post)) {
            $msg = $this->model->insert_edit_contact($post);
            return $this->response->setJSON($msg);
        }
        return view('contact');
    }
    public function coupon()
    {
        return view('coupon');
    }
    public function address()
    {
        if (!empty(session('uid'))) {
            $id = session('uid');
            $data['address'] = $this->model->get_master_data('address', $id);
            return view('shipping_address', $data);
        } else {
            return view('Home/login');
        }
    }
    public function shipping_address()
    {
        $post = $this->request->getPost();
        if (!empty($post)) {
            $msg = $this->model->insert_edit_address($post);
            return $this->response->setJSON($msg);
        }
        // return view('shipping_address',$data);
    }
    public function applycoupon()
    {
        $post = $this->request->getPost();
        if (!empty($post)) {
            $output = $this->model->applycoupon($post);
            return $this->response->setJSON($output);
        }
    }
    public function cart()
    {
        $post = $this->request->getPost();
        if (!empty($post)) {
            $msg = $this->model->insert_cart_data($post);
            return $this->response->setJSON($msg);
        }
        return view('cart');
    }
    public function final_cart()
    {
        $post = $this->request->getPost();
        if (!empty($post)) {
            $data = $this->model->update_cart_data($post);
            if ($data) {
                echo '1';
            }
        }
    }
    public function checkout()
    {
        $post = $this->request->getPost();
        if (!empty($post)) {
            // echo "<pre>";print_r($post);exit;
            $data = $this->model->payment_data($post);
            return $this->response->setJSON($data);
        }
        $data['address'] = $this->model->get_address_data();

        return view('checkout', $data);
    }
    public function wishlist()
    {
        $post = $this->request->getPost();
        if ($post) {
            $msg = $this->model->insert_wishlist($post);
            return $this->response->setJSON($msg);
        }
        return view('wishlist');
    }
    // public function address(){
    //     $post = $this->request->getPost();
    //     if (!empty($post)) {
    //         $msg = $this->model->insert_edit_address($post);
    //         return $this->response->setJSON($msg);
    //     }
    //     return view('shipping_address');
    // }
    public function review()
    {
        $post = $this->request->getPost();
        if (!empty($post)) {
            $msg = $this->model->insert_review($post);
            return $this->response->setJSON($msg);
        }
    }
    public function fetch_data($page = 1)
    {

        $post = $this->request->getPost();
        $output = $this->model->fetch_data($post, $page);
        // echo "<pre>";print_r($output);exit;
        return $this->response->setJSON($output);
    }
    public function order()
    {
        // if (!empty(session('uid'))) {
            $data['my_orders'] = $this->model->get_order_data();
            return view('order/myorder', $data);
        // } else {
            // return view('Home/login');
        // }
    }
    public function orderview($id = '')
    {
        $data['order_detail'] = $this->model->get_order_details($id);
        return view('order/orderview', $data);
    }
    public function track_order($id = '')
    {
        $data['track_order'] = $this->model->get_track_order_data($id);
        return view('track-order', $data);
    }
    public function invoice($id)
    {
        $dompdf = new Dompdf();
        $data['order'] = $this->model->get_orders_details($id);
        $html =  view('invoice', $data);
        // print_r($html);exit;
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A3', 'portrait');
        $dompdf->render();
        $dompdf->stream('Invoice');
    }
    public function getaddress()
    {

        $post = $this->request->getPost();
        if (!empty($post)) {
            $msg = $this->model->getaddress($post);
            return $this->response->setJSON($msg);
        }
    }
    public function Getdata($method = '')
    {
        if ($method == 'cart') {
            $data = $this->model->get_cartupdate_data();
            return $data;
        }
        if ($method == 'cart1') {
            $data = $this->model->get_finalcart_data();
            return $data;
        }
        if ($method == 'order') {
            $data = $this->model->get_order_data();
            return $data;
        }
        if ($method == 'orderview') {
            $get = $this->request->getGet();
            $msg = $this->model->get_orderviewdata($get);
            return $msg;
        }
        if ($method == 'wishlist') {
            $data = $this->model->get_wishlist();
            // print_r($data);exit;
            return $data;
        }
        if ($method == 'getstate') {
            $get = $this->request->getGet();
            $data = $this->model->get_states($get);
            // print_r($data);exit;
            return $this->response->setJSON($data);
        }
        if ($method == 'getcity') {
            $post = $this->request->getPost();
            $data = $this->model->get_city($post);
            return $this->response->setJSON($data);
        }
        if ($method == 'getbrand') {
            $get = $this->request->getGet();
            $data = $this->model->get_brand($get);
            return $this->response->setJSON($data);
        }
        if ($method == 'getcategory') {
            $post = $this->request->getPost();
            $data = $this->model->get_category($post);
            return $this->response->setJSON($data);
        }
    }
    public function subscribe()
    {
        $post = $this->request->getPost();
        if (!empty($post)) {
            $msg = $this->model->insert_edit_subscribe($post);
            return $this->response->setJSON($msg);
        }
    }
    public function Payment($type = "")
    {
        $get = $this->request->getGet();

        $txn = $get['txn'];


        $response = "Redirecting to System ... Please wait !!! Don't press Back or Refresh";
        helper('rozorpay');
        SendReceiveRazor($txn);
        $gnmodel = $this->gmodel;
        $getdata = $gnmodel->get_data_table('payment_log', array('TxnId' => $txn));
        if ($type == 'Fail') {
            return redirect()->to(url('Home/payment_failed/0'));
        }
        if (!empty($getdata)) {
            return redirect()->to(url('Home/PaymentExcuate/' . $txn));
        } else {
            $msg = array("st" => "failed", "msg" => "ops, try again");
            $session = session();
            $session->setFlashdata('msg', $msg);
        }
    }
    public function Action($method = '')
    {
        $result = array();
        if ($method == 'Update') {
            $post = $this->request->getPost();
            $result = $this->model->UpdateData($post);
        }
        return $this->response->setJSON($result);
    }
    public function PaymentExcuate($txn = "")
    {
        echo "Redirecting to System ... Please wait !!! Don't press Back or Refresh";
        if ($txn != "") {
            helper('rozorpay');
            PaymentExecute($txn);
            $msg = array("st" => "success", "msg" => "Payment Success");
            $session = session();
            $session->setFlashdata('msg', $msg);
            return redirect()->to(url('Home/payment_success/' . $txn));
        }
    }

    public function payment_success($txn = '')
    {
        $data['txn'] = $txn;
        return view('payment_success', $data);
    }

    public function payment_failed($txn = '')
    {
        $data['msg'] = "Payment Cancelled";
        return view('payment_failed', $data);
    }
}
