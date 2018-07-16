<?php
//商品类型模型
class TypeModel extends Model {
	//获取所有的商品类型
	public function getTypes(){
		$sql = "SELECT * FROM {$this->table}";
		return $this->db->getAll($sql);
	}

	//分页获取商品类型
	/*
	public function getPageTypes($offset,$limit){
		$sql = "SELECT * FROM {$this->table} ORDER BY type_id DESC
		        LIMIT $offset,$limit";
		return $this->db->getAll($sql);
	}
	*/
	//分页获取商品类型,完善版
	public function getPageTypes($offset,$limit){
		$sql = "select a.*,count(attr_name) as num from cz_goods_type as a 
				left join cz_attribute as b
				on a.type_id = b.type_id
				group by a.type_id
				ORDER BY a.type_id DESC
		        LIMIT $offset,$limit";
		return $this->db->getAll($sql);
	}

}