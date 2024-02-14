<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kentmart extends CI_Controller
{
    // Visiting kentmart should redirect to the login page if unauthenticated and the search page if authenticated
    public function index()
    {
        $this->load->library('session');
        $valdata = $this->session->userdata("user");
        if ($valdata == NULL) {

            $this->load->helper('url');
            redirect(base_url() . 'index.php/kentmart/login/', 'refresh');
            //redirect(site_url('Kentmart/index'));
        } else {
            $this->load->helper('url');
            redirect(base_url() . 'index.php/kentmart/search/', 'refresh');
            // $this->load->view("search");
        }
    }
    //the login function loads the Login view
    public function login()
    {
        $this->load->view("LogIn");
    }
    //the loginProcessor function is called upon when the inputs in the login view are submitted
    public function loginProcessor()
    {
        //this takes in the username and password and only trims off the spaces at the start and of the word
        $username = trim($this->input->post('username'));
        $password = trim($this->input->post('password'));
        //The inputs are checked againts the database using the check_credentials function in the model Kent_Stock
        $this->load->model('Kent_Stock');
        //the password in this function from the model is encrypted using sha1 in the kent_Stock itself
        //as the password in the Customer table in the database is also stored using SHA1.
        $result = $this->Kent_Stock->check_credentials($username, $password);
        $this->load->helper('url');
        //If there are no results in the query then they are an untrusted visitor and can only access one webpage, the login page
        //Authenticated users are sent to the search page, login failures are returned to the login page.
        if (!$result) {
            echo "<script>alert('Unsuccessful login, Please enter correct Username and Password');</script>";
            redirect(base_url() . 'index.php/kentmart/login/', 'refresh');
        } else {
            //only successful logins get stored in sessions for later use
            $this->load->library('session');
            $this->session->set_userdata("user", $username);
            redirect(base_url() . 'index.php/kentmart/search/', 'refresh');
        }
    }
    //only Authenticated users have access to the product search page
    // kentmart/search is where the feature can be found
    public function search()
    {
        $this->load->library('session');
        $valdata = $this->session->userdata("user");
        if ($valdata == NULL) {

            $this->load->helper('url');
            redirect(base_url() . 'index.php/kentmart/login/', 'refresh');
            //redirect(site_url('Kentmart/index'));
        } else {
            $this->load->view("search");
        }

    }
    public function searchProcessor()
    {
        //Check if the productName field is set and has a non-empty value
        if (isset($_POST['productName']) && !empty($_POST['productName'])) {
            // Process the form submission
            $search = $this->input->post('productName');
            $this->load->model('Kent_Stock');
            $results["results"] = $this->Kent_Stock->search_term($search);
            if ($results["results"] == NULL) {
                echo "<script>alert('Unsuccessful Search');</script>";
                $this->load->helper('url');
                // Redirect to the search page
                redirect(base_url() . 'index.php/Kentmart/search/', 'refresh');
            } else {
                // The items found by the search should be returned in a table
                $this->load->helper('url');
                $this->load->view("search_results", $results);
            }
        } else {
            //This loads up the search with the results of the search
            $this->load->model('Kent_Stock');
            $results["results"] = $this->Kent_Stock->loadResults();
            $this->load->helper('url');
            $this->load->view("search_results", $results);
        }

    }
    //Authenticated customers should be able to buy products. 
    public function buy($Id)
    {
        // Make certain that users are authenticated
        $this->load->library('session');
        $valdata = $this->session->userdata("user");
        if ($valdata == NULL) {

            $this->load->helper('url');
            redirect(base_url() . 'index.php/kentmart/login/', 'refresh');
        } elseif ($valdata == "admin") //An authenticated admin can restock items. 
        {
            $this->load->model('Kent_Stock');
            $data1 = $this->Kent_Stock->checkID($Id);
            if (!$data1) {
                $this->load->helper('url');
                echo "<script>alert('Unsuccessful, Incorrect ID');</script>";
                redirect(base_url() . 'index.php/kentmart/search/', 'refresh');

            } else {
                $this->load->helper('url');
                // An authenticated admin can restock items. This is done with: 
                // kentmart/restock/Id .The Id is the item to be restocked. 
                $data['parameter'] = $Id;
                redirect(base_url() . 'index.php/kentmart/restock/' . $Id, 'refresh');
            }


        } else {
            $this->load->model('Kent_Stock');
            $data1 = $this->Kent_Stock->checkID($Id);
            if (!$data1) {
                $this->load->helper('url');
                echo "<script>alert('Unsuccessful, Incorrect ID');</script>";
                redirect(base_url() . 'index.php/kentmart/search/', 'refresh');

            } else {
                //Authenticated customers should be able to buy products.
                $this->load->helper('url');
                $data['parameter'] = $Id;
                $this->load->view("buy", $data);
            }

        }


    }
    //this function will process the buy data
    public function buyProcessor($Id)
    {
        $quantity = $this->input->post('quantity');
        $this->load->model('Kent_Stock');
        // Validation passed, check quantity availability
        $data2 = $this->Kent_Stock->checkNo($Id);
        if ($quantity == null) {
            echo "<script>alert('Quantity cannot be empty');</script>";
            $this->load->helper('url');
            redirect(base_url() . 'index.php/kentmart/buy/' . $Id, 'refresh');
        } else if (($data2->no) > $quantity) {
            $data = $this->Kent_Stock->buy($Id, $quantity);
            echo "<script>alert('Successful purchasing');</script>";
            $this->load->helper('url');
            // Redirect to the search page
            redirect(base_url() . 'index.php/kentmart/search/', 'refresh');
        } else {
            echo "<script>alert('Unsuccessful purchasing');</script>";
            $this->load->helper('url');
            redirect(base_url() . 'index.php/kentmart/buy/' . $Id, 'refresh');
        }
        
    }
    // Authenticated admin should be able to re-stock products.
    public function restock($Id)
    {
        // Make certain that users are authenticated
        $this->load->library('session');
        $valdata = $this->session->userdata("user");
        if ($valdata == NULL) {

            $this->load->helper('url');
            redirect(base_url() . 'index.php/kentmart/login/', 'refresh');
        } elseif ($valdata == "admin") //An authenticated admin can restock items. 
        {
            $this->load->model('Kent_Stock');
            $data1 = $this->Kent_Stock->checkID($Id);
            if (!$data1) {
                //redircts if the id is invalid
                $this->load->helper('url');
                echo "<script>alert('Unsuccessful, Incorrect ID');</script>";
                redirect(base_url() . 'index.php/kentmart/search/', 'refresh');

            } else {
                // An authenticated admin can restock items. This is done with: 
                // kentmart/restock/Id .The Id is the item to be restocked. 
                $data['parameter'] = $Id;
                $this->load->view("restock", $data);
            }


        } else {
            $this->load->model('Kent_Stock');
            $data1 = $this->Kent_Stock->checkID($Id);
            if (!$data1) {
                $this->load->helper('url');
                 //redircts if the id is invalid
                echo "<script>alert('Unsuccessful, Incorrect ID');</script>";
                redirect(base_url() . 'index.php/kentmart/search/', 'refresh');

            } else {
                //Authenticated customers should be able to buy products.
                $this->load->helper('url');
                $data['parameter'] = $Id;
                redirect(base_url() . 'index.php/kentmart/buy/' . $Id, 'refresh');
            }

        }

    }
    //this processes the restock data
    public function restockProcessor($Id)
    {
        $quantity = $this->input->post('quantity');
        $this->load->model('Kent_Stock');
        if ($quantity != NULL) {
            // Validation passed, process the form
            $data = $this->Kent_Stock->restock($Id, $quantity);
            echo "<script>alert('Successful restocking');</script>";
            $this->load->helper('url');
            // Redirect to the search page
            redirect(base_url() . 'index.php/kentmart/search/', 'refresh');
        } else {
            echo "<script>alert('Unsuccessful restocking');</script>";
            $this->load->helper('url');
            // Redirect to the restock page
            redirect(base_url() . 'index.php/kentmart/restock/' . $Id, 'refresh');

        }
    }
    public function dump()
    {
        $this->load->model("Kent_Stock");
        $data["Stock"] = $this->Kent_Stock->DumpStock();
        $this->load->view("DumpStock", $data);
    }


    public function fetchItem()
    {
        $this->load->view("product_request");
    }

    public function fetchItemPosts()
    {
        $this->load->model("Kent_Stock");
        $postData = $this->input->post();
        $Id = $postData['ProductID'];

        $data["Item"] = $this->Kent_Stock->fetchItemRow($Id);

        /*
         * If the Id does not exist then nothing will be returned.
         *
         */
        if ($data["Item"] != NULL)
            //var_dump($data);
            $this->load->view("product_output", $data); // replace this debug with a view
        else
            echo "Invalid Product Id";
    }
    public function logout()
    {
        $this->load->library('session');
        $this->load->helper('url');
        $this->session->unset_userdata("user");
        redirect('http://raptor.kent.ac.uk/proj/comp5390/kentmart/rs898/index.php/kentmart', 'refresh');
    }

}