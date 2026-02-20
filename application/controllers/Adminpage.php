<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 * @property LksModel $LksModel
 * @property CI_Input $input
 * 
 */


class Adminpage extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('LksModel');

        $this->load->helper('dd');
        $this->load->helper('url');
    }


    public function index()
    {

        $data['lkses'] = $this->LksModel->fetchAll();

        foreach ($data['lkses'] as &$item) {
            $item['cover'] = json_decode($item['cover'], true);
            if (!$item['cover'] || !isset($item['cover']['url'])) {
                $item['cover'] = ['url' => 'https://i.ibb.co/PRVk4d3/image.png'];
            }
        }


        $toview['content'] = $this->load->view('adminpages/adminpage', $data, true);
        $this->load->view('adminpages/mainadmin', $toview);
    }



    public function create()
    {

        $create_data = [
            'name' => $this->input->post('name'),
            'kelas' => $this->input->post('kelas'),
            'price' => $this->input->post('price'),
            'stock' => $this->input->post('stock'),
            'description' => $this->input->post('description'),

        ];

        // dd($create_data);

        $create_data['cover'] = $this->do_upload('cover');




        $this->LksModel->create($create_data);
        redirect('adminpage');
    }

    public function edit($id)
    {
        $update_data = [
            'id' => $id,
            'name' => $this->input->post('name'),
            'kelas' => $this->input->post('kelas'),
            'price' => $this->input->post('price'),
            'stock' => $this->input->post('stock'),
            'description' => $this->input->post('description'),
        ];

        if (!empty($_FILES['cover']['tmp_name'])) {
            $update_data['cover'] = $this->do_upload('cover');
        }

        // dd($update_data);

        $this->LksModel->update($update_data);
        redirect('adminpage');
    }

    public function delete($id)
    {
        $this->LksModel->delete($id);
        redirect('adminpage');
    }



    public function do_upload($field_name)
    {
        $api_key = '249d82f26a3846b804f4a06c4bf5df9d';

        // Check if a file was actually uploaded
        if (!empty($_FILES[$field_name]['tmp_name'])) {
            $image_temp = $_FILES[$field_name]['tmp_name'];
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
                return json_encode($result['data']);
            } else {
                echo "Chaos! ImgBB said: " . $result['error']['message'];
            }
        } else {
            dd("No file uploaded for $field_name");
        }
    }
}
