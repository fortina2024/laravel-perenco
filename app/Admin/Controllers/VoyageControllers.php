<?php

namespace App\Admin\Controllers;

use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;
use \App\Models\Voyage;
use \App\Models\Boat;
use \App\Models\Champ;
use Illuminate\Http\Request;

class VoyageControllers extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Voyage';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Voyage());

        $grid->column('id', __('Id'));
        $grid->column('date_voyage', __('Date'));
        $grid->column('id_boat', __('Id boat'));
        $grid->column('id_location', __('Id location'));
        $grid->column('destination', __('Destination'));
        $grid->column('eta', __('Eta'));
        $grid->column('passagers', __('Passagers'));
        $grid->column('fifi', __('Fifi'));
        $grid->column('ais', __('Ais'));
        $grid->column('miles', __('Miles'));
        $grid->column('boatlanding', __('Boatlanding'));
        $grid->column('id_user', __('Id user'));
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
        $show = new Show(Voyage::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('date_voyage', __('Date voyage'));
        $show->field('id_boat', __('Id boat'));
        $show->field('id_location', __('Id location'));
        $show->field('destination', __('Destination'));
        $show->field('eta', __('Eta'));
        $show->field('passagers', __('Passagers'));
        $show->field('fifi', __('Fifi'));
        $show->field('ais', __('Ais'));
        $show->field('miles', __('Miles'));
        $show->field('boatlanding', __('Boatlanding'));
        $show->field('id_user', __('Id user'));
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
        $form = new Form(new Voyage());
        $userId = auth()->id();

        $form->date('date_voyage', __('Date'))->default(date('Y-m-d'))->required()->attribute(['id' => 'iddate']);
        $form->select('id_boat', 'Vessel')->options(Boat::all()->pluck('nom', 'id'))->required()->attribute(['id' => 'idboat']);
        $form->select('id_location', 'Location')->options(Champ::all()->pluck('description', 'id'))->required()->attribute(['id' => 'idlocation']);
        $form->select('destination', __('Destination'))->options(Champ::all()->pluck('description', 'id'))->required()->attribute(['id' => 'iddestination']);
        $form->text('eta', __('Eta'));
        $form->number('passagers', __('Passagers'));
        $form->select('fifi', 'Fifi')->options(['','Yes','No']);
        $form->select('ais', 'AIS')->options(['','Yes','No']);
        $form->number('miles', __('Miles'));
        $form->number('boatlanding', __('Boatlanding'));
        $form->number('id_user', __('Id user'))->attribute(['value' => $userId])->readonly();
        $form->html('<button type="submit" class="btn btn-primary mt-4">Submit</button>');

        $form->footer(function ($footer) {

            // disable reset btn
            $footer->disableReset();
        
            // disable submit btn
            $footer->disableSubmit();
        
            // disable `View` checkbox
            $footer->disableViewCheck();
        
            // disable `Continue editing` checkbox
            $footer->disableEditingCheck();
        
            // disable `Continue Creating` checkbox
            $footer->disableCreatingCheck();
        
        });

        return $form;
    }

    protected function form_data(Request $request)
    {
        $form = new Form(new Voyage());
        /*Il faut chercher un moyen pour enregistre les id pendant que
         ***  l'utilisateur manipule la liste de bateau
        */

        /*$form->date('date_voyage', __('Date'))->default(date('Y-m-d'))->required()->attribute(['id' => 'iddate']);
        $form->select('id_boat', 'Vessel')->options(Boat::all()->pluck('nom', 'id'))->required()->attribute(['id' => 'idboat']);
        $form->select('id_location', 'Location')->options(Champ::all()->pluck('description', 'id'))->required()->attribute(['id' => 'idlocation']);
        $form->select('destination', __('Destination'))->options(Champ::all()->pluck('description', 'id'))->required()->attribute(['id' => 'iddestination']);
        $form->text('eta', __('Eta'));
        $form->number('passagers', __('Passagers'));
        $form->select('fifi', 'Fifi')->options(['','Yes','No']);
        $form->select('ais', 'AIS')->options(['','Yes','No']);
        $form->number('miles', __('Miles'));
        $form->number('boatlanding', __('Boatlanding'));
        $form->number('id_user', __('Id user'));*/


        $form->date('date_voyage', __('Date'))->default(date('Y-m-d'))->required()->attribute(['id' => 'iddate']);
        $form->number('id_boat', __('Id boat'))->required()->attribute(['id' => 'idboat']);
        $form->number('id_location', __('Id location'))->required()->attribute(['id' => 'idlocation']);
        $form->text('destination', __('Destination'));
        $form->text('eta', __('Eta'));
        $form->number('passagers', __('Passagers'));
        $form->select('fifi', 'Fifi')->options(['','Yes','No']);
        $form->select('ais', 'AIS')->options(['','Yes','No']);
        $form->number('miles', __('Miles'));
        $form->text('boatlanding', __('Boatlanding'));
        $form->number('id_user', __('Id user'));

        //return $form;
        $voyage = Voyage::create();

       return redirect()->route('equipage.form', ['id' => $voyage->id]);
    }

    public function store_data(Request $request)
    {
        // Validation des données
        $validatedData = $request->validate([
            'date_voyage' => 'required',
            'id_boat' => 'required',
        ]);

        // Enregistrement des données
        Voyage::create($validatedData);

        // Redirection après soumission
        return redirect('/equipages');
    }

}
