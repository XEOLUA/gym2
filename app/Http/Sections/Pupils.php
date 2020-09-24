<?php

namespace App\Http\Sections;

use AdminColumn;
use AdminColumnEditable;
use AdminColumnFilter;
use AdminDisplay;
use AdminDisplayFilter;
use AdminForm;
use AdminFormElement;
use App\Classe;
use App\Pupil;
use App\Teacher;
use Illuminate\Database\Eloquent\Model;
use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Contracts\Initializable;
use SleepingOwl\Admin\Form\Buttons\Cancel;
use SleepingOwl\Admin\Form\Buttons\Save;
use SleepingOwl\Admin\Form\Buttons\SaveAndClose;
use SleepingOwl\Admin\Form\Buttons\SaveAndCreate;
use SleepingOwl\Admin\Section;

/**
 * Class Pupils
 *
 * @property \App\Pupil $model
 *
 * @see https://sleepingowladmin.ru/#/ru/model_configuration_section
 */
class Pupils extends Section implements Initializable
{
    /**
     * @var bool
     */
    protected $checkAccess = false;

    /**
     * @var string
     */
    protected $title="Учні";

    /**
     * @var string
     */
    protected $alias;

    /**
     * Initialize class.
     */
    public function initialize()
    {
        $this->addToNavigation()->setPriority(100)->setIcon('fas fa-user-graduate');
    }

    /**
     * @param array $payload
     *
     * @return DisplayInterface
     */
    public function onDisplay($payload = [])
    {
        $classes = Classe::with('teachers')->get()->keyBy('id');
        $cl = $classes->pluck('name','id')->toArray();

        $columns = [
            AdminColumn::text('id', '#')->setWidth('50px'),
            AdminColumnEditable::text('snp', 'ПІБ')
                ->setOrderable(function($query, $direction) {
                    $query->orderBy('snp', $direction);
                }),
            AdminColumnEditable::select('class_id')
            ->setOptions($cl)
            ->setLabel('Клас')
            ->append(AdminColumn::filter('class_id'))
            ,
            AdminColumn::custom('Керівник',function (\App\Pupil $model)use(&$classes){
                return $classes[$model->class_id]->teachers->snp;
            }),

            AdminColumnEditable::checkbox('archive','Вибув')
        ];

        $display = AdminDisplay::datatables()
            ->setName('firstdatatables')
//            ->setOrder([[1, 'asc']])
//            ->setApply(function ($query) {
//                $query->orderBy('snp');
//            })
            ->setDisplaySearch(true)
            ->paginate(40)
            ->setColumns($columns)
        ;

        $display->setFilters(
            AdminDisplayFilter::related('class_id','Клас')->setModel(Classe::class)
        );

        return $display;
    }

    /**
     * @param int|null $id
     * @param array $payload
     *
     * @return FormInterface
     */
    public function onEdit($id = null, $payload = [])
    {
        $form = AdminForm::card()->addBody([
            AdminFormElement::columns()->addColumn([
                AdminFormElement::text('name', 'Name')
                    ->required()
                ,
                AdminFormElement::html('<hr>'),
                AdminFormElement::datetime('created_at')
                    ->setVisible(true)
                    ->setReadonly(false)
                ,
                AdminFormElement::html('last AdminFormElement without comma')
            ], 'col-xs-12 col-sm-6 col-md-4 col-lg-4')->addColumn([
                AdminFormElement::text('id', 'ID')->setReadonly(true),
                AdminFormElement::html('last AdminFormElement without comma')
            ], 'col-xs-12 col-sm-6 col-md-8 col-lg-8'),
        ]);

        $form->getButtons()->setButtons([
            'save'  => new Save(),
            'save_and_close'  => new SaveAndClose(),
            'save_and_create'  => new SaveAndCreate(),
            'cancel'  => (new Cancel()),
        ]);

        return $form;
    }

    /**
     * @return FormInterface
     */
    public function onCreate($payload = [])
    {
        return $this->onEdit(null, $payload);
    }

    /**
     * @return bool
     */
    public function isDeletable(Model $model)
    {
        return true;
    }

    /**
     * @return void
     */
    public function onRestore($id)
    {
        // remove if unused
    }
}
