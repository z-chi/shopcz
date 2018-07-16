<?php
//首页控制器
class IndexController extends Controller {
	//index方法
	public function indexAction(){
		//获取所有的商品分类
		$categoryModel = new CategoryModel('category');
		$cats = $categoryModel->frontCats();
		// var_dump($cats);
		//获取推荐商品
		$goodsModel = new GoodsModel('goods');
		$bestGoods = $goodsModel->getBestGoods();
		//载入视图
		include CUR_VIEW_PATH. "index.html";
	}
}