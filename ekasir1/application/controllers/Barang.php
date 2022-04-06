<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {
    function __construct()
    {
        parent::__construct();

        $this->load->model('Barang_model');
    }
    function data_barang()
    {
        $data['barang'] = $this->Barang_model->data_barang();
        $this->load->view('Home/basetemplate');
        $this->load->view('Barang/data_barang', $data);   
    }
    function tambah_barang()
    {
        $data['kategori'] = $this->Barang_model->kategori();
        $data['satuan'] = $this->Barang_model->satuan();
        $this->load->view('Barang/tambah_barang',$data);
    }
    function simpan_barang()
    {
        $this->Barang_model->simpan_barang();
        redirect('Barang/data_barang');
    }       
    function hapusbarang($id)
    {
        $this->Barang_model->hapusbarang($id);
        redirect('Barang/data_barang');
    }
    function data_kategori()
    {
        $data['kategori'] = $this->Barang_model->data_kategori();
        $this->load->view('Home/basetemplate');
        $this->load->view('Barang/data_kategori', $data);
    }
    function hapuskategori($id)
    {
        $this->Barang_model->hapuskategori($id);
        redirect('Barang/data_kategori');
    }
    function data_satuan()
    {
        $data['satuan'] = $this->Barang_model->data_satuan();
        $this->load->view('Home/basetemplate');
        $this->load->view('Barang/data_satuan', $data);
    }
    function hapussatuan($id)
    {
        $this->Barang_model->hapussatuan($id);
        redirect('Barang/data_satuan');
    }
}