<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SubkriteriaModel extends CI_Model
{
   public function getByKriteria($id_kriteria)
   {
      return $this->db->get_where('tb_sub_kriteria', ['id_kriteria' => $id_kriteria])->result_array();
   }

   public function getById($id_sub_kriteria)
   {
      return $this->db->get_where('tb_sub_kriteria', ['id_sub_kriteria' => $id_sub_kriteria])->row_array();
   }

   public function insert($data)
   {
      $this->db->insert('tb_sub_kriteria', $data);
   }

   public function update($id_sub_kriteria, $data)
   {
      $this->db->where(['id_sub_kriteria' => $id_sub_kriteria]);
      $this->db->update('tb_sub_kriteria', $data);
   }

   public function delete($id_sub_kriteria)
   {
      $this->db->where(['id_sub_kriteria' => $id_sub_kriteria]);
      $this->db->delete('tb_sub_kriteria');
   }
}
