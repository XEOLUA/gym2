<?php

namespace App\Http\Sections;

use AdminColumn;
use AdminColumnEditable;
use AdminColumnFilter;
use AdminDisplay;
use AdminForm;
use AdminFormElement;
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
 * Class Mos
 *
 * @property \App\Mo $model
 *
 * @see https://sleepingowladmin.ru/#/ru/model_configuration_section
 */
class Mos extends Section implements Initializable
{
    /**
     * @var bool
     */
    protected $checkAccess = false;

    /**
     * @var string
     */
    protected $title="МО вчителів";

    /**
     * @var string
     */
    protected $alias;

    /**
     * Initialize class.
     */
    public function initialize()
    {
        $this->addToNavigation()->setPriority(100)->setIcon('fas fa-street-view');
    }

    /**
     * @param array $payload
     *
     * @return DisplayInterface
     */
    public function onDisplay($payload = [])
    {
        $columns = [
            AdminColumn::text('id', '#')->setWidth('50px')->setHtmlAttribute('class', 'text-center'),
            AdminColumnEditable::text('name', 'Name')
                ->setSearchCallback(function($column, $query, $search){
                    return $query
                        ->orWhere('name', 'like', '%'.$search.'%')
                    ;
                })
            ,
            AdminColumn::count('teachers.id', 'Вчителів'),
            AdminColumn::count('subjects.id', 'Предметів'),
            AdminColumn::image('image', 'Зображення'),
//            AdminColumn::lists('teachers.snp', 'Вчителі'),
            AdminColumnEditable::checkbox('active', 'On'),
        ];

        $display = AdminDisplay::datatables()
            ->setName('firstdatatables')
            ->setOrder([[0, 'asc']])
            ->setDisplaySearch(true)
            ->paginate(25)
            ->setColumns($columns)
        ;

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
        $teachers = Teacher::where('active',1)->pluck('snp','id')->toArray();
        $subjects = Subject::pluck('name','id')->toArray();

        $tabs = AdminDisplay::tabbed();

        $tabs->setTabs(function ($id)use (&$teachers,&$subjects) {
            $tabs = [];

            $tabs[] = AdminDisplay::tab(AdminForm::elements([
                AdminFormElement::columns()->addColumn([
                    AdminFormElement::text('name', 'Name')->required(),
                    AdminFormElement::image('image', 'Зображення'),
                    AdminFormElement::checkbox('active', 'Активна'),
//                    AdminFormElement::text('group', 'Група'),
                    AdminFormElement::html('<hr>'),
                    AdminFormElement::datetime('created_at')
                        ->setVisible(true)
                        ->setReadonly(false)
                    ,

                ], 'col-xs-12 col-sm-6 col-md-4 col-lg-4')->addColumn([
                    AdminFormElement::text('id', 'ID')->setReadonly(true),

                ], 'col-xs-12 col-sm-6 col-md-8 col-lg-8'),
            ]))->setLabel('МО')->setName('tab1');

            $tabs[] = AdminDisplay::tab(new \SleepingOwl\Admin\Form\FormElements([
                AdminFormElement::hasMany('moforteacher', [

                    AdminFormElement::select('teacher_id','Вчитель')
                        ->setOptions($teachers)
                        ->required(),
                ]),
            ]))->setLabel('Вчителі')->setName('tab2');

            $tabs[] = AdminDisplay::tab(new \SleepingOwl\Admin\Form\FormElements([
                AdminFormElement::hasMany('moforsubject', [

                    AdminFormElement::select('subject_id','Предмет')
                        ->setOptions($subjects)
                        ->required(),
                ]),
            ]))->setLabel('Предмети')->setName('tab3');

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
//                AdminFormElement::text('name', 'Name')
//                    ->required()
//                ,
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
//            'save'  => new Save(),
//            'save_and_close'  => new SaveAndClose(),
//            'save_and_create'  => new SaveAndCreate(),
//            'cancel'  => (new Cancel()),
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
