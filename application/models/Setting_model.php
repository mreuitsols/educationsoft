<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Setting_model
 *
 * @author User
 */
class Setting_model extends CI_Model {

    public function saveSettings($setting_name, $setting_key, $value, $userID) {
        $updateOrInsert_data = array(
            'setting_name' => $setting_name,
            'setting_key' => $setting_key,
            'value' => $value,
            'user_id' => $userID
        );

        $query = $this->db->get_where('settings', array('setting_name' => $setting_name, 'setting_key' => $setting_key));
        $setting_id = (sizeof($query->result()) > 0) ? $query->row_array()['setting_id'] : NULL;

        if ($setting_id !== NULL) {
            $this->db->where('setting_name', $setting_name);
            $this->db->update('settings', $updateOrInsert_data);
        } else {
            $this->db->insert('settings', $updateOrInsert_data);
        }
    }

    public function select_setting($setting_name, $key) {
        $query = $this->db->get_where('settings', array('setting_name' => $setting_name, 'setting_key' => $key));


        $values = array('id' => $query->row_array()['setting_id'], 'value' => $query->row_array()['value']);

        $setting_value = (sizeof($query->result()) > 0) ? $values : 'Enter your text!';

        return $setting_value;
    }

}
