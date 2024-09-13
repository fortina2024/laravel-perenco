<?php

namespace App\Admin\Controllers;

use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;
use \App\Models\Boat;

class BoatControllers extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Boat';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Boat());

        $grid->column('id', __('Id'));
        $grid->column('nom', __('Nom'));
        $grid->column('id_type', __('Id type'));
        $grid->column('id_category', __('Id category'));
        $grid->column('id_company', __('Id company'));
        $grid->column('id_costcenter', __('Id costcenter'));
        $grid->column('status', __('Status'));
        $grid->column('contrat', __('Contrat'));
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
        $show = new Show(Boat::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('nom', __('Nom'));
        $show->field('id_type', __('Id type'));
        $show->field('id_category', __('Id category'));
        $show->field('id_company', __('Id company'));
        $show->field('id_costcenter', __('Id costcenter'));
        $show->field('status', __('Status'));
        $show->field('contrat', __('Contrat'));
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
        $form = new Form(new Boat());

        $form->text('nom', __('Nom'));
        $form->number('id_type', __('Id type'));
        $form->number('id_category', __('Id category'));
        $form->number('id_company', __('Id company'));
        $form->number('id_costcenter', __('Id costcenter'));
        $form->text('status', __('Status'))->default('On-Hire');
        $form->text('contrat', __('Contrat'));

        return $form;
    }
}
