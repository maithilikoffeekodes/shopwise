<?php

namespace App\Models;

use CodeIgniter\Model;
use \Hermawan\DataTables\DataTable;

class HomeModel extends Model
{
    public function insert_edit_data($post)
    {
        $db = $this->db;
        $builder = $db->table('user');
        $builder->select('*');
        $builder->where(array('id' => @$post['id']));
        $query = $builder->get();
        $result = $query->getRowArray();

        $pdata = array(
            'name' => $post['fname'] . $post['lname'],
            'first_name' => $post['fname'],
            'last_name' => $post['lname'],
            'email' => $post['email'],
            'password' => $post['password'],
            'mobileno' => $post['mobileno'],
            'address' => $post['address'],
            'state' => $post['state'],
            'city' => $post['city'],
            'pincode' => $post['pincode']
        );
        if (!empty($result)) {
            $builder->where('id', $post['id']);
            $res = $builder->update($pdata);
            if ($res) {
                $msg = array('st' => 'success', 'msg' => 'Update successfully');
            } else {
                $msg = array('st' => 'failed', 'msg' => 'Update failed');
            }
            return $msg;
        } else {
            if ($post['password'] == $post['confirm-password']) {
                $res = $builder->insert($pdata);
                if ($res) {
                    $msg = array('st' => 'success', 'msg' => 'Register successfully');
                } else {
                    $msg = array('st' => 'failed');
                }
                return $msg;
            } else {
                $msg = array('st' => 'wrong password', 'msg' => 'please enter your correct password');
            }
            return $msg;
        }
    }
    public function get_register_data()
    {

        $db = $this->db;
        $builder = $db->table('user u');
        $builder->select('u.*,s.sname as state_name,c.cname as city_name');
        $builder->join('states s', 's.id=u.state');
        $builder->join('cities c', 'c.id=u.city');
        $builder->where('u.id', session('uid'));
        $query = $builder->get();
        $result = $query->getRowArray();
        return $result;
    }
    public function login($post)
    {
        $db = $this->db;
        $builder = $db->table('user');
        $builder->select('*');
        $builder->where(array('email' => $post['email'], 'is_delete' => '0'));
        $result = $builder->get();
        $result_array = $result->getRow();
        $msg = array();
        if (!empty($result_array)) {
            if ($post['password'] == $result_array->password) {
                $newdata = [
                    'uid' => $result_array->id,
                    'email' => $result_array->email,
                ];
                $session = session();
                $session->set($newdata);
                $msg = array("st" => "success", "msg" => "Login Successfully!!!");
            } else {
                $msg = array("st" => "failed", "msg" => "Username or Password are Wrong!!!");
            }
        } else {
            $msg = array("st" => "failed", "msg" => "Username or Password are wrong!!");
        }
        return $msg;
    }
    public function logout()
    {
        $session = session();
        $session->remove('uid');
        return redirect()->to(url('Home/login'));
    }
    public function change_password($post)
    {


        $db = $this->db;
        $builder = $db->table('user');
        $builder->select('*');
        $builder->where(array('id' => session('uid'), 'password' => $post['password']));
        $result = $builder->get();
        $result_array = $result->getRow();
        if (!empty($result_array)) {
            $msg = array('st' => '', 'msg' => '');
            if ($result_array->password == $post['password']) {
                if ($post['npassword'] == $post['cpassword']) {

                    $builder->where('id', session('uid'));
                    $builder->update(array('password' => $post['npassword']));
                    $msg = array('st' => 'success', 'msg' => 'Password Changed');
                } else {
                    $msg = array('st' => 'failed', 'msg' => 'Confirm Password doesnot matched');
                }
            } else {
                $msg = array('st' => 'failed', 'msg' => 'Password cannot Repeat');
            }
        } else {
            $msg = array('st' => 'failed', 'msg' => 'Old Password doesnt match');
        }

        return $msg;
    }


    public function get_randomitem_data()
    {
        $db = $this->db;
        $builder = $db->table('item i');
        $builder->select('i.*,b.brand as brand_name,c.category as category_name');
        $builder->join('brand b', 'b.id=i.brand');
        $builder->join('category c', 'c.id=i.category');
        $builder->orderBy('i.id', 'RANDOM');
        $builder->where('i.is_delete', '0');
        $builder->limit(8);
        $query = $builder->get();
        $getRanditem = $query->getResultArray();

        return $getRanditem;
    }
    public function get_product_data($id)
    {
        $db = $this->db;
        $builder = $db->table('item i');
        $builder->select('i.*,b.brand as brand_name,c.category as category_name');
        $builder->join('brand b', 'b.id=i.brand');
        $builder->join('category c', 'c.id=i.category');
        $builder->where('i.id', $id);
        $builder->where('i.is_delete', 0);
        $query = $builder->get();
        $getproduct = $query->getRowArray();

        $image = array();
        $image[0] = base_url() . $getproduct['image'];

        $image_array = json_decode($getproduct['gallery']);

        if (!empty($image_array)) {
            foreach ($image_array as $row) {
                $image[] = $row->h_path . @$row->t_path . @$row->image_name;
            }
        }
        $getproduct['image'] = $image;
        // echo"<pre>";print_r($getproduct['image']) ;exit;
        return $getproduct;
    }
    public function get_randomslider_data()
    {
        $db = $this->db;
        $builder = $db->table('slider');
        $builder->select('*');
        // $builder->orderBy('id', 'desc');
        $builder->where('is_delete', '0');
        // $builder->limit(5);
        $query = $builder->get();
        $getRandslider = $query->getResultArray();
        // echo "<pre>";print_r($getRanditem);exit;
        return $getRandslider;
    }
    public function get_randombrand_data()
    {
        $db = $this->db;
        $builder = $db->table('brand');
        $builder->select('*');
        $builder->orderBy('id', 'RANDOM');
        $builder->where('is_delete', '0');
        // $builder->limit(8);
        $query = $builder->get();
        $getRandBrand = $query->getResultArray();
        // echo "<pre>";print_r($getRanditem);exit;
        return $getRandBrand;
    }
    public function get_randomcategory_data()
    {
        $db = $this->db;
        $builder = $db->table('category');
        $builder->select('*');
        $builder->orderBy('id', 'desc');
        $builder->where('is_delete', '0');
        // $builder->limit(8);
        $query = $builder->get();
        $getRandCatergory = $query->getResultArray();
        // echo "<pre>";print_r($getRanditem);exit;
        return $getRandCatergory;
    }
    public function get_randomreview_data()
    {
        // print_r($id);exit;
        $db = $this->db;
        $builder = $db->table('review');
        $builder->select('*');
        $builder->orderBy('id', 'RANDOM');
        $builder->where('is_delete', 0);
        $query = $builder->get();
        $result = $query->getResultArray();
        // echo "<pre>"; print_r($result);exit;

        return $result;
    }
    public function insert_cart_data($post)
    {
        // echo "<pre>";print_r($post);exit;                                                                         
        $db = $this->db;
        $builder = $db->table("cart");
        $builder->select('*');
        $builder->where(array('user_id' => session('uid') ? session('uid') : session('guestid'), 'product_id' => $post['product_id'], 'is_delete' => 0));
        $query =  $builder->get();
        $result = $query->getRowArray();
        // echo "<pre>";print_r($result);exit;
        if (empty($result)) {
            $pdata = array(
                'user_id' =>  session('uid') ? session('uid') : session('guestid'),
                'product_id' => $post['product_id'],
                'quantity' => $post['quantity'],
                'date' => date('y-m-d'),
                'price' => $post['price']
            );

            if (!empty($result)) {
                $pdata['updated_at'] = date('Y-m-d H:i:s');
                $pdata['updated_by'] = session('uid') ? session('uid') : session('guestid');

                $builder->where(array('product_id' => $post['product_id']));
                $res = $builder->update($pdata);
                if ($res) {
                    $msg = array('st' => 'added', 'msg' => 'Item Update to Cart');
                } else {
                    $msg = array('st' => 'failed', 'msg' => 'Failed Update to Cart');
                }
            } else {
                $pdata['created_at'] = date('Y-m-d H:i:s');
                $pdata['created_by'] = session('uid') ? session('uid') : session('guestid');

                $res = $builder->insert($pdata);
                if ($res) {
                    $msg = array('st' => 'success', "msg" => "Item Added to Cart");
                } else {
                    $msg = array('st' => 'failed', "msg" => "Failed to Cart");
                }
            }
        } else {
            $msg = array('st' => 'added', "msg" => "Already Added to Cart");
        }

        return $msg;
    }
    public function get_cart_data()
    {
        $db = $this->db;
        $builder = $db->table('cart c');
        $builder->select('c.id,image,i.name,c.price,c.quantity');
        $builder->join('item i', 'i.id = c.product_id');
        $builder->where('c.is_delete', 0);
        $builder->where('c.user_id', session('uid') ? session('uid') : session('guestid'));
        $query =  $builder->get();
        $result = $query->getResultArray();
        return $result;
    }

    public function update_cart_data($post)
    {
        // echo"<pre>";print_r($post);exit;
        $db = $this->db;
        $builder = $db->table('cart');
        $qty = $post['qty'];
        $coupon_discount = $post['coupon_discount'];

        for ($i = 0; $i < count($qty); $i++) {
            $pdata = array(
                'quantity' => $qty[$i],
                'coupon_discount' => $coupon_discount,
            );

            $builder->where('user_id', session('uid') ? session('uid') : session('guestid'));
            $pdata['update_at'] = date('Y-m-d H:i:s');
            $pdata['update_by'] = session('uid') ? session('uid') : session('guestid');
            $builder->update($pdata);
        }
        $msg = array('st' => 'success');
        return $msg;
    }
    public function get_cartupdate_data()
    {
        $db = $this->db;
        $builder = $db->table('cart c');
        $builder->select('c.id,image,i.name,c.price,c.quantity,c.product_id');
        $builder->join('item i', 'i.id=c.product_id');
        $builder->where('c.is_delete', 0);
        $builder->where('c.user_id', session('uid') ? session('uid') : session('guestid'));
        $data_table = DataTable::of($builder);
        $data_table->edit('image', function ($row) {
            $img = '<img height="100" width ="130" src = "' . $row->image . '">';
            return $img;
        });
        $data_table->add('action', function ($row) {

            $btnquantity = '
            <div class="qty_class">
            <button class="btn btn-sm btn-secondary btn-minus decrement" type="button" onclick="decrement(this)">
            <i class="fa fa-minus"></i></button>
            <span class="count">' . $row->quantity . '</span>
            <input type="hidden" class="form-control qty" name="qty[]" value="' . $row->quantity . '">
            <input type="hidden" class="form-control qty" name="cart_id[]" value="' . $row->id . '">
            <input type="text" class="form-control price_hidden d-none" name="price[]" value="' . $row->price . '">
            <button class="btn btn-sm btn-secondary btn-plus increment" type="button" onclick="increment(this)">
            <i class="fa fa-plus"></i></button>
            </div>';

            return $btnquantity;
        });

        $data_table->add('action', function () {
            $btntotal = '<input type="text" class="total text-center" name="sub[]" readonly style="border:none;color:#6F6F6F;">';
            return $btntotal;
        });
        $data_table->add('action', function ($row) {
            $btndelete = '<a  title="Cart name: ' . $row->name . '"  onclick="editable_remove(this)"  data-val="' . $row->id . '"  data-pk="' . $row->id . '" tabindex="-1" class="btn btn-link"><i class="fas fa-trash-alt" style="color:grey"></i></a> ';
            return $btndelete;
        }, 'last')

            ->hide('product_id')
            ->hide('id')
            ->hide('quantity');

        // echo"<pre>";print_r($data_table);exit;
        return $data_table->toJSON();
    }
    public function get_finalcart_data()
    {
        $db = $this->db;
        $builder = $db->table('cart c');
        $builder->select('c.id,image,i.name,c.price,c.quantity,c.product_id,i.igst,c.coupon_discount');
        $builder->join('item i', 'i.id=c.product_id');
        $builder->where('c.is_delete', 0);
        $builder->where('c.user_id', session('uid') ? session('uid') : session('guestid'));
        $data_table = DataTable::of($builder);
        $data_table->edit('image', function ($row) {
            $img = '<img height="100" width ="130" src = "' . $row->image . '">';
            return $img;
        });
        $data_table->add('action', function ($row) {

            $btnquantity = '
      <div class="qty_class">
      <span class="count">' . $row->quantity . '</span>
      <input type="hidden" class="form-control qty" name="qty[]" value="' . $row->quantity . '">
      <input type="hidden" class="form-control qty" name="cart_id[]" value="' . $row->product_id . '">
      <input type="text" class="form-control price_hidden d-none" name="price[]" value="' . $row->price . '">
      </div>';

            return $btnquantity;
        });
        $data_table->add('action', function ($row) {
            // print_r($row);
            $btntotal = '<input type="text" class="total text-center" name="sub[]" readonly style="border:none;color:#6F6F6F;">
            <input type="hidden" class="tax text-center" name="tax[]" value="' . $row->igst . '" style="border:none;color:#6F6F6F;">
            <input type="hidden" class="coupon_discount text-center" name="coupon_discount[]" id="coupon_discount" value="' . $row->coupon_discount . '" style="border:none;color:#6F6F6F;">';
            return $btntotal;
        })
            ->hide('product_id')
            ->hide('id')
            ->hide('quantity')
            ->hide('coupon_discount')
            ->hide('igst');



        return $data_table->toJSON();
    }
    public function get_order_data()
    {
        $db = $this->db;
        $builder = $db->table('orders o');
        $builder->select('o.*,o.created_at as order_date');
        // $builder->join('order_item oi', 'o.id = oi.order_id', 'left');
        // $builder->join('item i', 'i.id = oi.product_id', 'left');
        // $builder->join('category c','c.id=i.category');
        $builder->where('o.user_id', session('uid') ? session('uid') : session('guestid'));
        $query = $builder->get();
        $order = $query->getResultArray();
        //   echo "<pre>"; print_r($order);exit;
        return $order;
    }
    public function get_track_order_data($id)
    {
        //   echo "<pre>"; print_r($id);exit;

        $db = $this->db;
        $builder = $db->table('orders o');
        $builder->select('o.*,o.created_at as order_date');
        $builder->where('o.id', $id);
        $query = $builder->get();
        $order = $query->getRowArray();
        //   echo "<pre>"; print_r($order);exit;
        return $order;
    }

    public function get_order_details($id)
    {
        // print_r($id);exit;
        $db = $this->db;
        $builder = $db->table('orders o');
        $builder->select('o.*,o.created_at as order_date,oi.*,i.*,i.name as item_name');
        $builder->join('order_item oi', 'o.id = oi.order_id', 'left');
        $builder->join('item i', 'i.id = oi.product_id');
        $builder->where('o.id', $id);
        $query = $builder->get();
        $order_detail1 = $query->getRowArray();
        // echo"<pre>";print_r($order_detail1);exit;

        // $order_detail1['order_date'] = $order_detail1['created_at'];
        if ($order_detail1['default_add'] != 0) {
            $db = $this->db;
            $builder = $db->table('user u');
            $builder->select('u.*,s.sname as state_name,c.cname as city_name');
            $builder->join('cities c', 'c.id=u.city');
            $builder->join('states s', 's.id=u.state');
            $builder->where('u.id', $order_detail1['default_add']);
            $builder->where('u.is_delete', 0);
            $query = $builder->get();
            $order_detail2 = $query->getRowArray();
        } else {
            $db = $this->db;
            $builder = $db->table('shipping_address a');
            $builder->select('a.*,s.sname as state_name,c.cname as city_name,a.fname as name');
            $builder->join('cities c', 'c.id=a.city');
            $builder->join('states s', 's.id=a.state');
            $builder->where('a.id', $order_detail1['ship_id']);
            $builder->where('a.is_delete', 0);
            $query = $builder->get();
            $order_detail2 = $query->getRowArray();
        }
        // echo"<pre>";print_r($order_detail2);exit;
        $order_detail = array_merge($order_detail1, $order_detail2);
        // echo"<pre>";print_r($order_detail);exit;
        return $order_detail;
    }
    public function get_orders_details($id)
    {
        // print_r($id);exit;
        $db = $this->db;
        $builder = $db->table('orders o');
        $builder->select('o.*,o.created_at as order_date,oi.*,i.*');
        $builder->join('order_item oi', 'o.id = oi.order_id', 'left');
        $builder->join('item i', 'i.id = oi.product_id');
        $builder->where('o.id', $id);
        $query = $builder->get();
        $order_detail1 = $query->getResultArray();
        echo "<pre>";
        print_r($order_detail1);
        exit;

        $order_detail1['order_date'] = $order_detail1['created_at'];
        if ($order_detail1[0]['default_add'] != 0) {
            $db = $this->db;
            $builder = $db->table('user u');
            $builder->select('u.*,s.sname as state_name,c.cname as city_name');
            $builder->join('cities c', 'c.id=u.city');
            $builder->join('states s', 's.id=u.state');
            $builder->where('u.id', $order_detail1['default_add']);
            $builder->where('u.is_delete', 0);
            $query = $builder->get();
            $order_detail2 = $query->getRowArray();
        } else {
            $db = $this->db;
            $builder = $db->table('shipping_address a');
            $builder->select('a.*,s.sname as state_name,c.cname as city_name');
            $builder->join('cities c', 'c.id=a.city');
            $builder->join('states s', 's.id=a.state');
            $builder->where('a.id', $order_detail1['ship_id']);
            $builder->where('a.is_delete', 0);
            $query = $builder->get();
            $order_detail2 = $query->getRowArray();
        }
        // echo"<pre>";print_r($order_detail2);exit;
        $order_detail = array_merge($order_detail1);

        return $order_detail;
    }
    public function get_orderviewdata($get)
    {

        //  print_r($get);exit;
        $db = $this->db;
        $builder = $db->table('order_item oi');
        $builder->select('i.image,i.name,oi.price,oi.quantity,oi.total');
        $builder->join('item i', 'i.id=oi.product_id');
        $builder->where('oi.order_id', $get);
        $builder->where('oi.is_delete', '0');
        $data_table = DataTable::of($builder);
        //  print_r('rfvrvrgv');exit;
        $data_table->setSearchableColumns(['id']);
        $data_table->edit('image', function ($row) {
            $img = '<img height="100" width ="100" src = "' . $row->image . '">';
            return $img;
        });
        return $data_table->toJSON();
    }
    public function getaddress($post)
    {
        // echo"<pre>";print_r($post);exit;

        $db =  $this->db;
        $builder = $db->table('shipping_address a');
        $builder->select('a.*,s.sname as state_name,c.cname as city_name');
        $builder->join('cities c', 'c.id=a.city');
        $builder->join('states s', 's.id=a.state');
        $builder->where('a.id', $post['val']);
        $builder->where('a.is_delete', 0);
        $query = $builder->get();
        $result = $query->getRowArray();
        // echo"<pre>";print_r($result);exit;
        return $result;
    }
    public function get_master_data($method, $id)
    {
        $db = $this->db;
        $data = array();
        if ($method == 'address') {
            $builder = $db->table('user ');
            $builder->select('*,"default" as type');
            $builder->where('id', session('uid'));
            $builder->where('is_delete', 0);
            $builder->limit(1);
            $query = $builder->get();
            $result = $query->getResultArray();

            $builder = $db->table('shipping_address a');
            $builder->select('a.*,c.cname,s.sname,"shipping" as type');
            $builder->join('cities c', 'c.id=a.city', 'left');
            $builder->join('states s', 's.id=a.state', 'left');
            $builder->where('user_id', session('uid') ? session('uid') : session('guestid'));
            $builder->where('a.is_delete', 0);
            $query = $builder->get();
            $result1 = $query->getResultArray();
            $data = array_merge($result, $result1);
        }

        return $data;
    }
    public function get_states($post)
    {
        // echo"<pre>";print_r($post);exit;
        $db = $this->db;
        $builder = $db->table('states');
        $builder->select('id,sname');
        $builder->like('sname', (@$post['searchTerm']) ? @$post['searchTerm'] : '');
        $builder->limit(50);
        $query = $builder->get();
        $getdata = $query->getResultArray();
        // echo"<pre>";print_r($getdata);exit;
        $result = array();
        foreach ($getdata as $row) {
            $result[] = array(
                "text" => $row['sname'],
                "id" => $row['id'],
            );
        }
        return $result;
    }
    public function get_city($post)
    {
        // print_r($post);exit;
        $db = $this->db;
        $builder = $db->table('cities');
        $builder->select('id,cname');
        $builder->where(array('state_id' => $post['state_id']));
        $builder->like('cname', (@$post['searchTerm']) ? @$post['searchTerm'] : '');
        $query = $builder->get();
        $getdata = $query->getResultArray();

        $result = array();
        foreach ($getdata as $row) {
            $result[] = array(
                "text" => $row['cname'],
                "id" => $row['id'],
            );
        }

        return $result;
    }
    public function get_brand($get)
    {

        $db = $this->db;
        $builder = $db->table('brand');
        $builder->select('id,brand');

        if (!empty($post)) {
            $builder->like('brand', (@$get['searchTerm']) ? @$get['searchTerm'] : '');
        }

        $builder->where('is_delete', 0);
        // $builder->limit(3);
        $query = $builder->get();
        $getdata = $query->getResultArray();
        // print_r($getdata);exit;
        $result = array();
        foreach ($getdata as $row) {
            $result[] = array(
                "text" => $row['brand'],
                "id" => $row['id'],
            );
        }
        return $result;
    }
    public function get_category($get)
    {

        $db = $this->db;
        $builder = $db->table('category');
        $builder->select('id,category');

        if (!empty($post)) {
            $builder->like('category', (@$get['searchTerm']) ? @$get['searchTerm'] : '');
        }

        $builder->where('is_delete', 0);
        // $builder->limit(3);
        $query = $builder->get();
        $getdata = $query->getResultArray();
        // print_r($getdata);exit;
        $result = array();
        foreach ($getdata as $row) {
            $result[] = array(
                "text" => $row['category'],
                "id" => $row['id'],
            );
        }
        return $result;
    }
    public function insert_wishlist($post)
    {
        // print_r($post);exit;
        $db = $this->db;
        $builder = $db->table("wishlist");
        $builder->select('*');
        $builder->where('is_delete', 0);
        $builder->where(array('user_id' => session('uid') ? session('uid') : session('guestid'), 'product_id' => $post['productid']));
        $query = $builder->get();
        $result =  $query->getRowArray();
        // print_r($result);exit;
        if (empty($result)) {
            $pdata = array(
                'user_id' => session('uid') ? session('uid') : session('guestid'),
                'product_id' => $post['productid'],
            );
            $pdata['created_at'] = date('Y-m-d H:i:s');
            $pdata['created_by'] = session('uid') ? session('uid') : session('guestid');

            $res = $builder->insert($pdata);
            if ($res) {
                $msg = array('st' => 'success', "msg" => "Item Added to wish");
            } else {
                $msg = array('st' => 'failed', "msg" => "Failed to wish");
            }
        } else {
            $msg = array('st' => 'added', "msg" => "Already Added Wishlist");
        }

        return $msg;
    }
    public function get_wishlist()
    {
        $db = $this->db;
        $builder = $db->table('wishlist w');
        $builder->select('w.id,i.image,i.name,i.price,w.product_id');
        $builder->join('item i', 'i.id=w.product_id');
        $builder->where('w.user_id', session('uid') ? session('uid') : session('guestid'));
        $builder->where('w.is_delete', 0);
        $data_table = DataTable::of($builder);
        $data_table->setSearchableColumns(['id']);
        $data_table->edit('image', function ($row) {
            $img_tag = '<img src=" ' . $row->image . ' " width="100" height="130">';
            return $img_tag;
        });

        $data_table->add('addtocart', function ($row) {

            $btnview = '<a class="btn btn-close btn-outline-danger cartbtn"  onclick="addtocart(this)"  id="cartbtn" data-product_id="' . $row->product_id . '" data-price="' . $row->price . '" data-quantity="1"> <i class="fas fa-shopping-cart "></i></a> ';
            return $btnview;
        });
        $data_table->add('action', function ($row) {
            $btndelete = '<a  title="Item Name: ' . $row->name . '"  data-val="' . $row->id . '" 
            data-pk="' . $row->id . '" onclick="editable_remove(this)" 
            tabindex="-1" class="btn btn-close btn-outline-danger"><i class="fa fa-trash"></i></a> ';
            return $btndelete;
        })
            ->hide('id')
            ->hide('product_id');
        return $data_table->toJSON();
    }
    public function insert_review($post)
    {
        // print_r($post);exit;
        $db = $this->db;
        $builder = $db->table("review");
        $pdata = array(
            'user_id' => session('uid') ? session('uid') : session('guestid'),
            'product_id' => $post['product_id'],
            'rating' => $post['rating'],
            'review' => $post['review'],
            'name' => $post['name'],
            'email' => $post['email'],
        );
        $pdata['created_at'] = date('Y-m-d H:i:s');
        $pdata['created_by'] = session('uid') ? session('uid') : session('guestid');

        $res = $builder->insert($pdata);
        if ($res) {
            $msg = array('st' => 'success', "msg" => "Review Added Successfully");
        } else {
            $msg = array('st' => 'failed', "msg" => "Failed to Review");
        }
        return $msg;
    }
    public function insert_edit_contact($post)
    {
        // echo"<pre>";print_r($post);exit;

        $db = $this->db;
        $builder = $db->table("contact");
        $query = $builder->get();
        $pdata = array(
            'name' => $post['name'],
            'email' => $post['email'],
            'phone' => $post['phone'],
            'subject' => $post['subject'],
            'message' => $post['message']
        );

        $name = $post['name'];
        $email = $post['email'];
        $subject = $post['subject'];
        $message = $post['message'];
        // print_r($email);exit;
        helper('base');
        send_email($name, $email, $subject, $message);
        send_email($name, 'maithili.koffeekodes@gmail.com', $subject, $message);

        $pdata['created_at'] = date('Y-m-d H:i:s');
        @$pdata['created_by'] = session('uid') ? session('uid') : session('guestid');
        if (empty($msg)) {
            $res = $builder->insert($pdata);
            if ($res) {
                $msg = array('st' => 'success', "msg" => "Your info add success");
            } else {
                $msg = array('st' => 'failed', "msg" => "Failed to insert");
            }
        }
        // print_r($msg);exit;
        return $msg;
    }
    public function get_review($id)
    {
        // print_r($id);exit;
        $db = $this->db;
        $builder = $db->table('review');
        $builder->select('*');
        $builder->where('product_id', $id);
        $builder->where('is_delete', 0);
        $query = $builder->get();
        $result = $query->getResultArray();
        // echo "<pre>"; print_r($result);exit;

        return $result;
    }
    public function get_related_product_data($cid)
    {
        // print_r($cid);exit;
        $db = $this->db;
        $builder = $db->table('item');
        $builder->select('*');
        $builder->orderBy('id', 'RANDOM');
        $builder->where('category', $cid);
        // $builder->limit(4);
        $query = $builder->get();
        $relatedproduct = $query->getResultArray();
        return $relatedproduct;
    }

    public function applycoupon($post)
    {
        // print_r($post);exit;
        $db = $this->db;
        $builder = $db->table('coupon');
        $builder->select('*');
        $builder->where('coupon_code', $post['coupon']);
        $query = $builder->get();
        $result = $query->getRowArray();
        $msg = '';
        $data = '';
        $value = '';
        if (empty($result)) {
            $msg = 'Coupon is not found !!! Please enter valid coupon';
        } else {
            if ($post['total'] >= $result['cart_min_value']) {
                if ($result['coupon_type'] == 'Rupees') {
                    $value = $result['coupon_value'];
                    $data = $post['total'] - $value;
                } else {
                    $value = ($post['total'] * $result['coupon_value']) / 100;
                    $data = $post['total'] - $value;
                }
            } else {
                $msg = 'Grand total must be ₹' . $result['cart_min_value'];
            }
        }
        // print_r($data);exit;

        $output = array('final_total' => $data, 'coupon_discount' => $value, 'msg' => $msg);
        // print_r($output);exit;
        return $output;
    }
    public function fetch_data($post, $page)
    {
        // print_r($post);
        // exit;
        $db = $this->db;
        $builder = $db->table('item');
        $builder->select('*');

        $minvalue = $post['min_price'];
        $maxvalue = $post['max_price'];
        // $builder->where('is_delete',0);
        $results_per_page = 6;
        $page_first_result = ($page - 1) * $results_per_page;


        if (!empty($minvalue || $maxvalue)) {
            $builder->where('is_delete', 0);
            $builder->where("price BETWEEN '$minvalue' AND '$maxvalue'");
        }
        if (!empty($post['brand_id'])) {
            $builder->where('brand', $post['brand_id']);
        }
        if (!empty($post['category_id'])) {
            $builder->where('category', $post['category_id']);
        }
        if (!empty($post['cat'])) {
            $builder->where('category', $post['cat']);
        }
        if (!empty($post['brand'])) {
            $builder->where('brand', $post['brand']);
        }
        if (!empty($post['search'])) {
            $builder->like('brand', $post['search'], 'both');
            $builder->orLike('category', $post['search'], 'both');
            $builder->orLike('name', $post['search'], 'both');
        }
        if (empty($post['price'])) {
            $builder->where('is_delete', 0);
        } elseif (!empty($post['price'] == '1')) {
            $builder->orderBy('created_at', 'desc');
        } elseif (!empty($post['price'] == '2')) {
            $builder->orderBy('price', 'asc');
        } elseif (!empty($post['price'] == '3')) {
            $builder->orderBy('price', 'desc');
        }

        $number_of_result = $builder->countAllResults();
        $number_of_page = ceil($number_of_result / $results_per_page);
        //    print_r( $number_of_page);exit;
        $builder->select('*');


        if (!empty($minvalue || $maxvalue)) {
            $builder->where('is_delete', 0);
            $builder->where("price BETWEEN '$minvalue' AND '$maxvalue'");
        }

        if (!empty($post['brand_id'])) {
            $builder->where('brand', $post['brand_id']);
        }
        if (!empty($post['category_id'])) {
            $builder->where('category', $post['category_id']);
        }
        if (!empty($post['cat'])) {
            $builder->where('category', $post['cat']);
        }
        if (!empty($post['brand'])) {
            $builder->where('brand', $post['brand']);
        }
        if (!empty($post['search'])) {
            $builder->like('brand', $post['search'], 'both');
            $builder->orLike('category', $post['search'], 'both');
            $builder->orLike('name', $post['search'], 'both');
        }
        if (empty($post['price'])) {
            $builder->where('is_delete', 0);
        } elseif (!empty($post['price'] == '1')) {
            $builder->orderBy('created_at', 'desc');
        } elseif (!empty($post['price'] == '2')) {
            $builder->orderBy('price', 'asc');
        } elseif (!empty($post['price'] == '3')) {
            $builder->orderBy('price', 'desc');
        } else {
            $builder->orderBy('id', 'asc');
        }
        $builder->orderBy('id', 'asc');

        $builder->limit($results_per_page, $page_first_result);
        $result = $builder->get();

        $paging = '<ul class="pagination mt-3 justify-content-center pagination_style1">';
        if ($page > 1) {
            $paging .= ' <li class="page-item"><a class="page-link" ' .
                'href="' . url('Home/fetch_data/' . ($page - 1)) . '" data-ci-pagination-page="' . ($page - 1) . '">' . 'PREV</a></li>';
        }
        if ($page > 4) {
            $paging .= '<li class="page-item"><a class="page-link"' .
                'href="' . url('Home/fetch_data/' . ($page - 1)) . '" data-ci-pagination-page="1">1</a></li>' .
                '<li class="blank">...</li>';
        }
        if ($page - 2 > 0) {
            $paging .= '<li class="page-item"><a class="page-link"' .
                'href="' . url('Home/fetch_data/' . ($page - 2)) . '" data-ci-pagination-page="' . ($page - 2) . '">' . ($page - 2) . '</a>' .
                '</li>';
        }
        if ($page - 1 > 0) {
            $paging .= '<li class="page-item"><a class="page-link"' .
                'href="' . url('Home/fetch_data/' . ($page - 1)) . '" data-ci-pagination-page="' . ($page - 1) . '">' . ($page - 1) . '</a>' .
                '</li>';
        }
        $paging .= '<li class="page-item"><a class="page-link current"
    href="' . url('Home/fetch_data/' . ($page)) . '" data-ci-pagination-page="' . ($page) . '">' . $page . '</a>
    </li>';

        if ($page + 1 < $number_of_page + 1) {
            $paging .= '<li class="page-item"><a class="page-link"
        href="' . url('Home/fetch_data/' . ($page + 1)) . '" data-ci-pagination-page="' . ($page + 1) . '">' . ($page + 1) . '</a>
    </li>';
        }
        if ($page + 2 < $number_of_page + 1) {
            $paging .= '<li class="page-item"><a class="page-link"
        href="' . url('Home/fetch_data/' . ($page + 2)) . '" data-ci-pagination-page="' . ($page + 2) . '">' . ($page + 2) . '</a>
    </li>';
        }

        if ($page < $number_of_page - 2) {
            $paging .= '<li lass="page-item">...</li>
        <li><a class="page-link"
                href="' . url('Home/fetch_data/' . ($number_of_page)) . '" data-ci-pagination-page="' . ($number_of_page) . '">' . $number_of_page . '</a>
        </li>';
        }

        if ($page < $number_of_page) {
            $paging .= '<li class="page-item"><a class="page-link"
        href="' . url('Home/fetch_data /' . ($page + 1)) . '" data-ci-pagination-page="' . ($page + 1) . '" >Next</a></li>';
        }
        $paging .= '</ul>';
        $output = '';
        // echo "<pre>";print_r($result->getResultArray());exit;
        foreach ($result->getResultArray() as $row) {

            $output .= '
            <div class="col-md-4 col-6">
            <div class="product">
                <div class="product_img">
                    <a href="' . url('Home/productdetail/' . $row['id']) . '">
                        <img src="' . $row['image'] . '" alt="product_img1" style="width: 300px;height:300px;">
                    </a>
                    <div class="product_action_box">
                        <ul class="list_none pr_action_btn">
                            <li type="submit" class="add-to-cart cartbtn" id="cartbtn" data-product_id="' . @$row['id'] . ' " data-price="' . @$row['listedprice'] . '" data-quantity="1"><a href="#"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
                            <li type="submit" ><a href="#"><i class="icon-heart wish" id="wishlist" data-product_id="' .  @$row['id'] . ' " data-price="' . @$row['listedprice'] . '" data-quantity="1"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="product_info">
                    <h6 class="product_title"><a href="' . url('Home/productdetail/' . $row['id']) . '">' . $row['name'] . '</a></h6>
                    <div class="product_price">
                        <span class="price">&#8377 ' . $row['listedprice'] . '</span>
                            <del>&#8377 ' . $row['price'] . '</del>
                            <div class="on_sale">
                        <span>' . $row['discount'] . '% Off</span>
                             </div>
                    </div>
                    <div class="rating_wrap">
                        <div class="rating">
                            <div class="product_rate" style="width:80%"></div>
                        </div>
                        <span class="rating_num">(21)</span>
                    </div>
                    <div class="pr_desc">
                        <p>' . $row['description'] . '</p>
                    </div>
                    <div class="list_product_action_box">
                                    <ul class="list_none pr_action_btn">
                                    <li type="submit" class="add-to-cart cartbtn" id="cartbtn" data-product_id="' . @$row['id'] . ' " data-price="' . @$row['listedprice'] . '" data-quantity="1"><a href="#"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
                                    <li type="submit" ><a href="#"><i class="icon-heart wish" id="wishlist" data-product_id="' .  @$row['id'] . ' " data-price="' . @$row['listedprice'] . '" data-quantity="1"></i></a></li>
                                    </ul>
                    </div>
                </div>
            </div>
        </div>
            ';
        }
        return array('product_list' => $output, 'pagination_link' => $paging);
    }
    public function UpdateData($post)
    {
        // print_r($post);exit;

        $result = array();
        $db = $this->db;
        if ($post['type'] == 'Remove') {

            if ($post['method'] == 'cart') {
                $builder = $db->table('cart');
                $builder->where("id", @$post['pk']);
                $result = $builder->update(array('is_delete' => '1'));
                $result = array('st' => 'success');
            }
            if ($post['method'] == 'wishlist') {
                $builder = $db->table('wishlist');
                $builder->where("id", @$post['pk']);
                $result = $builder->update(array('is_delete' => '1'));
                $result = array('st' => 'success');
            }
            if ($post['method'] == 'address') {
                $builder = $db->table('shipping_address');
                $builder->where("id", @$post['pk']);
                $result = $builder->update(array('is_delete' => '1'));
                $result = array('st' => 'success');
            }
        }
        return $result;
    }
    public function insert_edit_address($post)
    {
        // echo "<pre>";
        // print_r($post);
        // exit;

        $db = $this->db;
        $builder = $db->table('shipping_address');
        $builder->select('*');
        $builder->where('id', $post['id']);
        $builder->where('is_delete', 0);
        $query = $builder->get();
        $result = $query->getResultArray();
        // print_r($result);exit;

        $adata = array(
            'fname' => $post['fname'],
            'lname' => $post['lname'],
            'user_id' => session('uid') ? session('uid') : session('guestid'),
            'email' => $post['email'],
            'mobileno' => $post['mobileno'],
            'address' => $post['address'],
            'state' => $post['state'],
            'city' => $post['city'],
            'pincode' => $post['pincode'],
            'address_type' => $post['address_type']
        );
        // echo "<pre>";
        // print_r($adata);
        // exit;
        if (!empty($result)) {
            // print_r($result);exit;
            $builder->where('id', $post['id']);
            $res = $builder->update($adata);
            if ($res) {
                $msg = array('st' => 'success', 'msg' => 'Update successfully');
            } else {
                $msg = array('st' => 'failed', 'msg' => 'Update failed');
            }
        } else {
            $res = $builder->insert($adata);
            if ($res) {
                $msg = array('st' => 'success', 'msg' => 'Insert successfully');
            } else {
                $msg = array('st' => 'failed');
            }
        }
        return $msg;
    }
    public function get_address_data()
    {
        $db = $this->db;
        $builder = $db->table('user u');
        $builder->select('u.*,s.sname as state_name,c.cname as city_name');
        $builder->join('cities c', 'c.id=u.city');
        $builder->join('states s', 's.id=u.state');
        $builder->where('u.id', session('uid'));
        $builder->where('u.is_delete', 0);
        $query = $builder->get();
        $result1 = $query->getResultArray();

        $builder = $db->table('shipping_address a');
        $builder->select('a.*,s.sname as state_name,c.cname as city_name,a.fname as name');
        $builder->join('cities c', 'c.id=a.city');
        $builder->join('states s', 's.id=a.state');
        $builder->where('a.user_id', session('uid') ? session('uid') : session('guestid'));
        $builder->where('a.is_delete', 0);
        $query = $builder->get();
        $result2 = $query->getResultArray();
        $result = array_merge($result1, $result2);
        // echo "<pre>";print_r($result);exit;
        return $result;
    }
    public function payment_data($post)
    {
        // echo "<pre>";
        // print_r($post);
        // exit;
        if (!empty($post['add2'])) {
            $ship_id = $post['id'];
            $default_add = 0;
        } else {
            $ship_id = 0;
            $default_add = session('uid') ? session('uid') : '';
        }

        $db = $this->db;
        $builder = $db->table('orders');
        $order_data = array(
            'user_id' => session('uid') ? session('uid') : session('guestid'),
            'sub_total' => $post['sub_total'],
            'tax_amt' => $post['tax_amt'],
            'coupon-discount' => $post['coupon-discount'],
            'total_payment' => $post['grand_total'],
            'ship_id' => $ship_id,
            'default_add' => $default_add,
            'payment_type' => 'Razorpay',
            'is_login' => session('uid') ? 0 : 1
        );
        $order_data['created_at'] = date('Y-m-d H:i:s');
        $order_data['created_by'] = session('uid') ? session('uid') : session('guestid');
        $result = $builder->insert($order_data);
        $orderid = $db->insertID();
        $db = $this->db;
        $builder = $db->table('order_item');
        $qty = $post['qty'];
        for ($i = 0; $i < count($qty); $i++) {
            $order_item = array(
                'order_id' => @$orderid,
                'user_id' => session('uid') ? session('uid') : session('guestid'),
                'quantity' => $post['qty'][$i],
                'product_id' => $post['cart_id'][$i],
                'price' => $post['price'][$i],
                'total' => $post['sub'][$i]
            );
            $result = $builder->insert($order_item);
            $order_itemid = $db->insertID();
        }
        /**
         * payment processing
         */
        // if ($post['payment'] == 'Razorpay') {

        $builder = $db->table('payment_log');
        $TransactionAmount =  $post['grand_total'];
        // $type = $post['payment'];
        $txnid = generateTransactionId();
        $data = array(
            "UserId" => session('uid') ? session('uid') : session('guestid'),
            "ord_id" => $orderid,
            "TxnId" => $txnid,
            "TransactionAmount" => $TransactionAmount,
            "PaymentType" => 'Razorpay',
            "PaymentDetail" => '',
            "PayIn" => 1,
            "PayOut" => 0,
            "PaymentInProccesing" => 1,
            "PaymentSuccess" => 0,
            "PaymentFailed" => 0,
            "PatmentExecute" => 0,
            "PaymentRefrenceId" => '',
            "PaymentDescription" => '',
            "CreateTime" => date("Y-m-d H:i:s"),
            "CreateBy" => session('uid') ? session('uid') : session('guestid'),
        );
        $builder->insert($data);
        $response = "Redirecting to Payment Gateway ... Please wait !!! Don't press Back or Refresh";
        $shipingDetails = array(
            'email' => 'bhushansalunkhe20@gmail.com',
            'contact' => '9595888075',
            'username' => 'bhushan'
            // 'email' => $post['email'],
            // 'contact' => $post['mobileno'],
            // 'username' => $post['fname']
        );
        helper('rozorpay');
        $payment = SendRazor($TransactionAmount, $txnid, $shipingDetails);
        return $payment;
        // } else {
        //     $db = $this->db;
        //     $builder = $db->table('order');
        //     $builder->where('user_id', session('id'));
        //     $Userbuilder = $db->table('cart');
        //     $Userbuilder->where('user_id', session('id'));
        //     $res = $Userbuilder->update(array('is_delete' => '1'));
        //     if ($res) {
        //         echo  view('ordersuccess');
        //     }
    }
    // return $data;
    // echo "<pre>";print_r($data);exit;
    public function get_max_val()
    {
        $db = $this->db;
        $builder = $db->table('item');
        $builder->select('MAX(price) as max_value');
        $builder->where('is_delete', 0);
        $query = $builder->get();
        $max_value = $query->getRow();
        // echo "<pre>";
        // print_r($max_value);
        // exit;

        return $max_value->max_value;
    }
    public function insert_edit_subscribe($post)
    {
        // print_r($post);exit;
        $db = $this->db;
        $builder = $db->table("subscribe");
        $builder->select('*');
        $builder->where('is_delete', 0);
        $builder->where(array('email' => $post['email']));
        $query = $builder->get();
        $result =  $query->getRowArray();
        if (empty($result)) {
            $data = array(
                'email' => $post['email'],
                'user_id' => session('uid') ? session('uid') : session('guestid')
            );
            $data['created_at'] = date('Y-m-d H:i:s');
            @$data['created_by'] = session('uid') ? session('uid') : session('guestid');

            // if (empty($msg)) {
            $res = $builder->insert($data);
            if ($res) {
                $msg = array('st' => 'success', "msg" => "Subcribe Success");
            } else {
                $msg = array('st' => 'failed', "msg" => "Subscrib Failed");
            }
            // }
        } else {

            $msg = array('st' => 'added', "msg" => "Already Subscibe");
        }
        return $msg;
    }
    public function send_otp_mail($post)
    {
        helper('base');
        $db = $this->db;
        $builder = $db->table('user');
        $builder->select('*');
        $builder->where(array("email" => $post['email']));
        $result = $builder->get();
        $result_array = $result->getRowArray();
        $email = $post['email'];

        $otp = random_int(100000, 999999);
        if (!empty($otp)) {
            $ootp['otp'] = $otp;
        }

        $session = session();
        $session->set($ootp);
        $session->set('email', $post['email']);

        send_otp($email, $otp);

        if ($result_array) {
            $msg = array("st" => "success", "msg" => "Success");
        } else {
            $msg = array("st" => "failed", "msg" => "Enter Valid Email");
        }
        return $msg;
    }

    public function verify_otp($post)
    {
        $check = $post['user_otp'] == session('otp');
        if ($check) {
            $result = array("st" => "success", "msg" => "Success");
        } else {
            $result = array("st" => "failed", "msg" => "Enter Valid OTP");
        }
        return $result;
    }

    public function set_new_pass($post)
    {
        $db = $this->db;
        $builder = $db->table('user');
        $builder->select('*');
        $builder->where(array("email" => $post['email']));
        $result = $builder->get();
        $result_array = $result->getRow();
        if (!empty($result_array)) {
            if ($result_array->password != $post['password']) {
                $builder->where('email', $post['email']);
                $builder->update(array('password' => $post['password']));
                $msg = array('st' => 'success', 'msg' => 'New Password is Set');
            } else {
                $msg = array('st' => 'failed', 'msg' => 'Old Password is same use different...');
            }
            return $msg;
        } else {
            $msg = array('st' => 'failed', 'msg' => 'Failed to set password');
        }
        return $msg;
    }
}
