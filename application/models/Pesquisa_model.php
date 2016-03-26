<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
Class Pesquisa_model extends CI_Model {
  public function pesquisa($maximo, $inicio, $join, $like, $get, $orderBy){
    if($maximo != null){
      $this->db->limit($maximo, $inicio);
    }
    if($join != null){
      for ($i=0; $i < count($join); $i++) {
        $this->db->join($join[$i]['tabela'], $join[$i]['campo'], $join[$i]['tipo']);
      }
    }
    if($like != null && is_array($like['campo'])){
      for($i=0; $i < count($like['campo']); $i++){
        if($i > 0){
          $this->db->or_like('lower(cast(' . $like['campo'][$i] .' as text))', $like['entrada'], 'both');
        } else {
          $this->db->like('lower(cast(' . $like['campo'][$i] .' as text))', $like['entrada'], 'both');
        }
      }
    } elseif($like != null && $like['campo'] != 'dt_nasc'){
        $this->db->like('cast(lower(' . $like['campo'] .') as text)', $like['entrada'], 'both');
    } elseif ($like != null && $like['campo'] == 'dt_nasc'){
      $this->db->where($like['campo'], $like['entrada']);
    }
    $this->db->order_by($orderBy['campo'], $orderBy['ordem']);
    return $this->db->get($get)->result();
  }
}

?>
