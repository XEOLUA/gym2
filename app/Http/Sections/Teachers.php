<?php

namespace App\Http\Sections;

use AdminColumn;
use AdminColumnEditable;
use AdminColumnFilter;
use AdminDisplay;
use AdminForm;
use AdminFormElement;
use App\Position;
use App\Subject;
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
 * Class Teachers
 *
 * @property \App\Teacher $model
 *
 * @see https://sleepingowladmin.ru/#/ru/model_configuration_section
 */
class Teachers extends Section implements Initializable
{
    /**
     * @var bool
     */
    protected $checkAccess = false;

    /**
     * @var string
     */
    protected $title='Вчителі';

    /**
     * @var string
     */
    protected $alias;

    /**
     * Initialize class.
     */
    public function initialize()
    {
        $this->addToNavigation()->setPriority(100)->setIcon('fas fa-chalkboard-teacher');
    }

    /**
     * @param array $payload
     *
     * @return DisplayInterface
     */
    public function onDisplay($payload = [])
    {
        $positions = Position::pluck('name','id')->toArray();
        $columns = [
            AdminColumn::text('id', '#')->setWidth('50px')->setHtmlAttribute('class', 'text-center'),
            AdminColumnEditable::text('snp', 'ПІБ')->setWidth('350px')
                ->setSearchCallback(function ($column, $query, $search) {
                    return $query
                        ->orWhere('snp', 'like', '%' . $search . '%');
                }),
            AdminColumn::lists('mo.name', 'МО'),
            AdminColumn::lists('subjects.name', 'Предмети'),
//            AdminColumn::image('photo', 'Фото')->setWidth('10px'),
            AdminColumnEditable::select('position', 'Посада', $positions)
                ->setDisplay('Посада')->setWidth('120px'),
            AdminColumnEditable::select('sex', 'Стать', ['ч'=>'ч', 'ж'=>'ж'])
                ->setDisplay('Стать'),
            AdminColumnEditable::checkbox('active','on')
        ];

        $display = AdminDisplay::datatables()
            ->setName('firstdatatables')
            ->setOrder([[1, 'asc']])
            ->setDisplaySearch(true)
            ->paginate(25)
            ->setColumns($columns);
        $display->getColumnFilters()->setPlacement('card.heading');

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

        $subjects = Subject::pluck('name','id')->toArray();

        $tabs = AdminDisplay::tabbed();

        $tabs->setTabs(function ($id)use (&$subjects) {
            $tabs = [];

            $tabs[] = AdminDisplay::tab(AdminForm::elements([
                AdminFormElement::columns()->addColumn([
                    AdminFormElement::text('snp', 'Вчитель')->required(),
                    AdminFormElement::image('photo', 'Фото'),

//                    AdminFormElement::text('group', 'Група'),
                    AdminFormElement::html('<hr>'),

                ], 'col-xs-12 col-sm-6 col-md-4 col-lg-4')->addColumn([
                    AdminFormElement::text('id', 'ID')->setReadonly(true),
                    AdminFormElement::text('phones', 'Телефон'),
                    AdminFormElement::text('mail', 'E-mail'),
                    AdminFormElement::select('sex', 'Стать')
                        ->setOptions(['ч'=>'чол','ж'=>'жін'])
                        ->required(),
                    AdminFormElement::date('date', 'ДН'),
                    AdminFormElement::checkbox('active', 'On'),

                ], 'col-xs-12 col-sm-6 col-md-8 col-lg-8'),
            ]))->setLabel('Вчитель')->setName('tab1');

            $tabs[] = AdminDisplay::tab(new \SleepingOwl\Admin\Form\FormElements([
                AdminFormElement::hasMany('teachings', [
                    AdminFormElement::select('subject_id','Предмет')
                        ->setOptions($subjects)
                        ->required(),
                ]),
            ]))->setLabel('Предмети')->setName('tab2');

//            $tabs[] = AdminDisplay::tab(new \SleepingOwl\Admin\Form\FormElements([
//                AdminFormElement::hasMany('moforsubject', [
//
//                    AdminFormElement::select('subject_id','Предмет')
//                        ->setOptions($subjects)
//                        ->required(),
//                ]),
//            ]))->setLabel('Предмети')->setName('tab3');

            return $tabs;
        });

        $form = AdminForm::card()
            ->addHeader([
                $tabs
            ]);

//        dd($form);

        $form->getButtons()->setButtons([
            'save'  => new Save(),
            'save_and_close'  => new SaveAndClose(),
            'save_and_create'  => new SaveAndCreate(),
            'cancel'  => (new Cancel()),
        ]);

        return $form;

//        $form = AdminForm::card()->addBody([
//            AdminFormElement::columns()->addColumn([
//                AdminFormElement::text('snp', 'ПІБ')
//                    ->required(),
//                AdminFormElement::text('sex', 'Стать')
//                    ->required(),
//                AdminFormElement::html('<hr>'),
//                AdminFormElement::datetime('created_at')
//                    ->setVisible(true)
//                    ->setReadonly(false)
//                ,
//                AdminFormElement::html('last AdminFormElement without comma')
//            ], 'col-xs-12 col-sm-6 col-md-4 col-lg-4')->addColumn([
//                AdminFormElement::text('id', 'ID')->setReadonly(true),
//                AdminFormElement::html('last AdminFormElement without comma')
//            ], 'col-xs-12 col-sm-6 col-md-8 col-lg-8'),
//        ]);
//
//        $form->getButtons()->setButtons([
//            'save' => new Save(),
//            'save_and_close' => new SaveAndClose(),
//            'save_and_create' => new SaveAndCreate(),
//            'cancel' => (new Cancel()),
//        ]);
//
//        return $form;
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
