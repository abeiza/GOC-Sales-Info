<?php
	if(!defined('BASEPATH'))exit('No Direct Script Access Allowed');
	
	class Apps extends CI_Controller{
		function __construct(){
			parent::__construct();
			date_default_timezone_set('Asia/Jakarta');
		}
		
		/*---------------------------------------------------------------------------------*/
		/*                               Controller BA                                     */
		/*---------------------------------------------------------------------------------*/
		
		function index(){
			$cek = $this->session->userdata('login_code_ba');
			if($cek){
				$query1 = $this->db->query("select Ms_USER.name_user, Ms_USER.pict, Ms_TL.NAMA_TL from Ms_USER, Ms_BA, Ms_TL where Ms_USER.user_id = Ms_BA.ID_BA and Ms_BA.ID_TL = Ms_TL.ID_TL and Ms_USER.user_id='".$this->session->userdata('id')."'");
				foreach($query1->result() as $sess){
					$data['nama'] = $sess->name_user;
					$data['tl'] = $sess->NAMA_TL;
					$data['pict'] = $sess->pict;
				}
				
				/*$query2 = $this->db->query("select Top 1 TransDt from View_EVAN_Qlik_SellOut where ID_BA='".$this->session->userdata('id')."' order by TransDt desc");
				foreach($query2->result() as $sess){
					$data['date'] = $sess->TransDt;
				}*/
				$this->load->view('global/top');
				$this->load->view('app_ba/home',$data);
				$this->load->view('global/bottom');
			}else{
				$this->load->view('global/top');
				$this->load->view('app_ba/login');
				$this->load->view('global/bottom');
			}
		}
		
		function verification(){
			$this->load->view('global/top');
			$this->load->view('app_ba/account_verification');
			$this->load->view('global/bottom');
		}
		
		function forget(){
			$this->load->view('global/top');
			$this->load->view('app_ba/forget');
			$this->load->view('global/bottom');
		}
		
		function home(){
			$cek = $this->session->userdata('login_code_ba');
			if($cek){
				$query1 = $this->db->query("select Ms_USER.name_user, Ms_USER.pict, Ms_TL.NAMA_TL from Ms_USER, Ms_BA, Ms_TL where Ms_USER.user_id = Ms_BA.ID_BA and Ms_BA.ID_TL = Ms_TL.ID_TL and Ms_USER.user_id='".$this->session->userdata('id')."'");
				foreach($query1->result() as $sess){
					$data['nama'] = $sess->name_user;
					$data['pict'] = $sess->pict;
					$data['tl'] = $sess->NAMA_TL;
				}
				
				/*$query2 = $this->db->query("select Top 1 TransDt from View_EVAN_Qlik_SellOut where ID_BA='".$this->session->userdata('id')."' order by TransDt desc");
				foreach($query2->result() as $sess){
					$data['date'] = $sess->TransDt;
				}*/
				/*$query2 = $this->db->query("select sum(Qty) as Qty, sum(value) as amount, NAMA_TIPE_PRODUCT 
				from View_EVAN_Qlik_SellOut WHERE ID_BA='".$this->session->userdata('id')."' and Bulan=".date('m')." and Tahun=".date('Y')."
				group by NAMA_TIPE_PRODUCT");
				
				if($query2->num_rows() == null or $query2->num_rows() == 0){
					
				}else{
					foreach($query2->result()){
						
					}
				}*/
				
				$this->load->view('global/top');
				$this->load->view('app_ba/home',$data);
				$this->load->view('global/bottom');
			}else{
				$this->load->view('global/top');
				$this->load->view('app_ba/login');
				$this->load->view('global/bottom');
			}
		}
		
		function recapt_sales(){
			$cek = $this->session->userdata('login_code_ba');
			if($cek){
				$this->load->view('global/top');
				$this->load->view('app_ba/recapt_sales');
				$this->load->view('global/bottom');
			}else{
				$this->load->view('global/top');
				$this->load->view('app_ba/login');
				$this->load->view('global/bottom');
			}
		}
		
		function recapt_sales_daily(){
			$cek = $this->session->userdata('login_code_ba');
			if($cek){
				//$query2 = $this->db->query("select Top 1 TransDt from View_EVAN_Qlik_SellOut where ID_BA='".$this->session->userdata('id')."' order by TransDt desc");
				//foreach($query2->result() as $sess){
					$data['date'] = date('Y-m-d H:s:i');
				//}
				$this->load->view('global/top');
				$this->load->view('app_ba/recapt_sales_daily',$data);
				$this->load->view('global/bottom');
			}else{
				$this->load->view('global/top');
				$this->load->view('app_ba/login');
				$this->load->view('global/bottom');
			}
		}
		
		
		function attendance(){
			$cek = $this->session->userdata('login_code_ba');
			if($cek){
				$this->load->view('global/top');
				$this->load->view('app_ba/attandance');
				$this->load->view('global/bottom');
			}else{
				$this->load->view('global/top');
				$this->load->view('app_ba/login');
				$this->load->view('global/bottom');
			}
		}
		
		function graphics(){
			$cek = $this->session->userdata('login_code_ba');
			if($cek){
				$data['id'] = $this->session->userdata('id');
				$this->load->view('global/top');
				$this->load->view('app_ba/graphics',$data);
				$this->load->view('global/bottom');
			}else{
				$this->load->view('global/top');
				$this->load->view('app_ba/login');
				$this->load->view('global/bottom');
			}
		}
		
		function profile(){
			$cek = $this->session->userdata('login_code_ba');
			if($cek){
				$query1 = $this->db->query("select ID_BA, NAMA_BA, NAMA_TL, pict from Ms_USER, Ms_BA, Ms_TL where Ms_USER.user_id = Ms_BA.ID_BA and Ms_BA.ID_TL = Ms_TL.ID_TL and Ms_USER.user_id='".$this->session->userdata('id')."'");
				foreach($query1->result() as $pro){
					$data['kode_ba'] = $pro->ID_BA;
					$data['nama_ba'] = $pro->NAMA_BA; 
					$data['nama_tl'] = $pro->NAMA_TL;
					$data['pict'] =	$pro->pict;
				}
				
				$data['query2'] = $this->db->query("select Ms_OUTLET.ID_OUTLET, Ms_OUTLET.NAMA_OUTLET from Ms_USER, Ms_OUTLET where Ms_USER.user_id = Ms_OUTLET.ID_BA and Ms_OUTLET.ID_BA='".$this->session->userdata('id')."'");
				$data['error'] = '';
				$this->load->view('global/top');
				$this->load->view('app_ba/profile',$data);
				$this->load->view('global/bottom');
			}else{
				$this->load->view('global/top');
				$this->load->view('app_ba/login');
				$this->load->view('global/bottom');
			}
		}
		
		function change(){
			$cek = $this->session->userdata('login_code_ba');
			if($cek){
				$this->load->view('global/top');
				$this->load->view('app_ba/change_password');
				$this->load->view('global/bottom');
			}else{
				$this->load->view('global/top');
				$this->load->view('app_ba/login');
				$this->load->view('global/bottom');
			}
		}
	
		function outlet(){
			$cek = $this->session->userdata('login_code_ba');
			if($cek){
				$data['query1'] = $this->db->query("select * from Ms_OUTLET where ID_BA = '".$this->session->userdata('id')."' order by NAMA_OUTLET");
				
				$this->load->view('global/top');
				$this->load->view('app_ba/outlet',$data);
				$this->load->view('global/bottom');
			}else{
				$this->load->view('global/top');
				$this->load->view('app_ba/login');
				$this->load->view('global/bottom');
			}
		}
	
		function cart($id){
			$cek = $this->session->userdata('login_code_ba');
			if($cek){
				$kode_outlet = $this->uri->segment(3);
				$data['query_cart'] = $this->db->query("select * from Temp_CART where ID_BA = '".$this->session->userdata('id')."' order by Qty");
				$query1 = $this->db->query("select Ms_BA.ID_BA, Ms_BA.NAMA_BA, Ms_OUTLET.ID_OUTLET, Ms_OUTLET.NAMA_OUTLET, Ms_TL.ID_TL, Ms_TL.NAMA_TL, Ms_TL.ID_AREA, Ms_KBA.ID_KBA, Ms_KBA.NAMA_KBA from Ms_BA, Ms_OUTLET, Ms_TL, Ms_KBA where Ms_KBA.ID_KBA = Ms_TL.ID_KBA and Ms_TL.ID_TL=Ms_BA.ID_TL and Ms_BA.ID_BA = Ms_OUTLET.ID_BA and Ms_OUTLET.ID_OUTLET = '".$kode_outlet."' and Ms_OUTLET.ID_BA = '".$this->session->userdata('id')."'");
				//$query2 = $this->db->query("select Top 1 ObjectID, ReceiveDt from NewHeader where ID_BA='".$this->session->userdata('id')."' and ID_OUTLET='".$this->uri->segment(3)."' and month(TransDt)='".date('m', strtotime("-1 days"))."' and day(TransDt)='".date('d', strtotime("-1 days"))."' and year(TransDt)='".date('Y', strtotime("-1 days"))."'");
				
				if($query1->num_rows() < 1){
					$this->session->set_flashdata('outlet_result',"<div id='notif' style='width:100%;height:100%;display:flex;position:fixed;left:0;top:0;'><div style='font-size:14px;color:#fff;padding:10px 25px;margin:auto;border-radius:2px;background-color:rgb(50,50,50);'>Maaf, Outlet ini tidak bisa digunakan <br/><span style='font-size:11px;'>Mohon periksa kembali data Anda!</span></div></div>");
					Header('Location:'.base_url().'index.php/apps/outlet/');
				}else{
					//if($query2->num_rows() == 1){
						//$this->session->set_flashdata('outlet_result',"<div id='notif' style='width:100%;height:100%;display:flex;position:fixed;left:0;top:0;'><div style='font-size:14px;color:#fff;padding:10px 25px;margin:auto;border-radius:2px;background-color:rgb(50,50,50);'>Notifikasi<br/><span style='font-size:11px;'>Maaf, transaksi untuk outlet ini pada hari ini sudah dilaporkan!</span></div></div>");
						//Header('Location:'.base_url().'index.php/apps/outlet/');
					//}else{
						foreach($query1->result() as $cart){
							$data['id_ba'] = $cart->ID_BA;
							$data['nama_ba'] = $cart->NAMA_BA;
							$data['id_outlet'] = $cart->ID_OUTLET;
							$data['nama_outlet'] = $cart->NAMA_OUTLET;
							$data['id_tl'] = $cart->ID_TL;
							$data['nama_tl'] = $cart->NAMA_TL;
							$data['id_kba'] = $cart->ID_KBA;
							$data['nama_kba'] = $cart->NAMA_KBA;
							$data['id_area'] = $cart->ID_AREA;
						}
						
						$data['t_date'] = '';
						
						$this->load->view('global/top');
						$this->load->view('app_ba/cart',$data);
						$this->load->view('global/bottom');
					//}
				}
			}else{
				$this->load->view('global/top');
				$this->load->view('app_ba/login');
				$this->load->view('global/bottom');
			}
		}
		
		function list_product($id){
			$cek = $this->session->userdata('login_code_ba');
			if($cek){
				$kode_outlet = $this->uri->segment(3);
				
				$data['query1'] = $this->db->query("select ID_PRODUCT, NAMA_PRODUCT, NAMA_TIPE_PRODUCT, VOLUME, PRODUCT_KODE_PRINCIPLE from Ms_PRODUCT, Ms_PRODUCT_CATEGORY WHERE Ms_PRODUCT_CATEGORY.ID_TIPE_PRODUCT = Ms_PRODUCT.ID_TIPE_PRODUCT order by NAMA_PRODUCT");
				$data['query_cart'] = $this->db->query("select ID_PRODUCT from Temp_CART where ID_BA = '".$this->session->userdata('id')."'");
				
				$this->load->view('global/top');
				$this->load->view('app_ba/list_product',$data);
				$this->load->view('global/bottom');
				
			}else{
				$this->load->view('global/top');
				$this->load->view('app_ba/login');
				$this->load->view('global/bottom');
			}
		}
		
		function list_outlet(){
			$cek = $this->session->userdata('login_code_ba');
			if($cek){
				$data['query1'] = $this->db->query("select * from Ms_OUTLET where ID_BA = '".$this->session->userdata('id')."' order by NAMA_OUTLET");
				$this->load->view('global/top');
				$this->load->view('app_ba/list_outlet',$data);
				$this->load->view('global/bottom');
			}else{
				$this->load->view('global/top');
				$this->load->view('app_ba/login');
				$this->load->view('global/bottom');
			}
		}
		
		function report(){
			$this->load->view('global/top');
			$this->load->view('app_ba/report_list');
			$this->load->view('global/bottom');
		}
		
		function new_product(){
			$cek = $this->session->userdata('login_code_ba');
			if($cek){
				$data['query1'] = $this->db->query("select * from Ms_PRODUCT where Product_Flag = '1' order by NAMA_PRODUCT");
				
				$this->load->view('global/top');
				$this->load->view('app_ba/new_product',$data);
				$this->load->view('global/bottom');
			}else{
				$this->load->view('global/top');
				$this->load->view('app_ba/login');
				$this->load->view('global/bottom');
			}
		}
		
		function detail($id_outlet, $tgl_trans){
			$cek = $this->session->userdata('login_code_ba');
			if($cek){
				$outlet = $this->uri->segment(3);
				$tgl = urldecode($this->uri->segment(4));
				$query1 = $this->db->query("select NewHeader.ObjectID, NewHeader.ID_BA, Ms_BA.NAMA_BA, NewHeader.ID_OUTLET, Ms_OUTLET.NAMA_OUTLET, NewHeader.TransDt from NewHeader, Ms_BA, Ms_OUTLET where 
				Ms_OUTLET.ID_OUTLET = '".$outlet."' AND Ms_BA.ID_BA = '".$this->session->userdata('id')."' 
				AND NewHeader.ID_BA = Ms_BA.ID_BA
				AND NewHeader.ID_OUTLET = Ms_OUTLET.ID_OUTLET 
				AND NewHeader.TransDt = '".$tgl."'");
				foreach($query1->result() as $head){
					$data['id_ba'] = $head->ID_BA;
					$data['nama_ba'] = $head->NAMA_BA;
					$data['id_outlet'] = $head->ID_OUTLET;
					$data['nama_outlet'] = $head->NAMA_OUTLET;
					$data['transdt'] = $head->TransDt;
					$data['query2'] = $this->db->query("SELECT NewDetail.ID_PRODUCT, NewDetail.NAMA_PRODUCT, NewDetail.PRODUCT_KODE_PRINCIPLE, 
					NewDetail.DESCRIPTION_PRINCIPLE, NewDetail.Qty , Ms_PRODUCT.VOLUME 
					from NewDetail, NewHeader, Ms_PRODUCT where NewDetail.ID_PRODUCT = Ms_PRODUCT.ID_PRODUCT AND NewHeader.ObjectID = NewDetail.ParentObjectID AND NewDetail.ParentObjectID = '".$head->ObjectID."' order by NewDetail.ObjectID");
				}
				$this->load->view('global/top');
				$this->load->view('app_ba/detail',$data);
				$this->load->view('global/bottom');
			}else{
				$this->load->view('global/top');
				$this->load->view('app_ba/login');
				$this->load->view('global/bottom');
			}
		}
		
		//----------------------------------------------------------------------------------
		
		public function act_login_ba(){
			$this->form_validation->set_rules('id_ba','User ID','required');
			$this->form_validation->set_rules('password','password','required');
			if($this->form_validation->run() == false){
				$this->index();
			}else{
				$user_id = $this->input->post('id_ba');//preg_replace('/[^a-zA-Z0-9_ %\[\]\.\(\)%&-]/s', ' ', $this->input->post('id_ba'));
				$password = $this->input->post('password');//preg_replace('/[^a-zA-Z0-9_ %\[\]\.\(\)%&-]/s', ' ', $this->input->post('password'));
				$validation = $this->sg_model->validation_login($user_id,$password,'BA');
				if($validation->num_rows() == 0){
					$this->session->set_flashdata('login_result',"<div id='notif' style='width:100%;height:100%;display:flex;position:fixed;left:0;top:0;'><div style='font-size:14px;color:#fff;padding:10px 25px;margin:auto;border-radius:2px;background-color:rgb(50,50,50);'>Maaf, UserID / Password yang Anda Masukkan Salah, <br/><span style='font-size:11px;'>Silahkan coba lagi!</span></div></div>");
					Header('Location:'.base_url().'index.php/apps/');
				}else{
					foreach($validation->result() as $login){
						$login_data['obj'] = $login->ObjectID;
						$login_data['id'] = $login->user_id;
						$login_data['nama'] = $login->name_user;
						$login_data['login_code_ba'] = 'sukses_login';
						$this->session->set_userdata($login_data);
					}
					
					Header('Location:'.base_url().'index.php/apps/home/');
				}
			}
		}
		
		public function act_logout_ba(){
			$this->session->sess_destroy();
			$cek = $this->session->userdata('login_code_ba');
			if($cek){
				Header('Location:'.base_url().'index.php/apps/');
			}else{
				Header('Location:'.base_url().'index.php/apps/');
			}
		}
		
		function act_change_password(){
			$cek = $this->session->userdata('login_code_ba');
			if($cek){
				$this->form_validation->set_rules('pass_lama','password lama','required|trim|max_length[5]');
				$this->form_validation->set_rules('pass_baru','password baru','required|trim|max_length[5]');
				$this->form_validation->set_rules('pass_konf','konfirmasi password','required|trim|matches[pass_baru]');
				if($this->form_validation->run() == false){
					$this->change();
				}else{
					$pass_lama = preg_replace('/[^a-zA-Z0-9_ %\[\]\.\(\)%&-]/s', ' ', $this->input->post('pass_lama'));
					$pass_baru = preg_replace('/[^a-zA-Z0-9_ %\[\]\.\(\)%&-]/s', ' ', $this->input->post('pass_baru'));
					$query_check = $this->db->query("select user_id from Ms_USER where user_id='".$this->session->userdata('id')."' and password = '".$pass_lama."'");
					if($query_check->num_rows() == 1){
						$data['password'] = $pass_baru;
						$query_modify = $this->sg_model->update_data('Ms_USER', 'user_id', $this->session->userdata('id'), $data);
						if($query_modify){
							$this->session->set_flashdata('change_result',"<div id='notif' style='width:100%;height:100%;display:flex;position:fixed;left:0;top:0;'><div style='font-size:14px;color:#fff;padding:10px 25px;margin:auto;border-radius:2px;background-color:rgb(50,50,50);'>Ubah password berhasil, <br/><span style='font-size:11px;'>Password akun anda telah terupdate!</span></div></div>");
							Header('Location:'.base_url().'index.php/apps/profile/');
						}else{
							$this->session->set_flashdata('change_result',"<div id='notif' style='width:100%;height:100%;display:flex;position:fixed;left:0;top:0;'><div style='font-size:14px;color:#fff;padding:10px 25px;margin:auto;border-radius:2px;background-color:rgb(50,50,50);'>Maaf, ubah password gagal dilakukan<br/><span style='font-size:11px;'>Mohon periksa kembali data Anda!</span></div></div>");
							Header('Location:'.base_url().'index.php/apps/profile/');
						}
					}else{
						$this->session->set_flashdata('change_result',"<div id='notif' style='width:100%;height:100%;display:flex;position:fixed;left:0;top:0;'><div style='font-size:14px;color:#fff;padding:10px 25px;margin:auto;border-radius:2px;background-color:rgb(50,50,50);'>Maaf, data Anda tidak ditemukan, <br/><span style='font-size:11px;'>Mohon periksa kembali data Anda!</span></div></div>");
						Header('Location:'.base_url().'index.php/apps/profile/');
					}
				}
			}else{
				$this->load->view('global/top');
				$this->load->view('app_ba/login');
				$this->load->view('global/bottom');
			}
		}
		
		function act_forget(){			
			$this->form_validation->set_rules('id_ba','kode ba','required|trim|max_length[5]');
			if($this->form_validation->run() == false){
				$this->forget();
			}else{
				$ba = $this->input->post('id_ba');
				$query_check = $this->db->query("select user_id from Ms_USER where user_id='".$ba."'");
				if($query_check->num_rows() == 1){
					$data['password'] = $ba;
					$query_modify = $this->sg_model->update_data('Ms_USER', 'user_id', $ba, $data);
					if($query_modify){
						$this->session->set_flashdata('forget_result',"<div id='notif' style='width:100%;height:100%;display:flex;position:fixed;left:0;top:0;'><div style='font-size:14px;color:#fff;padding:10px 25px;margin:auto;border-radius:2px;background-color:rgb(50,50,50);'>Reset password berhasil, <br/><span style='font-size:11px;'>Password akun anda telah terupdate!</span></div></div>");
						Header('Location:'.base_url().'index.php/apps/forget/');
					}else{
						$this->session->set_flashdata('forget_result',"<div id='notif' style='width:100%;height:100%;display:flex;position:fixed;left:0;top:0;'><div style='font-size:14px;color:#fff;padding:10px 25px;margin:auto;border-radius:2px;background-color:rgb(50,50,50);'>Maaf, reset password gagal dilakukan<br/><span style='font-size:11px;'>Mohon periksa kembali data Anda!</span></div></div>");
						Header('Location:'.base_url().'index.php/apps/forget/');
					}
				}else{
					$this->session->set_flashdata('forget_result',"<div id='notif' style='width:100%;height:100%;display:flex;position:fixed;left:0;top:0;'><div style='font-size:14px;color:#fff;padding:10px 25px;margin:auto;border-radius:2px;background-color:rgb(50,50,50);'>Maaf, kode Anda tidak ditemukan, <br/><span style='font-size:11px;'>Mohon periksa kembali kode Anda!</span></div></div>");
					Header('Location:'.base_url().'index.php/apps/forget/');
				}
			}
		}
		
		function act_change_profile(){
			$cek = $this->session->userdata('login_code_ba');
			if($cek){
				$this->form_validation->set_rules('nama_ba','nama BA','required|trim');
				if($this->form_validation->run() == false){
					$this->profile();
				}else{
					$nama_ba = $this->input->post('nama_ba');
					$data1['name_user'] = $nama_ba;
					$data['NAMA_BA'] = $nama_ba;
					$query_modify = $this->sg_model->update_data('Ms_BA', 'ID_BA', $this->session->userdata('id'), $data);
					$query_modify1 = $this->sg_model->update_data('Ms_USER', 'user_id', $this->session->userdata('id'), $data1);
					if($query_modify and $query_modify1){
						$this->session->set_flashdata('change_result',"<div id='notif' style='width:100%;height:100%;display:flex;position:fixed;left:0;top:0;'><div style='font-size:14px;color:#fff;padding:10px 25px;margin:auto;border-radius:2px;background-color:rgb(50,50,50);'>Ubah nama profil berhasil, <br/><span style='font-size:11px;'>Nama akun anda telah terupdate!</span></div></div>");
						Header('Location:'.base_url().'index.php/apps/profile/');
					}else{
						$this->session->set_flashdata('change_result',"<div id='notif' style='width:100%;height:100%;display:flex;position:fixed;left:0;top:0;'><div style='font-size:14px;color:#fff;padding:10px 25px;margin:auto;border-radius:2px;background-color:rgb(50,50,50);'>Maaf, ubah nama profil gagal dilakukan<br/><span style='font-size:11px;'>Mohon periksa kembali data Anda!</span></div></div>");
						Header('Location:'.base_url().'index.php/apps/profile/');
					}
				}
			}else{
				$this->load->view('global/top');
				$this->load->view('app_ba/login');
				$this->load->view('global/bottom');
			}
		}
		
		function act_change_pict(){
			$configu['upload_path'] = './uploads/account/original/';
			$configu['upload_url'] = base_url().'uploads/account/original/';
			$configu['allowed_types'] = 'gif|jpeg|jpg|png';
			$configu['max_size'] = '10000';
			$configu['max_width'] = '10000';
			$configu['max_height'] = '10000';
			
			$this->load->library('upload',$configu);
			
			if (!$this->upload->do_upload('pict'))
			{
				$query1 = $this->db->query("select ID_BA, NAMA_BA, NAMA_TL, pict from Ms_USER, Ms_BA, Ms_TL where Ms_USER.user_id = Ms_BA.ID_BA and Ms_BA.ID_TL = Ms_TL.ID_TL and Ms_USER.user_id='".$this->session->userdata('id')."'");
				foreach($query1->result() as $pro){
					$data['kode_ba'] = $pro->ID_BA;
					$data['nama_ba'] = $pro->NAMA_BA; 
					$data['nama_tl'] = $pro->NAMA_TL;
					$data['pict'] =	$pro->pict;
				}
				
				$data['query2'] = $this->db->query("select Ms_OUTLET.ID_OUTLET, Ms_OUTLET.NAMA_OUTLET from Ms_USER, Ms_OUTLET where Ms_USER.user_id = Ms_OUTLET.ID_BA and Ms_OUTLET.ID_BA='".$this->session->userdata('id')."'");
				
				$data['error'] = "<div id='notif1' style='width:100%;height:100%;display:flex;position:fixed;left:0;top:0;'><div style='font-size:14px;color:#fff;padding:10px 25px;margin:auto;border-radius:2px;background-color:rgb(50,50,50);'>Ubah Foto Profil Gagal<br/><span style='font-size:11px;'>".$this->upload->display_errors()."</span></div></div>";
				$this->load->view('global/top');
				$this->load->view('app_ba/profile',$data);
				$this->load->view('global/bottom');
			}
			else
			{
				$upload_data = $this->upload->data();
			
				$config1['image_library'] = 'GD2';
				$config1['source_image'] = $upload_data['full_path'];
				$config1['new_image'] = 'uploads/account/thumb/'.$upload_data['file_name'];
				$config1['maintain_ratio'] = TRUE;
				$config1['width'] = 128;
				$config1['height'] = 128;

				$this->load->library('image_lib', $config1);

				if(!$this->image_lib->resize()){
					echo $this->image_lib->display_errors();
				}
				
				$id = $this->session->userdata('id');
				$data['pict'] = $upload_data['file_name'];
				
				$edit_data1 = $this->sg_model->update_data('Ms_USER','user_id',$id,$data);
				if($edit_data1){
					$this->session->set_flashdata('change_result',"<div id='notif' style='width:100%;height:100%;display:flex;position:fixed;left:0;top:0;'><div style='font-size:14px;color:#fff;padding:10px 25px;margin:auto;border-radius:2px;background-color:rgb(50,50,50);'>Ubah Foto Profil Berhasil<br/><span style='font-size:11px;'>Foto profil telah terupdate!</span></div></div>");
					Header('Location:'.base_url().'index.php/apps/profile/');
				}else{
					$this->session->set_flashdata('change_result',"<div id='notif' style='width:100%;height:100%;display:flex;position:fixed;left:0;top:0;'><div style='font-size:14px;color:#fff;padding:10px 25px;margin:auto;border-radius:2px;background-color:rgb(50,50,50);'>Ubah Foto Profil Gagal<br/><span style='font-size:11px;'>Mohon coba lagi dengan foto yang lain!</span></div></div>");
					Header('Location:'.base_url().'index.php/apps/profile/');
				}
			}
		}
		
		function act_get_cart($id){
			$cek = $this->session->userdata('login_code_ba');
			if($cek){
				if(isset($_POST['add_cart'])){
					$list_product = $this->input->post("list_product");
					
					if($list_product == null){
						$this->session->set_flashdata('select_result',"<div id='notif' style='width:100%;height:100%;display:flex;position:fixed;left:0;top:0;'><div style='font-size:14px;color:#fff;padding:10px 25px;margin:auto;border-radius:2px;background-color:rgb(50,50,50);'>Mohon maaf, silahkan pilih dahulu produk<br/><span style='font-size:11px;'>Harus ada produk yang dichecklist!</span></div></div>");
						Header('Location:'.base_url().'index.php/apps/profile/');
					}else{
						$data['ID_BA'] = $this->session->userdata('id');
						foreach($list_product as $key => $value){
							$data['ID_PRODUCT'] = $value;
							$data['Qty'] = 1;
							$data['status'] = 1;
							$query_insert = $this->sg_model->insert_data('Temp_CART', $data);
						}	
						Header('Location:'.base_url().'index.php/apps/cart/'.$this->uri->segment(3).'/');
					}
				}else{
					Header('Location:'.base_url().'index.php/apps/cart/'.$this->uri->segment(3).'/');
				}
			}else{
				$this->load->view('global/top');
				$this->load->view('app_ba/login');
				$this->load->view('global/bottom');
			}
		}
		
		function add_cart($id){
			$cek = $this->session->userdata('login_code_ba');
			if($cek){
				$data['ID_BA'] = $this->session->userdata('id');
				$data['ID_PRODUCT'] = $this->input->post('id');
				$data['Qty'] = null;
				$data['status'] = 1;
				$query_insert = $this->sg_model->insert_data('Temp_CART', $data);
				if($query_insert){
					$data11 = array(
						'status' => 'Sukses',
						'color' => 'FF6B6B'
					);
					echo json_encode($data11);
				}else{
					$data11 = array(
						'status' => 'Fail',
						'color' => 'FF6B6B'
					);
					echo json_encode($data11);
				}
			}else{
				$this->load->view('global/top');
				$this->load->view('app_ba/login');
				$this->load->view('global/bottom');
			}
		}
		
		function add_qty_cart($id){
			$cek = $this->session->userdata('login_code_ba');
			if($cek){
				$id_ba = $this->session->userdata('id');
				$id_product = $this->input->post('id');
				$qty = $this->input->post('qty');
				$data['status'] = 1;
				$query_update = $this->db->query("update Temp_CART set Qty='".$qty."' where ID_PRODUCT='".$id_product."' and ID_BA='".$id_ba."'");
				if($query_update){
					$data11 = array(
						'status' => 'Sukses',
						'color' => 'FF6B6B'
					);
					echo json_encode($data11);
				}else{
					$data11 = array(
						'status' => 'Fail',
						'color' => 'FF6B6B'
					);
					echo json_encode($data11);
				}
			}else{
				$this->load->view('global/top');
				$this->load->view('app_ba/login');
				$this->load->view('global/bottom');
			}
		}
		
		function delete_cart($id){
			$cek = $this->session->userdata('login_code_ba');
			if($cek){
				$id_product = $this->input->post('id');
				$query_delete = $this->db->query("delete from Temp_CART where ID_BA='".$this->session->userdata('id')."' and ID_PRODUCT='".$id_product."'");
				if($query_delete){
					$data11 = array(
						'status' => 'Sukses',
						'color' => 'FF6B6B'
					);
					echo json_encode($data11);
				}else{
					$data11 = array(
						'status' => 'Fail',
						'color' => 'FF6B6B'
					);
					echo json_encode($data11);
				}
			}else{
				$this->load->view('global/top');
				$this->load->view('app_ba/login');
				$this->load->view('global/bottom');
			}
		}
		
		function delete_qty_cart($id){
			$cek = $this->session->userdata('login_code_ba');
			if($cek){
				$id_product = $this->input->post('id');
				$query_delete = $this->db->query("delete from Temp_CART where ID_BA='".$this->session->userdata('id')."' and ID_PRODUCT='".$id_product."'");
				if($query_delete){
					$data11 = array(
						'status' => 'Sukses',
						'color' => 'FF6B6B'
					);
					echo json_encode($data11);
				}else{
					$data11 = array(
						'status' => 'Fail',
						'color' => 'FF6B6B'
					);
					echo json_encode($data11);
				}
			}else{
				$this->load->view('global/top');
				$this->load->view('app_ba/login');
				$this->load->view('global/bottom');
			}
		}
		
		function get_bell(){
			$id = $this->input->post('id_data');
			$qry_check_bell_1 = $this->db->query("select ID_OUTLET from Ms_OUTLET where ID_BA='".$id."'");
			$qry_check_bell_2 = $this->db->query("select ID_PRODUCT from Ms_PRODUCT where Product_Flag='1'");
			$data = array(
					'bell1' => $qry_check_bell_1->num_rows(),
					'bell2' => $qry_check_bell_2->num_rows()
			);
			echo json_encode($data);
		}
		
		function get_sales_all(){
			$id = $this->input->post('id_data');
			/*$qry_check_sales_all = $this->db->query("select sum(VALUE) as amount_sales_all from View_EVAN_Qlik_SellOut where ID_BA='".$id."' 
			and Bulan=".date('m')." and Tahun=".date('Y')." and Tgl=".date('d',strtotime("-1 days"))." and ID_PRODUCT not in ('0999','0998')");*/
			
			/*$qry_check_sales_all = $this->db->query("select sum(VALUE) as amount_sales_all from View_EVAN_Qlik_SellOut where ID_BA='".$id."' 
			and Tgl = (SELECT max(Tgl) FROM View_EVAN_Qlik_SellOut WHERE ID_BA='".$id."' AND Bulan = (SELECT max(Bulan) FROM View_EVAN_Qlik_SellOut where ID_BA='".$id."' and Tahun = (SELECT max(Tahun) FROM View_EVAN_Qlik_SellOut where ID_BA='".$id."')) and Tahun = (SELECT max(Tahun) FROM View_EVAN_Qlik_SellOut where ID_BA='".$id."'))  
			and Bulan = (SELECT max(Bulan) FROM View_EVAN_Qlik_SellOut where ID_BA='".$id."' and Tahun = (SELECT max(Tahun) FROM View_EVAN_Qlik_SellOut where ID_BA='".$id."'))
			and Tahun = (SELECT max(Tahun) FROM View_EVAN_Qlik_SellOut where ID_BA='".$id."') and ID_PRODUCT not in ('0999','0998')");*/
			
			$qry_check_sales_all = $this->db->query("select sum(VALUE) as amount_sales_all from View_EVAN_Qlik_SellOut where ID_BA='".$id."' 
			and Bulan=".date('m')." and Tahun=".date('Y')." and Tgl=".date('d')." and ID_PRODUCT not in ('0999','0998')");
			
			$data_sales_all = array();
			
			foreach($qry_check_sales_all->result() as $grid5){
				$data_sales_all[] = $grid5; 
			}
			
			echo json_encode($data_sales_all);
		}
		
		function get_sales_detail(){
			$id = $this->input->post('id_data');
			/*$qry_check_sales = $this->db->query("select NAMA_TIPE_PRODUCT, sum(VALUE) as amount_sales_detail 
			from View_EVAN_Qlik_SellOut where ID_BA='".$id."'
			and Tgl = (SELECT max(Tgl) FROM View_EVAN_Qlik_SellOut WHERE ID_BA='".$id."' AND Bulan = (SELECT max(Bulan) FROM View_EVAN_Qlik_SellOut where ID_BA='".$id."' and Tahun = (SELECT max(Tahun) FROM View_EVAN_Qlik_SellOut where ID_BA='".$id."')) and Tahun = (SELECT max(Tahun) FROM View_EVAN_Qlik_SellOut where ID_BA='".$id."'))  
			and Bulan = (SELECT max(Bulan) FROM View_EVAN_Qlik_SellOut where ID_BA='".$id."' and Tahun = (SELECT max(Tahun) FROM View_EVAN_Qlik_SellOut where ID_BA='".$id."'))
			and Tahun = (SELECT max(Tahun) FROM View_EVAN_Qlik_SellOut where ID_BA='".$id."') and ID_PRODUCT not in ('0999','0998')
			group by NAMA_TIPE_PRODUCT order by NAMA_TIPE_PRODUCT DESC");*/
			
			$qry_check_sales = $this->db->query("Select NAMA_TIPE_PRODUCT, sum(VALUE) as amount_sales_detail from View_EVAN_Qlik_SellOut where ID_BA='".$id."' 
			and Bulan=".date('m')." and Tahun=".date('Y')." and Tgl=".date('d')." and ID_PRODUCT not in ('0999','0998') group by NAMA_TIPE_PRODUCT order by NAMA_TIPE_PRODUCT DESC");
			
			$data_sales = array();
			
			foreach($qry_check_sales->result() as $grid1){
				$data_sales[] = $grid1; 
			}
			echo json_encode($data_sales);
		}
		
		function get_call(){
			$id = $this->input->post('id_data');
			/*$qry_check_call = $this->db->query("select sum(Qty) as qty_call from View_EVAN_Qlik_SellOut where ID_BA='".$id."' 
			and Tgl = (SELECT max(Tgl) FROM View_EVAN_Qlik_SellOut WHERE ID_BA='".$id."' AND Bulan = (SELECT max(Bulan) FROM View_EVAN_Qlik_SellOut where ID_BA='".$id."' and Tahun = (SELECT max(Tahun) FROM View_EVAN_Qlik_SellOut where ID_BA='".$id."')) and Tahun = (SELECT max(Tahun) FROM View_EVAN_Qlik_SellOut where ID_BA='".$id."'))  
			and Bulan = (SELECT max(Bulan) FROM View_EVAN_Qlik_SellOut where ID_BA='".$id."' and Tahun = (SELECT max(Tahun) FROM View_EVAN_Qlik_SellOut where ID_BA='".$id."'))
			and Tahun = (SELECT max(Tahun) FROM View_EVAN_Qlik_SellOut where ID_BA='".$id."') and ID_PRODUCT='0998'");
			*/
			
			$qry_check_call = $this->db->query("select sum(Qty) as qty_call from View_EVAN_Qlik_SellOut where ID_BA='".$id."' 
			and Bulan=".date('m')." and Tahun=".date('Y')." and Tgl=".date('d')." and ID_PRODUCT='0998'");
			
			$data_call = array();
			
			foreach($qry_check_call->result() as $grid2){
				$data_call[] = $grid2; 
			}
			
			echo json_encode($data_call);
		}
		
		function get_ec(){
			$id = $this->input->post('id_data');
			/*$qry_check_ec = $this->db->query("select sum(Qty) as qty_ec from View_EVAN_Qlik_SellOut where ID_BA='".$id."' 
			and Tgl = (SELECT max(Tgl) FROM View_EVAN_Qlik_SellOut WHERE ID_BA='".$id."' AND Bulan = (SELECT max(Bulan) FROM View_EVAN_Qlik_SellOut where ID_BA='".$id."' and Tahun = (SELECT max(Tahun) FROM View_EVAN_Qlik_SellOut where ID_BA='".$id."')) and Tahun = (SELECT max(Tahun) FROM View_EVAN_Qlik_SellOut where ID_BA='".$id."'))  
			and Bulan = (SELECT max(Bulan) FROM View_EVAN_Qlik_SellOut where ID_BA='".$id."' and Tahun = (SELECT max(Tahun) FROM View_EVAN_Qlik_SellOut where ID_BA='".$id."'))
			and Tahun = (SELECT max(Tahun) FROM View_EVAN_Qlik_SellOut where ID_BA='".$id."') and ID_PRODUCT='0999'");
			*/
			$qry_check_ec = $this->db->query("select sum(Qty) as qty_ec from View_EVAN_Qlik_SellOut where ID_BA='".$id."' 
			and Bulan=".date('m')." and Tahun=".date('Y')." and Tgl=".date('d')." and ID_PRODUCT='0999'");
			$data_ec = array();
			
			foreach($qry_check_ec->result() as $grid3){
				$data_ec[] = $grid3; 
			}
			
			echo json_encode($data_ec);
		}
		
		
		function get_sales_all_search(){
			$id = $this->input->post('id_data');
			$ymd = $this->input->post('ymd');
			/*$qry_check_sales_all = $this->db->query("select sum(VALUE) as amount_sales_all from View_EVAN_Qlik_SellOut where ID_BA='".$id."' 
			and Bulan=".date('m')." and Tahun=".date('Y')." and Tgl=".date('d',strtotime("-1 days"))." and ID_PRODUCT not in ('0999','0998')");*/
			
			/*$qry_check_sales_all = $this->db->query("select sum(VALUE) as amount_sales_all from View_EVAN_Qlik_SellOut where ID_BA='".$id."' 
			and Tgl = (SELECT max(Tgl) FROM View_EVAN_Qlik_SellOut WHERE ID_BA='".$id."' AND Bulan = (SELECT max(Bulan) FROM View_EVAN_Qlik_SellOut where ID_BA='".$id."' and Tahun = (SELECT max(Tahun) FROM View_EVAN_Qlik_SellOut where ID_BA='".$id."')) and Tahun = (SELECT max(Tahun) FROM View_EVAN_Qlik_SellOut where ID_BA='".$id."'))  
			and Bulan = (SELECT max(Bulan) FROM View_EVAN_Qlik_SellOut where ID_BA='".$id."' and Tahun = (SELECT max(Tahun) FROM View_EVAN_Qlik_SellOut where ID_BA='".$id."'))
			and Tahun = (SELECT max(Tahun) FROM View_EVAN_Qlik_SellOut where ID_BA='".$id."') and ID_PRODUCT not in ('0999','0998')");*/
			
			$qry_check_sales_all = $this->db->query("select sum(VALUE) as amount_sales_all from View_EVAN_Qlik_SellOut where ID_BA='".$id."' 
			and TransDt = '".$ymd."' and ID_PRODUCT not in ('0999','0998')");
			
			$data_sales_all = array();
			
			foreach($qry_check_sales_all->result() as $grid5){
				$data_sales_all[] = $grid5; 
			}
			
			echo json_encode($data_sales_all);
		}
		
		function get_sales_detail_search(){
			$id = $this->input->post('id_data');
			$ymd = $this->input->post('ymd');
			/*$qry_check_sales = $this->db->query("select NAMA_TIPE_PRODUCT, sum(VALUE) as amount_sales_detail 
			from View_EVAN_Qlik_SellOut where ID_BA='".$id."'
			and Tgl = (SELECT max(Tgl) FROM View_EVAN_Qlik_SellOut WHERE ID_BA='".$id."' AND Bulan = (SELECT max(Bulan) FROM View_EVAN_Qlik_SellOut where ID_BA='".$id."' and Tahun = (SELECT max(Tahun) FROM View_EVAN_Qlik_SellOut where ID_BA='".$id."')) and Tahun = (SELECT max(Tahun) FROM View_EVAN_Qlik_SellOut where ID_BA='".$id."'))  
			and Bulan = (SELECT max(Bulan) FROM View_EVAN_Qlik_SellOut where ID_BA='".$id."' and Tahun = (SELECT max(Tahun) FROM View_EVAN_Qlik_SellOut where ID_BA='".$id."'))
			and Tahun = (SELECT max(Tahun) FROM View_EVAN_Qlik_SellOut where ID_BA='".$id."') and ID_PRODUCT not in ('0999','0998')
			group by NAMA_TIPE_PRODUCT order by NAMA_TIPE_PRODUCT DESC");*/
			
			$qry_check_sales = $this->db->query("Select NAMA_TIPE_PRODUCT, sum(VALUE) as amount_sales_detail from View_EVAN_Qlik_SellOut where ID_BA='".$id."' 
			and TransDt = '".$ymd."' and ID_PRODUCT not in ('0999','0998') group by NAMA_TIPE_PRODUCT order by NAMA_TIPE_PRODUCT DESC");
			
			$data_sales = array();
			
			foreach($qry_check_sales->result() as $grid1){
				$data_sales[] = $grid1; 
			}
			echo json_encode($data_sales);
		}
		
		function get_call_search(){
			$id = $this->input->post('id_data');
			$ymd = $this->input->post('ymd');
			/*$qry_check_call = $this->db->query("select sum(Qty) as qty_call from View_EVAN_Qlik_SellOut where ID_BA='".$id."' 
			and Tgl = (SELECT max(Tgl) FROM View_EVAN_Qlik_SellOut WHERE ID_BA='".$id."' AND Bulan = (SELECT max(Bulan) FROM View_EVAN_Qlik_SellOut where ID_BA='".$id."' and Tahun = (SELECT max(Tahun) FROM View_EVAN_Qlik_SellOut where ID_BA='".$id."')) and Tahun = (SELECT max(Tahun) FROM View_EVAN_Qlik_SellOut where ID_BA='".$id."'))  
			and Bulan = (SELECT max(Bulan) FROM View_EVAN_Qlik_SellOut where ID_BA='".$id."' and Tahun = (SELECT max(Tahun) FROM View_EVAN_Qlik_SellOut where ID_BA='".$id."'))
			and Tahun = (SELECT max(Tahun) FROM View_EVAN_Qlik_SellOut where ID_BA='".$id."') and ID_PRODUCT='0998'");
			*/
			
			$qry_check_call = $this->db->query("select sum(Qty) as qty_call from View_EVAN_Qlik_SellOut where ID_BA='".$id."' 
			and TransDt = '".$ymd."' and ID_PRODUCT='0998'");
			
			$data_call = array();
			
			foreach($qry_check_call->result() as $grid2){
				$data_call[] = $grid2; 
			}
			
			echo json_encode($data_call);
		}
		
		function get_ec_search(){
			$id = $this->input->post('id_data');
			$ymd = $this->input->post('ymd');
			/*$qry_check_ec = $this->db->query("select sum(Qty) as qty_ec from View_EVAN_Qlik_SellOut where ID_BA='".$id."' 
			and Tgl = (SELECT max(Tgl) FROM View_EVAN_Qlik_SellOut WHERE ID_BA='".$id."' AND Bulan = (SELECT max(Bulan) FROM View_EVAN_Qlik_SellOut where ID_BA='".$id."' and Tahun = (SELECT max(Tahun) FROM View_EVAN_Qlik_SellOut where ID_BA='".$id."')) and Tahun = (SELECT max(Tahun) FROM View_EVAN_Qlik_SellOut where ID_BA='".$id."'))  
			and Bulan = (SELECT max(Bulan) FROM View_EVAN_Qlik_SellOut where ID_BA='".$id."' and Tahun = (SELECT max(Tahun) FROM View_EVAN_Qlik_SellOut where ID_BA='".$id."'))
			and Tahun = (SELECT max(Tahun) FROM View_EVAN_Qlik_SellOut where ID_BA='".$id."') and ID_PRODUCT='0999'");
			*/
			$qry_check_ec = $this->db->query("select sum(Qty) as qty_ec from View_EVAN_Qlik_SellOut where ID_BA='".$id."' 
			and TransDt = '".$ymd."' and ID_PRODUCT='0999'");
			$data_ec = array();
			
			foreach($qry_check_ec->result() as $grid3){
				$data_ec[] = $grid3; 
			}
			
			echo json_encode($data_ec);
		}
		
		
		
		function get_sales_all_month(){
			$id = $this->input->post('id_data');
			$qry_check_sales_all = $this->db->query("select sum(VALUE) as amount_sales_all from View_EVAN_Qlik_SellOut where ID_BA='".$id."' 
			and Bulan=".date('m')." and Tahun=".date('Y')." and ID_PRODUCT not in ('0999','0998')");
			$data_sales_all = array();
			
			foreach($qry_check_sales_all->result() as $grid5){
				$data_sales_all[] = $grid5; 
			}
			
			echo json_encode($data_sales_all);
		}
		
		function get_sales_detail_month(){
			$id = $this->input->post('id_data');
			$qry_check_sales = $this->db->query("select NAMA_TIPE_PRODUCT, sum(VALUE) as amount_sales_detail 
			from View_EVAN_Qlik_SellOut where ID_BA='".$id."'
			and Bulan=".date('m')." and Tahun=".date('Y')." and ID_PRODUCT not in ('0999','0998')
			group by NAMA_TIPE_PRODUCT order by NAMA_TIPE_PRODUCT DESC");
			$data_sales = array();
			
			foreach($qry_check_sales->result() as $grid1){
				$data_sales[] = $grid1; 
			}
			echo json_encode($data_sales);
		}
		
		function get_detail_absensi(){
			$id = $this->input->post('id_data');
			$qry_check_sales = $this->db->query("select Tgl, Bulan, Tahun, sum(Qty) as Qty, sum(VALUE) as Value 
from View_EVAN_Qlik_SellOut where ID_BA='".$id."' and Tahun='".date('Y')."' and Bulan='".date('m')."' group by Tgl, Bulan, Tahun order by Tgl desc");
			$data_detail = array();
			
			foreach($qry_check_sales->result() as $grid1){
				$data_detail[] = $grid1; 
			}
			echo json_encode($data_detail);
		}
		
		function get_all_absensi(){
			$id = $this->input->post('id_data');
			$qry_check_absensi = $this->db->query("select distinct Tgl   
from View_EVAN_Qlik_SellOut where ID_BA='".$id."' and Tahun='".date('Y')."' and Bulan='".date('m')."'");
			$data_all = array(
					'abs' => $qry_check_absensi->num_rows()
			);
			
			echo json_encode($data_all);
		}
		
		function get_search_absensi1(){
			$id = $this->input->post('id_data');
			$m = $this->input->post('month');
			$y = $this->input->post('year');
			$qry_check_absensi = $this->db->query("select distinct Tgl   
from View_EVAN_Qlik_SellOut where ID_BA='".$id."' and Tahun='".$y."' and Bulan='".$m."'");
			$data_all = array(
					'abs' => $qry_check_absensi->num_rows()
			);
			
			echo json_encode($data_all);
		}
		
		function get_search_absensi2(){
			$id = $this->input->post('id_data');
			$m = $this->input->post('month');
			$y = $this->input->post('year');
			$qry_check_sales = $this->db->query("select Tgl, Bulan, Tahun, TransDt, sum(Qty) as Qty, sum(VALUE) as Value 
from View_EVAN_Qlik_SellOut where ID_BA='".$id."' and Tahun='".$y."' and Bulan='".$m."' group by Tgl, Bulan, Tahun, TransDt order by Tgl desc");
			$data_detail = array();
			
			foreach($qry_check_sales->result() as $grid1){
				$data_detail[] = $grid1; 
			}
			echo json_encode($data_detail);
		}
		
		function get_call_month(){
			$id = $this->input->post('id_data');
			$qry_check_call = $this->db->query("select sum(Qty) as qty_call from View_EVAN_Qlik_SellOut where ID_BA='".$id."' 
			and Bulan=".date('m')." and Tahun=".date('Y')." and ID_PRODUCT='0998'");
			$data_call = array();
			
			foreach($qry_check_call->result() as $grid2){
				$data_call[] = $grid2; 
			}
			
			echo json_encode($data_call);
		}
		
		function get_ec_month(){
			$id = $this->input->post('id_data');
			$qry_check_ec = $this->db->query("select sum(Qty) as qty_ec from View_EVAN_Qlik_SellOut where ID_BA='".$id."' 
			and Bulan=".date('m')." and Tahun=".date('Y')." and ID_PRODUCT='0999'");
			$data_ec = array();
			
			foreach($qry_check_ec->result() as $grid3){
				$data_ec[] = $grid3; 
			}
			
			echo json_encode($data_ec);
		}
		
		function get_call_month_search(){
			$id = $this->input->post('id_data');
			$m = $this->input->post('month');
			$y = $this->input->post('year');
			$qry_check_call = $this->db->query("select sum(Qty) as qty_call from View_EVAN_Qlik_SellOut where ID_BA='".$id."' 
			and Tahun='".$y."' and Bulan='".$m."' and ID_PRODUCT='0998'");
			$data_call = array();
			
			foreach($qry_check_call->result() as $grid2){
				$data_call[] = $grid2; 
			}
			
			echo json_encode($data_call);
		}
		
		function get_ec_month_search(){
			$id = $this->input->post('id_data');
			$m = $this->input->post('month');
			$y = $this->input->post('year');
			$qry_check_ec = $this->db->query("select sum(Qty) as qty_ec from View_EVAN_Qlik_SellOut where ID_BA='".$id."' 
			and Tahun='".$y."' and Bulan='".$m."' and ID_PRODUCT='0999'");
			$data_ec = array();
			
			foreach($qry_check_ec->result() as $grid3){
				$data_ec[] = $grid3; 
			}
			
			echo json_encode($data_ec);
		}
		
		function get_sales_all_month_search(){
			$id = $this->input->post('id_data');
			$m = $this->input->post('month');
			$y = $this->input->post('year');
			$qry_check_sales_all = $this->db->query("select sum(VALUE) as amount_sales_all from View_EVAN_Qlik_SellOut where ID_BA='".$id."' 
			and Tahun='".$y."' and Bulan='".$m."' and ID_PRODUCT not in ('0999','0998')");
			$data_sales_all = array();
			
			foreach($qry_check_sales_all->result() as $grid5){
				$data_sales_all[] = $grid5; 
			}
			
			echo json_encode($data_sales_all);
		}
		
		function get_sales_detail_month_search(){
			$id = $this->input->post('id_data');
			$m = $this->input->post('month');
			$y = $this->input->post('year');
			$qry_check_sales = $this->db->query("select NAMA_TIPE_PRODUCT, sum(VALUE) as amount_sales_detail 
			from View_EVAN_Qlik_SellOut where ID_BA='".$id."'
			and Tahun='".$y."' and Bulan='".$m."' and ID_PRODUCT not in ('0999','0998')
			group by NAMA_TIPE_PRODUCT order by NAMA_TIPE_PRODUCT DESC");
			$data_sales = array();
			
			foreach($qry_check_sales->result() as $grid1){
				$data_sales[] = $grid1; 
			}
			echo json_encode($data_sales);
		}
		
		function checkout($id){
			$cek = $this->session->userdata('login_code_ba');
			if($cek){
				$this->form_validation->set_rules('trans_date','tanggal transaksi','trim|required');
				$this->form_validation->set_rules('t_date','tanggal transaksi','required');
				$this->form_validation->set_rules('id_outlet','outlet','trim|required');
				
				if(count($_POST['list_product']) == 0){
					$this->form_validation->set_rules('list_product[]',"data produk", "trim|required");
				}
				
				if(count($_POST['qty']) == 0){
					$this->form_validation->set_rules('qty[]',"qty", "trim|numeric|required");
				}
				
				if($this->form_validation->run() == true){
					$t_date = $this->input->post('t_date');
					$header['ReceiveDt'] = date("Y-m-d H:s:i");
					$header['TransDt'] = $this->input->post('trans_date');
					$header['ID_OUTLET'] = $this->input->post('id_outlet');
					$header['NAMA_OUTLET'] = $this->input->post('outlet_name');
					$header['ID_BA'] = $this->session->userdata('id');
					$header['NAMA_BA'] = $this->input->post('ba_name');
					$header['ID_TL'] = $this->input->post('id_tl'); 
					$header['NAMA_TL'] = $this->input->post('tl_name'); 
					$header['ID_KBA'] = $this->input->post('id_kba'); 
					$header['NAMA_KBA'] = $this->input->post('kba_name'); 
					$header['ID_AREA'] = $this->input->post('id_area'); 
				
					$query_cek_transdt = $this->db->query("select ObjectID from NewHeader where ID_BA='".$this->session->userdata('id')."' and ID_OUTLET='".$header['ID_OUTLET']."' and month(TransDt)='".date('m', strtotime($header['TransDt']))."' and day(TransDt)='".date('d', strtotime($header['TransDt']))."' and year(TransDt)='".date('Y', strtotime($header['TransDt']))."'");
					if($query_cek_transdt->num_rows() < 1){
						if(in_array('0999', $_POST['kode_product']) == true and in_array('0998', $_POST['kode_product']) == true){
							if (in_array('0', $_POST['qty']) == false and in_array(0, $_POST['qty']) == false and in_array('', $_POST['qty']) == false and in_array(null, $_POST['qty']) == false){
								$query_insert = $this->sg_model->insert_data('NewHeader', $header);
									if($query_insert){
										$query_get_header = $this->db->query("select ObjectID, TransDt, ID_OUTLET from NewHeader where ID_BA='".$header['ID_BA']."' and TransDt='".$header['TransDt']."' and ID_OUTLET='".$header['ID_OUTLET']."'");
										if($query_get_header->num_rows() == 1){
											foreach($query_get_header->result() as $head){
													$detail['ParentObjectID'] = $head->ObjectID;
													$detail['TransDt'] = $head->TransDt;
													$detail['ID_OUTLET'] = $head->ID_OUTLET;
													
													$nama = array();
													$kode = array();
													$desc = array();
													$qty = array();
													
													$nama = $_POST['nama_product'];
													$kode = $_POST['kode_product'];
													$desc = $_POST['desc_product'];
													$qty_prd = $_POST['qty'];
													
													foreach ($_POST['list_product'] as $key => $value) {
																$detail['ID_PRODUCT'] = $value;
																$detail['NAMA_PRODUCT'] = $nama[$key];
																$detail['PRODUCT_KODE_PRINCIPLE'] = $kode[$key];
																$detail['DESCRIPTION_PRINCIPLE'] = $desc[$key];
																$detail['Qty'] = $qty_prd[$key];
																
																$query_insert_detail = $this->sg_model->insert_data('NewDetail', $detail);
													}
														
													$query_delete_cart = $this->db->query("delete from Temp_CART WHERE ID_BA = '".$this->session->userdata('id')."'");
														
													$this->session->set_flashdata('outlet_result',"<div id='notif' style='width:100%;height:100%;display:flex;position:fixed;left:0;top:0;'><div style='font-size:14px;color:#fff;padding:10px 25px;margin:auto;border-radius:2px;background-color:rgb(50,50,50);'>Input data transaksi ".$this->input->post('t_date')." Berhasil<br/><span style='font-size:11px;'>Data telah diupdate!</span></div></div>");
													Header('Location:'.base_url().'index.php/apps/outlet/');
											}
										}else{
											//data tidak tersedia
											$this->session->set_flashdata('cart_result',"<div id='notif' style='width:100%;height:100%;display:flex;position:fixed;left:0;top:0;'><div style='font-size:14px;color:#fff;padding:10px 25px;margin:auto;border-radius:2px;background-color:rgb(50,50,50);'>Terjadi kesalahan pada system<br/><span style='font-size:11px;'>Mohon coba beberapa saat lagi!</span></div></div>");
											Header('Location:'.base_url().'index.php/apps/cart/'.$this->uri->segment(3).'/'.$t_date.'/'.$header['TransDt']);
										}
								}else{
									//gagal input header
									$this->session->set_flashdata('cart_result',"<div id='notif' style='width:100%;height:100%;display:flex;position:fixed;left:0;top:0;'><div style='font-size:14px;color:#fff;padding:10px 25px;margin:auto;border-radius:2px;background-color:rgb(50,50,50);'>Terjadi Kesalahan Pada Data Inputan<br/><span style='font-size:11px;'>Mohon Coba Beberapa Saat Lagi!</span></div></div>");
									Header('Location:'.base_url().'index.php/apps/cart/'.$this->uri->segment(3).'/'.$t_date.'/'.$header['TransDt']);
								}
							}else{
								$this->session->set_flashdata('cart_result',"<div id='notif' style='width:100%;height:100%;display:flex;position:fixed;left:0;top:0;'><div style='font-size:14px;color:#fff;padding:10px 25px;margin:auto;border-radius:2px;background-color:rgb(50,50,50);'>Mohon Cek Kembali Semua Qty Setiap Produk<br/><span style='font-size:11px;'>Silahkan Coba Lagi</span></div></div>");
								Header('Location:'.base_url().'index.php/apps/cart/'.$this->uri->segment(3).'/'.$t_date.'/'.$header['TransDt']);
							}
						}else{
							$this->session->set_flashdata('cart_result',"<div id='notif' style='width:100%;height:100%;display:flex;position:fixed;left:0;top:0;'><div style='font-size:14px;color:#fff;padding:10px 25px;margin:auto;border-radius:2px;background-color:rgb(50,50,50);'>Maaf, Anda belum menyertakan data diprospek dan berhasil<br/><span style='font-size:11px;'>Silahkan masukkan data diprospek dan berhasil!</span></div></div>");
							Header('Location:'.base_url().'index.php/apps/cart/'.$this->uri->segment(3).'/'.$t_date.'/'.$header['TransDt']);
						}
					}else{
						$this->session->set_flashdata('cart_result',"<div id='notif' style='width:100%;height:100%;display:flex;position:fixed;left:0;top:0;'><div style='font-size:14px;color:#fff;padding:10px 25px;margin:auto;border-radius:2px;background-color:rgb(50,50,50);'>Maaf, Anda telah mengirimkan data transaksi untuk tanggal ini<br/><span style='font-size:11px;'>Terimakasih!</span></div></div>");
						Header('Location:'.base_url().'index.php/apps/cart/'.$this->uri->segment(3).'/'.$t_date.'/'.$header['TransDt']);
					}
				}else{
					//validasi tidak berjalan lancar
					$this->session->set_flashdata('cart_result',"<div id='notif' style='width:100%;height:100%;display:flex;position:fixed;left:0;top:0;'><div style='font-size:14px;color:#fff;padding:10px 25px;margin:auto;border-radius:2px;background-color:rgb(50,50,50);'>Notifikasi<br/><span style='font-size:11px;'>Mohon pastikan semua data terisi dengan baik dan benar!</span></div></div>");
					Header('Location:'.base_url().'index.php/apps/cart/'.$this->uri->segment(3).'/'.$this->input->post('t_date').'/'.$this->input->post('trans_date'));
				}
			}else{
				$this->load->view('global/top');
				$this->load->view('app_ba/login');
				$this->load->view('global/bottom');
			}
		}
		
		/*function get_cart(){
			$cek = $this->session->userdata('login_code_ba');
			if($cek){
				$query_cart = $this->db->query("select ID_PRODUCT from Temp_CART where ID_BA='".$this->session->userdata('id')."'");
				$data = array();
				foreach($query_cart->result() as $grid){
					$data[] = $grid; 
				}
				echo json_encode($data);
			}else{
				$this->load->view('global/top');
				$this->load->view('app_ba/login');
				$this->load->view('global/bottom');
			}
		}*/
		
		/*---------------------------------------------------------------------------------*/
		/*                               Controller Salesman                               */
		/*---------------------------------------------------------------------------------*/
		
		
		function login_salesman(){
			$cek = $this->session->userdata('login_code_salesman');
			if($cek){
				$query1 = $this->db->query("select Ms_USER.name_user, Ms_USER.pict, Ms_TL.NAMA_TL from Ms_USER, Ms_BA, Ms_TL where Ms_USER.user_id = Ms_BA.ID_BA and Ms_BA.ID_TL = Ms_TL.ID_TL and Ms_USER.user_id='".$this->session->userdata('id')."'");
				foreach($query1->result() as $sess){
					$data['nama'] = $sess->name_user;
					$data['pict'] = $sess->pict;
					$data['distributor'] = $sess->NAMA_TL;
				}
				
				//$query2 = $this->db->query("select Top 1 TransDt from View_EVAN_Qlik_SellOut_Salesman where ID_BA='".$this->session->userdata('id')."' order by TransDt desc");
				//foreach($query2->result() as $sess){
				//	$data['date'] = $sess->TransDt;
				//}
				$this->load->view('global/top');
				$this->load->view('app_salesman/home',$data);
				$this->load->view('global/bottom');
			}else{
				$this->load->view('global/top');
				$this->load->view('app_salesman/login');
				$this->load->view('global/bottom');
			}
		}
			
		function verification_salesman(){
			$this->load->view('global/top');
			$this->load->view('app_salesman/account_verification');
			$this->load->view('global/bottom');
		}
		
		function forget_salesman(){
			$this->load->view('global/top');
			$this->load->view('app_salesman/forget');
			$this->load->view('global/bottom');
		}
		
		function recapt_sales_daily_salesman(){
			$cek = $this->session->userdata('login_code_salesman');
			if($cek){
				//$query2 = $this->db->query("select Top 1 TransDt from View_EVAN_Qlik_SellOut where ID_BA='".$this->session->userdata('id')."' order by TransDt desc");
				//foreach($query2->result() as $sess){
					$data['date'] = date('Y-m-d H:s:i');
				//}
				$this->load->view('global/top');
				$this->load->view('app_salesman/recapt_sales_daily',$data);
				$this->load->view('global/bottom');
			}else{
				$this->load->view('global/top');
				$this->load->view('app_salesman/login');
				$this->load->view('global/bottom');
			}
		}
		
		
		
		function home_salesman(){
			$cek = $this->session->userdata('login_code_salesman');
			if($cek){
				$query1 = $this->db->query("select Ms_USER.name_user, Ms_USER.pict, Ms_TL.NAMA_TL from Ms_USER, Ms_BA, Ms_TL where Ms_USER.user_id = Ms_BA.ID_BA and Ms_BA.ID_TL = Ms_TL.ID_TL and Ms_USER.user_id='".$this->session->userdata('id')."'");
				foreach($query1->result() as $sess){
					$data['nama'] = $sess->name_user;
					$data['pict'] = $sess->pict;
					$data['distributor'] = $sess->NAMA_TL;
				}
				
				//$query2 = $this->db->query("select Top 1 TransDt from View_EVAN_Qlik_SellOut_Salesman where ID_BA='".$this->session->userdata('id')."' order by TransDt desc");
				//foreach($query2->result() as $sess){
				//	$data['date'] = $sess->TransDt;
				//}
				
				$this->load->view('global/top');
				$this->load->view('app_salesman/home',$data);
				$this->load->view('global/bottom');
			}else{
				$this->load->view('global/top');
				$this->load->view('app_salesman/login');
				$this->load->view('global/bottom');
			}
		}
		
		function profile_salesman(){
			$cek = $this->session->userdata('login_code_salesman');
			if($cek){
				$query1 = $this->db->query("select ID_BA, NAMA_BA, NAMA_TL, pict from Ms_USER, Ms_BA, Ms_TL where Ms_USER.user_id = Ms_BA.ID_BA and Ms_BA.ID_TL = Ms_TL.ID_TL and Ms_USER.user_id='".$this->session->userdata('id')."'");
				foreach($query1->result() as $pro){
					$data['kode_salesman'] = $pro->ID_BA;
					$data['nama_salesman'] = $pro->NAMA_BA; 
					$data['nama_distributor'] = $pro->NAMA_TL;
					$data['pict'] =	$pro->pict;
				}
				
				$data['error'] = '';
				$this->load->view('global/top');
				$this->load->view('app_salesman/profile', $data);
				$this->load->view('global/bottom');
			}else{
				$this->load->view('global/top');
				$this->load->view('app_ba/login');
				$this->load->view('global/bottom');
			}
		}
		
		function change_salesman(){
			$this->load->view('global/top');
			$this->load->view('app_salesman/change_password');
			$this->load->view('global/bottom');
		}
	
		function cart_salesman(){
			$cek = $this->session->userdata('login_code_salesman');
			if($cek){
				$data['query_cart'] = $this->db->query("select * from Temp_CART where ID_BA = '".$this->session->userdata('id')."' order by Qty");
				$query1 = $this->db->query("select Ms_BA.ID_BA, Ms_BA.NAMA_BA, Ms_TL.ID_TL, Ms_TL.NAMA_TL, Ms_TL.ID_AREA from Ms_BA, Ms_TL where Ms_TL.ID_TL=Ms_BA.ID_TL and Ms_BA.ID_BA = '".$this->session->userdata('id')."'");
				//$query2 = $this->db->query("select Top 1 ObjectID, ReceiveDt from NewHeader where ID_BA='".$this->session->userdata('id')."' and ID_OUTLET='".$this->uri->segment(3)."' and month(TransDt)='".date('m', strtotime("-1 days"))."' and day(TransDt)='".date('d', strtotime("-1 days"))."' and year(TransDt)='".date('Y', strtotime("-1 days"))."'");
				
				if($query1->num_rows() < 1){
					$this->session->set_flashdata('outlet_result',"<div id='notif' style='width:100%;height:100%;display:flex;position:fixed;left:0;top:0;'><div style='font-size:14px;color:#fff;padding:10px 25px;margin:auto;border-radius:2px;background-color:rgb(50,50,50);'>Maaf, Outlet ini tidak bisa digunakan <br/><span style='font-size:11px;'>Mohon periksa kembali data Anda!</span></div></div>");
					Header('Location:'.base_url().'index.php/apps/outlet/');
				}else{
					//if($query2->num_rows() == 1){
					//	$this->session->set_flashdata('outlet_result',"<div id='notif' style='width:100%;height:100%;display:flex;position:fixed;left:0;top:0;'><div style='font-size:14px;color:#fff;padding:10px 25px;margin:auto;border-radius:2px;background-color:rgb(50,50,50);'>Notifikasi<br/><span style='font-size:11px;'>Maaf, transaksi untuk outlet ini pada hari ini sudah dilaporkan!</span></div></div>");
					//	Header('Location:'.base_url().'index.php/apps/outlet/');
					//}else{
					foreach($query1->result() as $cart){
						$data['id_salesman'] = $cart->ID_BA;
						$data['nama_salesman'] = $cart->NAMA_BA;
						$data['id_distributor'] = $cart->ID_TL;
						$data['nama_distributor'] = $cart->NAMA_TL;
						$data['id_area'] = $cart->ID_AREA;
					}
					
					$this->load->view('global/top');
					$this->load->view('app_salesman/cart',$data);
					$this->load->view('global/bottom');
					//}
				}
			}else{
				$this->load->view('global/top');
				$this->load->view('app_salesman/login');
				$this->load->view('global/bottom');
			}
		}
		
		function list_product_salesman(){
			$cek = $this->session->userdata('login_code_salesman');
			if($cek){
				
				$data['query1'] = $this->db->query("select ID_PRODUCT, NAMA_PRODUCT, NAMA_TIPE_PRODUCT, VOLUME, PRODUCT_KODE_PRINCIPLE from Ms_PRODUCT, Ms_PRODUCT_CATEGORY WHERE Ms_PRODUCT_CATEGORY.ID_TIPE_PRODUCT = Ms_PRODUCT.ID_TIPE_PRODUCT and Ms_PRODUCT.SalesFlag = '1' order by NAMA_PRODUCT");
				$data['query_cart'] = $this->db->query("select ID_PRODUCT from Temp_CART where ID_BA = '".$this->session->userdata('id')."'");
				
				$this->load->view('global/top');
				$this->load->view('app_salesman/list_product',$data);
				$this->load->view('global/bottom');
				
			}else{
				$this->load->view('global/top');
				$this->load->view('app_salesman/login');
				$this->load->view('global/bottom');
			}
		}
		
		function report_salesman(){
			$this->load->view('global/top');
			$this->load->view('app_salesman/report_list');
			$this->load->view('global/bottom');
		}
		
		function new_product_salesman(){
			$cek = $this->session->userdata('login_code_salesman');
			if($cek){
				$data['query1'] = $this->db->query("select * from Ms_PRODUCT where Product_Flag = '1' order by NAMA_PRODUCT");
				
				$this->load->view('global/top');
				$this->load->view('app_salesman/new_product',$data);
				$this->load->view('global/bottom');
			}else{
				$this->load->view('global/top');
				$this->load->view('app_salesman/login');
				$this->load->view('global/bottom');
			}
		}
	
		function recapt_sales_salesman(){
			$cek = $this->session->userdata('login_code_salesman');
			if($cek){
				$this->load->view('global/top');
				$this->load->view('app_salesman/recapt_sales');
				$this->load->view('global/bottom');
			}else{
				$this->load->view('global/top');
				$this->load->view('app_salesman/login');
				$this->load->view('global/bottom');
			}
		}
		
		function attendance_salesman(){
			$cek = $this->session->userdata('login_code_salesman');
			if($cek){
				$this->load->view('global/top');
				$this->load->view('app_salesman/attandance');
				$this->load->view('global/bottom');
			}else{
				$this->load->view('global/top');
				$this->load->view('app_salesman/login');
				$this->load->view('global/bottom');
			}
		}
		
		function graphics_salesman(){
			$cek = $this->session->userdata('login_code_salesman');
			if($cek){
				$data['id'] = $this->session->userdata('id');
				$this->load->view('global/top');
				$this->load->view('app_salesman/graphics',$data);
				$this->load->view('global/bottom');
			}else{
				$this->load->view('global/top');
				$this->load->view('app_salesman/login');
				$this->load->view('global/bottom');
			}
		}
		
		function recent_salesman(){
			$cek = $this->session->userdata('login_code_salesman');
			if($cek){
				$data['query1'] = $this->db->query("select * from NewHeader where ID_BA = '".$this->session->userdata('id')."' and month(ReceiveDt)='".date('m')."' and day(ReceiveDt)='".date('d')."' and year(ReceiveDt)='".date('Y')."' order by ID_OUTLET, TransDt");
				
				$this->load->view('global/top');
				$this->load->view('app_salesman/recent',$data);
				$this->load->view('global/bottom');
			}else{
				$this->load->view('global/top');
				$this->load->view('app_salesman/login');
				$this->load->view('global/bottom');
			}
		}
		
		function detail_salesman($id_outlet, $tgl_trans){
			$cek = $this->session->userdata('login_code_salesman');
			if($cek){
				$outlet = urldecode($this->uri->segment(3));
				$tgl = urldecode($this->uri->segment(4));
				$query1 = $this->db->query("select NewHeader.ObjectID, NewHeader.ID_BA, Ms_BA.NAMA_BA, NewHeader.ID_OUTLET, Ms_TL.NAMA_TL, NewHeader.TransDt, NewHeader.ReceiveDt from NewHeader, Ms_TL, Ms_BA  
				where 
				NewHeader.ObjectID = '".$outlet."' 
				AND Ms_BA.ID_BA = '".$this->session->userdata('id')."' 
				AND Ms_BA.ID_TL = Ms_TL.ID_TL 
				AND NewHeader.ID_BA = Ms_BA.ID_BA
				AND NewHeader.ReceiveDt = '".$tgl."'");
				foreach($query1->result() as $head){
					$data['id_salesman'] = $head->ID_BA;
					$data['nama_salesman'] = $head->NAMA_BA;
					$data['nama_distributor'] = $head->NAMA_TL;
					$data['nama_outlet'] = $head->ID_OUTLET;
					$data['transdt'] = $head->TransDt;
					$data['query2'] = $this->db->query("SELECT NewDetail.ID_PRODUCT, NewDetail.NAMA_PRODUCT, NewDetail.PRODUCT_KODE_PRINCIPLE, 
					NewDetail.DESCRIPTION_PRINCIPLE, NewDetail.Qty , Ms_PRODUCT.VOLUME 
					from NewDetail, NewHeader, Ms_PRODUCT where NewDetail.ID_PRODUCT = Ms_PRODUCT.ID_PRODUCT AND NewHeader.ObjectID = NewDetail.ParentObjectID AND NewDetail.ParentObjectID = '".$head->ObjectID."' order by NewDetail.ObjectID");
				}
				$this->load->view('global/top');
				$this->load->view('app_salesman/detail',$data);
				$this->load->view('global/bottom');
			}else{
				$this->load->view('global/top');
				$this->load->view('app_salesman/login');
				$this->load->view('global/bottom');
			}
		}
		
	
		//----------------------------------------------------------------------------------
		
		public function act_login_salesman(){
			$this->form_validation->set_rules('id_salesman','User ID','required');
			$this->form_validation->set_rules('password','password','required');
			if($this->form_validation->run() == false){
				$this->index();
			}else{
				$user_id = preg_replace('/[^a-zA-Z0-9_ %\[\]\.\(\)%&-]/s', ' ', $this->input->post('id_salesman'));
				$password = preg_replace('/[^a-zA-Z0-9_ %\[\]\.\(\)%&-]/s', ' ', $this->input->post('password'));
				$validation = $this->sg_model->validation_login($user_id,$password,'SL');
				if($validation->num_rows() == 0){
					$this->session->set_flashdata('login_result',"<div id='notif' style='width:100%;height:100%;display:flex;position:fixed;left:0;top:0;'><div style='font-size:14px;color:#fff;padding:10px 25px;margin:auto;border-radius:2px;background-color:rgb(50,50,50);'>Maaf, UserID / Password yang Anda Masukkan Salah, <br/><span style='font-size:11px;'>Silahkan coba lagi!</span></div></div>");
					Header('Location:'.base_url().'index.php/apps/login_salesman/');
				}else{
					foreach($validation->result() as $login){
						$login_data['obj'] = $login->ObjectID;
						$login_data['id'] = $login->user_id;
						$login_data['nama'] = $login->name_user;
						$login_data['login_code_salesman'] = 'sukses_login';
						$this->session->set_userdata($login_data);
					}
					
					Header('Location:'.base_url().'index.php/apps/home_salesman/');
				}
			}
		}
		
		public function act_logout_salesman(){
			$this->session->sess_destroy();
			$cek = $this->session->userdata('login_code_salesman');
			if($cek){
				Header('Location:'.base_url().'index.php/apps/login_salesman/');
			}else{
				Header('Location:'.base_url().'index.php/apps/login_salesman/');
			}
		}
		
		function act_change_password_salesman(){
			$cek = $this->session->userdata('login_code_salesman');
			if($cek){
				$this->form_validation->set_rules('pass_lama','password lama','required|trim|max_length[6]');
				$this->form_validation->set_rules('pass_baru','password baru','required|trim|max_length[6]');
				$this->form_validation->set_rules('pass_konf','konfirmasi password','required|trim|matches[pass_baru]');
				if($this->form_validation->run() == false){
					$this->change_salesman();
				}else{
					$pass_lama = preg_replace('/[^a-zA-Z0-9_ %\[\]\.\(\)%&-]/s', ' ', $this->input->post('pass_lama'));
					$pass_baru = preg_replace('/[^a-zA-Z0-9_ %\[\]\.\(\)%&-]/s', ' ', $this->input->post('pass_baru'));
					$query_check = $this->db->query("select user_id from Ms_USER where user_id='".$this->session->userdata('id')."' and password = '".$pass_lama."'");
					if($query_check->num_rows() == 1){
						$data['password'] = $pass_baru;
						$query_modify = $this->sg_model->update_data('Ms_USER', 'user_id', $this->session->userdata('id'), $data);
						if($query_modify){
							$this->session->set_flashdata('change_result',"<div id='notif' style='width:100%;height:100%;display:flex;position:fixed;left:0;top:0;'><div style='font-size:14px;color:#fff;padding:10px 25px;margin:auto;border-radius:2px;background-color:rgb(50,50,50);'>Ubah password berhasil, <br/><span style='font-size:11px;'>Password akun anda telah terupdate!</span></div></div>");
							Header('Location:'.base_url().'index.php/apps/profile_salesman/');
						}else{
							$this->session->set_flashdata('change_result',"<div id='notif' style='width:100%;height:100%;display:flex;position:fixed;left:0;top:0;'><div style='font-size:14px;color:#fff;padding:10px 25px;margin:auto;border-radius:2px;background-color:rgb(50,50,50);'>Maaf, ubah password gagal dilakukan<br/><span style='font-size:11px;'>Mohon periksa kembali data Anda!</span></div></div>");
							Header('Location:'.base_url().'index.php/apps/profile_salesman/');
						}
					}else{
						$this->session->set_flashdata('change_result',"<div id='notif' style='width:100%;height:100%;display:flex;position:fixed;left:0;top:0;'><div style='font-size:14px;color:#fff;padding:10px 25px;margin:auto;border-radius:2px;background-color:rgb(50,50,50);'>Maaf, data Anda tidak ditemukan, <br/><span style='font-size:11px;'>Mohon periksa kembali data Anda!</span></div></div>");
						Header('Location:'.base_url().'index.php/apps/profile_salesman/');
					}
				}
			}else{
				$this->load->view('global/top');
				$this->load->view('app_salesman/login');
				$this->load->view('global/bottom');
			}
		}
		
		function act_forget_salesman(){			
			$this->form_validation->set_rules('id_ba','kode ba','required|trim|max_length[6]');
			if($this->form_validation->run() == false){
				$this->forget();
			}else{
				$ba = $this->input->post('id_ba');
				$query_check = $this->db->query("select user_id from Ms_USER where user_id='".$ba."'");
				if($query_check->num_rows() == 1){
					$data['password'] = $ba;
					$query_modify = $this->sg_model->update_data('Ms_USER', 'user_id', $ba, $data);
					if($query_modify){
						$this->session->set_flashdata('forget_result',"<div id='notif' style='width:100%;height:100%;display:flex;position:fixed;left:0;top:0;'><div style='font-size:14px;color:#fff;padding:10px 25px;margin:auto;border-radius:2px;background-color:rgb(50,50,50);'>Reset password berhasil, <br/><span style='font-size:11px;'>Password akun anda telah terupdate!</span></div></div>");
						Header('Location:'.base_url().'index.php/apps/forget/');
					}else{
						$this->session->set_flashdata('forget_result',"<div id='notif' style='width:100%;height:100%;display:flex;position:fixed;left:0;top:0;'><div style='font-size:14px;color:#fff;padding:10px 25px;margin:auto;border-radius:2px;background-color:rgb(50,50,50);'>Maaf, reset password gagal dilakukan<br/><span style='font-size:11px;'>Mohon periksa kembali data Anda!</span></div></div>");
						Header('Location:'.base_url().'index.php/apps/forget/');
					}
				}else{
					$this->session->set_flashdata('forget_result',"<div id='notif' style='width:100%;height:100%;display:flex;position:fixed;left:0;top:0;'><div style='font-size:14px;color:#fff;padding:10px 25px;margin:auto;border-radius:2px;background-color:rgb(50,50,50);'>Maaf, kode Anda tidak ditemukan, <br/><span style='font-size:11px;'>Mohon periksa kembali kode Anda!</span></div></div>");
					Header('Location:'.base_url().'index.php/apps/forget/');
				}
			}
		}
		
		function act_change_profile_salesman(){
			$cek = $this->session->userdata('login_code_salesman');
			if($cek){
				$this->form_validation->set_rules('nama_salesman','nama Salesman','required|trim');
				if($this->form_validation->run() == false){
					$this->profile();
				}else{
					$nama_ba = $this->input->post('nama_ba');
					$data1['name_user'] = $nama_salesman;
					$data['NAMA_BA'] = $nama_salesman;
					$query_modify = $this->sg_model->update_data('Ms_BA', 'ID_BA', $this->session->userdata('id'), $data);
					$query_modify1 = $this->sg_model->update_data('Ms_USER', 'user_id', $this->session->userdata('id'), $data1);
					if($query_modify and $query_modify1){
						$this->session->set_flashdata('change_result',"<div id='notif' style='width:100%;height:100%;display:flex;position:fixed;left:0;top:0;'><div style='font-size:14px;color:#fff;padding:10px 25px;margin:auto;border-radius:2px;background-color:rgb(50,50,50);'>Ubah nama profil berhasil, <br/><span style='font-size:11px;'>Nama akun anda telah terupdate!</span></div></div>");
						Header('Location:'.base_url().'index.php/apps/profile/');
					}else{
						$this->session->set_flashdata('change_result',"<div id='notif' style='width:100%;height:100%;display:flex;position:fixed;left:0;top:0;'><div style='font-size:14px;color:#fff;padding:10px 25px;margin:auto;border-radius:2px;background-color:rgb(50,50,50);'>Maaf, ubah nama profil gagal dilakukan<br/><span style='font-size:11px;'>Mohon periksa kembali data Anda!</span></div></div>");
						Header('Location:'.base_url().'index.php/apps/profile/');
					}
				}
			}else{
				$this->load->view('global/top');
				$this->load->view('app_salesman/login');
				$this->load->view('global/bottom');
			}
		}
		
		function act_change_pict_salesman(){
			$configu['upload_path'] = './uploads/account/original/';
			$configu['upload_url'] = base_url().'uploads/account/original/';
			$configu['allowed_types'] = 'gif|jpeg|jpg|png';
			$configu['max_size'] = '10000';
			$configu['max_width'] = '10000';
			$configu['max_height'] = '10000';
			
			$this->load->library('upload',$configu);
			
			if (!$this->upload->do_upload('pict'))
			{
				$query1 = $this->db->query("select ID_BA, NAMA_BA, NAMA_TL, pict from Ms_USER, Ms_BA, Ms_TL where Ms_USER.user_id = Ms_BA.ID_BA and Ms_BA.ID_TL = Ms_TL.ID_TL and Ms_USER.user_id='".$this->session->userdata('id')."'");
				foreach($query1->result() as $pro){
					$data['kode_salesman'] = $pro->ID_BA;
					$data['nama_salesman'] = $pro->NAMA_BA; 
					$data['nama_distributor'] = $pro->NAMA_TL;
					$data['pict'] =	$pro->pict;
				}
				
				$data['error'] = "<div id='notif1' style='width:100%;height:100%;display:flex;position:fixed;left:0;top:0;'><div style='font-size:14px;color:#fff;padding:10px 25px;margin:auto;border-radius:2px;background-color:rgb(50,50,50);'>Ubah Foto Profil Gagal<br/><span style='font-size:11px;'>".$this->upload->display_errors()."</span></div></div>";
				$this->load->view('global/top');
				$this->load->view('app_salesman/profile',$data);
				$this->load->view('global/bottom');
			}
			else
			{
				$upload_data = $this->upload->data();
			
				$config1['image_library'] = 'GD2';
				$config1['source_image'] = $upload_data['full_path'];
				$config1['new_image'] = 'uploads/account/thumb/'.$upload_data['file_name'];
				$config1['maintain_ratio'] = TRUE;
				$config1['width'] = 128;
				$config1['height'] = 128;

				$this->load->library('image_lib', $config1);

				if(!$this->image_lib->resize()){
					echo $this->image_lib->display_errors();
				}
				
				$id = $this->session->userdata('id');
				$data['pict'] = $upload_data['file_name'];
				
				$edit_data1 = $this->sg_model->update_data('Ms_USER','user_id',$id,$data);
				if($edit_data1){
					$this->session->set_flashdata('change_result',"<div id='notif' style='width:100%;height:100%;display:flex;position:fixed;left:0;top:0;'><div style='font-size:14px;color:#fff;padding:10px 25px;margin:auto;border-radius:2px;background-color:rgb(50,50,50);'>Ubah Foto Profil Berhasil<br/><span style='font-size:11px;'>Foto profil telah terupdate!</span></div></div>");
					Header('Location:'.base_url().'index.php/apps/profile_salesman/');
				}else{
					$this->session->set_flashdata('change_result',"<div id='notif' style='width:100%;height:100%;display:flex;position:fixed;left:0;top:0;'><div style='font-size:14px;color:#fff;padding:10px 25px;margin:auto;border-radius:2px;background-color:rgb(50,50,50);'>Ubah Foto Profil Gagal<br/><span style='font-size:11px;'>Mohon coba lagi dengan foto yang lain!</span></div></div>");
					Header('Location:'.base_url().'index.php/apps/profile_salesman/');
				}
			}
		}
		
		function act_get_cart_salesman($id){
			$cek = $this->session->userdata('login_code_ba');
			if($cek){
				if(isset($_POST['add_cart'])){
					$list_product = $this->input->post("list_product");
					
					if($list_product == null){
						$this->session->set_flashdata('select_result',"<div id='notif' style='width:100%;height:100%;display:flex;position:fixed;left:0;top:0;'><div style='font-size:14px;color:#fff;padding:10px 25px;margin:auto;border-radius:2px;background-color:rgb(50,50,50);'>Mohon maaf, silahkan pilih dahulu produk<br/><span style='font-size:11px;'>Harus ada produk yang dichecklist!</span></div></div>");
						Header('Location:'.base_url().'index.php/apps/profile/');
					}else{
						$data['ID_BA'] = $this->session->userdata('id');
						foreach($list_product as $key => $value){
							$data['ID_PRODUCT'] = $value;
							$data['Qty'] = 1;
							$data['status'] = 1;
							$query_insert = $this->sg_model->insert_data('Temp_CART', $data);
						}	
						Header('Location:'.base_url().'index.php/apps/cart/'.$this->uri->segment(3).'/');
					}
				}else{
					Header('Location:'.base_url().'index.php/apps/cart/'.$this->uri->segment(3).'/');
				}
			}else{
				$this->load->view('global/top');
				$this->load->view('app_ba/login');
				$this->load->view('global/bottom');
			}
		}
		
		function add_cart_salesman($id){
			$cek = $this->session->userdata('login_code_salesman');
			if($cek){
				$data['ID_BA'] = $this->session->userdata('id');
				$data['ID_PRODUCT'] = $this->input->post('id');
				$data['Qty'] = null;
				$data['status'] = 1;
				$query_insert = $this->sg_model->insert_data('Temp_CART', $data);
				if($query_insert){
					$data11 = array(
						'status' => 'Sukses',
						'color' => 'FF6B6B'
					);
					echo json_encode($data11);
				}else{
					$data11 = array(
						'status' => 'Fail',
						'color' => 'FF6B6B'
					);
					echo json_encode($data11);
				}
			}else{
				$this->load->view('global/top');
				$this->load->view('app_salesman/login');
				$this->load->view('global/bottom');
			}
		}
		
		function add_qty_cart_salesman($id){
			$cek = $this->session->userdata('login_code_salesman');
			if($cek){
				$id_ba = $this->session->userdata('id');
				$id_product = $this->input->post('id');
				$qty = $this->input->post('qty');
				$data['status'] = 1;
				$query_update = $this->db->query("update Temp_CART set Qty='".$qty."' where ID_PRODUCT='".$id_product."' and ID_BA='".$id_ba."'");
				if($query_update){
					$data11 = array(
						'status' => 'Sukses',
						'color' => 'FF6B6B'
					);
					echo json_encode($data11);
				}else{
					$data11 = array(
						'status' => 'Fail',
						'color' => 'FF6B6B'
					);
					echo json_encode($data11);
				}
			}else{
				$this->load->view('global/top');
				$this->load->view('app_salesman/login');
				$this->load->view('global/bottom');
			}
		}
		
		function delete_cart_salesman(){
			$cek = $this->session->userdata('login_code_salesman');
			if($cek){
				$id_product = $this->input->post('id');
				$query_delete = $this->db->query("delete from Temp_CART where ID_BA='".$this->session->userdata('id')."' and ID_PRODUCT='".$id_product."'");
				if($query_delete){
					$data11 = array(
						'status' => 'Sukses',
						'color' => 'FF6B6B'
					);
					echo json_encode($data11);
				}else{
					$data11 = array(
						'status' => 'Fail',
						'color' => 'FF6B6B'
					);
					echo json_encode($data11);
				}
			}else{
				$this->load->view('global/top');
				$this->load->view('app_salesman/login');
				$this->load->view('global/bottom');
			}
		}
		
		function delete_qty_cart_salesman(){
			$cek = $this->session->userdata('login_code_salesman');
			if($cek){
				$id_product = $this->input->post('id');
				$query_delete = $this->db->query("delete from Temp_CART where ID_BA='".$this->session->userdata('id')."' and ID_PRODUCT='".$id_product."'");
				if($query_delete){
					$data11 = array(
						'status' => 'Sukses',
						'color' => 'FF6B6B'
					);
					echo json_encode($data11);
				}else{
					$data11 = array(
						'status' => 'Fail',
						'color' => 'FF6B6B'
					);
					echo json_encode($data11);
				}
			}else{
				$this->load->view('global/top');
				$this->load->view('app_salesman/login');
				$this->load->view('global/bottom');
			}
		}
		
		function get_bell_salesman(){
			$id = $this->input->post('id_data');
			//$qry_check_bell_1 = $this->db->query("select ID_OUTLET from Ms_OUTLET where ID_BA='".$id."'");
			$qry_check_bell_2 = $this->db->query("select ID_PRODUCT from Ms_PRODUCT where Product_Flag='1'");
			$data = array(
					//'bell1' => $qry_check_bell_1->num_rows(),
					'bell2' => $qry_check_bell_2->num_rows()
			);
			echo json_encode($data);
		}
		
		function get_sales_all_salesman(){
			$id = $this->input->post('id_data');
			$qry_check_sales_all = $this->db->query("select sum(VALUE) as amount_sales_all from View_EVAN_Qlik_SellOut_Salesman where ID_BA='".$id."' 
			and Bulan=".date('m')." and Tahun=".date('Y')." and Tgl=".date('d')." and ID_PRODUCT not in ('0999','0998')");
			$data_sales_all = array();
			
			foreach($qry_check_sales_all->result() as $grid5){
				$data_sales_all[] = $grid5; 
			}
			
			echo json_encode($data_sales_all);
		}
		
		function get_sales_detail_salesman(){
			$id = $this->input->post('id_data');
			$qry_check_sales = $this->db->query("select NAMA_TIPE_PRODUCT, sum(VALUE) as amount_sales_detail 
			from View_EVAN_Qlik_SellOut_Salesman where ID_BA='".$id."'
			and Bulan=".date('m')." and Tahun=".date('Y')." and Tgl=".date('d')." and ID_PRODUCT not in ('0999','0998')
			group by NAMA_TIPE_PRODUCT order by NAMA_TIPE_PRODUCT DESC");
			$data_sales = array();
			
			foreach($qry_check_sales->result() as $grid1){
				$data_sales[] = $grid1; 
			}
			echo json_encode($data_sales);
		}
		
		function get_sales_all_salesman_search(){
			$id = $this->input->post('id_data');
			$ymd = $this->input->post('ymd');
			$qry_check_sales_all = $this->db->query("select sum(VALUE) as amount_sales_all from View_EVAN_Qlik_SellOut_Salesman where ID_BA='".$id."' 
			and TransDt = '".$ymd."' and ID_PRODUCT not in ('0999','0998')");
			$data_sales_all = array();
			
			foreach($qry_check_sales_all->result() as $grid5){
				$data_sales_all[] = $grid5; 
			}
			
			echo json_encode($data_sales_all);
		}
		
		function get_sales_detail_salesman_search(){
			$id = $this->input->post('id_data');
			$ymd = $this->input->post('ymd');
			$qry_check_sales = $this->db->query("select NAMA_TIPE_PRODUCT, sum(VALUE) as amount_sales_detail 
			from View_EVAN_Qlik_SellOut_Salesman where ID_BA='".$id."'
			and TransDt = '".$ymd."' and ID_PRODUCT not in ('0999','0998')
			group by NAMA_TIPE_PRODUCT order by NAMA_TIPE_PRODUCT DESC");
			$data_sales = array();
			
			foreach($qry_check_sales->result() as $grid1){
				$data_sales[] = $grid1; 
			}
			echo json_encode($data_sales);
		}
		
		
		function get_sales_all_month_salesman(){
			$id = $this->input->post('id_data');
			$qry_check_sales_all = $this->db->query("select sum(VALUE) as amount_sales_all from View_EVAN_Qlik_SellOut_Salesman where ID_BA='".$id."' 
			and Bulan=".date('m')." and Tahun=".date('Y')." and ID_PRODUCT not in ('0999','0998')");
			$data_sales_all = array();
			
			foreach($qry_check_sales_all->result() as $grid5){
				$data_sales_all[] = $grid5; 
			}
			
			echo json_encode($data_sales_all);
		}
		
		function get_sales_detail_month_salesman(){
			$id = $this->input->post('id_data');
			$qry_check_sales = $this->db->query("select NAMA_TIPE_PRODUCT, sum(VALUE) as amount_sales_detail 
			from View_EVAN_Qlik_SellOut_Salesman where ID_BA='".$id."'
			and Bulan=".date('m')." and Tahun=".date('Y')." and ID_PRODUCT not in ('0999','0998')
			group by NAMA_TIPE_PRODUCT order by NAMA_TIPE_PRODUCT DESC");
			$data_sales = array();
			
			foreach($qry_check_sales->result() as $grid1){
				$data_sales[] = $grid1; 
			}
			echo json_encode($data_sales);
		}
		
		function get_sales_all_month_salesman_search(){
			$id = $this->input->post('id_data');
			$m = $this->input->post('month');
			$y = $this->input->post('year');
			$qry_check_sales_all = $this->db->query("select sum(VALUE) as amount_sales_all from View_EVAN_Qlik_SellOut_Salesman where ID_BA='".$id."' 
			and Bulan=".$m." and Tahun=".$y." and ID_PRODUCT not in ('0999','0998')");
			$data_sales_all = array();
			
			foreach($qry_check_sales_all->result() as $grid5){
				$data_sales_all[] = $grid5; 
			}
			
			echo json_encode($data_sales_all);
		}
		
		function get_sales_detail_month_salesman_search(){
			$id = $this->input->post('id_data');
			$m = $this->input->post('month');
			$y = $this->input->post('year');
			$qry_check_sales = $this->db->query("select NAMA_TIPE_PRODUCT, sum(VALUE) as amount_sales_detail 
			from View_EVAN_Qlik_SellOut_Salesman where ID_BA='".$id."' 
			and Bulan=".$m." and Tahun=".$y." and ID_PRODUCT not in ('0999','0998')
			group by NAMA_TIPE_PRODUCT order by NAMA_TIPE_PRODUCT DESC");
			$data_sales = array();
			
			foreach($qry_check_sales->result() as $grid1){
				$data_sales[] = $grid1; 
			}
			echo json_encode($data_sales);
		}
		
		function get_detail_absensi_salesman(){
			$id = $this->input->post('id_data');
			
			$qry_check_sales = $this->db->query("select Tgl, Bulan, Tahun, sum(Qty) as Qty, sum(VALUE) as Value 
from View_EVAN_Qlik_SellOut_Salesman where ID_BA='".$id."' and Tahun='".date('Y')."' and Bulan='".date('m')."' group by Tgl, Bulan, Tahun order by Tgl desc");
			$data_detail = array();
			
			foreach($qry_check_sales->result() as $grid1){
				$data_detail[] = $grid1; 
			}
			echo json_encode($data_detail);
		}
		
		function get_all_absensi_salesman(){
			$id = $this->input->post('id_data');
			$qry_check_absensi = $this->db->query("select distinct Tgl   
from View_EVAN_Qlik_SellOut_Salesman where ID_BA='".$id."' and Tahun='".date('Y')."' and Bulan='".date('m')."'");
			$data_all = array(
					'abs' => $qry_check_absensi->num_rows()
			);
			
			echo json_encode($data_all);
		}
		
		function get_detail_absensi_salesman_search(){
			$id = $this->input->post('id_data');
			$m = $this->input->post('month');
			$y = $this->input->post('year');
			$qry_check_sales = $this->db->query("select Tgl, Bulan, Tahun, TransDt, sum(Qty) as Qty, sum(VALUE) as Value 
from View_EVAN_Qlik_SellOut_Salesman where ID_BA='".$id."' and Tahun='".$y."' and Bulan='".$m."' group by Tgl, Bulan, Tahun, TransDt order by Tgl desc");
			$data_detail = array();
			
			foreach($qry_check_sales->result() as $grid1){
				$data_detail[] = $grid1; 
			}
			echo json_encode($data_detail);
		}
		
		function get_all_absensi_salesman_search(){
			$id = $this->input->post('id_data');
			$m = $this->input->post('month');
			$y = $this->input->post('year');
			$qry_check_absensi = $this->db->query("select distinct Tgl   
from View_EVAN_Qlik_SellOut_Salesman where ID_BA='".$id."' and Tahun='".$y."' and Bulan='".$m."'");
			$data_all = array(
					'abs' => $qry_check_absensi->num_rows()
			);
			
			echo json_encode($data_all);
		}
		
		function checkout_salesman($id){
			$cek = $this->session->userdata('login_code_salesman');
			if($cek){
				$this->form_validation->set_rules('trans_date','tanggal transaksi','trim|required');
				$this->form_validation->set_rules('t_date','tanggal transaksi','required');
				$this->form_validation->set_rules('outlet_name','outlet','trim|required');
				
				if(count($_POST['list_product']) == 0){
					$this->form_validation->set_rules('list_product[]',"data produk", "trim|required");
				}
				
				if(count($_POST['qty']) == 0){
					$this->form_validation->set_rules('qty[]',"qty", "trim|numeric|required");
				}
				
				if($this->form_validation->run() == true){
					$t_date = $this->input->post('t_date');
					$header['ReceiveDt'] = date("Y-m-d H:s:i");
					$header['TransDt'] = $this->input->post('trans_date');
					$header['ID_OUTLET'] = preg_replace('/[^a-zA-Z0-9_ %\[\]\.\(\)%&-]/s', ' ', $this->input->post('outlet_name'));
					$header['ID_BA'] = $this->session->userdata('id');
					$header['NAMA_BA'] = $this->input->post('salesman_name');
					$header['ID_TL'] = $this->input->post('id_distributor'); 
					$header['NAMA_TL'] = $this->input->post('distributor_name'); 
					$header['ID_AREA'] = $this->input->post('id_area'); 
					if (in_array('0', $_POST['qty']) == false and in_array(0, $_POST['qty']) == false and in_array('', $_POST['qty']) == false and in_array(null, $_POST['qty']) == false){
					$query_insert = $this->sg_model->insert_data('NewHeader', $header);
						if($query_insert){
							$query_get_header = $this->db->query("select ObjectID, TransDt, ID_OUTLET from NewHeader where ID_BA='".$header['ID_BA']."' and TransDt='".$header['TransDt']."' and ID_OUTLET='".$header['ID_OUTLET']."'");
							if($query_get_header->num_rows() == 1){
								foreach($query_get_header->result() as $head){
										$detail['ParentObjectID'] = $head->ObjectID;
										$detail['TransDt'] = $head->TransDt;
										$detail['ID_OUTLET'] = $head->ID_OUTLET;
										
										$nama = array();
										$kode = array();
										$desc = array();
										$qty = array();
										
										$nama = $_POST['nama_product'];
										$kode = $_POST['kode_product'];
										$desc = $_POST['desc_product'];
										$qty_prd = $_POST['qty'];
										
										foreach ($_POST['list_product'] as $key => $value) {
												$detail['ID_PRODUCT'] = $value;
												$detail['NAMA_PRODUCT'] = $nama[$key];
												$detail['PRODUCT_KODE_PRINCIPLE'] = $kode[$key];
												$detail['DESCRIPTION_PRINCIPLE'] = $desc[$key];
												$detail['Qty'] = $qty_prd[$key];
												
												$query_insert_detail = $this->sg_model->insert_data('NewDetail', $detail);
										}
										
										$query_delete_cart = $this->db->query("delete from Temp_CART WHERE ID_BA = '".$this->session->userdata('id')."'");
										
										$this->session->set_flashdata('cart_result',"<div id='notif' style='width:100%;height:100%;display:flex;position:fixed;left:0;top:0;'><div style='font-size:14px;color:#fff;padding:10px 25px;margin:auto;border-radius:2px;background-color:rgb(50,50,50);'>Input data transaksi ".$this->input->post('t_date')." toko ".$head->ID_OUTLET." Berhasil<br/><span style='font-size:11px;'>Data telah diupdate!</span></div></div>");
										Header('Location:'.base_url().'index.php/apps/cart_salesman/');
								}
							}else{
								//data tidak tersedia
								$this->session->set_flashdata('cart_result',"<div id='notif' style='width:100%;height:100%;display:flex;position:fixed;left:0;top:0;'><div style='font-size:14px;color:#fff;padding:10px 25px;margin:auto;border-radius:2px;background-color:rgb(50,50,50);'>Terjadi kesalahan pada system<br/><span style='font-size:11px;'>Mohon coba beberapa saat lagi!</span></div></div>");
								Header('Location:'.base_url().'index.php/apps/cart_salesman/'.$this->uri->segment(3).'/'.$t_date.'/'.$header['TransDt']);
							}
						}else{
							//gagal input header
							$this->session->set_flashdata('cart_result',"<div id='notif' style='width:100%;height:100%;display:flex;position:fixed;left:0;top:0;'><div style='font-size:14px;color:#fff;padding:10px 25px;margin:auto;border-radius:2px;background-color:rgb(50,50,50);'>Terjadi kesalahan pada data inputan<br/><span style='font-size:11px;'>Mohon coba beberapa saat lagi!</span></div></div>");
							Header('Location:'.base_url().'index.php/apps/cart_salesman/'.$this->uri->segment(3).'/'.$t_date.'/'.$header['TransDt']);
						}
					}else{
						$this->session->set_flashdata('cart_result',"<div id='notif' style='width:100%;height:100%;display:flex;position:fixed;left:0;top:0;'><div style='font-size:14px;color:#fff;padding:10px 25px;margin:auto;border-radius:2px;background-color:rgb(50,50,50);'>Mohon Cek Kembali Semua Qty Setiap Produk<br/><span style='font-size:11px;'>Silahkan Coba Lagi</span></div></div>");
						Header('Location:'.base_url().'index.php/apps/cart_salesman/'.$this->uri->segment(3).'/'.$t_date.'/'.$header['TransDt']);
					}
				}else{
					//validasi tidak berjalan lancar
					$this->session->set_flashdata('cart_result',"<div id='notif' style='width:100%;height:100%;display:flex;position:fixed;left:0;top:0;'><div style='font-size:14px;color:#fff;padding:10px 25px;margin:auto;border-radius:2px;background-color:rgb(50,50,50);'>Notifikasi<br/><span style='font-size:11px;'>Mohon pastikan semua data terisi dengan baik dan benar!</span></div></div>");
					Header('Location:'.base_url().'index.php/apps/cart_salesman/'.$this->uri->segment(3).'/'.$t_date.'/'.$header['TransDt']);
				}
			}else{
				$this->load->view('global/top');
				$this->load->view('app_salesman/login');
				$this->load->view('global/bottom');
			}
		}
	}
	
	/*End of file apps.php*/
	/*Location:.application/controllers/apps.php*/