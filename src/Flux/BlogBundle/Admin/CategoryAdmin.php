<?php

namespace Flux\BlogBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;

/**
 * Class CategoryAdmin.
 */
class CategoryAdmin extends AbstractAdmin
{
    protected $datagridValues = array(
        '_page' => 1,
        '_sort_order' => 'ASC', // sort direction
        '_sort_by' => 'title', // field name
    );

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('title', null, array('label' => $this->trans('blog.title'), 'editable' => true))
            ->add('is_active', 'boolean', array('label' => $this->trans('blog.active'), 'editable' => true))
            // add custom action links
            ->add(
                '_action',
                'actions',
                array(
                    'actions' => array(
                        'edit' => array(),
                    ),
                    'label' => $this->trans('blog.actions'),
                )
            );
    }

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('General', array('class' => 'col-md-6', 'box_class' => 'box box-success'))
            ->add('title', 'text', array('label' => $this->trans('blog.title')))
            ->add(
                'translations',
                'a2lix_translations',
                array(
                    'label' => ' ',
                    'fields' => array(
                        'title' => array('label' => $this->trans('blog.title')),
                    ),
                )
            )
            ->add('is_active', 'checkbox', array('label' => $this->trans('blog.active'), 'required' => false))
            ->end()
        ;
    }
}
