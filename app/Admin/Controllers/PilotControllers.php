<?php

namespace App\Admin\Controllers;

use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;
use \App\Models\Pilot;

class PilotControllers extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Pilot';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Pilot());

        $grid->column('id', __('Id'));
        $grid->column('Name', __('Name'));
        $grid->column('LastName', __('LastName'));
        $grid->column('id_chart', __('Id chart'));
        $grid->column('id_comp', __('Id comp'));
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
        $show = new Show(Pilot::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('Name', __('Name'));
        $show->field('LastName', __('LastName'));
        $show->field('id_chart', __('Id chart'));
        $show->field('id_comp', __('Id comp'));
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
        $form = new Form(new Pilot());

        $form->text('Name', __('Name'));
        $form->text('LastName', __('LastName'));
        $form->number('id_chart', __('Id chart'));
        $form->number('id_comp', __('Id comp'));

        return $form;
    }
}
