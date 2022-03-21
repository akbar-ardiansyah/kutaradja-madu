<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Product_model', 'product');
		date_default_timezone_set('Asia/Jakarta');
		_validate();
		add_js([
			'js/upload.js'
		]);
	}
	public function index()
	{
		$data['app'] = $this->db->get('tb_application')->row_array();
		$data['title']		= 'Dashboard';
		$this->template->admin('page/index', $data);
	}
	public function product()
	{
		$data['app'] = $this->db->get('tb_application')->row_array();
		$data['title']		= 'Produk';
		$data['product'] 	= $this->product->get_product();
		$this->template->admin('page/product', $data);
	}
	function error()
	{
		$data['app'] = $this->db->get('tb_application')->row_array();
		$data['title']		= '404';
		$this->load->view('page/error', $data);
	}
	public function setPesan()
	{

		$pesan = [
			'required'		   => 	'%s harus diisi.',
			'valid_email'	   => 	'%s format salah.',
			'numeric'		   => 	'%s just numeric.',
			'matches'		   =>	'%s tidak sama %s.',
			'is_unique'		   =>	'%s sudah ada',
			'max_length'	   =>  	'%s max %s character.',
			'min_length'	   =>  	'%s min %s character.',
			'alpha_dash'	   =>	'%s diisi alpabet, numerik, dan garis bawah.',
			'alpha'			   =>  	'%s diisi dengan format alpha a-z',
			'valid_url_format' =>  	'%s format salah, exampel (htpp://www.xxxxx.com/xxx)',
			'is_natural'	   =>  	'%s harus format number 0-9',
			'decimal'	   	   =>	'%s harus format decimal',
		];
		foreach ($pesan as $key => $value) {
			$this->form_validation->set_message($key, $value);
		}
	}
	#------------------------------------------
	// input data
	# -----------------------------------------
	public function upload_product()
	{
		// upload image
		$upload = $_FILES['image']['name'];
		if ($upload) {
			$numberOfFiles = sizeof($upload);
			$file = $_FILES['image'];
			$config['allowed_types'] = 'gif|png|jpg|jpeg';
			$config['max_size'] = '2048';
			$config['upload_path'] = 'assets/upload/product';
			$config['file_name']        = 'Product' . time();
			$this->load->library('upload', $config);
			for ($i = 0; $i < $numberOfFiles; $i++) {
				$_FILES['image']['name'] = $file['name'][$i];
				$_FILES['image']['type'] = $file['type'][$i];
				$_FILES['image']['tmp_name'] = $file['tmp_name'][$i];
				$_FILES['image']['size'] = $file['size'][$i];
				$this->upload->initialize($config);
				if ($this->upload->do_upload('image')) {
					$data = $this->upload->data();
					$imageName =  $data['file_name'];
					$checking = $this->product->check_data();
					$id_product = $this->db->select_max('id_product')->get('product')->row()->id_product + 1;
					if (!$checking) {
						$groupImage  = 1;
					} else {
						$groupImage = $checking['group_image'] + 1;
					}
					$insert[$i]['image'] = $imageName;
					$insert[$i]['group_image'] = $groupImage;
					$insert[$i]['created_at'] = time();
					$insert[$i]['id_product'] = $id_product;
				}
			}
			if (!$insert && !$data) {
				$this->session->set_flashdata('image',  '<div class="text-danger">foto produk tidak boleh kosong!</div>');
				redirect('admin/product');
			} else {
				if ($this->product->upload_image($insert, $data['file_name']) > 0) {
					// $this->session->set_flashdata('alert',  '<div class="text-danger">data masih kosong!</div>');
					// redirect('admin/product');
				} else {
					$this->session->set_flashdata('alert',  '<div class="text-danger">foto produk gagal diupload!</div>');
					redirect('admin/product');
				}
			}
		}
		$data = [
			'name'               		=> $this->input->post('namaproduk'),
			'price'                		=> $this->input->post('harga'),
			'describtion'               => $this->input->post('deskripsi')
		];

		$save_data =  $this->product->input_data($data, 'product');
		if (!$save_data && !$data) {
			$this->session->set_flashdata('alert',  'data gagal di simpan!');
			redirect('admin/product');
		} else {
			$this->session->set_flashdata('flash',  'data berhasil di simpan!');
			redirect('admin/product');
		}
	}
	#------------------------------------------
	// drop data
	# -----------------------------------------
	public function deleted_product($id) //berjalan seperti semestinya
	{
		$query          = $this->db->get_where('product_image', ['id_product' => $id])->result_array();
		foreach ($query as $old_image) {
			unlink(FCPATH . 'assets/upload/product/' . $old_image['image']);
		}
		$this->db->delete('product_image', ['id_product' => $id]);
		$this->db->delete('product', ['id_product' => $id]);
		$this->session->set_flashdata('flash',  'data berhasil dihapus!');
		redirect('admin/product');
	}
	#------------------------------------------
	// get data
	# -----------------------------------------
	public function get_product()
	{
		echo json_encode($this->product->get_product_id($this->input->post('id')));
	}
	#------------------------------------------
	// update data
	# -----------------------------------------
	public function update_product()
	{
		// upload image
		$id = $this->input->post('id');
		// var_dump($id);
		// die;
		$upload = $_FILES['image']['name'];
		if ($upload) {
			$numberOfFiles = sizeof($upload);
			$file = $_FILES['image'];
			$config['allowed_types'] = 'gif|png|jpg|jpeg';
			$config['max_size'] = '2048';
			$config['upload_path'] = 'assets/upload/product';
			$config['file_name']        = 'Product' . time();
			$this->load->library('upload', $config);
			for ($i = 0; $i < $numberOfFiles; $i++) {
				$_FILES['image']['name'] = $file['name'][$i];
				$_FILES['image']['type'] = $file['type'][$i];
				$_FILES['image']['tmp_name'] = $file['tmp_name'][$i];
				$_FILES['image']['size'] = $file['size'][$i];
				$this->upload->initialize($config);
				if ($this->upload->do_upload('image')) {
					$data = $this->upload->data();
					$imageName =  $data['file_name'];
					$checking = $this->product->check_data();
					$id_product = $this->input->post('id');
					if (!$checking) {
						$groupImage  = 1;
					} else {
						$groupImage = $checking['group_image'] + 1;
					}
					$insert[$i]['image'] = $imageName;
					$insert[$i]['group_image'] = $groupImage;
					$insert[$i]['created_at'] = time();
					$insert[$i]['id_product'] = $id_product;
				}
			}

			if ($this->product->update_image($insert, $data['file_name'])) {
				$query          = $this->db->get_where('product_image', ['id_product' => $id])->result_array();
				foreach ($query as $old_image) {
					unlink(FCPATH . 'assets/upload/product/' . $old_image['image']);
				}
			} else {
				$this->session->set_flashdata('alert',  '<div class="text-danger">foto produk gagal diupload!</div>');
				redirect('admin/product');
			}
		}
		$data = [
			'name'               		=> $this->input->post('namaproduk'),
			'price'                		=> $this->input->post('harga'),
			'describtion'               => $this->input->post('deskripsi')
		];


		$save_data =  $this->product->update_data($data, 'product');
		if (!$save_data && !$data) {
			$this->session->set_flashdata('alert',  'data gagal di simpan!');
			redirect('admin/product');
		} else {
			$this->session->set_flashdata('flash',  'data berhasil di simpan!');
			redirect('admin/product');
		}
	}
	// public function upload()
	// {
	// 	if (ajax()) {
	// 		$this->load->library('form_validation');
	// 		$this->setPesan();
	// 		$this->form_validation->set_rules("namaproduk", "Nama produk", "required");
	// 		$this->form_validation->set_rules("harga", "Harga", "required");
	// 		$this->form_validation->set_rules("deskripsi", "Deskripsi", "required");
	// 		$this->form_validation->set_rules("image", "Foto Produk", "required");
	// 		$this->form_validation->set_error_delimiters('', '');
	// 		if ($this->form_validation->run()) {

	// 			// upload image
	// 			$upload = $_FILES['image']['name'];
	// 			if ($upload) {
	// 				$numberOfFiles = sizeof($upload);
	// 				$file = $_FILES['image'];
	// 				$config['allowed_types'] = 'gif|png|jpg|jpeg';
	// 				$config['max_size'] = '2048';
	// 				$config['upload_path'] = 'assets/upload/product';
	// 				$this->load->library('upload', $config);
	// 				for ($i = 0; $i < $numberOfFiles; $i++) {
	// 					$_FILES['image']['name'] = $file['name'][$i];
	// 					$_FILES['image']['type'] = $file['type'][$i];
	// 					$_FILES['image']['tmp_name'] = $file['tmp_name'][$i];
	// 					$_FILES['image']['size'] = $file['size'][$i];
	// 					$this->upload->initialize($config);
	// 					if ($this->upload->do_upload('image')) {
	// 						$data = $this->upload->data();
	// 						$imageName =  $data['file_name'];
	// 						$checking = $this->product->check_data();
	// 						if (!$checking) {
	// 							$groupImage  = 1;
	// 						} else {
	// 							$groupImage = $checking['group_image'] + 1;
	// 						}
	// 						$insert[$i]['image'] = $imageName;
	// 						$insert[$i]['group_image'] = $groupImage;
	// 						$insert[$i]['create_at'] = time();
	// 					}
	// 				}
	// 				$this->product->upload_image($insert, $data['file_name']);
	// 			}

	// 			$data = [
	// 				'name'               		=> $this->input->post('namaproduk'),
	// 				'price'                		=> $this->input->post('harga'),
	// 				'describtion'               => $this->input->post('deskripsi')
	// 			];
	// 			$save_data =  $this->product->input_data($data, 'product');
	// 			if ($save_data == true) {
	// 				$this->response = [
	// 					'success' => true,
	// 					'msg' => 'data berhasil disimpan data.'
	// 				];
	// 			} else {
	// 				$this->response = [
	// 					'success' => false,
	// 					'msg' => 'Terjadi kesalah di server.'
	// 				];
	// 			}
	// 		} else {
	// 			$this->response['msg'] = 'Form belum lengkap.';
	// 			foreach ($_POST as $key => $value) {
	// 				# code...
	// 				$this->response['messages'][$key] = form_error($key);
	// 			}
	// 		}
	// 		echo json_encode($this->response);
	// 	} else {
	// 		exit("No direct scripts access allowed.");
	// 	}
	// }
}
