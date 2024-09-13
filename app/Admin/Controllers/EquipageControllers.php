<?php

namespace App\Admin\Controllers;

use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;
use \App\Models\Equipage;
use \App\Models\Voyage;

class EquipageControllers extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Equipage';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Equipage());

        $grid->column('id', __('Id'));
        $grid->column('rang', __('Rang'));
        $grid->column('name', __('Name'));
        $grid->column('lastname', __('Lastname'));
        $grid->column('id_voyage', __('Id voyage'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Equipage::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('rang', __('Rang'));
        $show->field('name', __('Name'));
        $show->field('lastname', __('Lastname'));
        $show->field('id_voyage', __('Id voyage'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Equipage());

        $form->text('rang', __('Rang'));
        $form->text('name', __('Name'));
        $form->text('lastname', __('Lastname'));
        $form->number('id_voyage', __('Id voyage'));

        return $form;
    }

}
