<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class m_tampilan extends CI_Model {
    private $table = 'ym_tampilan';

    public function get()
    {
        $this->datatables->select(
            'ID_tampilan,
            teks,
            image'
            ,FALSE
        );

        $this->datatables->from('ym_tampilan');
        
        $this->datatables->order_by('ID_tampilan', 'desc');
        $this->datatables->add_column(
            'identitas',
            'Gambar $1',
            'ID_tampilan'
        );
        $this->datatables->add_column(
            'gambar',
            '<img src="'.site_url('assets/uploads').'/$1">',
            'image'
        );

        $this->datatables->add_column(
            'action',
            '<a href="'.site_url('tampilan/edit').'/$1" data-id="$1" class="btn btn-xs btn-circle btn-primary btn-detail-answer" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil"></i></a> 
            <a href="'.site_url('tampilan/delete').'/$1" class="remove-record btn btn-xs btn-circle btn-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>',
            'ID_tampilan'
        );
        
        return $this->datatables->generate();
    }

    public function get_tampil()
    {
        $query = $this->db->query("SELECT * FROM ym_tampilan");
        return $query->result();
    }

    public function get_detail($id='')
    {
        $this->db->from('ym_tampilan');
        $this->db->where('ID_tampilan', $id);
        $data = $this->db->get();
        if ($data->num_rows() > 0) {
            $result = $data->row_array();

            $this->db->from('ym_tampilan');
            $this->db->where('ID_tampilan', $id);
            $detail = $this->db->get();
            if ($detail->num_rows() > 0) {
                $area = array();
                foreach ($detail->result_array() as $k => $v) {
                    $area[$v['id_area']] = array(
                        'actual' => $v['actual'],
                        'judge' => $v['judge'],
                        'id_transaksi_detail' => $v['id_transaksi_detail'],
                        'tgl_update' => $v['tgl_update'],
                        'name' => $v['name']
                    );
                }

                $result['area'] = $area;
            }else {
                $result['area'] = array();
            }

            return $result;
        }
    }

    public function get_tampilan()
    {
        $this->db->from('ym_tampilan');
        $this->db->order_by('ID_tampilan', 'DESC');
        $data = $this->db->get();
        if ($data->num_rows() > 0) {
            return $data->result_array();
        }else {
            return '';
        }
    }

    public function create($data)
    {
        $this->db->insert($this->table, $data);
    }

    public function update()
    {
        $id       = $this->input->post('id');
        $teks     = $this->input->post('teks');
        $image    = $this->input->post('gambar');

        $update_data = [
            'teks'  => $teks,
            'image' => $image,
        ];
        $this->db->where('ID_tampilan', $id);
        $this->db->update('ym_tampilan', $update_data);

        return true;
        
    }

    public function delete($id)
    {
        $this->db->where('ID_tampilan', $id);
        $this->db->delete('ym_tampilan');
        return true;
    }

}
        
 ?>