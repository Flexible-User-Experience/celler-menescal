<?php

namespace Flux\ProductBundle\Admin;

use Sonata\AdminBundle\Route\RouteCollection;
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
        '_sort_by' => 'code', // field name
    );
    protected $baseRoutePattern = 'wine/category';

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
            ->addIdentifier('code', null, array('label' => $this->trans('page.code')))
            ->add('title', null, array('label' => $this->trans('page.title'), 'editable' => true))
            ->add(
                'image1',
                null,
                array(
                    'label' => $this->trans('page.image1'),
                    'template' => 'MainBundle:Admin:customimg1.html.twig',
                    'sortable' => false,
                )
            )
            ->add('position', null, array('label' => $this->trans('page.position'), 'editable' => true))
            ->add('is_active', 'boolean', array('label' => $this->trans('page.active'), 'editable' => true))
            // add custom action links
            ->add(
                '_action',
                'actions',
                array(
                    'actions' => array(
                        'edit' => array(),
                    ),
                    'label' => $this->trans('page.actions'),
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
            ->add('code', 'text', array('label' => $this->trans('page.code')))
            ->add('title', 'text', array('label' => $this->trans('page.title')))
            ->end()
            ->with('SEO', array('class' => 'col-md-6', 'box_class' => 'box box-success')) // SEO
            ->add('metaTitle', 'text', array('label' => $this->trans('page.metatitle'), 'required' => false))
            ->add(
                'metaDescription',
                'text',
                array('label' => $this->trans('page.metadescription'), 'required' => false)
            )
            ->end()
            ->with('Imatges', array('class' => 'col-md-6', 'box_class' => 'box box-success')) // IMAGES
            ->add('image1File', 'file', array('label' => $this->trans('page.upload.image1'), 'required' => false))
            ->add(
                'image1',
                null,
                array('label' => $this->trans('page.image1'), 'required' => false, 'read_only' => true)
            )
            ->add('altImage1', 'text', array('label' => $this->trans('page.altimage1'), 'required' => false))
            ->add('titleImage1', 'text', array('label' => $this->trans('page.titleimage1'), 'required' => false))
            ->end()
            ->with('Controls', array('class' => 'col-md-6', 'box_class' => 'box box-success')) // CONTROLS
            ->add('position', 'integer', array('label' => $this->trans('page.position')))
            ->add('is_active', 'checkbox', array('label' => $this->trans('page.active'), 'required' => false))
            ->end()
            ->with('Traduccions', array('class' => 'col-md-6', 'box_class' => 'box box-success')) // TRANSLATIONS
            ->add(
                'translations',
                'a2lix_translations_gedmo',
                array(
                    'label' => ' ',
                    'required' => false,
                    'translatable_class' => 'Flux\ProductBundle\Entity\Category',
                    'fields' => array(
                        'title' => array('label' => $this->trans('page.title')),
                        'metaTitle' => array('label' => $this->trans('page.metatitle')),
                        'metaDescription' => array('label' => $this->trans('page.metadescription')),
                        'altImage1' => array('label' => $this->trans('page.altimage1')),
                        'titleImage1' => array('label' => $this->trans('page.titleimage1')),
                    ),
                )
            )
            ->end();
    }
}
