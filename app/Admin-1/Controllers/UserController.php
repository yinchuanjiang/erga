<?php

namespace App\Admin\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class UserController extends Controller
{
    use HasResourceActions;

    /**
     * Index interface.
     *
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
        return $content
            ->header('用户管理')
            ->description('用户列表')
            ->body($this->grid());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new User);
        $grid->model()->orderBy('id', 'desc');
        $grid->id('Id');
        $grid->prize('获得奖项')->display(function ($prize) {
            if ($prize == 2) {
                $color = 'label-info';
                $prizeName = '二等奖';
            } elseif ($prize == 3) {
                $color = 'label-default';
                $prizeName = '三等奖';
            } elseif ($prize == 1) {
                $color = 'label-success';
                $prizeName = '一等奖';
            } else {
                $color = 'label-danger';
                $prizeName = '未抽奖';
            }
            return "<span class='label {$color}'>" . $prizeName . "</span>";
        });
        $grid->real_name('真实姓名');
        $grid->mobile('手机号');
        $grid->address('地址');
        $grid->status('奖品发放状态')->display(function ($status){
            if($this->prize == 3 ||$this->prize == 0){
                $color = 'label-default';
                $prizeName = '无需发放';
            }else{
                if($status == 1){
                    $color = 'label-success';
                    $prizeName = '已发放';
                }else{
                    $color = 'label-danger';
                    $prizeName = '未发放';
                }
            }
            return "<span class='label {$color}'>" . $prizeName . "</span>";
        });
        $grid->created_at('注册时间');
        $grid->filter(function ($filter) {
            // 去掉默认的id过滤器
            $filter->disableIdFilter();
            //类型
            $prizes = [
                1 => '一等奖',
                2 => '二等奖',
                3 => '三等奖',
                0 => '未抽奖',
            ];
            $filter->equal('prize', '奖项')->select($prizes);
            $filter->where(function ($query) {
                $query->where('real_name', 'like', "%{$this->input}%");

            }, '昵称');
            //手机号查询
            $filter->where(function ($query) {
                $query->where('mobile', 'like', "%{$this->input}%");
            }, '手机号');
            // 设置created_at字段的范围查询
            $filter->between('created_at', '注册时间')->datetime();
        });

        //禁用批量删除
        $grid->tools(function ($tools) {
            $tools->batch(function ($batch) {
                $batch->disableDelete();
            });
        });
        //关闭行操作 删除
        $grid->actions(function ($actions) {
            $actions->disableDelete();
            $actions->disableView();
            $actions->disableEdit();
            if($actions->row->prize && $actions->row->prize != 3 && !$actions->row->status) {
                $actions->append('<span class="admin-ajax-delete btn btn-sm btn-success" ajax-url="/admin/users/send/'.$actions->row->id.'" style="margin-right:5px">标记奖品已发货</span>');
            }
        });
        //禁用导出数据按钮
        $grid->disableExport();
        $grid->disableRowSelector();
        $grid->disableCreateButton();
        //设置分页选择器选项
        $grid->perPages([10, 20, 30, 40, 50]);
        return $grid;
    }

    /**
     * Show interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function show($id, Content $content)
    {
        return $content
            ->header('Detail')
            ->description('description')
            ->body($this->detail($id));
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(User::findOrFail($id));

        $show->id('Id');
        $show->nickname('Nickname');
        $show->openid('Openid');
        $show->avatar('Avatar');
        $show->real_name('Real name');
        $show->mobile('Mobile');
        $show->address('Address');
        $show->created_at('Created at');
        $show->updated_at('Updated at');
        $show->prize('Prize');

        return $show;
    }

    /**
     * Edit interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function edit($id, Content $content)
    {
        return $content
            ->header('Edit')
            ->description('description')
            ->body($this->form()->edit($id));
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new User);

        $form->text('nickname', 'Nickname');
        $form->text('openid', 'Openid');
        $form->image('avatar', 'Avatar');
        $form->text('real_name', 'Real name');
        $form->mobile('mobile', 'Mobile');
        $form->text('address', 'Address');
        $form->switch('prize', 'Prize');

        return $form;
    }

    /**
     * Create interface.
     *
     * @param Content $content
     * @return Content
     */
    public function create(Content $content)
    {
        return $content
            ->header('Create')
            ->description('description')
            ->body($this->form());
    }

    //标记发货
    public function send(User $user)
    {
        $user->status = 1;
        $user->save();
        return show(200,'标记成功');
    }
}
