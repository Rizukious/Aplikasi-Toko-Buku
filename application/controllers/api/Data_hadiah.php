<?php

defined('BASEPATH') or exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . '/libraries/REST_Controller.php';

// use namespace
use Restserver\Libraries\REST_Controller;

/**
 * This is an example of a few basic user interaction methods you could use
 * all done with a hardcoded array
 *
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Phil Sturgeon, Chris Kacerguis
 * @license         MIT
 * @link            https://github.com/chriskacerguis/codeigniter-restserver
 */
class Data_hadiah extends REST_Controller
{

    function __construct()
    {
        // Construct the parent class
        parent::__construct();

        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        $this->methods['users_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['users_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['users_delete']['limit'] = 50; // 50 requests per hour per user/key
    }

    public function index_get()
    {
        // Users from a data store e.g. database


        $id = $this->get('id_hadiah');

        // If the id parameter doesn't exist return all the users

        if ($id === NULL) {
            $hadiah = $this->db->get("tb_hadiah")->result_array();
            // Check if the users data store contains users (in case the database result returns NULL)
            if ($hadiah) {
                // Set the response and exit
                $this->response($hadiah, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            } else {
                // Set the response and exit
                $this->response([
                    'status' => FALSE,
                    'message' => 'No users were found'
                ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
            }
        }

        // Find and return a single record for a particular user.
        else {


            // Validate the id.
            if ($id <= 0) {
                // Invalid id, set the response and exit.
                $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
            }

            // Get the user from the array, using the id as key for retrieval.
            // Usually a model is to be used for this.

            $this->db->where(array("id_hadiah" => $id));
            $hadiah = $this->db->get("tb_hadiah")->row_array();

            $this->response($hadiah, REST_Controller::HTTP_OK);
        }
    }

    public function index_post()
    {
        // $this->some_model->update_user( ... );
        $data = [
            'nama_hadiah' => $this->post('nama_hadiah'),
            'ringkasan' => $this->post('ringkasan'),
            'deskripsi' => $this->post('deskripsi'),
            'points' => $this->post('points'),
            'stok' => $this->post('stok')
        ];

        $this->db->insert("tb_hadiah", $data);
        $this->set_response($data, REST_Controller::HTTP_CREATED); // CREATED (201) being the HTTP response code
    }

    public function index_delete()
    {
        $id = $this->delete('id');


        // $this->some_model->delete_something($id);
        $where = [
            'id_hadiah' => $id,
        ];

        $this->db->delete("tb_hadiah", $where);
        $message = array("status" => "Data Berhasil di Hapus");
        $this->set_response($message, REST_Controller::HTTP_NO_CONTENT); // NO_CONTENT (204) being the HTTP response code
    }

    public function index_put()
    {
        $where = array(
            "id_hadiah" => $this->put("id_hadiah")
        );

        $data = array(
            "nama_hadiah" => $this->put("nama_hadiah"),
            "ringkasan" => $this->put("ringkasan"),
            "deskripsi" => $this->put("deskripsi"),
            "points" => $this->put("points"),
            "stok" => $this->put("stok")
        );

        $this->db->update("tb_hadiah", $data, $where);
        $this->set_response($data, REST_Controller::HTTP_CREATED);
    }
}
