<?php
namespace Api\Controller;
use Think\Controller;
class CommonController extends Controller {
    public function _initialize(){
        header("Content-type: text/html; charset=utf-8");
    }
    public function checkLogin(){
    	if (!$_SESSION['admin']['me']['id']) {
    		die('用户登录信息失效，请刷新后再试');
    	}
    }

    /**

     * @Author   Maying
     * @DateTime 2017-04-05
     */
    /**
     * 公共列表方法 一次定义多处使用
     * 任何控制器只要继承commonController即可使用
     * 建议使用情况：仅一次查询不需要数据转换时使用
     * @Author   Maying
     * @DateTime 2017-04-05
     * @E-mail   1977905246@qq.com
     */
    public function lists() {

        $p      = isset($_GET['p']) ? $_GET['p'] : 1;
        $limit  = 20;
        $offset = ($p-1) * $limit;

        $lists = D($this->model)->getList($where, $offset, $limit);

        $page = D($this->model)->getPage($where,$p,$limit);
        $this->assign('page', $page);
        $this->assign('lists', $lists);
        $this->display();
    }

    /**
     * 新增 修改 保存
     * todo 未测试 
     * @Author   Maying
     * @DateTime 2017-04-05
     * @E-mail   1977905246@qq.com
     * @return   [type]
     */
    public function edit() {
        if ($id = I('id',0)) {
            D($this->model)->getBasicInfo($id);
        }
        $this->display();
    }
    public function save() {
        if ($id = I('id',0)) {
            D($this->model)->where(array('id'=>$id))->save($_POST);
        } else {
            D($this->model)->add($_POST);
        }
        $this->success('发布成功', 'lists');
    }
    public function onLine() {
        $id = I('get.id');
        $data = D($this->model)->audit($id,1); 
        // var_dump($data);
        // die();
        if ($data) {
            $this->success('修改成功');
            
            }
        }
        public function offLine() {
        $id = I('get.id');
        $data = D($this->model)->audit($id,0);
        // var_dump($data);
        // die();
        if ($data) {
            $this->success('修改成功');
        }
    }   

}