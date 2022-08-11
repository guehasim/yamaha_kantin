<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_jadwal extends CI_Model
{

    public function get_tampilan()
    {
        $this->datatables->select(
            'a.ID_jadwalTampilan,
            a.tanggal AS tanggal,
            a.ID_tampilan,
            b.teks,
            b.image'
            ,FALSE
        );

        $this->datatables->from('ym_jadwaltampilan as a');
        $this->datatables->join('ym_tampilan as b', 'a.ID_Tampilan = b.ID_tampilan');
        $this->datatables->order_by('a.ID_Tampilan','DESC');
        
        // $this->datatables->add_column(
        //     't_tanggal',
        //     ''.date('d-m-Y', strtotime(str_replace('/', '-','$1'))).'',
        //     'tanggal'
        // );
        $this->datatables->add_column(
            'action',
            '<a data-id="$1" href="javascript:void(0)" class="btn btn-detail-jadwal-tampil btn-xs btn-circle btn-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil"></i></a> 
            <a href="'.site_url('jadwal/delete_tampil').'/$1" class="remove-record btn btn-xs btn-circle btn-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>',
            'ID_jadwalTampilan'
        );
        
        return $this->datatables->generate();
    }

    public function get_makan()
    {
        $this->datatables->select(
            'a.ID_jadwal,
            a.tanggal,
            b.nama'
            ,FALSE
        );

        $this->datatables->from('ym_jadwal as a');
        $this->datatables->join('ym_menu as b', 'a.ID_menu = b.ID_menu');
        $this->datatables->where('b.jenis','0');
        $this->datatables->add_column(
            'action',
            '<a data-id="$1" href="javascript:void(0)" class="btn btn-detail-jadwal-makan btn-xs btn-circle btn-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil"></i></a> 
            <a href="'.site_url('jadwal/delete').'/$1" class="remove-record btn btn-xs btn-circle btn-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>',
            'ID_jadwal'
        );
        
        return $this->datatables->generate();
    }

    public function get_minum()
    {
        $this->datatables->select(
            'ID_jadwal,
            tanggal,
            nama'
            ,FALSE
        );

        $this->datatables->from('ym_jadwal');
        $this->datatables->join('ym_menu', 'ym_jadwal.ID_menu = ym_menu.ID_menu');
        $this->datatables->where('jenis','1');
        $this->datatables->add_column(
            'action',
            '<a data-id="$1" href="javascript:void(0)" class="btn btn-detail-jadwal-minum btn-xs btn-circle btn-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil"></i></a> 
            <a href="'.site_url('jadwal/delete').'/$1" class="remove-record btn btn-xs btn-circle btn-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>',
            'ID_jadwal'
        );
        
        return $this->datatables->generate();
    }

    public function create()
    {
        $tgl    = $this->input->post('tanggal');
        $menu   = $this->input->post('menu');
        $user   = 1;

        if (!empty($menu)) {
            $this->db->insert('ym_jadwal', [
                'ID_jadwal' => '',
                'tanggal'   => $tgl,
                'ID_menu'   => $menu,
                'ID_user'   => $user
            ]);
            
            return true;
        } else {
            return false;
        }
    }

    public function create_tampil()
    {
        $tgl        = $this->input->post('tanggal');
        $tampil     = $this->input->post('tampil');

        if (!empty($tampil)) {
            $this->db->insert('ym_jadwaltampilan', [
                'ID_jadwalTampilan' => '',
                'tanggal'           => $tgl,
                'ID_tampilan'       => $tampil
            ]);
            
            return true;
        } else {
            return false;
        }
    }

    public function update()
    {
        $id             = $this->input->post('id');
        $tgl            = $this->input->post('tgl');
        $menu           = $this->input->post('menu');

        $update_data = [
            'tanggal'   => $tgl,
            'ID_menu'   => $menu,
            'ID_user'   => $user
        ];
        
        $this->db->where('ID_jadwal', $id);
        $this->db->update('ym_jadwal', $update_data);

        return true;
    }

     public function update_tampil()
    {
        $id             = $this->input->post('id');
        $tgl            = $this->input->post('tgl');
        $tampil           = $this->input->post('tampil');

        $update_data = [
            'tanggal'       => $tgl,
            'ID_tampilan'   => $tampil
        ];
        
        $this->db->where('ID_jadwalTampilan', $id);
        $this->db->update('ym_jadwaltampilan', $update_data);

        return true;
    }

    public function get_detail($id)
    {
        $this->db->from('ym_jadwal');
        $this->db->where('ID_jadwal', $id);
        $data = $this->db->get();
        if ($data->num_rows() > 0) {
            return $data->row_array();
        } else {
            return false;
        }
    }

    public function get_detail_tampil($id)
    {
        $this->db->from('ym_jadwaltampilan');
        $this->db->where('ID_jadwalTampilan', $id);
        $data = $this->db->get();
        if ($data->num_rows() > 0) {
            return $data->row_array();
        } else {
            return false;
        }
    }

    public function delete_tampil($id)
    {
        if (!empty($id)) {
            try {
                $this->db->where('ID_jadwalTampilan', $id);
                $this->db->delete('ym_jadwaltampilan');
                return true;
            } catch (Exception $e) {
                return json_encode(array('error' => 'Data jadwal ini tidak dapat dihapus karena berelasi dengan data lain'));
            }
        }

        return false;
    }

    public function delete($id)
    {
        if (!empty($id)) {
            try {
                $this->db->where('ID_jadwal', $id);
                $this->db->delete('ym_jadwal');
                return true;
            } catch (Exception $e) {
                return json_encode(array('error' => 'Data jadwal ini tidak dapat dihapus karena berelasi dengan data lain'));
            }
        }

        return false;
    }
}
