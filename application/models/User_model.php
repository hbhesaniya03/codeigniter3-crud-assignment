<?php
class User_model extends CI_Model
{
    public function getStates()
    {
        return $this->db->get('states')->result();
    }

    public function insertUser($data)
    {
        return $this->db->insert('users',$data);
    }

    public function getUsers()
    {
        $this->db->select('users.*, states.state_name');
        $this->db->from('users');
        $this->db->join('states','states.id = users.state_id');

        return $this->db->get()->result();
    }

    public function getUserById($id)
    {
        return $this->db->get_where('users',['id'=>$id])->row();
    }

    public function updateUser($id,$data)
    {
        $this->db->where('id',$id);
        return $this->db->update('users',$data);
    }

    public function deleteUser($id)
    {
        $this->db->where('id',$id);
        return $this->db->delete('users');
    }
}