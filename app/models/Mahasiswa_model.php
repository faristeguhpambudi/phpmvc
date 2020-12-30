<?php
class Mahasiswa_model
{

	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

	public function getAllMahasiswa()
	{
		$this->db->query('SELECT * FROM mahasiswa');
		return $this->db->resultSet(); //menampilkan semua datanya

	}

	public function getMahasiswaById($id)
	{
		$this->db->query('SELECT * FROM mahasiswa WHERE id = :id');
		$this->db->bind('id', $id);
		return $this->db->single(); //menampilkan semua datanya	
	}

	public function tambahDataMahasiswa($data)
	{
		$query = "INSERT INTO mahasiswa 
				VALUES 
				('', :npm, :nama, :email, :jurusan, '')";
		$this->db->query($query);

		$this->db->bind('npm', $data["npm"]);
		$this->db->bind('nama', $data["nama"]);
		$this->db->bind('email', $data["email"]);
		$this->db->bind('jurusan', $data["jurusan"]);

		$this->db->execute();
		return $this->db->rowCount();
	}


	public function hapusDataMahasiswa($id)
	{
		$query = "DELETE FROM mahasiswa WHERE id = :id";
		$this->db->query($query);

		$this->db->bind('id', $id);

		$this->db->execute();
		return $this->db->rowCount();
	}

	public function ubahDataMahasiswa($data)
	{
		$query = "UPDATE mahasiswa SET
					nama = :nama,
					npm = :npm,
					email = :email,
					jurusan = :jurusan
					WHERE id = :id
				";
		$this->db->query($query);

		$this->db->bind('npm', $data["npm"]);
		$this->db->bind('nama', $data["nama"]);
		$this->db->bind('email', $data["email"]);
		$this->db->bind('jurusan', $data["jurusan"]);
		$this->db->bind('id', $data["id"]);

		$this->db->execute();
		return $this->db->rowCount();
	}

	public function cariDataMahasiswa($kataPencarian)
	{
		$query = "SELECT * FROM mahasiswa WHERE
					nama LIKE :kataPencarian
				";
		$this->db->query($query);
		$this->db->bind("kataPencarian", "%$kataPencarian%");

		$this->db->execute();
		return $this->db->resultSet();
	}
}
