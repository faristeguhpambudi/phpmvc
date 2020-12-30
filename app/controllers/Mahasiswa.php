<?php
class Mahasiswa extends Controller
{
	public function index()
	{
		$data["judul"] = "halaman mahasiswa";
		$data["mahasiswa"] = $this->model("Mahasiswa_model")->getAllMahasiswa();
		$this->view("templates/header", $data);
		$this->view("mahasiswa/index", $data);
		$this->view("templates/footer");
	}

	public function detail($id)
	{
		$data["judul"] = "detail mahasiswa";
		$data["mahasiswa"] = $this->model("Mahasiswa_model")->getMahasiswaById($id);
		$this->view("templates/header", $data);
		$this->view("mahasiswa/detail-mahasiswa", $data);
		$this->view("templates/footer");
	}

	public function tambah()
	{
		if ($this->model("Mahasiswa_model")->tambahDataMahasiswa($_POST) > 0) {
			Flasher::setFlash("berhasil", "ditambahkan", "success");
			header('Location: ' . BASEURL . '/mahasiswa');
			exit;
		} else {
			Flasher::setFlash("gagal", "ditambahkan", "danger");
			header('Location: ' . BASEURL . '/mahasiswa');
			exit;
		}
	}

	public function hapus($id)
	{
		if ($this->model("Mahasiswa_model")->hapusDataMahasiswa($id) > 0) {
			Flasher::setFlash("berhasil", "dihapus", "success");
			header('Location: ' . BASEURL . '/mahasiswa');
			exit;
		} else {
			Flasher::setFlash("gagal", "dihapus", "danger");
			header('Location: ' . BASEURL . '/mahasiswa');
			exit;
		}
	}

	public function getUbah()
	{
		echo json_encode($this->model("Mahasiswa_model")->getMahasiswaById($_POST["id"]));
	}

	public function ubah()
	{
		if ($this->model("Mahasiswa_model")->ubahDataMahasiswa($_POST) > 0) {
			Flasher::setFlash("berhasil", "diubah", "success");
			header('Location: ' . BASEURL . '/mahasiswa');
			exit;
		} else {
			Flasher::setFlash("gagal", "diubah", "danger");
			header('Location: ' . BASEURL . '/mahasiswa');
			exit;
		}
	}

	public function cari()
	{
		$data["judul"] = "halaman mahasiswa";
		$kataPencarian = $_POST["kataPencarian"];
		$data["mahasiswa"] = $this->model("Mahasiswa_model")->cariDataMahasiswa($kataPencarian);
		$this->view("templates/header", $data);
		$this->view("mahasiswa/index", $data);
		$this->view("templates/footer");
	}
}
