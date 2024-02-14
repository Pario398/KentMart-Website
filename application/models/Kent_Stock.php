<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kent_Stock extends CI_Model
{
    public function DumpStock()
    {
        $this->load->database();
        $results = $this->db->query("SELECT * FROM Stock");
        return $results->result();
    }
    public function fetchItemRow($Id)
    {
        $this->load->database();
        $this->db->select('*');
        $this->db->from('Stock');
        $this->db->where('Id', $Id);
        // $this->db->where('no >',0);
        $query = $this->db->get();
        return $query->row();
        // $query = "SELECT * FROM Stock WHERE Id = ?;";
        // $results = $this->db->query($query, $Id);

        // return $results->row(); // one result, if any, so just a row
    }
    //Takes in the username and password for checking if the input is correct
    public function check_credentials($username, $password)
    {
        //This loads the database 
        $this->load->database();
        //we will check the credentials with the Customer DB
        $this->db->select('*');
        $this->db->from('Customers');
        //This selects the part in customers where the inputed username can be found
        $this->db->where('username', $username);
        //This encrypts the password using the sha1 before comparing as The password is stored encrypted with SHA1 in the Customer table
        $this->db->where('password', sha1($password));
        //This gets the the result and stores it in the variable
        $query = $this->db->get();
        //This stores and returns the value in the query
        return $query->row();
    }
    //this gets the result for a empty search
    public function loadResults()
    {
        $this->load->database();
        $this->db->select('*');
        $this->db->from('Stock');
        $this->db->where('no >', 0);
        $query = $this->db->get();
        return $query->result();
    }
    //This checks the search term within the database
    public function search_term($searchQuery)
    {
        // The term is used to search the “product” field of the “Stock” table
        //This loads in the database
        $this->load->database();
        $this->db->select('*');
        //Select everything from Stock with condition to the parameter
        $this->db->from('Stock');
        //where the product is similar to the input as using like means that the input doesnt have to be perfect
        $this->db->like('product', $searchQuery);
        //The number has to be greater than 0 as if its less than 0 its not available
        //Only the matches that are in stock, “no” > 0, should be included in the results.
        $this->db->where('no >', 0);
        $query = $this->db->get();
        //returns all the matching results
        return $query->result();
    }
    //THis function needs to decrease the stock on the database and dosent need to return anything
    public function buy($Id, $quantity)
    {
        // Your website should then check that the desired number are indeed in stock, then decrement 
        // the number purchased in the Stock database table

        //This loads the database
        $this->load->database();
        //THis query just needs to update the stock of the item in the database and dosent need to return anything.
        //There always has to be more stock than the quantity the user wants to buy otherwise it goes into the negative numbers.
        $this->db->query("UPDATE Stock SET no = no - ? WHERE id = ? AND no >= ?", [$quantity, $Id, $quantity]);
    }
    public function checkNo($Id)
    {
        //THis loads the database
        $this->load->database();
        $this->db->select('*');
        $this->db->from('Stock');
        //only selects the items where the ID matches
        $this->db->where('Id', $Id);
        $query = $this->db->get();
        //returns the result of the query
        return $query->row();
    }
    //THis function needs to just needs to increase the stock if an admin account is used
    public function restock($Id, $quantity)
    {
        //This loads the  database
        $this->load->database();
        //This query just updates the stack using the quantity and the id and dosent need to worry about the min amount
        $this->db->query("UPDATE Stock SET no = no + ? WHERE id = ? ", [$quantity, $Id]);
        //$query =$this->db->get();
    }
    //this checks if the id exists in sql
    public function checkID($Id)
    {
        $this->load->database();
        $this->db->select('*');
        $this->db->from('Stock');
        $this->db->where('Id', $Id);
        $query = $this->db->get();
        return $query->row();

    }

}