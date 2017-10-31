<?php

namespace Flux\BlogBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;

/**
 * Class PostAdmin.
 */
class PostAdmin extends AbstractAdmin
{
    protected $datagridValues = array(
        '_page' => 1,
        '_sort_order' => 'DESC', // sort direction
        '_sort_by' => 'postDate', // field name
    );

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->add('postDate', null, array('label' => $this->trans('blog.date')))
            ->addIdentifier('title', null, array('label' => $this->trans('blog.title')))
            ->add('image1', null, array('label' => $this->trans('blog.image1')))
            ->add('is_active', 'boolean', array('label' => $this->trans('blog.active')))
            // add custom action links
            ->add(
                '_action',
                'actions',
                array(
                    'actions' => array(
                        //'view' => array(),
                        'edit' => array(),
                    ),
                    'label' => $this->trans('blog.actions'),
                )
            );
    }

    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('title', null, array('label' => $this->trans('blog.title')))
            ->add('isActive', null, array('label' => $this->trans('blog.active')));
    }

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('General')
            ->add('postDate', null, array('label' => $this->trans('blog.date')))
            ->add('title', 'text', array('label' => $this->trans('blog.title')))
            ->add('subtitle', 'text', array('label' => $this->trans('blog.subtitle'), 'required' => false))
            ->add('summary', 'text', array('label' => $this->trans('blog.summary'), 'required' => false))
            ->add('text1', 'textarea', array('label' => $this->trans('blog.text1'), 'required' => false))
            ->add('text2', 'textarea', array('label' => $this->trans('blog.text2'), 'required' => false))
            ->add(
                'translations',
                'a2lix_translations',
                array(
                    'label' => ' ',
                    'fields' => array(
                        'title' => array('label' => $this->trans('blog.title')),
                        'subtitle' => array('label' => $this->trans('blog.subtitle')),
                        'summary' => array('label' => $this->trans('blog.summary')),
                        'text1' => array('label' => $this->trans('blog.text1')),
                        'text2' => array('label' => $this->trans('blog.text2')),
                    ),
                )
            )
            ->add('image1File', 'file', array('label' => $this->trans('blog.upload.image1'), 'required' => false))
            ->add(
                'image1',
                null,
                array('label' => $this->trans('blog.image1'), 'required' => false, 'read_only' => true)
            )
            ->add('image2File', 'file', array('label' => $this->trans('blog.upload.image2'), 'required' => false))
            ->add(
                'image2',
                null,
                array('label' => $this->trans('blog.image2'), 'required' => false, 'read_only' => true)
            )
            ->add('image3File', 'file', array('label' => $this->trans('blog.upload.image3'), 'required' => false))
            ->add(
                'image3',
                null,
                array('label' => $this->trans('blog.image3'), 'required' => false, 'read_only' => true)
            )
            ->add('is_active', 'checkbox', array('label' => $this->trans('blog.active'), 'required' => false))
            ->end()
        ;
    }
}
