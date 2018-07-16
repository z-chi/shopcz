<?php
//商品分类控制器
class CategoryController extends Controller {
	public function indexAction(){
		include CUR_VIEW_PATH . "cat_list.html";
	}

	public function addAction(){
		include CUR_VIEW_PATH ."cat_add.html";
	}

	public function insertAction(){

	}

	public function editAction(){
		include CUR_VIEW_PATH . "cat_edit.html";
	}

	public function updateAction(){

	}
	public function deleteAction(){

	}
}