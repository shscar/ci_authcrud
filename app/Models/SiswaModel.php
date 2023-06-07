<?php

namespace App\Models;

use CodeIgniter\Model;

class SiswaModel extends Model
{
    // protected $DBGroup          = 'default';
    protected $table            = 'siswa';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nisn', 'nama', 'jenis_kelamin', 'kelas', 'jurusan', 'no_tlp', 'image'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function search($keyword, $column)
    {
        if ($column === 'Semua' || empty($column)) {
            return $this->like('nisn', $keyword)
                ->orLike('nama', $keyword)
                ->orLike('jenis_kelamin', $keyword)
                ->orLike('kelas', $keyword)
                ->orLike('jurusan', $keyword)
                ->orLike('no_tlp', $keyword)
                ->findAll();
        } else {
            return $this->like($column, $keyword)->findAll();
        }
    } 
    
    // public function search($keyword = '', $column = '', $current_page = 1, $per_page = 6)
    // {
    //     $query = $this->table($this->table);
        
    //     if (!empty($keyword)) {
    //         if (empty($column) || $column === 'Semua') {
    //             $query = $query->groupStart()
    //                            ->like('nisn', $keyword)
    //                            ->orLike('nama', $keyword)
    //                            ->orLike('jenis_kelamin', $keyword)
    //                            ->orLike('kelas', $keyword)
    //                            ->orLike('jurusan', $keyword)
    //                            ->orLike('no_tlp', $keyword)
    //                            ->groupEnd();
    //         } else {
    //             $query = $query->like($column, $keyword);
    //         }
    //     }
        
        // $result = [
        //     'siswa'    => $query->paginate($per_page, $this->table, $current_page),
        //     'pager'     => $this->pager,
        //     'numbering' => ($per_page * $current_page) - ($per_page - 1)
        // ];

        // return $result;
    // }

    // public function search(string $keyword = '', int $current_page = 1,int $per_page = 6)
    // {
    //     if($keyword){
    //        $lantai = $this->table($this->table)
    //         ->like('lantai', $keyword)
    //         ->orLike('keterangan', $keyword);
    //     } else {
    //         $lantai = $this;
    //     }
    //     return [
    //         'lantai'  => $lantai->paginate($this->per_page, $this->table),
    //         'pager'   => $this->pager,
    //         'numbering' => ($per_page * $current_page) - ($this->per_page - 1)
    //     ];
    // }

    // public function search(string $keyword = '', $column, int $current_page = 1, int $per_page = 6)
    // {

    //     if ($column === 'Semua' || empty($column)) {
    //         $builder->groupStart()
    //             ->like('nisn', $keyword)
    //             ->orLike('nama', $keyword)
    //             ->orLike('jenis_kelamin', $keyword)
    //             ->orLike('kelas', $keyword)
    //             ->orLike('jurusan', $keyword)
    //             ->orLike('no_tlp', $keyword)
    //             ->groupEnd();
    //     } else {
    //         $this->like($column, $keyword);
    //     }

    //     return [
    //         'lantai'  => $this->getResult(),
    //         'pager'   => $this->pager,
    //         'numbering' => ($per_page * $current_page) - ($this->per_page - 1)
    //     ];
    // }

}
