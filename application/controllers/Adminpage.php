<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @property LksModel $LksModel
 * 
 */


class Adminpage extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('LksModel');

		$this->load->helper('dd');
	}
	
	
	public function index() {
        $this->load->view('imgbbui');
    }

    public function do_upload() {
        $api_key = '249d82f26a3846b804f4a06c4bf5df9d'; // Get this from api.imgbb.com
        
        // Check if a file was actually uploaded
        if (!empty($_FILES['image']['tmp_name'])) {
            $image_temp = $_FILES['image']['tmp_name'];
            $image_data = base64_encode(file_get_contents($image_temp));

            // Setup cURL to hit ImgBB
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, 'https://api.imgbb.com/1/upload?key=' . $api_key);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, array('image' => $image_data));

            $response = curl_exec($ch);
            curl_close($ch);

            $result = json_decode($response, TRUE);

            if ($result['success']) {
                $data['img_url'] = $result['data']['url'];
                $this->load->view('upload_success', $data);
            } else {
                echo "Chaos! ImgBB said: " . $result['error']['message'];
            }
        } else {
            echo "You didn't select an image, genius!";
        }
    }
}
