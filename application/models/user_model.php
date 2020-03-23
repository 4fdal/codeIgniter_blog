<?php

class user_model extends CI_Model
{
    
    public function create($data){
        $data['token_validate_user'] = md5(random_int(0, 9999999)) ;
        $query = $this->db->insert('user', $data);
        return $query ? true : false ;
    }

    public function find($id)
    {
        $user = $this->db->where('id', $id)->get('user')->row();
        return $user;
    }

    public function all()
    {
        $user = $this->db->get('user')->result();
        return $user;
    }

    public function update($id, $data)
    {
        $user = $this->db->update('user', $id, $data);
        return $user ? true : false;
    }

    public function delete($id)
    {
        $user = $this->db->delete('user', $id);
        return $user ? true : false;
    }

    // $this->db->from('blogs');
    // $this->db->where('name !=', $name);
    // $this->db->or_where('id >', $id);
}