<?php

class Baju_model extends CI_Model {
    public function tampilData(){
        return $this -> db -> get ('baju');
    }
    
    public function detailData($kb){
        return $this -> db -> get_where ('baju', ['KodeBaju' => $kb]);
    }

    public function addData($data){
        return $this -> db -> insert('baju', $data);
    }

    public function editData($kb, $data){
        return $this -> db -> update('baju', $data, ['KodeBaju' => $kb]);
    }

    public function deleteData($kb){
        return $this -> db -> delete('baju', ['KodeBaju' => $kb]);
    }

    public function tampilJoin(){
        $this -> db -> select('*');
        $this -> db -> from('baju');
        $this -> db -> join('kategori', 'baju.Kategori = kategori.IDKategori', 'left');
        $query = $this -> db -> get();

        return $query;
    }

    public function tampilKategori(){
        return $this -> db -> get('kategori');
    }
    
    public function detailJoin($kb){
        $this -> db -> select('*');
        $this -> db -> from('baju');
        $this -> db -> join('kategori', 'baju.Kategori = kategori.IDKategori', 'left');
        $this -> db -> where('KodeBaju', $kb);
        $query = $this -> db -> get();

        return $query;
    }
    
    public function tampilJoinWhere($kb){
        $this -> db -> select('*');
        $this -> db -> from('baju');
        $this -> db -> join('kategori', 'baju.Kategori = kategori.IDKategori', 'left');
        $this -> db -> like('Judul', $kb);
        $query = $this -> db -> get();

        return $query;
    }
}
