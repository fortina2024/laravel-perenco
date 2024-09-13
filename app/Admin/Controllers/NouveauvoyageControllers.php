<?php

namespace App\Admin\Controllers;

use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;
use \App\Models\Nouveauvoyage;
use \App\Models\User;
use \App\Models\Champ;
use \App\Models\Boat;
use App\Models\Voyage;

class NouveauvoyageControllers extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Nouveauvoyage';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Nouveauvoyage());
        //$grid = Voyage::with('bateau')->get();

        $grid->column('id', __('Id'));
        $grid->column('description', __('Description'));
        $grid->column('date', __('Date'));
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
        $show = new Show(Nouveauvoyage::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('description', __('Description'));
        $show->field('date', __('Date'));
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
        $form = new Form(new Nouveauvoyage());

        $form->date('date', __('Date'))->default(date('Y-m-d'));
        $form->select('description', 'Vessel')->options(Boat::all()->pluck('nom', 'id'));
        $form->select('description', 'Location')->options(Champ::all()->pluck('description', 'id'));
        $form->text('description', __('Destination'));
        $form->text('description', __('ETA'));
        $form->number('description', __('Passagers'));
        $form->select('description', 'Fifi')->options(['','Yes','No']);
        $form->select('description', 'AIS')->options(['','Yes','No']);
        $form->number('description', __('Miles'));
        $form->number('description', __('BoatLanding'));
        //$form->select('description', 'ID user')->options(User::all()->pluck('surname', 'id'));

        return $form;
    }
}
