<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang_model extends CI_Model {
    function data_barang()
    {
        $this->db->select('*');
        $this->db->from('data_barang');
        $this->db->join('data_kategori', 'data_kategori.pk_kategori_id = data_barang.fk_kategori_id');
        $this->db->join('data_satuan', 'data_satuan.pk_satuan_id = data_barang.fk_satuan_id');
        return $query = $this->db->get()->result();
    }
    function kategori()
    {
        return $this->db->get('data_kategori')->result();
    }
    function satuan()
    {
        return $this->db->get('data_satuan')->result();
    }
    function simpan_barang()
    {
        $nama_barang = $this->input->post('nama_barang');
        $nama_ketegori = $this->input->post('nama_ketegori');
        $nama_satuan = $this->input->post('nama_satuan');
        $harga = $this->input->post('harga');
        $stok = $this->input->post('stok');
        $data = array(
            'nama_barang' => $nama_barang,
            'fk_kategori_id' => $nama_ketegori,
            'fk_satuan_id' => $nama_satuan,
            'harga' => $harga,
            'stok' => $stok
        );
        $this->db->insert('data_barang',$data);
    }
    function hapusbarang($id)
    {
        $this->db->delete('data_barang', array('pk_barang_id' => $id));
    }
    function data_kategori()
    {
        return $this->db->get('data_kategori')->result();
    }
    function hapuskategori($id)
    {
        $this->db->delete('data_kategori', array('pk_kategori_id' => $id));
    }
    function data_satuan()
    {
        return $this->db->get('data_satuan')->result();
    }
    function hapussatuan($id)
    {
        $this->db->delete('data_satuan', array('pk_satuan_id' => $id));
    }
}