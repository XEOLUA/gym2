<?php

namespace App\Http\Sections;

use AdminColumn;
use AdminColumnEditable;
use AdminColumnFilter;
use AdminDisplay;
use AdminDisplayFilter;
use AdminForm;
use AdminFormElement;
use App\Olympstatistic;
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
 * Class Olympstatistics
 *
 * @property \App\Olympstatistic $model
 *
 * @see https://sleepingowladmin.ru/#/ru/model_configuration_section
 */
class Olympstatistics extends Section implements Initializable
{
    /**
     * @var bool
     */
    protected $checkAccess = false;

    /**
     * @var string
     */
    protected $title='Олімпіади';

    /**
     * @var string
     */
    protected $alias;

    /**
     * Initialize class.
     */
    public function initialize()
    {
        $this->addToNavigation()->setPriority(100)->setIcon('far fa-hand-peace');
    }

    /**
     * @param array $payload
     *
     * @return DisplayInterface
     */
    public function onDisplay($payload = [])
    {
        $teachers = Teacher::pluck('snp','id')->toArray();
        $subjects = Subject::pluck('name','id')->toArray();
        $columns = [
            AdminColumn::text('id', '#')->setWidth('50px')->setHtmlAttribute('class', 'text-center'),
            AdminColumnEditable::text('pupil', 'Учень')
                ->setSearchCallback(function($column, $query, $search){
                    return $query
                        ->orWhere('pupil', 'like', '%'.$search.'%')
                    ;
                }),
            AdminColumnEditable::select('teacher_id')->setLabel('Наставник')
                ->setOptions($teachers)
                ->setDisplay('Наставние')
                ->setTitle('Оберіть наставника')
                ->append(AdminColumn::filter('teacher_id'))
            ,
            AdminColumnEditable::select('subject_id')->setLabel('Предмет')
                ->setOptions($subjects)
                ->setDisplay('Предмет')
                ->setTitle('Оберіть предмет')
                ->append(AdminColumn::filter('subject_id'))
            ,
            AdminColumnEditable::text('level','Етап')
            ->append(AdminColumn::filter('level')),
            AdminColumnEditable::text('position','Місце')
            ->append(AdminColumn::filter('position')),
            AdminColumnEditable::text('year','Рік'),
        ];

        $display = AdminDisplay::datatables()
            ->setName('firstdatatables')
            ->setOrder([[0, 'asc']])
            ->setDisplaySearch(true)
            ->paginate(25)
            ->setColumns($columns)
        ;

        $display->setFilters(
            AdminDisplayFilter::related('teacher_id','Наствник')->setModel(Teacher::class),
            AdminDisplayFilter::related('subject_id','Предмет')->setModel(Subject::class),
            AdminDisplayFilter::related('position','Місце')->setModel(Olympstatistic::class),
            AdminDisplayFilter::related('level','Етап')->setModel(Olympstatistic::class)
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