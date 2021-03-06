<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Json_audio extends CI_Controller {

	
	public function __construct()
	{
	    parent::__construct();
	    $this->load->model('Model_audio');
	    $this->load->helper('file');
	    $this->load->database();
	}

	public function index()
	{
	    $audio = $this->Model_audio->get_data_audio()->result(); 
	    $data['audio'] = $audio;

	    $response = array();
	    $posts = array();
	    foreach ($audio as $row) 
	    { 
	        $posts[] = array(
	            "id"         			=>  $row->id_audio,
	            "nama_masjid"       	=>  $row->nama_masjid,
	            "alamat_masjid"     	=>  $row->alamat_masjid,
	            "contact_masjid" 		=>  $row->contact_masjid,
	            "judul_audio"      	    =>  $row->judul_audio,
	            "des_audio"  	        =>  $row->des_audio,
	            "tgl_audio"     		=>  $row->tgl_audio,
	            "nama_ustadz"     	  	=>  $row->nama_ustadz,
	            "file_audio"     	    =>  base_url().'assets/audio/file/'.$row->file_audio
	        );
	    } 
	    $response['audio'] = $posts;
	    echo json_encode($response,TRUE);
	}
}