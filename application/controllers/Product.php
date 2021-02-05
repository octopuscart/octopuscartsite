<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Product_model');
        $this->load->library('session');
        $this->user_id = $this->session->userdata('logged_in')['login_id'];
    }

    public function index() {
        redirect('/');
    }

    //function for product list
    function ProductList($custom_id, $cat_id) {

        $tempcatid = $cat_id;



        $categories = $this->Product_model->productListCategories($cat_id);

        $data["categorie_parent"] = $this->Product_model->getparent($cat_id);
        $primaryparent = "0";
        foreach ($data["categorie_parent"] as $ckey => $cvalue) {
            if ($cvalue['parent_id'] == '0') {
                $primaryparent = $cvalue['id'];
            }
        }

        $categoriesString = $this->Product_model->stringCategories($primaryparent);
        $categoriesString = trim($categoriesString, ",");

        $this->db->where("id in ($categoriesString)");
        $query = $this->db->get('category');
        if ($query) {
            $producttgs = $query->result_array();
        } else {
            $producttgs = array();
        }

        $data['producttag'] = $producttgs;

        $this->db->where("parent_id", "0");
        $query = $this->db->get('category');
        $corecategories = $query->result_array();

        $products = array();
        $categories2 = array();
        foreach ($corecategories as $ckey => $cvalue) {
            $this->db->select("id, title, price, file_name, short_description, description");
            if (isset($_GET['mode'])) {
                if ($_GET['mode'] == 'test') {
                    
                } else {
                    $this->db->where("credit_limit", "");
                }
            } else {
                $this->db->where("credit_limit", "");
            }
            $this->db->where("category_id", $cvalue["id"]);
            $query = $this->db->get('products');
            $productslist = $query->result_array();
            if ($productslist) {
                $categories2[$cvalue["id"]] = $productslist[0]['file_name'];
            } else {
                $categories2[$cvalue["id"]] = "default.png";
            }
            $products[$cvalue["id"]] = $productslist;
        }


        $data['productlist'] = $products;

        $data["categories"] = $categories;
        $data["categories2"] = $categories2;
        $data["category"] = $cat_id;
        $session_last_custom = $this->session->userdata('session_last_custom');



        $this->load->view('Product/productList', $data);
    }

    function ProductSearch() {
        $data['keyword'] = $_GET['keyword'];
        $this->load->view('Product/productSearch', $data);
    }

    //function for details
    function productDetails($product_id) {
        $this->db->where('id', $product_id);
        $query = $this->db->get('products');
        $product = $query->row_array();
        $prodct_details = $product;
        if ($prodct_details) {



            $pquery = "SELECT pa.* FROM product_related as pr 
      join products as pa on pa.id = pr.related_product_id
      where pr.product_id = $product_id";
            $product_related = $this->Product_model->query_exe($pquery);

            $data["product_related"] = $product_related;

            $this->config->load('seo_config');
            $this->config->set_item('seo_title', $prodct_details['title']);
            $this->config->set_item('seo_desc', $prodct_details['short_description']);
            $this->config->set_item('seo_keywords', $prodct_details['keywords']);
            $this->config->set_item('seo_imgurl', imageserver . $prodct_details['file_name']);

            $this->load->view('Product/productDetails', $data);
        } else {
            $this->load->view('errors/html/error_404');
        }
    }

    function test() {
//        $this->session->unset_userdata('session_cart');
        //$session_cart = $this->Product_model->cartOperation(214, 1);
        $session_cart = $this->Product_model->cartData();
        echo "<pre>";
        print_r($session_cart);
    }

    function unsetData() {
        $this->session->unset_userdata('session_cart');
    }

    function productDetailsView($product_id = 1, $attr = 1) {
        $testproduct = $this->Product_model->testProducts();
        $data['product'] = $testproduct[$product_id];
        $data['attrselect'] = $attr;
        $data['product_id'] = $product_id;
        $this->load->view('Product/productDetails', $data);
    }

    function ProductListView() {
        $testproduct = $this->Product_model->testProducts();
        $data['products'] = $testproduct;
        $this->load->view('Product/productListPrice', $data);
    }

}
