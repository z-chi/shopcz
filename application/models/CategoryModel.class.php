<?php
//商品分类模型
class CategoryModel extends Model {
	//获取所有的分类
	public function getCats(){
		$sql = "SELECT * FROM {$this->table}";
		$cats = $this->db->getAll($sql);
		//对获取的分类进行重新排序
		return $this->tree($cats);
	}

	//对给定的数组进行重新排序
	public function tree($arr,$pid = 0,$level = 0){
		static $res = array();
		foreach ($arr as $v){
			if ($v['parent_id'] == $pid) {
				//说明找到，先保存
				$v['level'] = $level; 
				$res[] = $v;
				//改变条件，递归查找
				$this->tree($arr,$v['cat_id'],$level+1);
			}
		}
		return $res;
	}

	//指定一个cat_id,获取其后代所有分类的cat_id
	public function getSubIds($cat_id){
		$sql = "SELECT * FROM {$this->table}";
		$cats = $this->db->getAll($sql);
		$cats = $this->tree($cats,$cat_id);
		$ids = array();
		foreach ($cats as $cat) {
			$ids[] = $cat['cat_id'];
		}
		//将自己也追加进来
		$ids[] = $cat_id;
		return $ids;
	}

	//将平行的二维数组，转成包含关系的多维数组
	public function child($arr,$pid = 0){
		$res = array();
		foreach ($arr as $v) {
			if ($v['parent_id'] == $pid) {
				//找到了，继续查找其后代节点
				//$temp = $this->child($arr,$v['cat_id']);
				//将找到的结果作为当前数组的一个元素来保存，其下标是child
				//$v['child'] = $temp;
				$v['child'] = $this->child($arr,$v['cat_id']);
				$res[] = $v;
			}
		}
		return $res;
	}

	//获取前台的分类
	public function frontCats(){
		$sql = "SELECT * FROM {$this->table}";
		$cats = $this->db->getAll($sql);
		return $this->child($cats);
	}
}