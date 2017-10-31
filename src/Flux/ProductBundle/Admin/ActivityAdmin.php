<?php

namespace Flux\ProductBundle\Admin;

use Sonata\AdminBundle\Route\RouteCollection;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;

/**
 * Class ActivityAdmin.
 */
class ActivityAdmin extends AbstractAdmin
{
    protected $datagridValues = array(
        '_page' => 1,
        '_sort_order' => 'ASC', // sort direction
        '_sort_by' => 'code', // field name
    );
    protected $baseRoutePattern = 'activity';

    /**
     * @return array
     */
    public function getExportFormats()
    {
        return array('xls', 'csv');
    }

    /**
     * @param RouteCollection $collection
     */
    protected function configureRoutes(RouteCollection $collection)
    {
        $collection->remove('delete');
        $collection->remove('show');
        $collection->remove('batch');
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('startDate', 'date', array('label' => 'Data inici', 'template' => 'MainBundle:Admin:customstartdate.html.twig', 'sortable' => false))
            ->add('endDate', 'date', array('label' => 'Data fi', 'template' => 'MainBundle:Admin:customenddate.html.twig', 'sortable' => false))
            ->add('title', null, array('label' => $this->trans('page.title'), 'editable' => true))
            ->add('category', null, array(
                    'label' => $this->trans('page.category'),
                    'sortable' => true,
                    'sort_field_mapping' => array('fieldName' => 'title'),
                    'sort_parent_association_mappings' => array(array('fieldName' => 'category')),
                ))
            ->add('image1', null, array('label' => $this->trans('page.image1'), 'template' => 'MainBundle:Admin:customimg1.html.twig', 'sortable' => false))
            ->add('position', null, array('label' => $this->trans('page.position'), 'editable' => true))
            ->add('is_active', 'boolean', array('label' => $this->trans('page.active'), 'editable' => true))
            // add custom action links
            ->add('_action', 'actions', array(
                'actions' => array(
                    //'view' => array(),
                    'edit' => array(),
                ),
                'label' => $this->trans('page.actions'),
            ))
        ;
    }

    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('title', null, array('label' => $this->trans('page.title')))
            ->add('category', null, array('label' => $this->trans('page.category')))
            ->add('isActive', null, array('label' => $this->trans('page.active')))
        ;
    }

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('General')
            ->add('category', 'sonata_type_model', array('label' => $this->trans('page.category')), array())
            ->add('code', 'text', array('label' => $this->trans('page.code')))
            ->add('title', 'text', array('label' => $this->trans('page.title')))
            ->add('startDate', 'date', array('label' => 'Data inici', 'required' => false))
            ->add('endDate', 'date', array('label' => 'Data fi', 'required' => false))
            ->add('isPermanent', 'checkbox', array('label' => 'Duració indefinida', 'required' => false))
            ->add('description', 'ckeditor', array(
                'label' => 'Descripció',
                'required' => false,
                'attr' => array(
                    'style' => 'height:400px',
            ), ))
            ->add('conditions', 'ckeditor', array(
                'label' => 'Condicions',
                'required' => false,
                'attr' => array(
                    'class' => 'tinymce',
            ), ))
            ->end()
            ->with('SEO') // SEO
            ->add('metaTitle', 'text', array('label' => $this->trans('page.metatitle'), 'required' => false))
            ->add('metaDescription', 'text', array('label' => $this->trans('page.metadescription'), 'required' => false))
            ->end()
            ->with('Imatges') // IMAGES
            ->add('image1File', 'file', array('label' => $this->trans('page.upload.image1'), 'required' => false))
            ->add('image1', null, array('label' => $this->trans('page.image1'), 'required' => false, 'read_only' => true))
            ->add('altImage1', 'text', array('label' => $this->trans('page.altimage1'), 'required' => false))
            ->add('titleImage1', 'text', array('label' => $this->trans('page.titleimage1'), 'required' => false))
            ->end()
            ->with('Controls') // CONTROLS
            ->add('position', 'integer', array('label' => $this->trans('page.position')))
            ->add('is_active', 'checkbox', array('label' => $this->trans('page.active'), 'required' => false))
            ->end()
            ->with('Traduccions') // TRANSLATIONS
            ->add('translations', 'a2lix_translations_gedmo', array(
                'label' => ' ',
                'required' => false,
                'translatable_class' => 'Flux\ProductBundle\Entity\Activity',
                'fields' => array(
                    'title' => array('label' => $this->trans('page.title')),
                    //'description' => array('label' => 'Descripció'),
                    'description' => array('label' => 'Descripció',
                        'attr' => array(
                            'class' => 'ckeditor',
                            'style' => 'height:400px',
                        ), ),
                    //'conditions' => array('label' => 'Condicions'),
                    'conditions' => array('label' => 'Condicions',
                        'attr' => array(
                            'class' => 'ckeditor',
                            'style' => 'height:400px',
                        ), ),
                    'metaTitle' => array('label' => $this->trans('page.metatitle')),
                    'metaDescription' => array('label' => $this->trans('page.metadescription')),
                    'altImage1' => array('label' => $this->trans('page.altimage1')),
                    'titleImage1' => array('label' => $this->trans('page.titleimage1')),
            ), ));
    }
}
