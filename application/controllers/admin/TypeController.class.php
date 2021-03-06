<?php
//商品类型控制器
class TypeController extends BaseController {
	//显示商品类型
	public function indexAction(){
		//使用模型获取所有商品类型
		$typeModel = new TypeModel('goods_type');
		//获取当前页 index.php?p=admin&c=type&a=index&page=2
		$current = isset($_GET['page']) ? $_GET['page'] : 1; //默认是第一页
		//设置每页显示的记录数
		$pagesize = 3;
		// $types = $typeModel->getTypes();
		$offset = ($current - 1) * $pagesize;
		$types = $typeModel->getPageTypes($offset,$pagesize);
		//载入分页类
		$this->library('Page');
		//获取总的记录数
		$where = "";
		$total = $typeModel->total($where);
		$page = new Page($total,$pagesize,$current,'index.php',
			array('p'=>'admin','c'=>'type','a'=>'index'));
		$pageinfo = $page->showPage();
		//载入模板页面
		include CUR_VIEW_PATH . "goods_type_list.html";
	}

	public function addAction(){
		include CUR_VIEW_PATH ."goods_type_add.html";
	}
	//完成类型入库操作
	public function insertAction(){
		//1.收集表单数据
		$data['type_name'] = trim($_POST['type_name']);
		//2.验证和处理
		if ($data['type_name'] == '') {
			$this->jump('index.php?p=admin&c=type&a=add','商品类型名称不能为空');
		}
		$this->helper('input');
		$data = deepspecialchars($data);
		$data = deepslashes($data);
		//3.调用模型完成入库并给出提示
		$typeModel = new TypeModel('goods_type');
		if ($typeModel->insert($data)) {
			$this->jump('index.php?p=admin&c=type&a=index','添加成功',2);
		} else {
			$this->jump('index.php?p=admin&c=type&a=add','添加失败');
		}
	}

	public function editAction(){
		include CUR_VIEW_PATH . "goods_type_edit.html";
	}

	public function updateAction(){

	}
	public function deleteAction(){

	}
}