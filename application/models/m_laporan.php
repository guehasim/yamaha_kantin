<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_laporan extends CI_Model
{
    public function get_makan($period_awal, $period_akhir)
    {  

        $this->datatables->select(
            'a.ID_jadwal,
            a.tanggal,
            b.nama'
            ,FALSE
        );

        $this->datatables->from('ym_jadwal as a');
        $this->datatables->join('ym_menu as b','a.ID_menu = b.ID_menu');
        $this->datatables->where('b.jenis','0');

        if (!empty($period_awal) AND !empty($period_akhir)) {
            $this->datatables->where('DATE(a.tanggal) >=', date('Y-m-d', strtotime($period_awal)));
            $this->datatables->where('DATE(a.tanggal) <=', date('Y-m-d', strtotime($period_akhir)));
            // $this->db->where('a.tanggal BETWEEN "'. date('Y-m-d', strtotime($period_awal)). '" and "'. date('Y-m-d', strtotime($period_akhir)).'"');
        }
        
        // $this->datatables->order_by('a.tanggal', 'asc');
        
        return $this->datatables->generate();
    }

    public function get_minum($period_awal, $period_akhir)
    {  

        $this->datatables->select(
            'a.ID_jadwal,
            a.tanggal,
            b.nama',
            FALSE
        );

        $this->datatables->from('ym_jadwal as a');
        $this->datatables->join('ym_menu as b','a.ID_menu = b.ID_menu');
        $this->datatables->where('b.jenis','1');

        if (!empty($period_awal) AND !empty($period_akhir)) {
            $this->datatables->where('DATE(a.tanggal) >=', date('Y-m-d', strtotime($period_awal)));
            $this->datatables->where('DATE(a.tanggal) <=', date('Y-m-d', strtotime($period_akhir)));
        }
        
        $this->datatables->order_by('a.tanggal', 'asc');
        
        return $this->datatables->generate();
    }

    public function get_data_makan()
    {   
         $period_awal        = '2022-07-01';
        // $period_awal        = $this->input->post('period_awal');
        $period_akhir       = '2022-08-02';
        // $period_akhir       = $this->input->post('period_akhir');

        $query = $this->db->query("SELECT
                                        ym_jadwal.tanggal, 
                                        ym_menu.nama
                                    FROM
                                        ym_menu
                                        INNER JOIN
                                        ym_jadwal
                                        ON 
                                            ym_menu.ID_menu = ym_jadwal.ID_menu
                                    WHERE
                                        ym_menu.jenis = '0' AND
                                        ym_jadwal.tanggal BETWEEN '$period_awal' AND '$period_akhir' ");

        return $query->result();
    }

    public function get_data_minum()
    {   
        $period_awal        = '2022-07-01';
        // $period_awal        = $this->input->post('period_awal');
        $period_akhir       = '2022-08-02';
        // $period_akhir       = $this->input->post('period_akhir');

        $query = $this->db->query("SELECT
                                        ym_jadwal.tanggal, 
                                        ym_menu.nama
                                    FROM
                                        ym_menu
                                        INNER JOIN
                                        ym_jadwal
                                        ON 
                                            ym_menu.ID_menu = ym_jadwal.ID_menu
                                    WHERE
                                        ym_menu.jenis = '1' AND
                                        ym_jadwal.tanggal BETWEEN '$period_awal' AND '$period_akhir' ");

        return $query->result();
    }

    public function get_detail()
    {
        $id = $this->input->post('id');
        $this->db->from('ym_transaksi');
        $this->db->where('id_transaksi', $id);
        $data = $this->db->get();
        if ($data->num_rows() > 0) {
            $data = $data->row_array();

            $this->db->from('ym_transaksi_detail as a');
            $this->db->join('ym_area as b', 'a.id_area = b.id_area', 'left');
            $this->db->join('ym_users as c', 'c.id_user = a.id_user', 'left');
            $this->db->where('a.id_transaksi', $id);
            $this->db->order_by('b.nourut', 'asc');
            $detail = $this->db->get();
            if ($detail->num_rows() > 0) {
                $data['detail'] = $detail->result_array();
            }


            return json_encode($data);
        }else {
            return false;
        }
    }

    public function get_print_detail($id)
    {
        $this->db->from('ym_transaksi');
        $this->db->where('id_transaksi', $id);
        $data = $this->db->get();
        if ($data->num_rows() > 0) {
            $data = $data->row_array();

            $this->db->from('ym_transaksi_detail as a');
            $this->db->join('ym_area as b', 'a.id_area = b.id_area', 'left');
            $this->db->join('ym_users as c', 'c.id_user = a.id_user', 'left');
            $this->db->where('a.id_transaksi', $id);
            $this->db->order_by('b.nourut', 'asc');
            $detail = $this->db->get();
            if ($detail->num_rows() > 0) {
                $data['detail'] = $detail->result_array();
            }


            return $data;
        }else {
            return false;
        }
    }

    public function delete($id_transaksi='')
    {
        if (!empty($id_transaksi)) {
            $this->db->where('id_transaksi', $id_transaksi);
            $this->db->delete('ym_transaksi');
            return true;
        }else {
            return false;
        }
    }
}