<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Baju extends CI_Controller{
    public function __construct(){
        parent :: __construct();
        $this->load->model('Baju_model');
    }

    public function index(){
        $judul = $this -> input -> get('judul');
        if ($judul){
            $databaju = $this -> Baju_model -> tampilJoinWhere($judul) -> result();
        } else {
            $databaju = $this -> Baju_model -> tampilJoin() -> result();
        }

        $data = [
            'judul' => 'Data Baju',
            'subjudul' => 'List Data Baju',
            'databaju'=> $databaju];
        //$this -> load -> view('v_baju', $data);
        $this -> template -> load('pages/index', 'data_baju/v_baju', $data);
    }

    public function detail($kb){
        $data = [
            'judul' => 'Data Baju',
            'subjudul' => 'Detail Data Baju',
            'databaju' => $this -> Baju_model -> detailJoin($kb)->row()];
        $this -> template -> load('pages/index', 'data_baju/v_detailbaju', $data);
    }

    public function add(){
        //proses simpan data
        if (isset($_POST['simpan'])){
            $data = [
                'KodeBaju' => $this->input->post('kd'),
                'Judul' => $this->input->post('jdl'),
                'Kategori' => $this->input->post('ktgr'),
                'Harga' => $this->input->post('hrg'),
                'Deskripsi' => $this->input->post('desk'),
            ];
            $this -> Baju_model -> addData($data);
            $this -> session -> set_flashdata ('pesan', '<div class="alert alert-success">Data Berhasil Ditambahkan</div>');
            redirect('baju/add');
        }
        //data tersimpan
        
        $data = [
            'judul' => 'Data Baju',
            'subjudul' => 'Tambah Data Baju',
            'datakategori' => $this -> Baju_model -> tampilKategori() -> result(),
        ];
        $this -> template -> load('pages/index', 'data_baju/v_addbaju', $data);
    }

    public function edit($kb){
        //proses edit data
        if (isset($_POST['ubah'])){
            $data = [
                'Judul' => $this->input->post('jdl'),
                'Kategori' => $this->input->post('ktgr'),
                'Harga' => $this->input->post('hrg'),
                'Deskripsi' => $this->input->post('desk'),
            ];
            $this -> Baju_model -> editData($kb, $data);
            $this -> session -> set_flashdata ('pesan', '<div class="alert alert-success">Data Berhasil Diubah</div>');
            redirect('baju');
        }

        $data = [
            'judul' => 'Data Baju',
            'subjudul' => 'Edit Data Baju',
            'databaju' => $this -> Baju_model -> detailData($kb)->row(),
            'datakategori' => $this -> Baju_model -> tampilKategori()->result()];
        $this -> template -> load('pages/index', 'data_baju/v_editbaju', $data);
    }

    public function delete($kb){
        $this -> Baju_model -> deleteData($kb);
        $this -> session -> set_flashdata ('pesan', '<div class="alert alert-success">Data Berhasil Dihapus</div>');
            redirect('baju');
    }

    public function formUpload($kb){
        //proses upload
        if (isset($_POST['proses'])){
            array_map('unlink', glob("./uploads/$kb.*")); //remove file

            $config ['upload_path'] = './uploads/';
            $config ['allowed_types'] = 'gif|jpg|jpeg|png';
            $config ['file_name'] = $kb;
            $config ['max_size'] = 2000;
            //$config ['max_width'] = 1024;
            //$config ['max_height'] = 768;
            
            $this -> load -> library ('upload', $config);

            if( ! $this -> upload -> do_upload('gambar')){
                $upload_data = $this -> upload -> data();
                if(! $upload_data ['allowed_types']){
                    $this -> session -> set_flashdata('pesan', '<div class="alert alert-danger">Tipe File tidak sesuai</div>');
                    redirect('baju/formupload/'.$kb);
                } elseif (! $upload_data ['max_size']){
                    $this -> session -> set_flashdata('pesan', '<div class="alert alert-danger">Ukuran File belum sesuai</div>');
                    redirect('baju/formupload/'.$kb);
                }
            } else {
                $upload_data = $this -> upload -> data();
                $data = [
                    'Gambar' => $upload_data['file_name']];
                $update = $this -> Baju_model -> editData($kb, $data);
                if($update){
                    $this -> session -> set_flashdata ('pesan', '<div class="alert alert-success">Gambar Berhasil Diupload</div>');
                    redirect('baju');
                }
            }
        }

        //file view
        $data = [
            'judul' => 'Data Baju',
            'subjudul' => 'Upload Data Baju',
            'databaju' => $this -> Baju_model -> detailData($kb)->row()];
        $this -> template -> load('pages/index', 'data_baju/v_uploadbaju', $data);
    }
}