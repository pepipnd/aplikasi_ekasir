<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_model extends CI_Model {
    function data_transaksi()
    {
        return $this->db->get('data_transaksi')->result();
    }
    function simpan_transaksi()
    {
        $tanggal_transaksi = $this->input->post('tanggal_transaksi');
        $tipe_konsumen = $this->input->post('tipe_konsumen');
        $member_id = $this->input->post('member_id');
        $data = array(
            'tanggal_transaksi' => $tanggal_transaksi,
            'tipe_konsumen' => $tipe_konsumen,
            'fk_member_id' => $member_id
        );
        $this->db->insert('data_transaksi', $data);
        return $this->db->insert_id();
    }
    function caridata($id)
    {
        return $this->db->get_where('data_transaksi', array('pk_transaksi_id' => $id))->result();
    }
    function caridetail($id)
    {
        $this->db->select('*');
        $this->db->from('detail_transaksi');
        $this->db->join('data_barang', 'data_barang.pk_barang_id = detail_transaksi.fk_barang_id');
        $this->db->join('data_satuan', 'data_barang.fk_satuan_id = data_satuan.pk_satuan_id');
        $this->db->where('fk_transaksi_id', $id);
        return $query = $this->db->get()->result();
    }
    function datamember($id)
    {
        $this->db->select('*');
        $this->db->from('data_transaksi');
        $this->db->join('data_member', 'data_member.pk_member_id = data_transaksi.fk_member_id');
        $this->db->where('pk_transaksi_id', $id);
        return $query = $this->db->get()->result();
    }
    function namabarang()
    {
        return $this->db->get('data_barang')->result();
    }
    function save_detail()
    {
        $trs_id = $this->input->post('transaksi_id');
        $barang = $this->input->post('barang');
        $kuantitas = $this->input->post('kuantitas');

        //cara agar tambah data tidak melebihi stok
        $query = $this->db->query("SELECT * FROM data_barang where pk_barang_id = $barang ");
        $hasil = $query->result();
        $qty = $hasil[0]->stok;
        //akhir cara tambah data tidak melebihi stok

        if($kuantitas <= $qty){
            
            //mencari data  detail transaksi dengan kode barang tertentu
            $query = $this->db->query("SELECT * FROM detail_transaksi where fk_transaksi_id = $trs_id and fk_barang_id = $barang ");
            $hasil = $query->result();
            $hitung = $query->num_rows();

            $qty = $hasil[0]->kuantitas;
            $qtyakhir = $kuantitas+$qty;

            if($hitung > 0){
                // kalo misalkan data barang sudah ada
                $data = array(
                    'kuantitas' => $qtyakhir
                );

                $this->db->where('fk_transaksi_id', $trs_id);
                $this->db->where('fk_barang_id', $barang);
                $this->db->update('detail_transaksi', $data);

                $query = $this->db->query("SELECT * FROM data_barang where pk_barang_id = $barang ");
                $hasil = $query->result();
                $stok = $hasil[0]->stok;
                $penguranganstok = $stok-$kuantitas;

                $data = array(
                    'stok' => $penguranganstok
                );
                $this->db->where('pk_barang_id', $barang);
                $this->db->update('data_barang', $data);
            }else{
                //kalo misalkan data barang belum ada
                $data = array(
                    'fk_transaksi_id' => $trs_id,
                    'fk_barang_id' => $barang,
                    'kuantitas' => $kuantitas
                );
                $this->db->insert('detail_transaksi', $data);

                $query = $this->db->query("SELECT * FROM data_barang where pk_barang_id = $barang ");
                $hasil = $query->result();
                $stok = $hasil[0]->stok;
                $penguranganstok = $stok-$kuantitas;

                $data = array(
                    'stok' => $penguranganstok
                );
                $this->db->where('pk_barang_id', $barang);
                $this->db->update('data_barang', $data);
            }
        }
        return $trs_id;
    }
    function save_print()
    {
        $trs_id = $this->input->post('transaksi_id');
        $bayar = $this->input->post('bayar');
        $data = array(
            'bayar' => $bayar
        );
        $this->db->where('pk_transaksi_id', $trs_id);
        $this->db->update('data_transaksi', $data);

        return $trs_id;
    }
    function hapusdetail($id)
    {
        //mencari data barang
        $query = $this->db->query("SELECT * FROM detail_transaksi a left join data_barang b on a.fk_barang_id = b.pk_barang_id
         where pk_detail_transaksi_id = $id ");
        $hasil = $query->result();
        $barang = $hasil[0]->fk_barang_id;
        $stok = $hasil[0]->stok;
        $kuantitas = $hasil[0]->kuantitas;
        $tambah = $stok+$kuantitas;

        $data = array(
            'stok' => $tambah
        );
        $this->db->where('pk_barang_id', $barang);
        $this->db->update('data_barang', $data);
            
        $this->db->delete('detail_transaksi', array('pk_detail_transaksi_id' => $id));
    }
    function hapustransaksi($id)
    {
        $this->db->delete('detail_transaksi', array('fk_transaksi_id' => $id));
        $this->db->delete('data_transaksi', array('pk_transaksi_id' => $id));

    }
    function data_member()
    {
        return $this->db->get('data_member')->result();
    }
}