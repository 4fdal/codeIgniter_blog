<?php

class artikel_model extends CI_Model
{
    public function __construct(){
        $this->load->model('user_model');
    }
    public function create($data)
    {
        $query = $this->db->insert('artikel', $data);
        return $query ? true : false;
    }

    public function find($id){
        $artikel = $this->db->where('id', $id)->get('artikel')->row();
        $artikel->user = $this->user_model->find($artikel->id_user);
        return $artikel ;
    }

    public function all(){
        $artikel = $this->db->get('artikel')->result();
        $artikel_temp = [] ;
        for($i=0; $i<count($artikel); $i++){
            $artikel_temp[$i] = $artikel[$i];
            $artikel_temp[$i]->user = $this->user_model->find($artikel[$i]->id_user);
        }
        return (Object) $artikel_temp ;
    }

    public function update($id, $data){
        $artikel = $this->db->update('artikel', $data, ['id' => $id]);
        return $artikel ? true : false ;
    }

    public function delete($id){
        $artikel = $this->db->delete('artikel', ['id' => $id]);
        return $artikel ? true : false ;
    }

    // $this->db->from('blogs');
    // $this->db->where('name !=', $name);
    // $this->db->or_where('id >', $id);
}
