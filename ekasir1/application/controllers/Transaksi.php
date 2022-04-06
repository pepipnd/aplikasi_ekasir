<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {
    function __construct()
    {
        parent::__construct();

        $this->load->model('Transaksi_model');
    }
    function data_transaksi()
    {
        $data['transaksi'] = $this->Transaksi_model->data_transaksi();
        $this->load->view('Home/basetemplate');
        $this->load->view('Transaksi/data_transaksi', $data);   
    }
    function tambah_transaksi()
    {
        $this->load->view('Home/basetemplate');

        $this->load->view('Transaksi/tambah_transaksi');
    }
    function simpan_transaksi()
    {
        $data = $this->Transaksi_model->simpan_transaksi();
        redirect('Transaksi/detail_transaksi/'.$data);
    }
    function detail_transaksi($id)
    {
        $this->load->view('Home/basetemplate');

        $data['transaksi'] = $this->Transaksi_model->caridata($id);
        $data['datamember'] = $this->Transaksi_model->datamember($id);
        $data['hasil'] = $this->Transaksi_model->caridetail($id);
        $data['barang'] = $this->Transaksi_model->namabarang();

        $this->load->view('Transaksi/detail_transaksi', $data);
    }
    function tambah_detail()
    {
        $data = $this->Transaksi_model->save_detail();
        redirect('Transaksi/detail_transaksi/'.$data);
    }
    function saveprint_transaksi()
    {
        $id = $this->Transaksi_model->save_print();
        $data['transaksi'] = $this->Transaksi_model->caridata($id);
        $data['datamember'] = $this->Transaksi_model->datamember($id);
        $data['hasil'] = $this->Transaksi_model->caridetail($id);
        $data['barang'] = $this->Transaksi_model->namabarang();

        $this->load->view('Transaksi/print_detail', $data);
    }
    function hapusdetail($id,$trs_id)
    {
        $this->Transaksi_model->hapusdetail($id);
        redirect('Transaksi/detail_transaksi/'.$trs_id);
    }
    function hapustransaksi($id)
    {
        $this->Transaksi_model->hapustransaksi($id);
        redirect('Transaksi/data_transaksi');
    }
    function data_member()
    {
        $data['datamember'] = $this->Transaksi_model->data_member();
        $this->load->view('Home/basetemplate');
        $this->load->view('Transaksi/data_member', $data);
    }
}