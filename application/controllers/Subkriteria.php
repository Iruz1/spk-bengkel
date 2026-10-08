<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Subkriteria extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      is_logged_in();
      is_admin();
      $this->load->model('SubkriteriaModel', 'model');
   }

   public function index($id_kriteria)
   {
      $kriteria = $this->db->get_where('tb_kriteria', ['id_kriteria' => $id_kriteria])->row_array();
      if (!$kriteria) {
         redirect('admin/kriteria');
      }

      $data['kriteria'] = $kriteria;
      $data['data'] = $this->model->getByKriteria($id_kriteria);

      $this->load->view('templates/header');
      $this->load->view('subkriteria/index', $data);
      $this->load->view('templates/footer');
   }

   public function add($id_kriteria)
   {
      $kriteria = $this->db->get_where('tb_kriteria', ['id_kriteria' => $id_kriteria])->row_array();
      if (!$kriteria) {
         redirect('admin/kriteria');
      }

      $data['kriteria'] = $kriteria;

      $this->load->view('templates/header');
      $this->load->view('subkriteria/add', $data);
      $this->load->view('templates/footer');
   }

   public function add_data()
   {
      $id_kriteria = $this->input->post('id_kriteria');
      $nama_sub_kriteria = trim($this->input->post('nama_sub_kriteria', TRUE));
      $bobot_sub_kriteria = $this->input->post('bobot_sub_kriteria');

      if ($nama_sub_kriteria == '' || $bobot_sub_kriteria == '') {
         $this->session->set_flashdata('message', '<div class="alert alert-danger col-md-8" role="alert">Nama sub kriteria dan bobot wajib diisi!</div>');
         redirect('admin/kriteria/subkriteria/add/' . $id_kriteria);
      }

      $data = [
         'id_kriteria' => $id_kriteria,
         'nama_sub_kriteria' => $nama_sub_kriteria,
         'bobot_sub_kriteria' => $bobot_sub_kriteria
      ];

      $this->model->insert($data);

      $this->session->set_flashdata('message', '<div class="alert alert-success col-md-8" role="alert">Data sub kriteria berhasil ditambah!</div>');
      redirect('admin/kriteria/subkriteria/' . $id_kriteria);
   }

   public function edit($id_kriteria, $id_sub_kriteria)
   {
      $kriteria = $this->db->get_where('tb_kriteria', ['id_kriteria' => $id_kriteria])->row_array();
      $subkriteria = $this->model->getById($id_sub_kriteria);

      if (!$kriteria || !$subkriteria) {
         redirect('admin/kriteria');
      }

      $data['kriteria'] = $kriteria;
      $data['data'] = $subkriteria;

      $this->load->view('templates/header');
      $this->load->view('subkriteria/edit', $data);
      $this->load->view('templates/footer');
   }

   public function update()
   {
      $id_kriteria = $this->input->post('id_kriteria');
      $id_sub_kriteria = $this->input->post('id_sub_kriteria');
      $nama_sub_kriteria = trim($this->input->post('nama_sub_kriteria', TRUE));
      $bobot_sub_kriteria = $this->input->post('bobot_sub_kriteria');

      if ($nama_sub_kriteria == '' || $bobot_sub_kriteria == '') {
         $this->session->set_flashdata('message', '<div class="alert alert-danger col-md-8" role="alert">Nama sub kriteria dan bobot wajib diisi!</div>');
         redirect('admin/kriteria/subkriteria/edit/' . $id_kriteria . '/' . $id_sub_kriteria);
      }

      $data = [
         'id_kriteria' => $id_kriteria,
         'nama_sub_kriteria' => $nama_sub_kriteria,
         'bobot_sub_kriteria' => $bobot_sub_kriteria
      ];

      $this->model->update($id_sub_kriteria, $data);

      $this->session->set_flashdata('message', '<div class="alert alert-success col-md-8" role="alert">Data sub kriteria berhasil diubah!</div>');
      redirect('admin/kriteria/subkriteria/' . $id_kriteria);
   }

   public function delete($id_kriteria, $id_sub_kriteria)
   {
      $this->model->delete($id_sub_kriteria);

      $this->session->set_flashdata('message', '<div class="alert alert-success col-md-8" role="alert">Data sub kriteria berhasil dihapus!</div>');
      redirect('admin/kriteria/subkriteria/' . $id_kriteria);
   }
}
